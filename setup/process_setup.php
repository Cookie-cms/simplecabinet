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

        $dbConnContent = '<?php' . PHP_EOL;
        $dbConnContent .= '$sname= "' . $ip . '";' . PHP_EOL;
        $dbConnContent .= '$uname= "' . $username . '";' . PHP_EOL;
        $dbConnContent .= '$password = "' . $db_password . '";' . PHP_EOL;
        $dbConnContent .= '$db_name = "' . $database . '";' . PHP_EOL;
        $dbConnContent .= 'try{' . PHP_EOL;
        $dbConnContent .= '$conn = new PDO("mysql:host=$sname;port=' . $port . ';dbname=$db_name", $uname, $password);' . PHP_EOL;
        $dbConnContent .= '} catch (PDOException $e) {' . PHP_EOL;
        $dbConnContent .= '    echo "Connection failed: " . $e->getMessage();' . PHP_EOL;
        $dbConnContent .= '}' . PHP_EOL;
        $dbConnContent .= '$registertype = "' . $type . '"; # 0 default 1 discrod-default 2 only discord 3 offline' . PHP_EOL;
        if ($presetup) {
            $dbConnContent .= '$minecraftsys = true; #FACK YOU DONT TOUCH THIS' . PHP_EOL;
        } elseif (!$presetup) {
            $dbConnContent .= '$minecraftsys = false; #FACK YOU DONT TOUCH THIS' . PHP_EOL;
        }
        $dbConnContent .= '$capetype = "' . $capetype . '"; # 0 all can upload 1 upload with permissions 2 cape lib ' . PHP_EOL;
        $dbConnContent .= '?>';

        if (file_put_contents('../core/configs/config.inc.php', $dbConnContent)) {
            echo "db_conn.php created successfully<br>";
        } else {
            $alertDanger = "Error creating db_conn.php";
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
