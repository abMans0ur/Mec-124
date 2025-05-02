<?php
$hostName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "mec_php_124";

$conn = mysqli_connect(
    $hostName,
    $dbUserName,
    $dbPassword,
    $dbName
);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();
$error = [];