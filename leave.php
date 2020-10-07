<?php 
	session_start();
	$error = '';
//connect to database 
$link = mysqli_connect('localhost', 'root', '', 'employee');
if (isset($_POST['btn'])) {
	//add to the database

		$username = ($_POST['username']);
		$ids = ($_POST['ids']);
		$start = ($_POST['start']);
		$to = ($_POST['to']);


	$result = mysqli_query($link, "INSERT INTO leave (username, ids, start, to) VALUES ('".$_POST['username']."', '".$_POST['ids']."', '".$_POST['start']."', '".$_POST['to']."')") or die("Could not update!");
	

	$_SESSION['message'] = "Data entered successfully! Added $username to the database";
	$_SESSION['username'] = $username;
	header("location: leavelist.php");//redirected to homepage
}else{
	$_SESSION['message'] = "Emploee Could not be added to the database";
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Apply Leave</title>
</head>
<body>
	<p align="center">
		Please fill in the form bellow and submit to apply for your annual leave
<p id="demo"></p>
		<script>
document.getElementById("demo").innerHTML = Date();
</script>

	</p>
	<form action="leave.php" method="POST">
		<table>
		<tr>
			<th>Full Name:</th>
			<td><input type="text" name="username" required="required" placeholder="Name registed" class="textInput"></td>
		</tr>
		<tr>
			<th>ID:</th>
			<td><input type="text" name="ids" required="required" placeholder="Your national ID no." class="textInput"></td>
		</tr>
		<tr>
			<th>From:</th>
			<td><input type="date" name="start" class="textInput"></td>
			<th>To: <input type="date" name="to" class="textInput"></td>
		</tr>
		<tr>
			<td><input type="submit" name="btn" value="Apply"></td>
			<td><input type="submit" name="cancel" value="Cancel"></td>
		</tr>
		
		<span style="width: 92%;
				margin: 0px auto;
				border: 1px #a94442;
				color: #a94442;
				background: #f2dede;
				border-radius: 5px;
				text-align: center;">
			<?php echo $error; ?></span>
		</table>
		<a href="leavelist.php">Approved Leaves</a>
	</form>

</body>
</html>