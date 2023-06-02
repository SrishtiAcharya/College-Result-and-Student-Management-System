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

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $studentPrnNo = $_POST['student_prn_no'];
    $admissionYear = $_POST['admission_year'];
    $studentName = $_POST['student_name'];
    $guardianName = $_POST['guardian_name'];

    // Check if file is uploaded
    if (isset($_FILES['excel_file']) && $_FILES['excel_file']['error'] === UPLOAD_ERR_OK) {
        $csvFilePath = $_FILES['excel_file']['tmp_name'];

        // Open the CSV file for reading
        $handle = fopen($csvFilePath, 'r');

        // Read and process each line in the CSV file
        while (($data = fgetcsv($handle)) !== false) {
            // Skip empty lines
            if (count($data) === 0) {
                continue;
            }

            // Insert data into the courses table
            $stmt = $connection->prepare("INSERT INTO students (student_prn_no, admission_year, student_name, guardian_name) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("siss", $data[0], $data[1], $data[2], $data[3]);
            $stmt->execute();
            $stmt->close();
        }

        // Close the CSV file handle
        fclose($handle);
    } else {
        // Insert data into the courses table
        $stmt = $connection->prepare("INSERT INTO students (student_prn_no, admission_year, student_name, guardian_name) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("siss", $studentPrnNo, $admissionYear, $studentName, $guardianName);
        $stmt->execute();
        $stmt->close();
    }

    // Close the database connection
    $connection->close();

    // Redirect the user to a success page or another page as needed
    header("Location: success.php");
    exit();
}
?>
