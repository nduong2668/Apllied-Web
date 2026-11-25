<?php
// GenAI assistance (Google Gemini): Server-side validation, input sanitising, auto-table creation, and prepared statements.

// 1. Block direct URL access (redirect to apply.php if not submitted via POST)
if ($_SERVER["REQUEST_METHOD"] != "POST" || !isset($_POST["jobref"])) {
    header("Location: apply.php");
    exit();
}

// 2. Sanitise helper function (trim, strip slashes, escape HTML)
function sanitise_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, "UTF-8");
    return $data;
}

// Read and sanitise all form inputs
$jobref        = strtoupper(sanitise_input($_POST["jobref"] ?? ""));
$firstname     = sanitise_input($_POST["firstname"] ?? "");
$lastname      = sanitise_input($_POST["lastname"] ?? "");
$dob           = sanitise_input($_POST["dob"] ?? "");
$gender        = strtolower(sanitise_input($_POST["gender"] ?? ""));
$street        = sanitise_input($_POST["street"] ?? "");
$suburb        = sanitise_input($_POST["suburb"] ?? "");
$state         = strtoupper(sanitise_input($_POST["state"] ?? ""));
$postcode      = sanitise_input($_POST["postcode"] ?? "");
$email         = sanitise_input($_POST["email"] ?? "");
$phone         = sanitise_input($_POST["phone"] ?? "");
$otherskills   = sanitise_input($_POST["otherskills"] ?? "");
$other_checked = isset($_POST["other_skills_check"]);

$skills_array = [];
if (isset($_POST["skills"]) && is_array($_POST["skills"])) {
    foreach ($_POST["skills"] as $item) {
        $skills_array[] = sanitise_input($item);
    }
}
$skills_str = implode(", ", $skills_array);

// 3. Server-side validation rules
$errors = [];
$dob_mysql = "";

// Job reference: exactly 5 alphanumeric characters
if ($jobref == "" || !preg_match("/^[A-Za-z0-9]{5}$/", $jobref)) {
    $errors[] = "Job reference number must be exactly 5 alphanumeric characters (e.g. FS001).";
}

// First name & Last name: max 20 alphabetical characters
if ($firstname == "" || !preg_match("/^[A-Za-z]{1,20}$/", $firstname)) {
    $errors[] = "First name is required and must contain at most 20 alphabetical characters.";
}
if ($lastname == "" || !preg_match("/^[A-Za-z]{1,20}$/", $lastname)) {
    $errors[] = "Last name is required and must contain at most 20 alphabetical characters.";
}

// Date of birth: dd/mm/yyyy format, real calendar date, age between 15 and 80
if ($dob == "" || !preg_match("/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/", $dob)) {
    $errors[] = "Date of birth must be in dd/mm/yyyy format.";
} else {
    $parts = explode("/", $dob);
    $day   = (int)$parts[0];
    $month = (int)$parts[1];
    $year  = (int)$parts[2];

    if (!checkdate($month, $day, $year)) {
        $errors[] = "Date of birth is not a valid calendar date.";
    } else {
        $dob_mysql = sprintf("%04d-%02d-%02d", $year, $month, $day);
        $age = (int)date("Y") - $year;
        if (date("md") < sprintf("%02d%02d", $month, $day)) {
            $age--;
        }
        if ($age < 15 || $age > 80) {
            $errors[] = "Applicant age must be between 15 and 80 years old.";
        }
    }
}

// Gender: must be selected
if (!in_array($gender, ["female", "male", "other"])) {
    $errors[] = "Please select a gender.";
}

// Street & Suburb: required, max 40 characters
if ($street == "" || strlen($street) > 40) {
    $errors[] = "Street address is required and must not exceed 40 characters.";
}
if ($suburb == "" || strlen($suburb) > 40) {
    $errors[] = "Suburb/Town is required and must not exceed 40 characters.";
}

// State & Postcode: valid Australian state and matching 4-digit postcode
$state_prefixes = [
    "VIC" => ["3", "8"],
    "NSW" => ["1", "2"],
    "QLD" => ["4", "9"],
    "NT"  => ["0"],
    "WA"  => ["6"],
    "SA"  => ["5"],
    "TAS" => ["7"],
    "ACT" => ["0"]
];

if (!array_key_exists($state, $state_prefixes)) {
    $errors[] = "Please select a valid state (VIC, NSW, QLD, NT, WA, SA, TAS, ACT).";
}

if (!preg_match("/^[0-9]{4}$/", $postcode)) {
    $errors[] = "Postcode must be exactly 4 digits.";
} elseif (array_key_exists($state, $state_prefixes)) {
    $first_digit = substr($postcode, 0, 1);
    if (!in_array($first_digit, $state_prefixes[$state])) {
        $errors[] = "Postcode $postcode does not match selected state $state.";
    }
}

// Email: valid format
if ($email == "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Please enter a valid email address.";
}

