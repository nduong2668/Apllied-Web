<?php $current_page = basename($_SERVER['PHP_SELF']); ?>
<header id="main-header" class="site-header">
    <div id="header-container" class="header-container">
        <div id="company-branding" class="branding-box">
            <h1 id="site-title" class="company-name">Pacific Alliances Smart City Consultancy LTD</h1>
            <p id="site-tagline" class="company-tagline">Intelligent Urban Infrastructure, Sustainable Digital Cities</p>
        </div>

        <nav id="main-navbar" class="site-navbar" aria-label="Main Navigation">
            <ul id="navbar-menu" class="navbar-list">
                <li class="navbar-item">
                    <a id="nav-link-home" class="navbar-link <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>" href="index.php">Home</a>
                </li>
                <li class="navbar-item">
                    <a id="nav-link-jobs" class="navbar-link <?php echo ($current_page == 'jobs.php') ? 'active' : ''; ?>" href="jobs.php">Jobs</a>
                </li>
                <li class="navbar-item">
                    <a id="nav-link-apply" class="navbar-link <?php echo ($current_page == 'apply.php') ? 'active' : ''; ?>" href="apply.php">Apply</a>
                </li>
                <li class="navbar-item">
                    <a id="nav-link-about" class="navbar-link <?php echo ($current_page == 'about.php') ? 'active' : ''; ?>" href="about.php">About Us</a>
                </li>
            </ul>
        </nav>

        <div id="header-logo-container" class="logo-box">
            <a href="index.php" class="logo-link">
                <img id="company-logo" class="site-logo" src="images/logo.svg" alt="Pacific Alliances Smart City Consultancy LTD Logo">
            </a>
        </div>
    </div>
</header>