<?php

$hood_id = $_POST['hood'];

include 'connection.php';
$sql = "SELECT hood_name, hood_zip, stores.ID, store_name, store_area, url
FROM
neighbourhood JOIN stores
ON
neighbourhood.ID = stores.hood_id
WHERE stores.hood_id='$hood_id'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>

<title>Healthy Store</title>

<link href="style.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Yellowtail" rel="stylesheet"> 

</head>

<body>
<header>
<div class="logo">
<h1>Healthy Store</h1>
</div>

<nav>
<ul>
	<li><h3><a href="index.php" class="active">Home</a></h3></li>
	<li><h3><a href="hood.php">Add a hood</a></h3></li>
	<li><h3><a href="store.php">Add a store</a></h3></li>
</ul>
</nav>
</header>
<div style="clear:both;"></div>
<form action="search_results.php" class="search-bar" method="post">
	<input type="text" name="search" placeholder="Enter neighbourhood name, store name or zip code">
	<button type="submit">Go</button>
</form>

<div style="clear:both;"></div>

<center>

<h1>List of Stores</h1>
<form action="filtered_results.php" method="post">
        <label>Filter by Neighbourhood:</label>
        <select name="hood">
<?php 
$sql1 = "SELECT hood_name from neighbourhood";
$result1 = $conn->query($sql1);
$x=1;
while ($hoods = $result1->fetch_assoc()) {
$sql2 = "SELECT hood_name from neighbourhood WHERE ID=$x";
$result2 = $conn->query($sql2);
$row = $result2->fetch_assoc();
$hood_name = $row["hood_name"];
echo "<option value=\"".$x."\">".$hood_name."</option>";
$x++;
}
?>
</select>
<button type="submit">Go</button>
</form>
<table>
	<tr>
		<th>Neighbourhood</th>
		<th>Zip Code</th>
		<th>Store Name</th>
		<th>Store Area (sq. ft.)</th>
		<th>Delete</th>
		<th>Update</th>
	</tr>
<?php
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row['hood_name'] . "</td><td>" . $row['hood_zip'] . "</td><td><a id=\"link\" href=\"".$row['url']."\">" . $row['store_name'] .
    "</a></td><td>" . $row['store_area'] .
    "</td><td><a href=delete_conf.php?store_id=" . $row['ID']  ."> Delete</a>" .
    "</td><td><a href=updateForm.php?store_id=" . $row['ID']  ."> Update</a>" . "</td></tr>";
  }
}
?>
</table>
</center>
</body>
</html>