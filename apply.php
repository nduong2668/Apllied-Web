<?php
// GenAI assistance (Google Gemini): Converted static apply.html to modular PHP using shared includes.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pacific Alliances Smart City Consultancy LTD - Job Application Form. Submit your application for open Smart City engineering positions.">
    <meta name="author" content="Pacific Alliances Smart City Consultancy LTD">
    <title>Job Application Form - Pacific Alliances Smart City Consultancy LTD</title>

    <!-- Shared external stylesheet -->
    <link rel="stylesheet" href="styles/styles.css">

    <!-- Embedded CSS (page-specific, Apply page only; uses colour variables from styles/styles.css) -->
    <style>
        .apply-page .form-card-box {
            border-top: 5px solid var(--color-kikyo-iroiro);
        }
        .apply-page .form-legend {
            color: var(--color-dark-blue);
            font-weight: 700;
        }
        .apply-page .form-control::placeholder {
            color: var(--text-light);
        }
    </style>
</head>
<body id="page-apply" class="apply-page">

    <!-- Shared Header & Navigation -->
    <?php include("header.inc"); ?>

    <!-- Main Job Application Form Content -->
    <main id="main-content" class="content-wrapper">

        <section id="apply-intro" class="section-header">
            <h2 id="apply-heading" class="section-title">Job Application Form</h2>
            <p id="apply-subheading" class="section-subtitle" style="font-style: italic;">Please complete the form below to apply for our open Smart City vacancies</p>
        </section>

        <section id="application-form-section" class="form-container-section">
            <div id="apply-form-box" class="content-box form-card-box">

                <!-- Client-side HTML validation is disabled (novalidate) so all validation runs on the server -->
                <form id="job-application-form" class="application-form" action="process_eoi.php" method="post" novalidate="novalidate">

                    <p class="form-group">
                        <label for="jobref" class="form-label">Job reference number</label>
                        <input type="text" id="jobref" name="jobref" class="form-control"
                               placeholder="e.g. FS001, DO017, DT023">
                    </p>

                    <div class="form-row">
                        <p class="form-group form-col">
                            <label for="firstname" class="form-label">First name</label>
                            <input type="text" id="firstname" name="firstname" class="form-control"
                                   placeholder="Maximum 20 letters">
                        </p>

                        <p class="form-group form-col">
                            <label for="lastname" class="form-label">Last name</label>
                            <input type="text" id="lastname" name="lastname" class="form-control"
                                   placeholder="Maximum 20 letters">
                        </p>
                    </div>

                    <p class="form-group">
                        <label for="dob" class="form-label">Date of birth</label>
                        <input type="text" id="dob" name="dob" class="form-control"
                               placeholder="dd/mm/yyyy">
                    </p>

                    <fieldset class="form-fieldset">
                        <legend class="form-legend">Gender</legend>
                        <div class="radio-options-group">
                            <label class="radio-option-label">
                                <input type="radio" id="female" name="gender" value="female">
                                Female
                            </label>

                            <label class="radio-option-label">
                                <input type="radio" id="male" name="gender" value="male">
                                Male
                            </label>

                            <label class="radio-option-label">
                                <input type="radio" id="other" name="gender" value="other">
                                Other
                            </label>
                        </div>
                    </fieldset>

                    <p class="form-group">
                        <label for="street" class="form-label">Street address</label>
                        <input type="text" id="street" name="street" class="form-control"
                               placeholder="Maximum 40 characters">
                    </p>

                    <div class="form-row">
                        <p class="form-group form-col">
                            <label for="suburb" class="form-label">Suburb/Town</label>
                            <input type="text" id="suburb" name="suburb" class="form-control"
                                   placeholder="Maximum 40 characters">
                        </p>

                        <p class="form-group form-col">
                            <label for="state" class="form-label">State</label>
                            <select id="state" name="state" class="form-control form-select">
                                <option value="">Please select</option>
                                <option value="VIC">VIC</option>
                                <option value="NSW">NSW</option>
                                <option value="QLD">QLD</option>
                                <option value="NT">NT</option>
                                <option value="WA">WA</option>
                                <option value="SA">SA</option>
                                <option value="TAS">TAS</option>
                                <option value="ACT">ACT</option>
                            </select>
                        </p>

                        <p class="form-group form-col">
                            <label for="postcode" class="form-label">Postcode</label>
                            <input type="text" id="postcode" name="postcode" class="form-control"
                                   placeholder="4 digits (e.g. 3000)">
                        </p>
                    </div>

                    <div class="form-row">
                        <p class="form-group form-col">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" id="email" name="email" class="form-control"
                                   placeholder="name@example.com">
                        </p>

                        <p class="form-group form-col">
                            <label for="phone" class="form-label">Phone number</label>
                            <input type="text" id="phone" name="phone" class="form-control"
                                   placeholder="8 to 12 digits or spaces">
                        </p>
                    </div>

                    <fieldset class="form-fieldset">
                        <legend class="form-legend">Skill list</legend>
                        <div class="checkbox-options-group">
                            <label class="checkbox-option-label">
                                <input type="checkbox" id="iot" name="skills[]" value="IoT Telemetry">
                                IoT Telemetry
                            </label>

                            <label class="checkbox-option-label">
                                <input type="checkbox" id="scada" name="skills[]" value="SCADA">
                                SCADA
                            </label>

                            <label class="checkbox-option-label">
                                <input type="checkbox" id="gis" name="skills[]" value="GIS Mapping">
                                GIS Mapping
                            </label>

                            <label class="checkbox-option-label">
                                <input type="checkbox" id="python" name="skills[]" value="Python Data Science">
                                Python Data Science
                            </label>

                            <label class="checkbox-option-label">
                                <input type="checkbox" id="cloud" name="skills[]" value="Cloud and Edge Computing">
                                Cloud &amp; Edge Computing
                            </label>

                            <label class="checkbox-option-label">
                                <input type="checkbox" id="other-skill" name="other_skills_check" value="Other">
                                Other skills...
                            </label>
                        </div>
                    </fieldset>

                    <p class="form-group">
                        <label for="otherskills" class="form-label">Other skills</label>
                        <textarea id="otherskills" name="otherskills" class="form-control form-textarea" rows="5" cols="40" placeholder="List any other relevant technical skills, tools, or frameworks (e.g. smart grid, traffic analytics, MQTT)..."></textarea>
                    </p>

                    <div class="form-actions-box">
                        <input type="submit" id="btn-submit-apply" class="action-btn primary-btn submit-btn" value="Apply">
                    </div>

                </form>

            </div>
        </section>

    </main>

    <!-- Shared Footer -->
    <?php include("footer.inc"); ?>

</body>
</html>
