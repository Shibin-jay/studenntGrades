<?php
include 'db.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';
$filter = isset($_GET['filter']) ? $_GET['filter'] : 'all';

$query = "SELECT mst_student.student_name, mst_subject.subject_name, mst_student.grade, mst_student.remarks
          FROM mst_student
          JOIN mst_subject ON mst_student.subject_key = mst_subject.subject_key
          WHERE mst_student.student_name LIKE '%$search%'";

if ($filter === 'pass') {
    $query .= " AND mst_student.remarks = 'PASS'";
} elseif ($filter === 'fail') {
    $query .= " AND mst_student.remarks = 'FAIL'";
}

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Students</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<div class="container">
    <h2>View Students</h2>

    <form method="GET" class="form-style">
        <input type="text" name="search" placeholder="Search by student name" class="search-input">
        <input type="submit" value="Search" class="btn">
    </form>

    <div class="filter-buttons">
        <a href="?filter=all" class="btn">All</a>
        <a href="?filter=pass" class="btn">PASS</a>
        <a href="?filter=fail" class="btn">FAIL</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Subject</th>
                <th>Grade</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $row['student_name'] ?></td>
                    <td><?= $row['subject_name'] ?></td>
                    <td><?= $row['grade'] ?></td>
                    <td><?= $row['remarks'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <div class="button-container">
        <a href="index.php" class="btn">Go to Home</a>
    </div>
</div>

</body>
</html>
