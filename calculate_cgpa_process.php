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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get student PRN number from the form
    $studentPrnNo = $_POST['student_prn_no'];

    // Fetch marks for the student from the database
    $query = "SELECT marks_out_of_100 FROM marks WHERE student_prn_no = '$studentPrnNo'";
    $result = $connection->query($query);

    if ($result->num_rows > 0) {
        $totalMarks = 0;
        $subjectCount = 0;

        while ($row = $result->fetch_assoc()) {
            $marks = $row['marks_out_of_100'];

            $totalMarks += $marks;
            $subjectCount++;
        }

        // Calculate average marks
        $averageMarks = $totalMarks / $subjectCount;

        // Calculate CGPA
        $cgpa = calculateCGPA($averageMarks);

        // Display the average marks and CGPA
        echo "<h3>Student PRN Number: $studentPrnNo</h3>";
        echo "<h3>Student Percentage: $averageMarks</h3>";
        echo "<h3>Student CGPA: $cgpa</h3>";

    } else {
        echo "<h3>No marks found for the provided PRN number.</h3>";
    }

    // Close the database connection
    $connection->close();
}

/**
 * Function to calculate CGPA from average marks
 *
 * @param float $averageMarks The average marks
 * @return float The CGPA
 */
function calculateCGPA($averageMarks) {
    // Define the CGPA scale and corresponding grade points
    $scale = [
        ['min' => 90, 'max' => 100, 'grade' => 'A+', 'points' => 10.0],
        ['min' => 80, 'max' => 89, 'grade' => 'A', 'points' => 9.0],
        ['min' => 70, 'max' => 79, 'grade' => 'B+', 'points' => 8.0],
        ['min' => 60, 'max' => 69, 'grade' => 'B', 'points' => 7.0],
        ['min' => 50, 'max' => 59, 'grade' => 'C+', 'points' => 6.0],
        ['min' => 40, 'max' => 49, 'grade' => 'C', 'points' => 5.0],
        ['min' => 30, 'max' => 39, 'grade' => 'D+', 'points' => 4.0],
        ['min' => 20, 'max' => 29, 'grade' => 'D', 'points' => 3.0],
        ['min' => 10, 'max' => 19, 'grade' => 'E', 'points' => 2.0],
        ['min' => 0, 'max' => 9, 'grade' => 'F', 'points' => 0.0],
    ];

    // Find the corresponding grade point for the average marks
    foreach ($scale as $row) {
        if ($averageMarks >= $row['min'] && $averageMarks <= $row['max']) {
            return number_format($row['points'], 2);
        }
    }

    return 0.0;
}
?>
