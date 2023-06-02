<!DOCTYPE html>
<html>
<head>
    <title>Student Result</title>
    <link rel="icon" href="mit_logo.jpg">
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <div class="container">
        <h2>Student Result</h2>
        <form action="download_pdf.php" method="POST">
            <div class="form-group">
                <label for="prn_no">PRN Number:</label>
                <input type="text" id="prn_no" name="prn_no" required>
            </div>

            <div class="form-group">
                <input type="submit" value="Generate Result" class="btn">
            </div>
        </form>
    </div>
</body>
</html>
