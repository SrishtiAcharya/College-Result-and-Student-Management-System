<!DOCTYPE html>
<html>
<head>
    <title>Student Result</title>
    <link rel="icon" href="mit_logo.jpg">
    <link rel="stylesheet" type="text/css" href="lavender.css">
</head>
<body>
    <div class="menu">
      <ul>
        <li><a href="student_home.php">Go Back</a></li>
        <li><a href="logout.php">Logout</a></li>
        <li><button onclick="window.print()">Print</button></li>
      </ul>
    </div>

    <div class="container">
        <div class="header">
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

            // Get the student PRN from the form submission
            $prnNo = $_POST['prn_no'];

            // Retrieve the student information from the database
            $stmt = $connection->prepare("SELECT student_name, guardian_name, admission_year FROM students WHERE student_prn_no = ?");
            $stmt->bind_param("s", $prnNo);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $studentInfo = $result->fetch_assoc();
                echo '<h1>MIT ACADEMY OF ENGINEERING, ALANDI</h1>';
                echo '<h1>(AN AUTONOMOUS INSTITUTE AFFILIATED TO SAVITRIBAI PHULE PUNE UNIVERSITY)</h1>';
                echo '<h1>LEDGER OF ALL THE SEMESTERS</h1>';
                echo '<h2>Student Name: ' . $studentInfo['student_name'] . '</h2>';
                echo '<h2>Guardian Name: ' . $studentInfo['guardian_name'] . '</h2>';
                echo '<h2>Student PRN No: ' . $prnNo . '</h2>';
                echo '<h2>Admission Year: ' . $studentInfo['admission_year'] . '</h2>';
            } else {
                echo '<h2>No results found</h2>';
            }

            // Retrieve the average marks for the student
            $stmt = $connection->prepare("SELECT AVG(marks_out_of_100) AS average_marks FROM marks WHERE student_prn_no = ?");
            $stmt->bind_param("s", $prnNo);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $averageMarks = $result->fetch_assoc();
                echo '<h2>Average Marks: ' . $averageMarks['average_marks'] . '</h2>';
            } else {
                echo '<h2>No results found</h2>';
            }

            // Close the database connection
            $connection->close();
            ?>
        </div>
        <table>
            <tr>
                <th>Course ID</th>
                <th>Course Name</th>
                <th>Semester</th>
                <th>Marks out of 100</th>
            </tr>
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

            // Get the student PRN from the form submission
            $prnNo = $_POST['prn_no'];

            // Retrieve the student's course and marks information from the database
            $stmt = $connection->prepare("SELECT courses.course_id, courses.course_name, courses.semester, marks.marks_out_of_100 FROM marks JOIN courses ON marks.course_id = courses.course_id WHERE marks.student_prn_no = ?");
            $stmt->bind_param("s", $prnNo);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['course_id'] . '</td>';
                    echo '<td>' . $row['course_name'] . '</td>';
                    echo '<td>' . $row['semester'] . '</td>';
                    echo '<td>' . $row['marks_out_of_100'] . '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="4">No results found</td></tr>';
            }

            // Close the database connection
            $connection->close();
            ?>
        </table>
    </div>
</body>
</html>
