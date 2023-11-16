<?php 
include_once("php/function.php");

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
  logout();
}

?>
<!DOCTYPE html>
<html lang="en">
  
<head><header>
  <h1>Admin Dashboard</h1>
  <nav>
        <a href="student.html">Students</a>
        <a href="#">Placements</a>
    <a href="#">Reports</a>
  </nav>
</header>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="style.css/admin dashboard.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
  
  <div class="wrapper">
    <nav class="sidebar">
      <ul>
        <li><a href="#"><i class='bx bx-tachometer'></i> Add drive</a></li>
        <li><a href="admindashboard/managetrainingad.html"><i class='bx bx-user'></i> Manage training program</a></li>
        <li><a href="#"><i class='bx bx-briefcase'></i> Analyse placement</a></li>
        <li><a href="admin/students_table.php"><i class='bx bx-calendar'></i> View student Details</a></li>
        <li><a href="admin/add_user.php"><i class='bx bx-stats'></i>Add user</a></li>
          <li><a href="admin/delete_user.php"><i class='bx bx-stats'></i>Delete user</a></li>
        <li><a href="?action=logout" ><i class='bx bx-stats'></i>Logout</a></li>

      </ul>
    </nav>

    <main class="content">
      </main>
  </div>
</body>
</html>
