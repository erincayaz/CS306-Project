<?php
	include 'searchHeader.php';
 ?>

 <form action = "willSearch.php" method = "POST">
	 <input type = "text" name = "departure" placeholder="Departure">
	 <input type = "text" name = "arrival" placeholder = "Arrival">
	 <input type = "datetime-local" name = "departure-time-beg" placeholder = "Date">
	 <button type "submit" name = "submit-search">Search</button>
</form>

<h1>Front Page</h1>
<h2>All tickets</h2>

<div class = "ticket-container">
	<?php
		$sql = "SELECT * FROM flight";
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
	?>


</div>

</body>
</html>
