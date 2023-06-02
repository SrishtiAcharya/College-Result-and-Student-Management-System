<!DOCTYPE html>
<html>
<head>
    <title>Calculate CGPA</title>
    <link rel="icon" href="mit_logo.jpg">
    <link rel="stylesheet" type="text/css" href="form.css">
</head>
<body>
  <div class="menu">
    <ul>
      <li><a href="admin_home.php">Go Back</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
<?php
// Assuming you have already established a database connection
// Replace the placeholders with your actual database connection details
$host = 'localhost';
$database = 'major_proj';
$username = 'root';
$password = '123';

// Create a database connection
$connection = new mysqli($host, $username, $password, $database);

// Check if the connection was successful
if ($connection->connect_error) {
    die('Database connection failed: ' . $connection->connect_error);
}

// Retrieve students data from the database
$sql = "SELECT * FROM students";
$result = $connection->query($sql);

// Check if there are any students
if ($result->num_rows > 0) {
    // Output the students data in a table
    echo "<table>";
    echo "<tr><th>Student PRN</th><th>Admission Year</th><th>Student Name</th><th>Guardian Name</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['student_prn_no'] . "</td>";
        echo "<td>" . $row['admission_year'] . "</td>";
        echo "<td>" . $row['student_name'] . "</td>";
        echo "<td>" . $row['guardian_name'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No students found.";
}

// Close the database connection
$connection->close();
?>
</body>
</html>
