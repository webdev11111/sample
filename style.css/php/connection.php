<?php

// Connect to the database
$db = new PDO('mysql:host=phpmyadmin;dbname=tesst', 'username', 'password');

// Get the user's role
$role = $db->query('SELECT role FROM users WHERE username = "' . $_SESSION['username'] . '"')->fetchColumn();

// Redirect the user to the appropriate dashboard
switch ($role) {
    case 'admin':
        header('Location: admin dashboard.html');
        break;
    case 'manager':
        header('Location: Tpo dashboard.html');
        break;
    case 'employee':
        header('Location: student dashboard.html');
        break;
    default:
        header('Location: index.html');
        break;
}

?>
