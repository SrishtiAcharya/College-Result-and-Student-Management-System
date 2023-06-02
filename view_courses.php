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

// Retrieve courses data from the database
$sql = "SELECT * FROM courses";
$result = $connection->query($sql);

// Check if there are any courses
if ($result->num_rows > 0) {
    // Output the courses data in a table
    echo "<table>";
    echo "<tr><th>Course ID</th><th>Course Name</th><th>Course Credit</th><th>Semester</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['course_id'] . "</td>";
        echo "<td>" . $row['course_name'] . "</td>";
        echo "<td>" . $row['course_credit'] . "</td>";
        echo "<td>" . $row['semester'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No courses found.";
}

// Close the database connection
$connection->close();
?>
</body>
</html>
