<?php
$dbServerName = "softdemo.in";
$dbUsername = "a16673ai_payamath";
$dbPassword = "Payamath@2016";
$dbName = "a16673ai_jfm";

// create connection
$conn = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbName);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>