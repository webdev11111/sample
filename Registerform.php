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
  <link rel="stylesheet" href="style.css/register.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <div class="register-form">
    <h1>Register</h1>
    <form action="" method="POST">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <select name="role" required>
        <option value="admin">Admin</option>
        <option value="tpo">TPO</option>
        <option value="student">Student</option>
      </select>
      
      <div class="remember-forget"><label><input type="checkbox">I agree to terms and Condition</label>
        <button type="" name="register">Register</button>
        <div class="remember-forget">

          <a href="index.php">Already have an account? login</a>
        </div>
    </form>
  </div>

  </body>

</html>