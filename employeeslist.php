<!DOCTYPE html>
<html>
<img src="logo2.jpg" alt="logo" height="50" width="100"/>
<head>
	<meta charset="utf-8">	
	<title>The Registered Members</title>
	<h1>The Registered Members:</h1>
	<link rel="stylesheet" type="text/css" href="tablestyle2.css">
</head>
<body>
	<div class="container">
	<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by name.." title="Type in a name" name="tafta">
	<br><br>
	<form method="POST" action="employeeslist.php" enctype="multipart/form-data">
	<table id="myTable">
		<thead>
		<tr><th>No.</th>
			<th>Name</th>
			<th>ID No.</th>
			<th>Hired Date</th>
			<th>Email</th>
			<th>Cell Phone</th>
			<th>Department</th>
			<th>Passport</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr> 
		</thead>
		<tbody>
<?php 
session_start();
//connect to database 

$link = mysqli_connect('localhost', 'root', '', 'employee');

 $query = "SELECT COUNT(*) AS count FROM emp_registration";
 $query_result = mysqli_query($link, $query);
 while ($row = mysqli_fetch_assoc($query_result)) {
 	$output = '<b><font color = "#4B0082">Total Records: </color></b>'.$row['count'];
}
$absa =mysqli_query($link, "SELECT * from emp_registration") or die('Could not connect!') ;
$sr = 1;
while ($row = mysqli_fetch_array($absa)) {?>
	<tr>
		<td><?php echo $sr;?></td>
		<td><?php echo $row['username'];?></td>
		<td><?php echo $row['idno'];?></td>
		<td><?php echo $row['hired'];?></td>
		<td><?php echo $row['email'];?></td>
		<td><?php echo $row['cellphone'];?></td>
		<td><?php echo $row['department'];?></td>
		<td align = "center"><?php echo "<img src='images/".$row['passport']."' alt = 'Passport' style = 'width: 100px; height: 100px;'>" ?></td>
		<td align="center"><a href="edit.php?idno=<?php echo $row["idno"]; ?>"><img src="edit.jpg" width="100" height="50"></a></td>
		<td align="center"><a href="delete.php?idno=<?php echo $row["idno"]; ?>"><img src="bin.jpg" width="25" height="30"></a></td>
	</tr>

	<?php $sr++;
}
 ?>
 <?php 
 echo $output;
 ?>
 <?php  
$x=100;
echo "<b>Slots Remaining: </b>",$x-$sr+1;
 ?>
<br><br>
 <div><a href="employee_reg.php" style="background-color: #228B22;
	color: white;
	text-align: center;
	top: 0px;
	width: 100%
	height: 20px;
	border-radius: 10px 10px 10px 10px;
	padding: 5px;">Enter new record</a></div>
	<br>
	</tbody>
	</table>

	<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

</script>
 </form>
 </body>
</div>
</html>