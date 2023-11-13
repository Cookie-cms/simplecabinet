<?php
session_start();
require "config.php";
 // Include Composer autoload file

if (isset($_POST['uname']) && isset($_POST['password']) && isset($_POST['re_password'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);
    $re_pass = validate($_POST['re_password']);
    $user_data = 'uname='. $uname;

    if ($pass !== $re_pass) {
        header("Location: signup.php?error=Passwords do not match&$user_data");
        exit();
    }

    // Generate UUID
    $uuid = vsprintf( '%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex(random_bytes(16)), 4) ); // Generate a random UUID

    $hashed_password = password_hash($pass, PASSWORD_BCRYPT);

    try {
        $stmt = $conn->prepare("SELECT * FROM users WHERE username=:uname");
        $stmt->bindParam(':uname', $uname);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            header("Location: signup.php?error=The username is taken, try another&$user_data");
            exit();
        } else {
            $stmt = $conn->prepare("INSERT INTO users (uuid, username, password) VALUES (:uuid, :uname, :pass)");
            $stmt->bindParam(':uuid', $uuid);
            $stmt->bindParam(':uname', $uname);
            $stmt->bindParam(':pass', $hashed_password);
            $stmt->execute();

            header("Location: signup.php?success=Your account has been created successfully");
            exit();
        }
    }catch (PDOException $e) {
		// Log the detailed error message to a file for debugging
		error_log("PDOException: " . $e->getMessage(), 0);
	
		// Display a user-friendly error message
		header("Location: signup.php?error=An error occurred during registration. Please try again later.&$user_data");
		exit();
	}
} else {
    header("Location: signup.php");
    exit();
}
?>
