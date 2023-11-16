<?php
session_start();
include_once("php/function.php");
if (isset($msg)) {
  echo $msg;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Uel placement</title>
  <link rel="stylesheet" href="style.css/main.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
  <div class="wrapper">
    <form method="POST" action="">
      <h1>Login</h1>
      <div class="input_box">
        <input type="text" name="username" id="username" placeholder="Username">
        <i class='bx bxs-user'></i>
      </div>
      <div class="input_box">
        <input type="password" name="password" id="password" placeholder="Password">
        <i class='bx bxs-lock-alt'></i>
      </div>
      <div class="input_box">
        <select name="role" id="selectRole" required>
          <option value="admin">Admin</option>
          <option value="tpo">TPO</option>
          <option value="student">Student</option>
        </select>
      </div>
      <div class="remember-forget">
        <label><input type="checkbox">Remember me</label>
        <a href="#">Forgot password</a>
      </div>

      <button class="btn" name="login">Login</button>

      <div class="register-link">
        <p>Don't have an account? <a href="Registerform.php">Register</a></p>
      </div>
    </form>
  </div>
  <!-- <script>
    // Define username-password pairs for each role
    var credentials = {
      admin: { username: "admin", password: "admin123" },
      tpo: { username: "tpo", password: "tpo123" },
      student: { username: "student", password: "student123" }
    };

    function validateLogin() {
      var select = document.getElementById("selectRole");
      var selectedValue = select.options[select.selectedIndex].value;
      var enteredUsername = document.getElementById("username").value;
      var enteredPassword = document.getElementById("password").value;

      // Check if the entered credentials match the stored values
      if (
        enteredUsername === credentials[selectedValue].username &&
        enteredPassword === credentials[selectedValue].password
      ) {
        // Redirect to the corresponding page
        redirectToCorrectLink(selectedValue);
      } else {
        alert("Invalid username or password");
      }
    }

    function redirectToCorrectLink(role) {
      if (role === "admin") {
        window.location.href = "admin dashboard.html";
      } else if (role === "tpo") {
        window.location.href = "Tpo.html";
      } else if (role === "student") {
        window.location.href = "student.html";
      }
    }
  </script> -->
</body>

</html>