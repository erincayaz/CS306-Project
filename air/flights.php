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
  

<tr> <th> Flight ID </th> <th> Source </th> <th> Destination </th> <th> Departure Time </th> <th> Arrival Time </th> </tr>
<?php 

include "connection.php";

$sql_statement = "SELECT * FROM flight";

$result = mysqli_query($con, $sql_statement);



while ($row = mysqli_fetch_assoc($result))
{
	$flightid = $row['flight_id'];
	$source = $row['Source'];
	$destination = $row['Destination'];
	$arrivalt = $row['Arrival_time'];
	$departuret = $row['Departure_time'];
	
	echo "<tr>" . "<td> ". $flightid . "</td> " . "<td> ". $source . "</td>" . "<td> ". $destination . "</td>" .  "<td> ". $arrivalt . "</td>" . "<td> ". $departuret . "</td>" . "</tr>";
	
	
}
?>

	</table>
</body>
</html>