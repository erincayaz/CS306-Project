
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
		
		<div class="inner_container">
			<form action=".php" method="post"></form>
			<center>
			<?php
			
			if(isset($_POST['name']) and isset($_POST['psw']))
			{
				$uname=$_POST['name']; 
			    $psw=$_POST['psw'];

				if($uname !="" and $psw!= "")
				{
			     $sql = "DELETE  FROM users WHERE username = '$uname' AND pasword = '$psw'";
			     echo "<h1>YOUR ACCOUNT HAS BEEN DELETED.</h1>";
			    }

			   
			}

			
			?>
			</center>
		</div>
	
	</div>

</body>
</html>