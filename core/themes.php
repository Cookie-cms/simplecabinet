<?php
// core/theme.php

// Include the configuration file
include 'configs/config.inc.php';

// Function to include theme-specific files
function includeThemeFiles($theme)
{
    // Set the theme directory
    $themeDirectory = '../themes/' . $theme;

    // Include the theme-specific files
    $pagesDirectory = $themeDirectory . '/pages';

    // Load all PHP files from the pages directory
    $files = glob($pagesDirectory . '/*.php');
    foreach ($files as $file) {
        include $file;
    }

    // Include the theme-specific CSS and JS files
    $cssPath = $themeDirectory . '/css/style.css';
    $jsPath = $themeDirectory . '/js/script.js';

    echo '<link rel="stylesheet" href="' . $cssPath . '">';
    echo '<script src="' . $jsPath . '"></script>';
}
function renderThemePage($theme, $page)
{
    // Set the theme directory
    $themeDirectory = realpath(__DIR__ . "/../themes/$theme");

    // Include the theme-specific page
    $pageFilePath = "$themeDirectory/pages/$page.php";

    // Check if the file exists
    if (file_exists($pageFilePath)) {
        // Attempt to include the file
        include $pageFilePath;
    } else {
        // Handle the case where the file is not found
        echo "Page not found!<br>";
        echo "Theme: $theme<br>";
        echo "Page: $page<br>";
        echo "Page File Path: $pageFilePath<br>";
    }
}
// $theme variable is now available here, dynamically set based on the config file
includeThemeFiles($theme);
?>
