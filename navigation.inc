<?php
// Keep About reachable while its PHP page is being migrated.
$siteNavigation = [
    'home' => ['label' => 'Home', 'href' => 'index.php'],
    'jobs' => ['label' => 'Jobs', 'href' => 'jobs.php'],
    'apply' => ['label' => 'Apply', 'href' => 'apply.php'],
    'about' => [
        'label' => 'About Us',
        'href' => is_file(__DIR__ . '/about.php') ? 'about.php' : 'about.html',
    ],
];
