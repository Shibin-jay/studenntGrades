<?php
include 'db.php';

$subjects_query = "SELECT * FROM mst_subject";
$subjects_result = mysqli_query($conn, $subjects_query);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_name = $_POST['student_name'];
    $subject_key = $_POST['subject_key'];
    $grade = $_POST['grade'];
    $remarks = ($grade >= 75) ? 'PASS' : 'FAIL';
    $query = "INSERT INTO mst_student (student_name, subject_key, grade, remarks) VALUES ('$student_name', '$subject_key', '$grade', '$remarks')";
    mysqli_query($conn, $query);
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<div class="container">
    <h2>Add New Student</h2>
    <form method="POST" action="" class="form-style">
        <label for="student_name">Student Name:</label>
        <input type="text" id="student_name" name="student_name" placeholder="Enter student name" required>

        <label for="subject_key">Subject:</label>
        <select id="subject_key" name="subject_key" required>
            <?php while ($row = mysqli_fetch_assoc($subjects_result)) { ?>
                <option value="<?= $row['subject_key'] ?>"><?= $row['subject_name'] ?></option>
            <?php } ?>
        </select>

        <label for="grade">Grade:</label>
        <input type="number" id="grade" name="grade" placeholder="Enter grade" required>

        <input type="submit" name="submit" value="Add Student" class="btn">
    </form>

    <div class="button-container">
        <a href="index.php" class="btn">Go to Home</a>
    </div>
</div>

</body>
</html>
