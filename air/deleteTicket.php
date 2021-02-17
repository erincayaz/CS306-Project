<?php 

include "connection.php";

$id = $_POST['ticket_no'];


	// sql to delete a record
$sql = "DELETE FROM ticket WHERE ticket_no = '$id'";

if ($con->query($sql) === TRUE) {
  echo "Record deleted successfully" . $id;
} else {
  echo "Error deleting record: " . $con->error;
}
header("Location: admin.php")

?>