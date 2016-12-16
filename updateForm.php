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
//Getting the store_id of the row to update
$store_id = $_GET['store_id'];

//retreiving current store information from the data base
$query = "SELECT 
  hood_name, hood_zip, store_name, store_area
FROM
  neighbourhood JOIN stores
ON
  neighbourhood.ID = stores.hood_id
  
 WHERE
  stores.ID='$store_id'";
  
$result = $conn->query($query);
$row=$result->fetch_assoc();

$hood_name=$row["hood_name"];
$hood_zip=$row["hood_zip"];
$store_name=$row["store_name"];
$store_area=$row["store_area"];

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
    <li><h3><a href="store.php">Add a store</a></h3></li>
</ul>
</nav>

</header>
<center>
<h1>Update Information</h1>
</center>
    <form action="update.php" method="post">
    
        <div>

        <label for="hood_id">Update Neighbourhood:</label>

        <select name="hood">
<?php 
$sql = "SELECT * from neighbourhood";
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
        <label for="store_name">Update Store Name:</label>
        <input type="text" id="store_name" name="store_name" value="<?php echo $store_name; ?>" required />
    </div>
    <div>
        <label for="store_area">Update Area of the Store in sq.ft:</label>
        <input type="number" id="store_area" name="store_area"  value="<?php echo $store_area; ?>" required />
    </div>
    <div>
    <input type="hidden" id="store_id" name="store_id"  value="<?php echo $store_id; ?>"/>
    </div>
    <div class="button">
        <button type="submit">Update</button>
    </div>
</form>
</body>
</html>