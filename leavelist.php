<!DOCTYPE html>
<html>
<img src="logo2.jpg" alt="logo" height="50" width="100"/>
<head>
	<title>Approved Leaves</title>
	<h1>The Approved Leaves:</h1>
	<link rel="stylesheet" type="text/css" href="tablestyle2.css">
</head>
<body>
	<div class="container">
	<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name" name="tafta">
	<br>
	<form method="POST" action="leavelist.php">
	<table id="myTable">
		<thead>
		<tr><th>No.</th>
			<th>Name</th>
			<th>ID No.</th>
			<th>From</th>
			<th>To</th>
			<th>Select<input type="checkbox" name="checkall" value=""></th>
		</tr> 
		</thead>
		<tbody>
<?php 
session_start();
//connect to database 

$link = mysqli_connect('localhost', 'root', '', 'employee');

$link =mysqli_query($link, "SELECT * from leave") or die('Could not connect!');
$sr = 1;
while ($row = mysqli_fetch_array($link)) {?>
	<tr>
		<td><?php echo $sr;?></td>
		<td><?php echo $row['username'];?></td>
		<td><?php echo $row['id'];?></td>
		<td><?php echo $row['start'];?></td>
		<td><?php echo $row['to'];?></td>
		<td>
			<input type="checkbox" name="records[]" value="<?php echo $row['id']; ?>">
		</td>
	</tr>

	<?php $sr++;
}
 ?>

 <div class="row">
 	<div class="form-group">
 	
 	<input type="submit" name="delete_selected" value="Delete">
	</div>
 </div>
 <?php 
if (isset($_POST['delete_selected'])) {
	$absa = $_REQUEST['records'];
	$a = implode(",", $absa);
	mysqli_query($link,$absa,"DELETE FROM users WHERE id in($a) ");
}
 ?>
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