<?php
	include 'searchHeader.php';
 ?>

<a href = "search.php"><h1>Ticket Page</h1></a>

<div class = "ticket-container">
	<?php
    $title = mysqli_real_escape_string($conn, $_GET['title']);


		$sql = "SELECT * FROM flight WHERE flight_id = '$title'";
		$result = mysqli_query($conn, $sql);
		$queryResults = mysqli_num_rows($result);

		if($queryResults > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$diff = $row['Total_Seats'] - $row['Sold_Seats'];
				echo "<div class = 'ticket-box'>
					<h3>".$row['Source']. ' ' .$row['Destination']."</h3>
					<h4>".$row['Departure_time']. ' --- ' .$row['Arrival_time']. ' --> ' .$row['Current_price']. ' TL'."</h4>
					<p>".'Last ' .$diff. ' tickets left!'."</p>
				</div>";
			}
		}
		echo $title;
		echo "<a href = 'paymet.php?title=".$title."'>asd</a>"
	?>


</div>

</body>
</html>
