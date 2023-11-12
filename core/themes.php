<?php
// core/theme.php

// Include the configuration file
include 'configs/config.inc.php';  // Adjust the path as needed

// Set debug mode
// $debugMode = true;  // Change to false to disable debugging statements

// Function to include theme-specific files
function includeThemeFiles($theme)
{
    global $debugMode;

    // Set the theme directory
    $themeDirectory = '../themes/' . $theme;

    // Debugging statement
    if ($debugMode) {
        echo "Theme Directory: $themeDirectory<br>";
    }

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
    global $debugMode;

    // Set the theme directory
    $themeDirectory = realpath(__DIR__ . '/../themes/' . $theme);

    // Debugging statements
    if ($debugMode) {
        echo "Theme Directory: $themeDirectory<br>";
        echo "Page: $page<br>";
    }

    // Include the theme-specific page
    $pageFilePath = $themeDirectory . '/pages/' . $page . '.php';

    // Debugging statement
    if ($debugMode) {
        echo "Page File Path: $pageFilePath<br>";
    }

    // Check if the file exists
    if (file_exists($pageFilePath)) {
        if ($debugMode) {
            echo "Page File Exists<br>";
        }

        // Attempt to include the file
        include $pageFilePath;
    } else {
        if ($debugMode) {
            echo "Page not found!<br>";
            echo "Theme: $theme<br>";
            echo "Page: $page<br>";
            echo "Page File Path: $pageFilePath<br>";
        }
    }
}

// $theme variable is now available here, dynamically set based on the config file
includeThemeFiles($theme);
?>
