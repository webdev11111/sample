<?php
include_once("php/function.php");

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
  logout();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <header>
    <h1>TPO Dashboard</h1>
    <nav>
      <a href="#">Students</a>
      <a href="#">Placements</a>
      <a href="#">Reports</a>
    </nav>
  </header>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TPO Dashboard</title>
  <link rel="stylesheet" href="style.css/tpo dashboard.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
  <div class="wrapper">
    <nav class="sidebar">
      <ul>
        <li><a href="studentmockinterviewtest.html"><i class='bx bx-test'></i> Mock Aptitude test</a></li>
        <li><a href="admindashboard/tpodashboard/onlineclass.html"><i class='bx bx-briefcase'></i> Online class for preparing for interview</a></li>
        <li><a href="selectedlistofstudent.html"><i class='bx bx-calendar'></i> View selected list of student</a></li>
        <li><a href="tpo/add_user.php"><i class='bx bx-stats'></i>Add user</a></li>
        <li><a href="tpo/delete_user.php"><i class='bx bx-stats'></i>Delete user</a></li>
        <li><a href="?action=logout" ><i class='bx bx-stats'></i>Logout</a></li>

      </ul>
    </nav>

    <main class="content">
    </main>
  </div>
</body>

</html>