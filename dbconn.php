<?php
session_start();
$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "project";
$conn = mysqli_connect($dbServerName,$dbUserName,$dbPassword,$dbName);

?>