// Phone: 8 to 12 digits or spaces (and must contain digits)
$digits_only = str_replace(" ", "", $phone);
if (!preg_match("/^[0-9 ]{8,12}$/", $phone) || strlen($digits_only) < 6) {
    $errors[] = "Phone number must be 8 to 12 digits or spaces.";
}

// Other skills: required if 'Other skills...' checkbox is ticked
if ($other_checked && $otherskills == "") {
    $errors[] = "Other skills text area cannot be empty when 'Other skills...' is checked.";
}

// 4. Connect to MySQL, create EOI table if not exists, and insert record
$eoi_number = 0;

if (empty($errors)) {
    mysqli_report(MYSQLI_REPORT_OFF);
    require_once("settings.php");

    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
    if (!$conn) {
        $errors[] = "Database connection failed. Please check MySQL in XAMPP.";
    } else {
        // Optional check: verify job reference exists in jobs table
        $check_jobs = mysqli_query($conn, "SHOW TABLES LIKE 'jobs'");
        if ($check_jobs && mysqli_num_rows($check_jobs) > 0) {
            $job_stmt = mysqli_prepare($conn, "SELECT job_ref FROM jobs WHERE job_ref = ?");
            mysqli_stmt_bind_param($job_stmt, "s", $jobref);
            mysqli_stmt_execute($job_stmt);
            $job_res = mysqli_stmt_get_result($job_stmt);
            if (mysqli_num_rows($job_res) == 0) {
                $errors[] = "Job reference '$jobref' does not match any advertised position.";
            }
            mysqli_stmt_close($job_stmt);
        }

        // Create eoi table automatically if it does not exist
        if (empty($errors)) {
            $create_sql = "CREATE TABLE IF NOT EXISTS eoi (
                EOInumber INT AUTO_INCREMENT PRIMARY KEY,
                job_ref VARCHAR(5) NOT NULL,
                first_name VARCHAR(20) NOT NULL,
                last_name VARCHAR(20) NOT NULL,
                dob DATE NOT NULL,
                gender ENUM('female','male','other') NOT NULL,
                street_address VARCHAR(40) NOT NULL,
                suburb VARCHAR(40) NOT NULL,
                state ENUM('VIC','NSW','QLD','NT','WA','SA','TAS','ACT') NOT NULL,
                postcode CHAR(4) NOT NULL,
                email VARCHAR(100) NOT NULL,
                phone VARCHAR(12) NOT NULL,
                skills VARCHAR(255) NOT NULL DEFAULT '',
                other_skills TEXT DEFAULT NULL,
                status ENUM('New','Current','Final') NOT NULL DEFAULT 'New',
                submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )";
            mysqli_query($conn, $create_sql);

            // Insert validated record using Prepared Statement (prevents SQL Injection)
            $insert_sql = "INSERT INTO eoi
                (job_ref, first_name, last_name, dob, gender, street_address, suburb, state, postcode, email, phone, skills, other_skills)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = mysqli_prepare($conn, $insert_sql);
            mysqli_stmt_bind_param(
                $stmt,
                "sssssssssssss",
                $jobref, $firstname, $lastname, $dob_mysql, $gender,
                $street, $suburb, $state, $postcode, $email, $phone,
                $skills_str, $otherskills
            );

            if (mysqli_stmt_execute($stmt)) {
                $eoi_number = mysqli_insert_id($conn);
            } else {
                $errors[] = "Failed to save your application into the database.";
            }
            mysqli_stmt_close($stmt);
        }
        mysqli_close($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Status - Pacific Alliances Smart City Consultancy LTD</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body class="apply-page">

    <?php include("header.inc"); ?>

    <main id="main-content" class="content-wrapper">
        <section class="form-container-section">
            <div class="content-box form-card-box">

                <?php if ($eoi_number > 0): ?>
                    <h2 class="box-title">Application Submitted Successfully!</h2>
                    <p class="box-text">
                        Thank you, <strong><?php echo "$firstname $lastname"; ?></strong>, for applying for position
                        <strong><?php echo $jobref; ?></strong>.
                    </p>
                    <p class="box-text" style="margin: 16px 0; font-size: 1.15rem;">
                        Your auto-generated EOI Reference Number is:
                        <strong style="color: var(--color-kikyo-iroiro); font-size: 1.4rem;">#<?php echo $eoi_number; ?></strong>
                        (Status: <strong>New</strong>)
                    </p>
                    <div class="form-actions-box">
                        <a href="jobs.php" class="action-btn primary-btn submit-btn">Back to Jobs</a>
                    </div>

                <?php else: ?>
                    <h2 class="box-title" style="color: #C62828;">Submission Failed - Please Fix the Following Errors:</h2>
                    <ul class="job-list" style="margin: 16px 0 24px;">
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="form-actions-box">
                        <a href="apply.php" class="action-btn primary-btn submit-btn">Return to Application Form</a>
                    </div>
                <?php endif; ?>

            </div>
        </section>
    </main>

    <?php include("footer.inc"); ?>

</body>
</html>
