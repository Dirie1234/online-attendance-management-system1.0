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

    if(isset($_POST['std'])){

      $result = mysql_query("insert into students(st_id,st_name,st_dept,st_batch,st_sem,st_email) values('$_POST[st_id]','$_POST[st_name]','$_POST[st_dept]','$_POST[st_batch]','$_POST[st_sem]','$_POST[st_email]')");
      $success_msg = "Information added successfully.";
    }

        if(isset($_POST['tcr'])){

      $res = mysql_query("insert into teachers(tc_id,tc_name,tc_dept,tc_email) values('$_POST[tc_id]','$_POST[tc_name]','$_POST[tc_dept]','$_POST[tc_email]')");
      $success_msg = "Information added successfully.";
    }

  }
  catch(Execption $e){
    $error_msg =$e->getMessage();
  }

 ?>



<!DOCTYPE html>
<html lang="en">
<head>
<title>Online Attendance Management System 1.0</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/main.css">
  
<style type="text/css">
  form{
    font-size: 20px;
  }
  form input{
    font-size: 20px;
  }
  .message{
    padding: 30px;
    font-size: 20px;
    font-style: bold;
    color: black;
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
<div class="message">
        <?php if(isset($success_msg)) echo $success_msg; if(isset($error_msg)) echo $error_msg; ?>
</div>
<div class="row">
  <div class="content">
    <h3>Add Student Information</h3>
      <form action="" method="post">
          <table>
            
            <tr>
              <td>Student ID</td>
              <td><input type="text" name="st_id"></td>
            </tr>
            <tr>
              <td>Name</td>
              <td><input type="text" name="st_name"></td>
            </tr>
            <tr>
              <td>Department</td>
              <td><input type="text" name="st_dept"></td>
            </tr>
            <tr>
              <td>Batch</td>
              <td><input type="text" name="st_batch"></td>
            </tr>
            <tr>
              <td>Semester</td>
              <td><input type="text" name="st_sem"></td>
            </tr>
            <tr>
              <td>Email</td>
              <td><input type="text" name="st_email"></td>
            </tr>
            <tr><td><br></td></tr>
            <tr>
              <td></td>
              <td><button><input type="submit" name="std" value="Add"></button></td>
            </tr>


          </table>
      </form>

  </div>

  <div class="content">
    
    <h3>Add Teacher Information</h3>
    <?php if(isset($success_msg)) echo $success_msg; if(isset($error_msg)) echo $error_msg; ?>

      <form action="" method="post">
          <table>
            
            <tr>
              <td>Teacher ID</td>
              <td><input type="text" name="tc_id"></td>
            </tr>
            <tr>
              <td>Name</td>
              <td><input type="text" name="tc_name"></td>
            </tr>
            <tr>
              <td>Department</td>
              <td><input type="text" name="tc_dept"></td>
            </tr>
            <tr>
              <td>Email</td>
              <td><input type="text" name="tc_email"></td>
            </tr>
            <tr><td><br></td></tr>
            <tr>
              <td></td>
              <td><button><input type="submit" name="tcr" value="Add"></button></td>
            </tr>

          </table>
      </form>

  </div>


</div>

</center>

</body>
</html>
