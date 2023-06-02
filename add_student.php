<!DOCTYPE html>
<html>
<head>
    <title>Add student</title>
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
    <div class="container">
        <h2>Add student</h2>
        <form action="add_student_process.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="student_id">Student ID:</label>
                <input type="text" id="student_id" name="student_id">
            </div>

            <div class="form-group">
                <label for="student_name">Student Name:</label>
                <input type="text" id="student_name" name="student_name">
            </div>

            <div class="form-group">
                <label for="student_prn_no">Student PRN No.:</label>
                <input type="number" id="student_prn_no" name="student_prn_no">
            </div>

            <div class="form-group">
                <label for="year_admission">Year Of Admission:</label>
                <input type="text" id="year_admission" name="year_admission">
            </div>

            <div class="form-group">
                <label for="guardian_name">Guardian Name (Mother):</label>
                <input type="text" id="guardian_name" name="guardian_name">
            </div>

            <div class="form-group">
                <label for="excel_file">Upload Excel Sheet (.csv format):</label>
                <input type="file" id="excel_file" name="excel_file">
            </div>

            <div class="form-group">
                <input type="submit" value="Add student" class="btn">
            </div>
        </form>
    </div>
</body>
</html>
