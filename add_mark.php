<!DOCTYPE html>
<html>
<head>
    <title>Add Marks</title>
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
        <h2>Add Marks</h2>
        <form action="add_mark_process.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="student_prn_no">Student PRN No:</label>
                <input type="text" id="student_prn_no" name="student_prn_no">
            </div>

            <div class="form-group">
                <label for="year_admission">Student Year of Admission:</label>
                <input type="text" id="year_admission" name="year_admission">
            </div>

            <div class="form-group">
                <label for="semester">Semester:</label>
                <input type="text" id="semester" name="semester">
            </div>

            <div class="form-group">
                <label for="course_id">Course ID:</label>
                <input type="text" id="course_id" name="course_id">
            </div>

            <div class="form-group">
                <label for="marks_out_of_100">Marks (out of 100):</label>
                <input type="number" id="marks_out_of_100" name="marks_out_of_100">
            </div>

            <div class="form-group">
                <label for="excel_file">Upload Excel Sheet (.csv format):</label>
                <input type="file" id="excel_file" name="excel_file">
            </div>

            <div class="form-group">
                <input type="submit" value="Add Marks" class="btn">
            </div>
        </form>
    </div>
</body>
</html>
