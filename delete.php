
<?php
session_start();
$link = mysqli_connect('localhost', 'root', '', 'employee');
$idno=$_REQUEST['idno'];
$query = "DELETE FROM emp_registration WHERE idno=$idno"; 
$result = mysqli_query($link,$query) or die ( mysqli_error());
header("Location:employeeslist.php"); 
?>