<?php

$configFile = '../core/configs/config.inc.php';

if (file_exists($configFile)) {

    try {
      include $configFile; 
    } catch (Exception $e) {
      // Handle error
    }
  
    if (!$development) {
      header('Location: /');
      exit;
    }
  
  }
  ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Setup Page - Step 1</title>
    <script>
        function toggleHWIDSetup() {
            var hwidSetupDiv = document.getElementById("hwidSetupDiv");
            var hwidCheckbox = document.getElementById("presetup");

            if (hwidCheckbox.checked) {
                hwidSetupDiv.style.display = "block";
            } else {
                hwidSetupDiv.style.display = "none";
            }
        }
    </script>
    <script src="../js/login_register.js" defer></script>
    <link href="../css/home.css" rel="stylesheet">
    
</head>
<body>
    <div class="container mt-3">
        <div class="position-relative m-4">
        <div class="progress" role="progressbar" aria-label="Progress" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="height: 1px;">
            <div class="progress-bar" style="width: 50%"></div>
        </div>
        <button type="button" class="position-absolute top-0 start-0 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 2rem; height:2rem;">1</button>
        <button type="button" class="position-absolute top-0 start-100 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 2rem; height:2rem;">2</button>
    </div>
    <!-- <button type="button" class="position-absolute top-0 start-100 translate-middle btn btn-sm btn-secondary rounded-pill" style="width: 2rem; height:2rem;">3</button> -->
    </div>
    <div class="container">
        <?php include_once 'alert_display.php'; ?>

        <h2>Database Setup - Step 1</h2>
        <div class="container mt-3">
                              <div class="form-check form-switch">
                                   <input class="form-check-input" type="checkbox" id="themeSwitch">
                                   <label class="form-check-label" for="themeSwitch">Toggle Dark Mode</label>
                              </div>
        </div>
        <form action="process_setup.php" method="post">
            <label>IP Address:</label>
            <input type="text" name="ip" required><br><br>

            <label>Username:</label>
            <input type="text" name="username" required><br><br>

            <label>Port:</label>
            <input type="text" name="port" value="3306" required><br><br>

            <label>Password:</label>
            <input type="password" name="db_password" required><br><br>

            <label>Database Name:</label>
            <input type="text" name="database" required><br><br>

            <label>Useful for minecraft/gravitlauncher:</label>
            <input type="checkbox" name="presetup" id="presetup" onchange="toggleHWIDSetup()"><br><br>

            <div id="hwidSetupDiv" style="display: none;">
                <label>Setup hwid base:</label>
                <input type="checkbox" name="hwid"><br><br>
            </div>

            <label>Type register:</label>
            <input type="number" id="typeregister" name="typeregister" min="0" max="3" value="0"/><br><br>

            <label>Type lib:</label>
            <input type="number" id="capetype" name="capetype" min="0" max="2" value="0"/><br><br>

            <label>Themes:</label>
                <select name="theme" id="themeselector" disabled><br><br>
                    <option value="boostrap">Boostrap</option>
                    <option value="terminall">Terminall</option>
                    <option value="boom">Boom</option>
                </select>
            <!-- <input type="hidden" name="setup_step" value="1"> -->
            <button type="submit" class="btn btn-primary">Next</button>
        </form>

        <?php
        // Placeholder for displaying errors below the form
        if (isset($_GET['alertdanger'])) {
            echo '<div class="alert alert-danger" role="alert">' . $_GET['alertdanger'] . '</div>';
        }
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/darktheme.js"></script>
</body>
</html>
