<?php

$sname= "localhost";
$uname= "admin";
$password = "admin";
$db_name = "llgggg";
try{
$conn = new PDO("mysql:host=$sname;port=3306;dbname=$db_name", $uname, $password);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}