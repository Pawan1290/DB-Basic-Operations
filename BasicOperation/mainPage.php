<?php

if(isset($_POST['Filter']) && !empty($_POST['Name']) && !empty($_POST['Country']))
{
	$Name = $_POST['Name'];
	$Country = $_POST['Country'];
	$query = "SELECT * FROM `Info` WHERE Name = '$Name' AND Country = '$Country'";
	$filter_result = filter($query);
}
elseif (isset($_POST['Filter']) && !empty($_POST['Name']) && empty($_POST['Country'])) {
	$Name = $_POST['Name'];
	$query = "SELECT * FROM `Info` WHERE Name = '$Name'";
	$filter_result = filter($query);
}
elseif (isset($_POST['Filter']) && empty($_POST['Name']) && !empty($_POST['Country'])) {
	$Country = $_POST['Country'];
	$query = "SELECT * FROM `Info` WHERE Country = '$Country'";
	$filter_result = filter($query);
}
else{
	$query = "SELECT * FROM `Info`";
	$filter_result = filter($query);
}



function filter($query){
	$conn = mysqli_connect('localhost', 'root', '','Database');
	$result=mysqli_query($conn,$query);
	return $result;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Main Page</title>
	<style>
#Info {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 50%;
}

#Info td, #Info th {
  border: 1px solid #ddd;
  padding: 8px;
    text-align: center;

}

#Info tr:nth-child(even){background-color: #f2f2f2;}

#Info tr:hover {background-color: #ddd;}

#Info th {
  padding-top: 12px;
  padding-bottom: 12px;
  background-color: #85929e
;
  color: white;
}
</style>
</head>
<body>
<form action="mainPage.php" method="post">
	<div align="center">Name: <input type="text" name="Name" size="15">
  Country: <input type="text" name="Country" size="15" >
  <input type="submit" name="Filter" value="Filter">
  <a href="https://localhost/BasicOperation/add.php">Add</a></div><br><br>
	<table id = "Info" align="center">
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Country</th>
			<th>Actions</th>
		</tr>
<?php while($row=mysqli_fetch_array($filter_result) ):?>
	<tr>
		<td><?php echo $row['id']; ?></td>
		<td><?php echo $row['Name']; ?></td>
		<td><?php echo $row['Country'] ?></td>
		<td><a href="delete.php?id=<?php echo($row['id'])?>">Delete</a></td>
	</tr>
<?php endwhile;?>
</table>
</form>
</body>
</html>