<!DOCTYPE html>
<html>
<head>
    <title>Add Course</title>
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
        <h2>Add Course</h2>
        <form action="add_course_process.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="course_id">Course ID:</label>
                <input type="text" id="course_id" name="course_id">
            </div>

            <div class="form-group">
                <label for="course_name">Course Name:</label>
                <input type="text" id="course_name" name="course_name">
            </div>

            <div class="form-group">
                <label for="course_credit">Course Credit:</label>
                <input type="number" id="course_credit" name="course_credit">
            </div>

            <div class="form-group">
                <label for="semester">Semester:</label>
                <input type="text" id="semester" name="semester">
            </div>

            <div class="form-group">
                <label for="excel_file">Upload Excel Sheet (.csv format):</label>
                <input type="file" id="excel_file" name="excel_file">
            </div>

            <div class="form-group">
                <input type="submit" value="Add Course" class="btn">
            </div>
        </form>
    </div>
</body>
</html>
