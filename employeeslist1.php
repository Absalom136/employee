<!DOCTYPE html>
<html>
<head>
	<img src="logo2.jpg" alt="logo" height="50" width="100"/>
	<title>List of all Employees</title>
	<h1>List of all Employees:</h1>
	<link rel="stylesheet" type="text/css" href="tablestyle2.css">
</head>
<body>

<p id="total"></p>

<form action="employeeslist.php" method="POST">
	<input type="text" name="valueToSearch" placeholder="Search Table">
	<input type="submit" name="search" value="Fillter">
	<input type="submit" name="delete" value="delete">
	<a href="employee_reg.php"> <button><strong>Back</button></strong> </a>

	<table>
		<tr>
			<th>Name</th>
			<th>ID No.</th>
			<th>Hired Date</th>
			<th>Email</th>
			<th>Cell Phone</th>
			<th>Department</th>
			<th>Passport</th>
		</tr>

<?php 
//connect to database 
$link = mysqli_connect('localhost', 'root', '', 'employee');
if ($link-> connect_error) {
	die("Connection failed" . $link-> connect_error);
}

$sql = "SELECT username, idno, hired, email, cellphone, department, passport from emp_registration";
$result = $link-> query($sql);

if ($result-> num_rows > 0) {
	while ($row = $result-> fetch_assoc()) {
		echo "<tr><td>" . $row["username"] . "</td><td>" . $row["idno"] . "</td><td>" . $row["hired"] . "</td><td>" . $row["email"] . "</td><td>" . $row["cellphone"] . "</td><td>" . $row["department"] . "</td><td>" . $row["passport"] . "</td></tr>";
	}
	echo "</table>";
}
else{
	echo "0 result";
}
$link-> close();
 ?>
 
 <?php 
  

 ?>
	</table>
</form>
</body>
</html>