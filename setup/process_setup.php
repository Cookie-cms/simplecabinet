<?php
session_start(); // Start the session

// Placeholder for displaying errors
$alertDanger = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ip = $_POST["ip"];
    $username = $_POST["username"];
    $port = $_POST["port"];
    $db_password = $_POST["db_password"];
    $database = $_POST["database"];
    $type = $_POST["type"];
    $capetype = $_POST["capetype"];
    $presetup = true;
    $hwid = isset($_POST["hwid"]) ? $_POST["hwid"] : 0;

    // Check if the user is allowed to create an admin
    $allowCreateAdmin = isset($_SESSION['allowcreateadmin']) ? $_SESSION['allowcreateadmin'] : true;

    try {
        $conn = new PDO('mysql:host=' . $ip . ';port=' . $port, $username, $db_password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Create the database if it doesn't exist
        $createDbSql = 'CREATE DATABASE IF NOT EXISTS ' . $database;
        $conn->exec($createDbSql);

        // Connect to the created database
        $conn = new PDO('mysql:host=' . $ip . ';port=' . $port . ';dbname=' . $database, $username, $db_password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $conn->exec('USE ' . $database);

        $importSql = file_get_contents('template.sql');
        $conn->exec($importSql);
        echo "Example data imported successfully<br>";

        $dbConnContent = <<<CONFIG
        <?php

        // Database credentials
        $sname = "$ip";
        $uname = "$username";
        $password = "{$db_password}";
        $db_name = "{$database}";

        // Settings
        $registertype = "{$type}"; 
        $minecraftsys = $presetup ? 'true' : 'false';
        $capetype = "{$capetype}";

        // Other  
        $modules = [];
        $debugMode = false;
        $development = false;

        ?>
        CONFIG;

        if (file_put_contents('../core/configs/config.inc.php', $dbConnContent)) {
            echo "/core/configs/config.inc.php created successfully<br>";
        } else {
            $alertDanger = "Error creating /core/configs/config.inc.php";
        }

        if ($presetup) {
            $addColumnSql = 'ALTER TABLE users ADD COLUMN uuid CHAR(36) UNIQUE DEFAULT NULL, ADD COLUMN accessToken CHAR(32) DEFAULT NULL, ADD COLUMN serverID VARCHAR(41) DEFAULT NULL, ADD COLUMN hwidId BIGINT DEFAULT NULL';

            try {
                $stmt = $conn->prepare($addColumnSql);
                $stmt->execute();
                echo "Presetup columns added successfully<br>";

                // Check if the user is allowed to create an admin
                if ($allowCreateAdmin) {
                    // Redirect to step2.php after successful setup
                    header("Location: /setup/step2.php?alertgood=Example data imported successfully<br>db_conn.php created successfully<br>Presetup columns added successfully<br>hwid columns added successfully");
                    exit;
                } else {
                    $alertDanger = "User is not allowed to create an admin";
                }
            } catch (PDOException $e) {
                $alertDanger = "Error adding presetup columns: " . $e->getMessage();
            }
        }

        if ($hwid) {
            // Get the contents of the hwid.sql template
            $hwidSql = file_get_contents('template_hwid.sql');

            // Prepare the SQL statement
            $stmt = $conn->prepare($hwidSql);

            // Execute the SQL statement
            $stmt->execute();

            // Echo a success message
            echo "hwid columns added successfully<br>";
        }

    } catch (PDOException $e) {
        $alertDanger = "Error: " . $e->getMessage();
    }
} else {
    $alertDanger = "Invalid request method";
}

// Redirect to setup/index.php with danger message
header("Location: /setup/index.php?alertdanger=" . urlencode($alertDanger));
exit;
?>
