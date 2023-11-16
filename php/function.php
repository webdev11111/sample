<?php
session_start();
include_once("connection.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);


if (isset($_POST["login"])) {
    $msg = "";
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    if ($username !== '' && $password !== '') {

        $query = "SELECT * FROM `users` WHERE `username` = :username AND `password` = :password AND `role` = :role";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':role', $role);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_OBJ);

        $_SESSION['user'] = $user;

        if ($user) {
            // Update last_login
            $lastLoginQuery = "UPDATE `users` SET `last_login` = NOW() WHERE `id` = :userId";
            $lastLoginStmt = $pdo->prepare($lastLoginQuery);
            $lastLoginStmt->bindParam(':userId', $user->id);
            $lastLoginStmt->execute();

            if ($role == 'admin') {
                header("Location: adminDashboard.php");
            } elseif ($role == 'student') {
                header("Location: student.php");
            } else {
                header("Location: tpo.php");
            }
        } else {
            $msg = "<script type='text/javascript'>alert('Wrong Credentials ')</script>";
        }
    } else {
        $msg = "<script type='text/javascript'>alert('All fields are required')</script>";
    }
}

// if (isset($_POST["login"])) {

//     $msg = "";
//     $username = $_POST["username"];
//     $password = $_POST["password"];
//     $role = $_POST["role"];

//     if ($username !== '' && $password !== '') {

//         $query = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password' AND `role` = '$role'";
//         $stmt = $pdo->prepare($query);
//         $stmt->execute();

//         $user = $stmt->fetch(PDO::FETCH_OBJ);

//         $_SESSION['user'] = $user;
        
//         // var_dump($a);
//         if ($user) {

//             //update last_login


//             if ($role == 'admin') {
//                 header("Location: adminDashboard.php");
//             } elseif ($role == 'student') {
//                 header("Location: student.php");
//             } else {
//                 header("Location: tpo.php");
//             }
//         } else {
//             $msg = "<script type='text/javascript'>alert('Wrong Credentials ')</script>";
//         }
//     } else {
//         $msg = "<script type='text/javascript'>alert('All fields are required')</script>";
//     }
// }

if (isset($_POST['register'])) {

    $msg = "";
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];
    $last_login = date('Y-M-d H:i:s');
    $created_at = date('Y-M-d H:i:s');


    if ($username !== '' && $password !== '') {

        $check = "SELECT * FROM `users` WHERE `email` = '$email'";
        $st = $pdo->prepare($check);
        $st->execute();
        $acc = $st->fetch(PDO::FETCH_ASSOC);

        if ($acc) {
            $msg = "<script type='text/javascript'>alert('Email already exist')</script>";
        } else {

            $query = "INSERT INTO `users`(`id`,`username`, `email`, `password`, `role`,`last_login`, `created_at`) VALUES (NULL,'$username', '$email', '$password', '$role', '$last_login', '$created_at')";
            $stmt = $pdo->prepare($query);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_OBJ);

            $_SESSION['user'] = $user;

            if ($stmt == true) {
                header("Location: index.php");
            } else {
                $msg = "<script type='text/javascript'>alert('Wrong Credentials ')</script>";
            }
        }
    } else {
        $msg = "<script type='text/javascript'>alert('All fields are required')</script>";
    }
}

