<?php

ob_start();
session_start();

if($_SESSION['name']!='oasis')
{
  header('location: login.php');
}
?>

<?php
    include('connect.php');
    try{
    if(isset($_POST['att'])){
      $dp = date('Y-m-d');
      $stat = mysql_query("insert into attendance(stat_id,st_status,stat_date) values('$_POST[stat_id]','$_POST[st_status]','$dp')");
      $att_msg = "Attendance Recorded.";
    }
  }
  catch(Execption $e){
    $error_msg = $e->$getMessage();
  }
 ?>

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
  button{
    background-color: black;
    color: white;
    font-size: 30px;
  }
  button input{
    background-color: black;
    color: white;
    font-size:30px;
  }
  .status{
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
    <h3>Attendance of <?php echo date('Y-m-d'); ?></h3>
    <?php if(isset($att_msg)) echo $att_msg; if(isset($error_msg)) echo $error_msg; ?>
    <form action="" method="post">
    <table border="1">
      <tr>
        <th>Student ID</th>
        <th>Name</th>
        <th>Department</th>
        <th>Batch</th>
        <th>Semester</th>
        <th>Email</th>
        <th>Status</th>
      </tr>
   <?php
     $i=0;
     $all_query = mysql_query("select * from students");
     while ($data = mysql_fetch_array($all_query)) {
       $i++;
     ?>
     <tr>
       <td><?php echo $data['st_id']; ?></td>
       <input type="hidden" name="stat_id" value="<?php echo $data['st_id']; ?>">
       <td><?php echo $data['st_name']; ?></td>
       <td><?php echo $data['st_dept']; ?></td>
       <td><?php echo $data['st_batch']; ?></td>
       <td><?php echo $data['st_sem']; ?></td>
       <td><?php echo $data['st_email']; ?></td>
       <td>
         <label>Present</label>
         <input type="radio" name="st_status" value="p" checked>
         <label>Absent</label>
         <input type="radio" name="st_status" value="a">
       </td>
     </tr>
     <?php }  ?>
    </table>
    <center><br>
    <button><input type="submit" name="att" value="Done"></button>
  </center>
</form>
  </div>

</div>

</center>

</body>
</html>
