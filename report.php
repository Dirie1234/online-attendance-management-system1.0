<?php

ob_start();
session_start();

if($_SESSION['name']!='oasis')
{
  header('location: login.php');
}
?>

<?php  include('connect.php');  ?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Online Attendance Management System - City University</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>

<header>

  <h1>Online Attendance Management System 1.0</h1>
  <div class="navbar">
  <a href="index.php">Home</a>
  <a href="students.php">Students</a>
  <a href="teachers.php">Faculties</a>
  <a href="attendance.php">Attendance</a>
  <a href="addata.php">Add Data</a>
  <a href="report.php">Report</a>
  <a href="logout.php">Logout</a>

</div>

</header>

<center>

<div class="row">

  <div class="content">
    <p style="font-size: 50px;">Total Students: 3200</p><br>
    <p style="font-size: 50px;">Total Teachers: 80</p>
    <br>



  </div>

</div>

</center>

</body>
</html>
