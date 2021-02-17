<?php 

include "connection.php";

$id = $_POST['user'];
$sq = $_POST['security'];

	// sql to delete a record
$sql = "SELECT pasword FROM users WHERE username = '$id' && security_question = '$sq' ";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

 if($count == 1){
            echo "Your password is ". $row['pasword'];
            
        }
        else{
            echo "Forget Password failed. Invalid username or security answer";
            
        }
		

?>

<form action = "index.php"> 

<br> <br>
<button> Go Main Page </button>

</form>