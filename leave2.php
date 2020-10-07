<?php 
session_start();
	$error = '';//varriable to store error message
	if (isset($_POST['btn']))  {
		if (empty($_POST['username']) || empty($_POST['id'])) {

		$error = "Username or id is Invalid";
		}else{
			$username = ($_POST['username']);
			$id = ($_POST['id']);
			$start = ($_POST['start']);
			$to = ($_POST['to']);
			$link = mysqli_connect('localhost', 'root', '', 'employee');
			$query = mysqli_query($link, "SELECT * FROM emp_registration WHERE idno = '$id' AND username = '$username'");
			$result = mysqli_query($link, "INSERT INTO leave (username, id, start, to) VALUES ('".$_POST['username']."', '".$_POST['id']."', '".$_POST['start']."','".$_POST['to']."')")
			or die("Could not update!");
			$rows = mysqli_num_rows($query, $result);
			if ($rows == 1) {
				$_SESSION['username'] = $username;
				header("location: leavelist.php");
			}else{
				$error = "Username or id is Invalid!";
			}
			mysqli_close($link);
		}
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
			<td><input type="text" name="id" required="required" placeholder="Your national ID no." class="textInput"></td>
		</tr>
		<tr>
			<th>From:</th>
			<td><input type="date" name="start" id="start" class="textInput"></td>
			<td><input type="date" name="to" id="to" class="textInput"></td>
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