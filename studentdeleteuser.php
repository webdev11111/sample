<?php

session_start();
include_once("php/function.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
    <!-- Add the Boxicons library -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/boxicons/2.0.7/css/boxicons.min.css">
    <style>
        /* Add some basic styling for the button */
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(rgba(82, 84, 95, 0.7),rgba(82, 84, 95, 0.7)), url('Capture1.JPG') center/cover no-repeat; /* Adjust the last parameter for opacity (0.8 in this case) */
        }

        a {
          text-decoration: none;
            color: #fff; /* text color */
            font-size: 18px;
            padding: 10px;
            border: 1px solid #333;
            border-radius: 5px;
            display: inline-block;
            background-color: #3498db; /* button background color */
        }

        i {
            margin-right: 5px;
        }

        input[type="submit"] {
            background-color: #A06645;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%; /* Centered button width */
            margin: auto; /* Center the button horizontally */
        }
    </style>
</head>
<body>

<form method="post" action="redirect.php" id="deleteForm">
    <button type="button" onclick="confirmDelete()">Delete User</button>
</form>

<!-- The script for handling the click event -->
<script>
    function confirmDelete() {
    var confirmDelete = confirm("Are you sure you want to delete this user?");
    if (confirmDelete) {
        document.getElementById("deleteForm").submit();
    }
}
</script>

</body>
</html>
