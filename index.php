<?php
// index.php

// Include the configuration file
// include 'config/config.php';

// Explicitly declare $theme as a global variable
global $theme;

// Include the themes file
include 'core/themes.php';

// Determine the page from the URL
$page = isset($_GET['page']) ? $_GET['page'] : 'index';

// Include the theme-specific files
includeThemeFiles($theme);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website Title</title>
</head>
<body>
    <?php
    // Render the theme-specific page
    renderThemePage($theme, $page);
    ?>
</body>
</html>
