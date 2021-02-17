<?php 

include "connection.php";
include "flights.php";


?>


<!DOCTYPE html>
<html>

<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

button {
  border: yes;
  color: red;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  background-color: #4CAF50;
}
</style>
<body>

<br><br>
<form action = "delete.php" method="POST"> 

<label for="cars"> <b>Select Flight ID For Delete </b> </label>

<select id="cars" name="id_delete">
 
 <?php
 
	$sql_stat = "SELECT flight_id FROM flight";

	$myresult = mysqli_query($con, $sql_stat);

	while ($id_rows = mysqli_fetch_assoc($myresult))
	{
		$id = $id_rows['flight_id'];
	
		echo "<option value='$id'>". $id ."</option>";
	}
?>
  
  
</select>

<p align="center">
<button> <b>DELETE</b> </button> 
</p>
<br><br>
</form>

<form action = "edit.php" method="POST"> 

<label for="cars"> <b>Select Flight ID For Edit </b> </label>

<select id="cars" name="id_edit">
 
 <?php
 
	$sql_stat = "SELECT flight_id FROM flight";

	$myresult = mysqli_query($con, $sql_stat);

	while ($id_rows = mysqli_fetch_assoc($myresult))
	{
		$id = $id_rows['flight_id'];
	
		echo "<option value='$id'>". $id ."</option>";
	}
?>
</select>

<input type='text' name="source" placeholder="Source"> 
<input type='text' name="destination" placeholder="Destination"> 
<input type='text' name="planeno" placeholder="Plane No"> 
<input type='text' name='planename' placeholder="Plane Name"> 
<input type='text' name='distance' placeholder="Distance"> 
<input type='text' name='arrivalt' placeholder="Arrival Time"> 
<input type='text' name='departuret' placeholder="Departure Time"> 
<input type='text' name='totalseats' placeholder="Total Seats"> 
<input type='text' name='currentprice' placeholder="Current Price"> <br>

<p align="center">
<button> <b>EDIT</b> </button> 
</p>
<br><br>


</form>

<form action = "add.php" method="POST"> 

<label for="cars"> <b> Give Flight Information For Adding New Flight </b> </label>


<input type='text' name="flightid" placeholder="Flight ID"> 
<input type='text' name="source" placeholder="Source"> 
<input type='text' name="destination" placeholder="Destination"> 
<input type='text' name="planeno" placeholder="Plane No"> 
<input type='text' name='planename' placeholder="Plane Name"> 
<input type='text' name='distance' placeholder="Distance"> 
<input type='text' name='arrivalt' placeholder="Arrival Time"> 
<input type='text' name='departuret' placeholder="Departure Time"> 
<input type='text' name='totalseats' placeholder="Total Seats"> 
<input type='text' name='currentprice' placeholder="Current Price"> <br>




<p align="center">
<button> <b>ADD FLIGHT</b> </button> 
</p>

<br><br>	

</form>



</body>
</html>

<?php 

include "tickets.php";

?>

<!DOCTYPE html>
<html>

<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

button {
  border: yes;
  color: red;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  background-color: #4CAF50;
}
</style>
<body>

<br><br>
<form action = "deleteTicket.php" method="POST"> 

<label for="cars"> <b>Write Ticket No For Delete </b> </label>

<input type='text' name="ticket_no" placeholder="Ticket No"> 

<p align="center">
<button> <b>DELETE</b> </button> 
</p>
<br><br>
</form>


<br><br>
<form action = "editTicket.php" method="POST"> 

<label for="cars"> <b>Select Ticket No For EDIT </b> </label>


<input type='text' name="ticket_no" placeholder="Ticket No"> 
<input type='text' name="departure_loc" placeholder="Departure Location"> 
<input type='text' name="plane_no" placeholder="Plane No"> 
<input type='text' name="class" placeholder="Class"> 
<input type='text' name='dateofflight' placeholder="Date Of Flight"> 
<input type='text' name='duration' placeholder="Duration"> 
<input type='text' name='SSN' placeholder="SSN"> 
<input type='text' name='departuret' placeholder="Departure Time"> 
<input type='text' name='arrivalt' placeholder="Arrival Time"> 
<input type='text' name='earnedp' placeholder="Earned Points"> 
<input type='text' name='arrival' placeholder="Arrival Location"> <br>

<p align="center">
<button> <b>EDIT</b> </button> 
</p>
<br><br>
</form>

<form action = "addTicket.php" method="POST"> 

<label for="cars"> <b>Write Ticket Info For ADD </b> </label>



<input type='text' name="ticket_no" placeholder="Ticket No"> 
<input type='text' name="name" placeholder="Name"> 
<input type='text' name="departure_loc" placeholder="Departure Location"> 
<input type='text' name="plane_no" placeholder="Plane No"> 
<input type='text' name="class" placeholder="Class"> 
<input type='text' name='dateofflight' placeholder="Date Of Flight"> 
<input type='text' name='duration' placeholder="Duration"> 
<input type='text' name='SSN' placeholder="SSN"> 
<input type='text' name='departuret' placeholder="Departure Time"> 
<input type='text' name='arrivalt' placeholder="Arrival Time"> 
<input type='text' name='earnedp' placeholder="Earned Points"> 
<input type='text' name='arrival' placeholder="Arrival Location"> <br>
<input type='text' name='flightid' placeholder="Flight ID"> <br>

<p align="center">
<button> <b>ADD</b> </button> 
</p>
<br><br>


</form>





</body>
</html>
