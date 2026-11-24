<?php
require_once __DIR__ . '/navigation.inc';
$currentPage = basename($_SERVER['SCRIPT_NAME'] ?? '');
?>
<header id="main-header" class="site-header">
    <div id="header-container" class="header-container">
        <div id="company-branding" class="branding-box">
            <h1 id="site-title" class="company-name">Pacific Alliances Smart City Consultancy LTD</h1>
            <p id="site-tagline" class="company-tagline">Intelligent Urban Infrastructure, Sustainable Digital Cities</p>
        </div>

        <nav id="main-navbar" class="site-navbar" aria-label="Main Navigation">
            <ul id="navbar-menu" class="navbar-list">
                <?php foreach ($siteNavigation as $pageId => $page): ?>
                    <?php $isCurrentPage = $currentPage === $page['href']; ?>
                    <li class="navbar-item">
                        <a id="nav-link-<?= $pageId ?>" class="navbar-link<?= $isCurrentPage ? ' active' : '' ?>"
                           href="<?= $page['href'] ?>"<?= $isCurrentPage ? ' aria-current="page"' : '' ?>><?= $page['label'] ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <div id="header-logo-container" class="logo-box">
            <a href="index.php" class="logo-link">
                <img id="company-logo" class="site-logo" src="images/logo.svg" alt="Pacific Alliances Smart City Consultancy LTD Logo">
            </a>
        </div>
    </div>
</header>
