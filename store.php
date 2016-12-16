<?php
$servername = "localhost";
$username = "root";
$password = "123456789";
$dbname = "healthy_corner_stores";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>form</title>
    <link type= 'text/css' rel='stylesheet' href='style2.css'/>
<link href="https://fonts.googleapis.com/css?family=Yellowtail" rel="stylesheet">
    <title>PHP!</title>
    </head>
    
    <body>
    <header>
<div class="logo">
<h1>Healthy Store</h1>
</div>
<form action="search_results.php" class="search-bar" method="post">
    <input type="text" name="search" placeholder="Enter neighbourhood name, store name or zip code">
    <button type="submit">Go</button>
</form>
<nav>
<ul>
    <li><h3><a href="index.php">Home</a></h3></li>
    <li><h3><a href="hood.php">Add a hood</a></h3></li>
    <li><h3><a href="store.php" class="active">Add a store</a></h3></li>
</ul>
</nav>
</header>
<center>
<h1>Add a new store</h1>
</center>

    <form action="add_store.php" method="post">
    
        <div>

        <label for="hood_id">Select Neighbourhood:</label>

        <select name="hood">
<?php 
$sql = "SELECT hood_name from neighbourhood";
$result = $conn->query($sql);
$x=1;
while ($hoods = $result->fetch_assoc()) {
$sql2 = "SELECT hood_name from neighbourhood WHERE ID=$x";
$result2 = $conn->query($sql2);
$row = $result2->fetch_assoc();
$hood_name = $row["hood_name"];
echo "<option value=\"".$x."\">".$hood_name."</option>";
$x++;
}
?>
</select>

    </div>

        <div>
        <label for="store_name">Enter Store Name:</label>
        <input type="text" id="store_name" name="store_name" required />
    </div>
    <div>
        <label for="store_area">Enter Area of the Store in sq.ft:</label>
        <input type="number" id="store_area" name="store_area"required />
    </div>
    <div class="button">
        <button type="submit">Submit</button>
    </div>
</form>
</body>
</html>