<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// session_start();
include_once("../php/function.php");
if (isset($msg)) {
    echo $msg;
}

$query = "SELECT * FROM `student_profile`";
$stmt = $pdo->prepare($query);
$stmt->execute();
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uel Placement</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="container mt-5">
    <a href="../adminDashboard.html" class="btn btn-outline-secondary mb-3">Back</a>
        <h2>All Students</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Registration No.</th>
                    <th>Student Passport</th>
                    <th>Student Signature</th>
                    <th>Submited Date</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $iteration = 1; 
                foreach ($students as $student) : ?>
                    <tr>
                        <td><?php echo $iteration++; ?></td>
                        <td><?php echo $student['name']; ?></td>
                        <td><?php echo $student['email']; ?></td>
                        <td><?php echo $student['department']; ?></td>
                        <td><?php echo $student['reg_number']; ?></td>
                        <td><a href="../<?php echo $student['passport']; ?>" target="_blank">view passport</a></td>
                        <td><a href="../<?php echo $student['signature']; ?>" target="_blank">view passport</a></td>
                        <td><?php echo $student['created_at']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
