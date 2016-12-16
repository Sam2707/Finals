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
//print_r($conn);
$hood_name = $_POST['hood_name'];
$hood_zip = $_POST['hood_zip'];
$sql = "INSERT INTO neighbourhood (hood_name, hood_zip)
VALUES ('$hood_name', '$hood_zip')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully <br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
header("Location: store.php");
?>