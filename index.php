<!-- index.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<form action="process.php" method="post">
    <h2>Student List 12D</h2>
    <?php include 'student.php'; ?>

    
    <h2>Time List</h2>
    <?php include 'time.php'; ?>

    <input type="submit" value="Submit">
</form>

</body>
</html>
