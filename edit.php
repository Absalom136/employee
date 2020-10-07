<?php
session_start();
$link = mysqli_connect('localhost', 'root', '', 'employee');
$idno=$_REQUEST['idno'];
$query = "SELECT * from emp_registration where idno='".$idno."'"; 
$result = mysqli_query($link, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
<div class="form">
<p><a href="home.php">Dashboard</a> 
| <a href="insert.php">Insert New Record</a> 
| <a href="logout.php">Logout</a></p>
<h1>Update Record</h1>
<?php
$status = "";
if (isset($_POST['submit']))
{
$idno=$_REQUEST['idno'];
$hired =$_REQUEST['hired'];
$email =$_REQUEST['email'];
$cellphone =$_REQUEST['cellphone'];
$username =$_REQUEST['username'];
$department =$_REQUEST['department'];
mysqli_query($link, "UPDATE emp_registration SET username='$username', department='$department' WHERE idno=$idno"); 
$status = "Record Updated Successfully. </br></br>
<a href='employeeslist.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form method="POST" action="edit.php">
<input type="hidden" name="hired" value="<?php echo $row['hired'];?>" />
<input name="idno" type="hidden" value="<?php echo $row['idno'];?>" />
<input type="hidden" name="email" value="<?php echo $row['email'];?>" />
<input name="cellphone" type="hidden" value="<?php echo $row['cellphone'];?>" />
<p><input type="text" name="username" placeholder="Enter username" 
required value="<?php echo $row['username'];?>" /></p>
<p><input type="text" class="name" name="department" placeholder="Enter Department" 
required value="<?php echo $row['department'];?>" /></p>
<p><input class="button" name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>