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
    <h1>Student Dashboard</h1>
    <nav>
      <a href="#">Info</a>
      <a href="#">status</a>
      <a href="#">help</a>
    </nav>
  </header>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Dashboard</title>
  <link rel="stylesheet" href="style.css/student dashboard.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
  <div class="wrapper">
    <nav class="sidebar">
      <ul>
        <li><a href="studentmockinterviewtest.html"><i class="bx bx-test"></i> Mock Aptitude Test</a></li>
        <li><a href="studentactivedrive.html"><i class='bx bx-user'></i> View Active drives</a></li>
        <li><a href="studentform/studentform.html"><i class='bx bx-briefcase'></i> Register for Drives</a></li>
        <li><a href="studentviewprofile.php"><i class='bx bx-user'></i> View Profile</a></li>
        <li><a href="studentupdateprofile.php"><i class='bx bx-stats'></i>Update Profile</a></li>
        <li><a href="studentstatusofapplieddrives.html"><i class='bx bx-stats'></i>Status of Applied Drives</a></li>
        <li><a href="studentdeleteuser.php"><i class='bx bx-stats'></i>Delete user</a></li>
        <li><a href="?action=logout" ><i class='bx bx-stats'></i>Logout</a></li>
      </ul>
    </nav>
    

    <main class="content">
    </main>
  </div>
</body>

</html>
<script>
  // JavaScript to toggle the display of the dropdown menu
  document.querySelectorAll('ul li').forEach(function(item) {
    item.addEventListener('click', function(e) {
      e.stopPropagation(); // Prevents the click event from reaching the document
      toggleDropdown(this);
    });
  });

  document.addEventListener('click', function() {
    closeAllDropdowns();
  });

  function toggleDropdown(element) {
    var dropdown = element.querySelector('ul');
    closeAllDropdowns();
    dropdown.style.display = (dropdown.style.display === 'block' ? 'none' : 'block');
  }

  function closeAllDropdowns() {
    document.querySelectorAll('ul ul').forEach(function(dropdown) {
      dropdown.style.display = 'none';
    });
  }
</script>