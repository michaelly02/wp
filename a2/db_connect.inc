<?php

if (strstr($_SERVER['SERVER_NAME'], 'localhost')) {

$dsn = "mysql:host=localhost;dbname=hikesvictoria";
$dbusername = "root";
$dbpassword = "";
}
else {
$dsn = "mysql:host=talsprddb02.int.its.rmit.edu.au;dbname=hikesvictoria";
$dbusername = "s3899226";
$dbpassword = "Yugioh009!";
}


try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " .$e->getMessage();
    
}