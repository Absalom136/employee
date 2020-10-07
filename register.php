<?php 
	
	session_start();
	$error = '';//varriable to store error message
//connect to database 
$link = mysqli_connect('localhost', 'root', '', 'employee');
if (isset($_POST['btn'])) {

		$username = ($_POST['username']);
		$email = ($_POST['email']);
		$password = ($_POST['password']);
		$password2 = ($_POST['password2']);

if ($password == $password2 ){
	//add to the database
	$password = md5($password);
	$result = mysqli_query($link, "INSERT INTO users (username, email, password) VALUES ('".$_POST['username']."', '".$_POST['email']."', '".$_POST['password']."')")
	or die(msqli_error($link, $result));

	$_SESSION['username'] = $username;
	$_SESSION['message'] = "Your are logged in";
	header("location: home.php");//redirected to homepage
}else{
	$error = "The two passwords do not match!";
}
			
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>SignUp</title>
	<link rel="stylesheet" type="text/css" href="absa2.css">
</head>
<body>
	<div class="header">
<h1>OGM Record Management System</h1>
</div>
<div class="login">
	<h1>SignUp & Login</h1>

<form method="POST" action="register.php"> 
		<input type="text" name="username" id="username" required="required" placeholder="name goes here">
    	
    	<input type="email" name="email" id="email" placeholder="example@gmail.com">
    
	    <input type="password" name="password" id="password" required="required" placeholder="password: 8-10 Charactors" minlength ="8" maxlength ="10" onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off required="required">
	     
		<input type="password" name="password2" required="required" placeholder="Repeat password" minlength ="8" maxlength ="10" onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off id="password" required="required">
	
	<div><a href="login.php" class="signup">Login</a></div>
		<input type="submit" name="btn">
		
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