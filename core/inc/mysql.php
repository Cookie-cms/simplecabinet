<?php

include '../configs/config.inc.php';


try{
    $conn = new PDO("mysql:host=$sname;port=3306;dbname=$db_name", $uname, $password);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }