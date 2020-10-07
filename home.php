<?php  
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h1>OGM Record Management System</h1>
</div>
<h1 align="center">Home</h1>
<div class="content">
	<p align="center">
<strong> <img src="animated-welcome-image-0112.gif"></p>
	<h3 align="center">

<?php  echo $_SESSION['username']."<br>"; 


?>


</h3>		
</div>

<br><br>
<p align="center">
<a href="registered.php" target="_blank" style="background-color: #0e4b6b;
	color: white;
	text-align: center;
	top: 0px;
	width: 100%
	height: 50px;
	border-radius: 10px 10px 10px 10px;
	padding: 10px;">Registered Users</a>

	<a href="employeeslist.php" target="_blank" style="background-color: #253d04;
	color: white;
	text-align: center;
	top: 0px;
	width: 100%
	height: 50px;
	border-radius: 10px 10px 10px 10px;
	padding: 10px;">Emplees List</a>

	<a href="employee_reg.php" target="_blank" style="background-color: #038a8c;
	color: white;
	text-align: center;
	top: 0px;
	width: 100%
	height: 50px;
	border-radius: 10px 10px 10px 10px;
	padding: 10px;">Register Employee</a></p>
</strong>
<br><br>
<p align="center"><a href="login.php" style="color: red;">Logout</a></p>
</div>

<br>
<footer><p>Developed by: Dev@OGM C2018</p> </footer>
</body>
</html>