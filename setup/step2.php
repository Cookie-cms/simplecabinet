<?php
session_start(); // Start the session

// Placeholder for displaying errors below the form
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Setup Page - Step 2</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- <link href="../css/login_register.css" rel="stylesheet"> -->
    <!-- <script src="../js/login_register.js" defer></script> -->
    <link rel="stylesheet" href="../css/home.css">
</head>
<body>
    <div class="container mt-3">
            <div class="position-relative m-4">
            <div class="progress" role="progressbar" aria-label="Progress" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="height: 1px;">
                <div class="progress-bar" style="width: 100%"></div>
            </div>
            <button type="button" class="position-absolute top-0 start-0 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 2rem; height:2rem;">1</button>
            <button type="button" class="position-absolute top-0 start-100 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 2rem; height:2rem;">2</button>
    </div>  
    <div class="container">
        <?php
        include_once 'alert_display.php';

        // Placeholder for displaying errors below the form
        if (isset($_GET['alertdanger'])) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">' .
                $_GET['alertdanger'] .
                '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' .
                '</div>';
        }
        if (isset($_GET['alertgood'])) {  // Corrected variable name
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">' .
                $_GET['alertgood'] .
                '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' .
                '</div>';
        }
        ?>
                <div class="container mt-3">
                              <div class="form-check form-switch">
                                   <input class="form-check-input" type="checkbox" id="themeSwitch">
                                   <label class="form-check-label" for="themeSwitch">Toggle Dark Mode</label>
                              </div>
        </div>

        <h2>Admin user Setup - Step 2</h2>
        <form action="process_setup2.php" method="post">
            <!-- Add form elements for the second step as needed -->
            <label>Username:</label>
            <input type="text" name="username" required><br><br>

            <label>Password:</label>
            <input type="password" name="password" required><br><br>

            <label>Repeat Password:</label>
            <input type="password" name="repassword" required><br><br>

            <!-- Add more fields as necessary -->

            <button type="submit" class="btn btn-primary">Next</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/darktheme.js"></script>
</body>
</html>
