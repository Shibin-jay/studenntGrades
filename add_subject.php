<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subject_name = $_POST['subject_name'];
    $query = "INSERT INTO mst_subject (subject_name) VALUES ('$subject_name')";
    mysqli_query($conn, $query);
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Subject</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<div class="container">
    <h2>Add New Subject</h2>
    <form method="POST" action="" class="form-style">
        <label for="subject_name">Subject Name:</label>
        <input type="text" id="subject_name" name="subject_name" placeholder="Enter subject name" required>
        <input type="submit" name="submit" value="Add Subject" class="btn">
    </form>

    <div class="button-container">
        <a href="index.php" class="btn">Go to Home</a>
    </div>
</div>

</body>
</html>
