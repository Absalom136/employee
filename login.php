<?php 
session_start();
	$error = '';//varriable to store error message
	if (isset($_POST['btn']))  {
		if (empty($_POST['username']) || empty($_POST['password'])) {
					
		$error = "Username or password is invalid";
		}else{
			$username = $_POST['username'];
			$password = $_POST['password'];
			$link = mysqli_connect('localhost', 'root', '', 'employee');
			$query = mysqli_query($link, "SELECT * FROM users WHERE password = '$password' AND username = '$username'");
			$rows = mysqli_num_rows($query);
			if ($rows == 1) {
				$_SESSION['username'] = $username;
				header("location: home.php");
			}else{
				$error = "Username or password is invalid!";
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
		
		<form action="login.php" method="POST">
				<input type="text" name="username" required="required" placeholder="username" />
				<input type="password" name="password" onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off required="required" placeholder="password" />
				<a href="recoverpass.php" class="forgot">forgot password?</a>
				<a href="register.php" class="signup">Sign Up</a>
			
				<input type="submit" name="btn" value="Login" />
			
				<div class="shadow"></div>
				
			
			<!--Error Message-->
		<span style="width: 92%;
				margin: 0px auto;
				border: 1px #a94442;
				color: #a94442;
				background: #f2dede;
				border-radius: 3px;
				text-align: center;">
			<?php echo $error; ?></span>
			</div>
			
		</form>
	</body>
</html>