<?php

session_start();
include_once("php/connection.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];

    $query = "DELETE FROM `users` WHERE `id` = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$user->id]);

    $query = "DELETE FROM `student_profile` WHERE `user_id` = ?";
    $stp = $pdo->prepare($query);
    $stp->execute([$user->id]);

    if ($stmt->rowCount() > 0 && $stp->rowCount() > 0) {
        $msg = "<script type='text/javascript'>alert('User deleted successfully')</script>";
    } else {
        $msg = "<script type='text/javascript'>alert('Error deleting user')</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete User</title>
</head>
<body>
    <script type="text/javascript">
        alert('Delete User Successful');
        window.location.href = 'index.php';
    </script>
</body>
</html>

