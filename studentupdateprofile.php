<?php
session_start();
include_once("php/function.php");

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    // var_dump($user);
}

if (isset($msg)) {
    echo $msg;
}

if (isset($user->id)) {
    $query = "SELECT * FROM `student_profile` WHERE `user_id` = '$user->id'";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    if ($stmt) {
        if ($stmt->rowCount() > 0) {
            $data = $stmt->fetch(PDO::FETCH_OBJ);
        }
    }
}




//   var_dump($data);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile Update</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            /* Center align the content */
        }

        h2 {
            color: #333;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #555;
            text-align: left;
        }

        input[type="text"],
        input[type="email"],
        input[type="Department"],
        input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4556a0;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 50%;
            /* Centered button width */
            margin: auto;
            /* Center the button horizontally */
        }

        input[type="submit"]:hover {
            background-color: #4556a0;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Update Your Profile</h2>
        <a href="student.php" class="btn btn-secondary mt-3">Back</a>

        <form action="#" method="post" enctype="multipart/form-data">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo isset($data->name) ? $data->name : ''; ?>" required>
            <input type="hidden" name="id" value="<?php echo isset($user->id) ? $user->id : ''; ?>">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo isset($data->email) ? $data->email : ''; ?>" required>

            <label for="Department">Department:</label>
            <input type="text" id="Department" name="department" value="<?php echo isset($data->department) ? $data->department : ''; ?>" required>

            <label for="Registration Number">Registration Number:</label>
            <input type="text" id="Registration Number" name="reg_num" value="<?php echo isset($data->reg_number) ? $data->reg_number : ''; ?>" required>

            <label for="passport">Passport:</label>
            <input type="file" id="passport" name="passport" accept=".jpg, .jpeg, .png">

            <label for="Signature">Signature:</label>
            <input type="file" id="Signature" name="signature" accept=".jpg, .jpeg, .png">

            <input type="submit" name="update" value="Update Profile">
        </form>
    </div>

    <script>
        // function submitForm(event) {
        //     event.preventDefault(); // Prevent the form from submitting (for demonstration purposes)

        //     // Add your logic here for handling the form submission
        //     alert('Profile updated successfully!');
        // }
    </script>

</body>

</html>