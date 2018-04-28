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
    text-align: center;
  }
  table td{
    border: dotted black 3px;
    font-size: 20px;
    text-align: center;
  }
  form input{
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
    <h3>Student Report</h3>
    <br>
    <form method="post" action="">
      <label>Student ID</label>
      <input type="text" name="sr_id">
      <input type="submit" name="sr_btn" value="Done!" >
    </form>
    <br>
    <table border="1">
      <tr>
        <th>Student ID</th>
        <th>Name</th>
        <th>Department</th>
        <th>Batch</th>
        <th>Date</th>
        <th>Attendance Status</th>
      </tr>
   <?php

    if(isset($_POST['sr_btn'])){
     $sr_id = $_POST['sr_id'];

     $i=0;
     $all_query = mysql_query("select * from report where report.st_id='$sr_id'");
     while ($data = mysql_fetch_array($all_query)) {
       $i++;
     ?>
     <tr>
       <td><?php echo $data['st_id']; ?></td>
       <td><?php echo $data['st_name']; ?></td>
       <td><?php echo $data['st_dept']; ?></td>
       <td><?php echo $data['st_batch']; ?></td>
       <td><?php echo $data['stat_date']; ?></td>
       <td><?php echo $data['st_status']; ?></td>
     </tr>
     <?php 
   } 
     }  
     ?>
    </table>

  </div>

</div>

</center>

</body>
</html>
