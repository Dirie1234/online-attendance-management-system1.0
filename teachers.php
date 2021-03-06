<?php

ob_start();
session_start();

if($_SESSION['name']!='oasis')
{
  header('location: login.php');
}
?>
<?php include('connect.php');?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Online Attendance Management System 1.0</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/main.css">

<style type="text/css">

  table th{
    padding: 7px;
    border: solid black 4px;
    font-size: 20px;
  }
  table td{
    border: dotted black 3px;
    font-size: 20px;
  }

</style>

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
    <h3>Teacher List</h3>
    
    <table border="1">
      <tr>
        <th>Teacher ID</th>
        <th>Name</th>
        <th>Department</th>
        <th>Email</th>
        <th>Course</th>
      </tr>
      <?php

        $i=0;
        $tcr_query = mysql_query("select * from teachers");
        while($tcr_data = mysql_fetch_array($tcr_query)){
          $i++;

        ?>

          <tr>
            <td><?php echo $tcr_data['tc_id']; ?></td>
            <td><?php echo $tcr_data['tc_name']; ?></td>
            <td><?php echo $tcr_data['tc_dept']; ?></td>
            <td><?php echo $tcr_data['tc_email']; ?></td>
            <td><?php echo $tcr_data['tc_course']; ?></td>
          </tr>
          <?php } ?>
    </table>

  </div>

</div>

</center>

</body>
</html>
