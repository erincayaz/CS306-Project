<!doctype html>
<html>
<head>
 
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>

<body>

	<table id=customers>
  

<tr> <th> Ticket No </th> <th> Username </th> <th> Seat No </th> <th> Flight ID </th>  </tr>
<?php 

include "connection.php";

$sql_statement = "SELECT * FROM ticket";

$result = mysqli_query($con, $sql_statement);



while ($row = mysqli_fetch_assoc($result))
{
	$ticketno = $row['ticket_no'];
	$name = $row['name'];
	$seatno = $row['seat_no'];
	$flightid = $row['flight_id'];
	
	echo "<tr>" . "<td> ". $ticketno . "</td> " . "<td> ". $name . "</td>" . "<td> ". $seatno . "</td>" . "<td> ". $flightid . "</td>" . "</tr>";
	
	
}
?>

	</table>
</body>
</html>