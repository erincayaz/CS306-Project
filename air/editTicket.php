<?php 

include "connection.php";



$id = $_POST['ticket_no'];
$departure = $_POST['departure_loc'];
$planeno = $_POST['plane_no'];
$class = $_POST['class'];
$date = $_POST['dateofflight'];
$seat = $_POST['duration'];
$duration = $_POST['duration'];
$ssn = $_POST['SSN'];
$departuret = $_POST['departuret'];
$arrivalt = $_POST['arrivalt'];
$earnedp = $_POST['earnedp'];
$arrival = $_POST['arrival'];

	
$sql = "UPDATE ticket
SET departure_location= '$departure', plane_no = '$planeno', class = '$class', date_of_fligth = '$date', seat_no= '$seat',
duration_in_min = '$duration', SSN = '$ssn', Departure_time = '$departuret', Arrival_time = '$arrivalt', Earned_points = '$earnedp' , Arrival_location = '$arrival'
WHERE ticket_no = '$id' ";

if ($con->query($sql) === TRUE) {
 echo "Record deleted successfully" . $id;
} else {
  echo "Error deleting record: " . $con->error;
}
header("Location: admin.php")

?>