<?PHP

include "connection.php";


//print_r($conn);
$hood_id = $_POST['hood'];
$store_name = $_POST['store_name'];
$store_area = $_POST['store_area'];
$sql = "INSERT INTO stores (hood_id, store_name, store_area)
VALUES ('$hood_id', '$store_name', '$store_area')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully <br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

header("Location: index.php");
?>