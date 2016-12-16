<?php
$store_id = $_GET['store_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>

<title>Healthy Store</title>

<link href="style2.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Yellowtail" rel="stylesheet"> 

</head>

<body id="delete_pg">
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

<center>
<form action="delete.php" method="get" id="pop-up">
	<h4>Are you sure you want to delete?</h4>
	<input type="hidden" value="<?php echo $store_id; ?>" name="store_id">
    <div class="button">
        <button type="submit">Yes</button>
    </div>
	</form>
    <div class="button">
        <a href="index.php"><button id="no">No</button></a>
    </div>

</center>
</body>
</html>