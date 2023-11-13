<?php
// index.php

// Include the themes file
include 'core/themes.php';

// Determine the requested page from the URL
$requestPage = trim($_SERVER['REQUEST_URI'], '/');
$requestPage = $requestPage ? $requestPage : 'index'; // Set the default page to 'index'

// Include the theme-specific files
includeThemeFiles($theme);

// Determine the actual page to render
renderThemePage($theme, $requestPage);
?>