if (isset($_POST['update'])) {

    $user = $_SESSION['user'];
    
    $user_id = $user->id;
    $name = $_POST['name'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $reg_num = $_POST['reg_num'];
    $created_at = date('Y-M-d H:i:s');

    // Uploading passport
    $pass_tmp = $_FILES['passport']['tmp_name'];
    $pass_name = $_FILES['passport']['name'];
    $pass_des = 'images/passports/' . $pass_name;
    move_uploaded_file($pass_tmp, $pass_des);

    // Uploading signature
    $sig_tmp = $_FILES['signature']['tmp_name'];
    $sig_name = $_FILES['signature']['name'];
    $sig_des = 'images/signatures/' . $sig_name;
    move_uploaded_file($sig_tmp, $sig_des);

    if ($name !== '' && $email !== '') {

        $query = "SELECT * FROM `student_profile` WHERE `user_id` = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$user_id]);
        $data = $stmt->fetch(PDO::FETCH_OBJ);


        if ($data) {

            if ($pass_name == '') {
                $pass_des = $data->passport;
            } elseif ($sig_name == '') {
                $sig_des = $data->signature;
            } else {
                $pass_des = $pass_des;
                $sig_des = $sig_des;
            }

            $query = "UPDATE `student_profile` 
            SET `name` = ?, `email` = ?, `department` = ?, 
                `reg_number` = ?, `passport` = ?, `signature` = ?
            WHERE `user_id` = ?";
            $stmt = $pdo->prepare($query);

            $stmt->execute([$name, $email, $department, $reg_num, $pass_des, $sig_des, $user_id]);
        } else {
            // Insert data
            $query = "INSERT INTO `student_profile`(`id`, `user_id`, `name`, `email`, `department`, `reg_number`, `passport`, `signature`, `created_at`) 
                      VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$user_id, $name, $email, $department, $reg_num, $pass_des, $sig_des, $created_at]);
        }

        if ($stmt->rowCount() > 0) {
            $msg = "<script type='text/javascript'>alert('Details Successfully Added/Updated')</script>";
        } else {
            $msg = "<script type='text/javascript'>alert('Error inserting/updating data')</script>";
        }
    }
}

if (isset($_POST['delete_user'])) {

    $user = $_SESSION['user'];

    $query = "DELETE FROM `users` WHERE `id` = '$user->id'";
    $stmt = $pdo->prepare($query);
    $stmt->execute();


    if ($stmt->rowCount() > 0) {

        $msg = "<script type='text/javascript'>alert('User deleted successfully')</script>";
        session_destroy();
        header("Location: index.php");
    } else {
        $msg = "<script type='text/javascript'>alert('Error deleting user')</script>";
    }
}

function logout()
{
    session_start();

    // Destroy the session
    session_destroy();

    header("Location: index.php");
    exit();
}

//admin functions

if (isset($_POST['add_user'])) {

    $msg = "";
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];
    $created_at = date('Y-M-d H:i:s');


    if ($username !== '' && $password !== '') {

        $check = "SELECT * FROM `users` WHERE `email` = '$email'";
        $st = $pdo->prepare($check);
        $st->execute();
        $acc = $st->fetch(PDO::FETCH_ASSOC);

        if ($acc) {
            $msg = "<script type='text/javascript'>alert('Email already exist')</script>";
        } else {

            $query = "INSERT INTO `users`(`id`,`username`, `email`, `password`, `role`, `created_at`) VALUES (NULL,'$username', '$email', '$password', '$role', '$created_at')";
            $stmt = $pdo->prepare($query);
            $stmt->execute();

            if ($stmt == true) {
                $msg = "<script type='text/javascript'>alert('A New User Successfully Added')</script>";
            } else {
                $msg = "<script type='text/javascript'>alert('Wrong Credentials')</script>";
            }
        }
    } else {
        $msg = "<script type='text/javascript'>alert('All fields are required')</script>";
    }
}


function connectToDatabase()
{
    return include("connection.php");
}

function deleteUser($userId)
{
    $pdo = connectToDatabase();

    $query = "DELETE FROM `users` WHERE `id` = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$userId]);

    return $stmt->rowCount();
}

if (isset($_GET['action']) && $_GET['action'] === 'delete_user') {
    if (isset($_GET['id'])) {
        $deletedRows = deleteUser($_GET['id']);

        if ($deletedRows > 0) {
            $msg = "<script type='text/javascript'>alert('User deleted successfully')</script>";
        } else {
            $msg = "<script type='text/javascript'>alert('Error deleting user')</script>";
        }
    }
}
