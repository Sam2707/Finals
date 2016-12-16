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
    <li><h3><a href="hood.php" class="active">Add a hood</a></h3></li>
    <li><h3><a href="store.php">Add a store</a></h3></li>
</ul>
</nav>
</header>
<center>
<h1>Add a new Neighbourhood</h1>
</center>
    <form action="add_hood.php" method="post">
        <div>
        <label for="hood_name" >Enter area name:</label>
        <input type="text" id="hood_name" name="hood_name" required />
    </div>
    <div>
        <label for="hood_zip">Enter zip code:</label>
        <input type="number" id="hood_id" name="hood_zip" required />
    </div>
    <div class="button">
        <button type="submit">Submit</button>
    </div>
</form>
</body>
</html>