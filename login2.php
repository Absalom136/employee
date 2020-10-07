<?php 
session_start();
	$error = '';//varriable to store error message
	if (isset($_POST['btn']))  {
		if (empty($_POST['username']) || empty($_POST['password'])) {
					
		$error = "Username or Password is Invalid";
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
				$error = "Username or Password is Invalid!";
			}
			mysqli_close($link);
		}
	}
 ?>




<!DOCTYPE html>
<html>
<head>
	<title>ogm</title>
	<link rel="stylesheet" type="text/css" href="ogm.css">
</head>
<body>
	<form action="login2.php" method="POST" enctype="multipart/form-data">
<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
		<div class="login-form">
			<div class="sign-in-htm">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" name="username" type="text" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" name="password" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<input id="check" type="checkbox" class="check" checked>
					<label for="check"><span class="icon"></span> Keep me Signed in</label>
				</div>
				<div class="group">
					<input type="submit" class="button" name="btn" value="Sign In">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="#forgot">Forgot Password?</a>
				</div>
			</div>
			<div class="sign-up-htm">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" name="username" type="text" class="input">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" name="password2" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<label for="pass" class="label">Repeat Password</label>
					<input id="pass" type="password" class="input" data-type="password">
				</div>
				<div class="group">
					<label for="pass" class="label">Email Address</label>
					<input id="pass" type="text" class="input">
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign Up">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<label for="tab-1">Already Member?</a>
				
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
			</div>
		</div>
	</div>
</div>
</form>
</body>
</html>