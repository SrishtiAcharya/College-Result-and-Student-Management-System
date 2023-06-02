<?php
session_start();

$host = "localhost";    /* Host name */
$user = "root";         /* User */
$password = "123";         /* Password */
$dbname = "major_proj";   /* Database name */

// Create connection
$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
