<?php
include 'connection.php';
$store_id = $_GET['store_id'];
$sql = "DELETE FROM stores WHERE ID=$store_id";
$result = $conn->query($sql);

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    $conn->close();
    header("Location: index.php");

?>