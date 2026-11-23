<!-- connect db requirements -->
<?php
require_once("settings.php");

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("<p>Database connection failure: " . htmlspecialchars(mysqli_connect_error()) . "</p>");
}
// search bar + avoid sql injection
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

if ($search !== '') {
    $sql = "SELECT * FROM jobs 
            WHERE title LIKE ? 
               OR job_ref LIKE ? 
               OR summary LIKE ? 
               OR location LIKE ? 
            ORDER BY job_id ASC";
    $stmt = mysqli_prepare($conn, $sql);
    $param = "%" . $search . "%";
    mysqli_stmt_bind_param($stmt, "ssss", $param, $param, $param, $param);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
} else {
    $sql = "SELECT * FROM jobs ORDER BY job_id ASC";
    $result = mysqli_query($conn, $sql);
}
// 
function renderListItems($text) {
    $items = explode("\n", $text);
    $html = "";
    foreach ($items as $item) {
        $clean = trim($item);
        if ($clean !== "") {
            $html .= "<li>" . htmlspecialchars($clean, ENT_QUOTES, 'UTF-8') . "</li>\n";
        }
    }
    return $html;
}
?>
<!-- adopt former html + css internal + css external -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pacific Alliances Smart City Consultancy LTD - Job Position Descriptions. Explore available software engineering roles in Australia.">
    <meta name="author" content="Pacific Alliances Smart City Consultancy LTD">
    <title>Job Position Descriptions - Pacific Alliances Smart City Consultancy LTD</title>
    <link rel="stylesheet" href="styles/styles.css">
    <style>
        .jobs-page #main-content {
            overflow: hidden;
        }
        .job-listing {
            float: left;
            width: 70%;
            clear: left;
            margin-bottom: 28px;
            scroll-margin-top: 100px;
        }
        .job-search-form {
            margin: 18px 0 24px 0;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        .job-search-input {
            padding: 10px 14px;
            width: 320px;
            max-width: 100%;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1rem;
        }
        .job-search-btn {
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }
        @media (max-width: 992px) {
            .job-listing {
                float: none;
                width: 100%;
            }
        }
    </style>
</head>
<body id="page-jobs" class="jobs-page page-jobs">
<!-- reuse UI + modify data -->
    <?php include("header.inc"); ?>

    <main id="main-content" class="content-wrapper">
        <section id="jobs-intro" class="section-header">
            <h2 id="jobs-heading" class="section-title">Job Positions Available</h2>
            <p id="jobs-subheading" class="section-subtitle">
                Join a premier consultancy organisation working with city councils and industry partners to develop digital platforms for smart transport, 
                energy monitoring, and urban services management. Below are our open positions. Please quote the reference number when you apply.
            </p>

            <form method="get" action="jobs.php" class="job-search-form">
                <input type="text" name="search" class="job-search-input"
                       placeholder="Search by title, ref (e.g. FS001), or location..."
                       value="<?php echo htmlspecialchars($search, ENT_QUOTES, 'UTF-8'); ?>">
                <button type="submit" class="job-search-btn">Search Jobs</button>
                <?php if ($search !== ''): ?>
                    <a href="jobs.php" class="job-search-btn" style="text-decoration:none; display:inline-flex; align-items:center;">Reset</a>
                <?php endif; ?>
            </form>
        </section>

        <?php if ($result && mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <section id="job-<?php echo htmlspecialchars(strtolower($row['job_ref']), ENT_QUOTES, 'UTF-8'); ?>" class="job-listing">
                    <article class="content-box job-card">
                        <header class="job-header">
                            <h2 class="box-title job-title">
                                <?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?>
                            </h2>
                            <span class="box-badge job-ref">
                                Reference number: <strong><?php echo htmlspecialchars($row['job_ref'], ENT_QUOTES, 'UTF-8'); ?></strong>
                            </span>
                        </header>

                        <p class="job-summary">
                            <?php echo htmlspecialchars($row['summary'], ENT_QUOTES, 'UTF-8'); ?>
                        </p>

                        <section class="job-section">
                            <h3 class="job-subtitle">Salary and Reporting Line</h3>
                            <dl class="job-details-grid">
                                <dt>Salary</dt>
                                <dd><?php echo htmlspecialchars($row['salary'], ENT_QUOTES, 'UTF-8'); ?></dd>
                                <dt>Reports to</dt>
                                <dd><?php echo htmlspecialchars($row['reports_to'], ENT_QUOTES, 'UTF-8'); ?></dd>
                                <dt>Location</dt>
                                <dd><?php echo htmlspecialchars($row['location'], ENT_QUOTES, 'UTF-8'); ?></dd>
                            </dl>
                        </section>

                        <section class="job-section">
                            <h3 class="job-subtitle">Key Responsibilities</h3>
                            <ul class="job-list">
                                <?php echo renderListItems($row['responsibilities']); ?>
                            </ul>
                        </section>

                        <section class="job-section">
                            <h3 class="job-subtitle">Requirements</h3>

                            <h4 class="job-subheading">Essential</h4>
                            <ul class="job-list">
                                <?php echo renderListItems($row['essential_req']); ?>
                            </ul>

                            <h4 class="job-subheading">Preferable</h4>
                            <ul class="job-list">
                                <?php echo renderListItems($row['preferable_req']); ?>
                            </ul>
                        </section>
                    </article>
                </section>
            <?php endwhile; ?>
        <?php else: ?>
            <section class="job-listing">
                <article class="content-box job-card">
                    <h2 class="box-title">No Matching Positions Found</h2>
                    <p>No job listings matched "<strong><?php echo htmlspecialchars($search, ENT_QUOTES, 'UTF-8'); ?></strong>". Please try another keyword or <a href="jobs.php">view all positions</a>.</p>
                </article>
            </section>
        <?php endif; ?>

        <aside id="how-to-apply" class="content-box cta-card-box job-aside" style="float: right; width: 25%; margin: 0 0 20px 20px; 
        padding: 24px 20px; border: 2px solid var(--border-light); text-align: left;">
            <h2 class="box-title job-aside-title">How to Apply</h2>
            <ol class="job-order-list">
                <li>Choose the position and note its reference number.</li>
                <li>Prepare your CV and a short cover letter.</li>
                <li>Complete the form on our <a href="apply.php">Apply page</a>.</li>
                <li>Our HR team will contact shortlisted candidates within two weeks.</li>
            </ol>
            <p class="job-note"><small>We are an equal opportunity employer.</small></p>
        </aside>
    </main>

    <?php include("footer.inc"); ?>

</body>
</html>
<!-- memory-free + close -->
<?php
if (isset($stmt)) {
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
?>