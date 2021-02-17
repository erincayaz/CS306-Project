<?php 

include "connection.php";

$id = $_POST['ticket_no'];
$source = $_POST['source'];
$destination = $_POST['destination'];
$planeno = $_POST['planeno'];
$planename = $_POST['planename'];
$distance = $_POST['distance'];
$arrivalt = $_POST['arrivalt'];
$departuret = $_POST['departuret'];
$totalseats = $_POST['totalseats'];
$currentprice = $_POST['currentprice'];

	// sql to delete a record
$sql = "UPDATE flight
SET Source= '$source', Destination = '$destination', Plane_no = '$planeno', Plane_name = '$planename', Distance= '$distance',
Arrival_time = '$arrivalt', Departure_time = '$departuret', Total_Seats = '$totalseats', Current_Price = '$currentprice'
WHERE flight_id = '$id'";

if ($con->query($sql) === TRUE) {
  echo "Record deleted successfully" . $id;
} else {
  echo "Error deleting record: " . $con->error;
}
header("Location: admin.php")

?>