
<?php
	require 'dbconfig/config.php';

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css1/style.css">
<style>

h1 {
  text-align: center;
  text-transform: uppercase;
  color: #4CAF50;
}

h4 {
  text-align: center;
  text-transform: uppercase;
  color: #4CAF50;
}


.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.buttonred:hover {
  background-color: #f44336;
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}


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

<body style="background-color:#f1f1f1">
	<div id="main-wrapper">
		<center><h1>User Profile</h1></center>


		<div class="inner_container">
			<form action="profile.php" method="post"></form>
			<center>
			<?php

			if(isset($_POST['user']) and isset($_POST['pass']))
			{
				$uname=$_POST['user'];
			  $psw=$_POST['pass'];


				if($uname !="" and $psw!= "")
				{
			     $sql = "SELECT * FROM users WHERE username = '$uname' AND pasword = '$psw'";
			     $result = $con->query($sql);



			    if ($result->num_rows > 0)
			    {

                    while($row = $result->fetch_assoc())
                    {
                        echo "<h4>Dear ". $row["name"]. ", You have  <font color = red>" . $row["points"]. " </font>points in your account". "<br></h4>";
                    }

                    $sql = "SELECT * FROM ticket T, previous_relation P WHERE P.username = '$uname' AND P.ticket_no = T.ticket_no";
			     	$result = $con->query($sql);

				    if ($result->num_rows > 0)
				    {
				    	echo "<center><table style = width:450px id = customers><thread class = thread_dark><tr><th scope = col>Departure  </th><th scope = col>Destination</th><th scope = col>Class</th><th scope = col>Seat</th></tr></thread><tbody></center>";

				    	echo "<h4>Here are your previous Flights:</h4>";
	                    while($row = $result->fetch_assoc()){
	                        echo "<tr><td> ".$row["departure_location"]. "</td><td>" . $row["Arrival_location"]. " </td> <td> ".$row["class"] ." </td> <td> ".$row['seat_no']." </td> </tr>";
	                        echo "<br>";
	                    }
	                    echo "</tbody></table>";
	                }
	                echo "<a href= delete.php ><button class = buttonred type=submit>DELETE ACCOUNT</button></a>";
            	}
                else
                {
                          echo "no previous flights found.";
                }

			    }


			}




			?>
			</center>
		</div>

	</div>

</body>
</html>
