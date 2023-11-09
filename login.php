<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	} else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	} else {
		// Hashing the password using bcrypt
        $hashed_password = password_hash($pass, PASSWORD_BCRYPT);

        // Prepare the SQL statement with placeholders to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM users WHERE user_name = :uname");
        $stmt->bindParam(':uname', $uname);
        $stmt->execute();

        // Fetch the user data from the database
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($pass, $user['password'])) {
            // Password verification successful
            $_SESSION['username'] = $user['username'];
            $_SESSION['id'] = $user['id'];
            header("Location: home.php");
            exit();
        } else {
            // Incorrect username or password
            header("Location: index.php?error=Incorrect User name or password");
            exit();
        }
	}
} else {
	header("Location: index.php");
	exit();
}
