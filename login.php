<?php

if(isset($_POST['login']))
{
	try{
		if(empty($_POST['username'])){
			throw new Exception("Username is required!");
			
		}
		if(empty($_POST['password'])){
			throw new Exception("Password is required!");
			
		}

include ('connect.php');
		
		$row=0;
		$result=mysql_query("select * from admininfo where username='$_POST[username]' and password='$_POST[password]'");
		$row=mysql_num_rows($result);

		if($row>0)
		{
			session_start();
			$_SESSION['name']="oasis";
			header('location: index.php');
		}
		else{
			throw new Exception("Username or Password is wrong, try again!");
			
			header('location: login.php');
		}
	}
	catch(Exception $e){
		$error_msg=$e->getMessage();
	}
}
?>

<!DOCTYPE html>
<html>
<head>

	<title>Online Attendance Management System 1.0</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<style type="text/css">
		form{
			padding: 50px;
			font-size: 20px;
		}
		form input{
			font-size: 20px;
		}
		a:hover{
			color:white;
		}
	</style>
</head>

<body>
	<center>

<header>

  <h1>Online Attendance Management System 1.0</h1>

</header>

<h1>Login</h1>

<?php
if(isset($error_msg))
{
	echo $error_msg;
}
?>


<form action="" method="post">
	
	<table>
		<tr>
			<td>Username </td>
			<td><input type="text" name="username"></input></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password"></input></td>
		</tr>
		<tr><td><br></td></tr>
		<tr>
			<td><button><input type="submit" name="login" value="Login"></input></button></td>
			<td><button><input type="reset" name="reset" value="Reset"></button></td>
		</tr>
	</table>
</form>
<p><strong>If you don't have any account, <a href="signup.php">Signup</a> here</strong></p>

</center>
</body>
</html>