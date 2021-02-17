<?php 

include "connection.php";

$id = $_POST['id_delete'];


	// sql to delete a record
$sql = "DELETE FROM flight WHERE flight_id = '$id'";

if ($con->query($sql) === TRUE) {
  echo "Record deleted successfully" . $id;
} else {
  echo "Error deleting record: " . $con->error;
}
header("Location: admin.php")

?>