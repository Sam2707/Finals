<?php
include 'connection.php';
$hood_id = $_POST['hood'];
$store_name = $_POST['store_name'];
$store_area = $_POST['store_area'];
$store_id = $_POST['store_id'];
$sql =  "UPDATE stores SET hood_id='$hood_id', store_name='$store_name', store_area = '$store_area'
  WHERE ID = $store_id";
$result = $conn->query($sql);

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $conn->close();
    header("Location: index.php");

?>