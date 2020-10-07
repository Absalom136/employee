<?php 
session_start();
	$error = '';//varriable to store error message
	if (isset($_POST['btn']))  {
		if (empty($_POST['username']) || empty($_POST['email'])) {

		$error = "Username or email is Invalid";
		}else{
			$username = $_POST['username'];
			$email = $_POST['email'];
			$link = mysqli_connect('localhost', 'root', '', 'employee');
			$query = mysqli_query($link, "SELECT * FROM users WHERE email = '$email' AND username = '$username'");
			$rows = mysqli_num_rows($query);
			if ($rows == 1) {
				$_SESSION['username'] = $username;
				header("location: home.php");
			}else{
				$error = "Username or email is Invalid!";
			}
			mysqli_close($link);
		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="absa.css">
</head>
<body>
	<div class="header">
<h1>OGM Record Management System</h1>
</div>
	<div class="login">
		<h1>Login</h1>
		
		<form action="recoverpass.php" method="POST">
			
				<input type="text" name="username" id="username" required="required" placeholder="username" />
				<input type="email" name="email"  id="email" required="required" placeholder="email" />
			<a href="login.php" class="signup">Optout</a>
			<input type="submit" name="btn" value="Login" />
			
			<div class="shadow"></div>
			
			<!--Error Message-->
		<span style="width: 92%;
				margin: 0px auto;
				border: 1px #a94442;
				color: #a94442;
				background: #f2dede;
				border-radius: 5px;
				text-align: center;">
			<?php echo $error; ?></span>
			
			</div>
		</form>
		
	</body>
</html>