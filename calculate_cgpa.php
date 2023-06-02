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
    <div class="container">
        <h2>Calculate CGPA</h2>
        <form action="calculate_cgpa_process.php" method="POST">
            <div class="form-group">
                <label for="student_prn_no">Student PRN Number:</label>
                <input type="text" id="student_prn_no" name="student_prn_no" required>
            </div>

            <div class="form-group">
                <input type="submit" value="Calculate CGPA" class="btn">
            </div>
        </form>
    </div>
</body>
</html>
