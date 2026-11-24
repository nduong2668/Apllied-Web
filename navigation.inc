<?php
// Keep Apply and About reachable while their PHP pages are being migrated.
$siteNavigation = [
    'home' => ['label' => 'Home', 'href' => 'index.php'],
    'jobs' => ['label' => 'Jobs', 'href' => 'jobs.php'],
    'apply' => [
        'label' => 'Apply',
        'href' => is_file(__DIR__ . '/apply.php') ? 'apply.php' : 'apply.html',
    ],
    'about' => [
        'label' => 'About Us',
        'href' => is_file(__DIR__ . '/about.php') ? 'about.php' : 'about.html',
    ],
];
