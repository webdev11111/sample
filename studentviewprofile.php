<?php
session_start();

include_once("php/function.php");

if (isset($_SESSION['user'])) {
  $user = $_SESSION['user'];
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

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Student Profile</title>
  <style>
    body {
      background-color: #f8f9fa;
    }

    .card {
      border: 1px solid #dee2e6;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card-header {
      background-color: #007bff;
      color: #fff;
      border-radius: 10px 10px 0 0;
    }
  </style>
</head>

<body>

  <div class="container mt-5">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title mb-0">Student Profile</h5>
      </div>
      <div class="card-body">
        <div class="mb-3">
          <label for="name" class="form-label">Name:</label>
          <p id="name" class="mb-0"><b><?php echo isset($data->name) ? $data->name : ''; ?></b></p>
        </div>
        <div class="mb-3">
          <label for="age" class="form-label">Age:</label>
          <p id="age" class="mb-0"><b><?php echo isset($data->age) ? $data->age : ''; ?></b></p>
        </div>
        <div class="mb-3">
          <label for="grade" class="form-label">Grade:</label>
          <p id="grade" class="mb-0"><b><?php echo isset($data->grade) ? $data->grade : ''; ?></b></p>
        </div>
        <div class="mb-3">
          <label for="department" class="form-label">Department:</label>
          <p id="department" class="mb-0"><b><?php echo isset($data->department) ? $data->department : ''; ?></b></p>
        </div>
      </div>
      <div class="card-footer">
        <a href="student.php" class="btn btn-secondary">Back</a>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>



<!-- <!DOCTYPE html>
<html>

<head>
  <title>Student Profile</title>
  <link rel="stylesheet" href="style.css/studentviewprofile.css">

</head>

<body>
  <h1> Profile</h1>
  <table>
    <tr>
      <th>Name:</th>
      <td><input type="text" value="" placeholder="Enter student name" /></td>
    </tr>
    <tr>
      <th>Age:</th>
      <td><input type="text" placeholder="Enter student age" value="" /></td>
    </tr>
    <tr>
      <th>Grade:</th>
      <td><input type="text" placeholder="Enter student grade"  /></td>
    </tr>
    <tr>
      <th>Department:</th>
      <td><input type="text" placeholder="Enter department" value="" /></td>
    </tr>
  </table>

  <button onclick="" name="view_save">Save</button>

  <script>
    function saveProfile() {
      // Add your save functionality here
      alert("Profile saved!");
    }
  </script>

</body>

</html> -->