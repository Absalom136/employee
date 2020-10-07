<?php 
	session_start();
//connect to database 
$link = mysqli_connect('localhost', 'root', '', 'employee');
if (isset($_POST['submit'])) {
	//add to the database
		$username = ($_POST['username']);
		$idno = ($_POST['idno']);
		$hired = ($_POST['hired']);
		$email = ($_POST['email']);
		$cellphone = ($_POST['cellphone']);
		$department = ($_POST['department']);
		// Get image name 	
		$passport = $_FILES['passport']['name'];
		// Get text 	
		$image_text = mysqli_real_escape_string($db, $_POST['image_text']); 	
		// image file directory 	
		$target = "images/".basename($passport);

	$result = mysqli_query($link, "INSERT INTO emp_registration (username, idno, hired, email, cellphone, department, passport) VALUES ('".$_POST['username']."', '".$_POST['idno']."', '".$_POST['hired']."', '".$_POST['email']."', '".$_POST['cellphone']."', '".$_POST['department']."', '$passport')") or die("Could not update!");

if (move_uploaded_file($_FILES['passport']['tmp_name'], $target)) { 		
	$msg = "Image uploaded successfully"; 	
}else{ 		
	$msg = "Failed to upload image"; 	 
} $result = mysqli_query($link, "SELECT * FROM emp_registration");



	

	$_SESSION['message'] = "Data entered successfully! Added $username to the database";
	$_SESSION['username'] = $username;
	header("location: employeeslist.php");//redirected to homepage
}else{
	$_SESSION['message'] = "Employee Could not be added to the database";
}


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Employee Registration</title>
	<link rel="stylesheet" type="text/css" href="absa3.css">
</head>
<body>
	<div class="header">
<h1>OGM Record Management System</h1>
</div>
<div class="login">
<h1>New Record:</h1>
<form method="POST" action="employee_reg.php" enctype="multipart/form-data"> 
	
		<marquee behavior="alternate">Enter new employee details</marquee>
	
		<input type="text" name="username" required="required" placeholder="Name goes here">
		<input type="number" name="idno" placeholder="ID No.">
		<input type="Date" name="hired" placeholder="Hired Date">
		<input type="email" name="email" placeholder="example@gmail.com">
		<input type="text" name="cellphone" required="required" placeholder="cellphone">
		<td><input type="text" name="department" required="required" placeholder="department">
		<input type="file" name="passport" id="fileSelect" enctype="multipart/form-data" multiple>
        <input type="submit" name="submit" value="Upload">
      <a href="employeeslist.php" target="_blank" class="forgot">View Records</a>
      <div class="shadow"></div>
	</div>	
</form>

</body>
</html>