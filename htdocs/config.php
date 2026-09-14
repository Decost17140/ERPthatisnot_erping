<?php
session_start();
$host = "sql204.infinityfree.com";
$user = "if0_42355908";     
$pass = "Decost17140";         
$db   = "if0_42355908_erp";   

$conn = new mysqli($host, $user, $pass, $db);
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>