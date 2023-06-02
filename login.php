<?php
// Database connection details
$servername = "localhost";
$user = "root";
$pass = "123";
$dbName = "major_proj";

// Get form input values
$username = $_POST['username'];
$password = $_POST['password'];
$usertype = $_POST['role'];

// Establish database connection
$conn = new mysqli($servername, $user, $pass, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Perform user authentication
$query = "SELECT * FROM student_users WHERE username = '$username' AND password = '$password'";
$result = $conn->query($query);

if ($result->num_rows == 1 && $usertype === 'student') {
    // Student authentication successful
    header("Location: student_home.php");
    exit();
}

$query1 = "SELECT * FROM admin_users WHERE username = '$username' AND password = '$password'";
$result1 = $conn->query($query1);

if ($result1->num_rows == 1 && $usertype === 'admin') {
    // Admin authentication successful
    header("Location: admin_home.php");
    exit();
}

// Authentication failed
echo "Invalid username or password.";

// Close the database connection
$conn->close();
?>
