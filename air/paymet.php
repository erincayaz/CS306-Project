<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "air";

$conn = mysqli_connect($server, $username, $password, $dbname);
$flightid = mysqli_real_escape_string($conn, $_GET['title']);

$sql = "SELECT * FROM flight WHERE flight_id = '$flightid'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);


require 'dbconfig/config.php';
  @$date="";
  @$name="";
  @$cvv="";
  @$number="";
  @$ssn="";
  @$bankname="";
  @$type="";
  @$pin="";
  @$class="";


  //fill here with post method
  @$cost=$row['Current_price'];
  @$departure_location=$row['Source'];
  @$plane_no=$row['Plane_no'];
  @$Departure_time=$row['Departure_time'];
  @$Arrival_time=$row['Arrival_time'];
  @$Arrival_location=$row['Destination'];
  @$flight_id=$row['flight_id'];

  @$Payment_no = $cost.$plane_no;


  @$ticket_no=$flight_id.$plane_no;



  @$Earned_points=$cost/10;
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 10%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 100px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

<h2>Login to ticket.com</h2>

  <div class="imgcontainer">
    <img src="https://www.bbt.com/content/dam/bbt/bbtcom/landscape/personal/banking/credit-cards/bright-card.png.transform/scale-to-half/image.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label><b>Name</b></label>
    <input type="text" placeholder="Enter Card holder name" name="name" value="<?php echo $name; ?>" required>

    <label><b>Number</b></label>
    <input type="text" placeholder="Enter card number" name="number" value="<?php echo $number; ?>" required>

    <label><b>Date</b></label>
    <input type="text" placeholder="Enter dates" name="date" value="<?php echo $date; ?>" required>

    <label><b>CVV</b></label>
    <input type="text" placeholder="Enter CVV" name="cvv" value="<?php echo $cvv; ?>" required>

    <label><b>Bank Name</b></label>
    <input type="text" placeholder="Enter bank name" name="bankname" value="<?php echo $bankname; ?>" required>

    <label><b>Pin</b></label>
    <input type="text" placeholder="Enter Pin" name="pin" value="<?php echo $pin; ?>" required>

    <label><b>credit or debeit</b></label>
    <input type="text" placeholder="Enter card type" name="type" value="<?php echo $type; ?>" required>

    <label><b>SSN</b></label>
    <input type="text" placeholder="Enter ssn" name="ssn" value="<?php echo $ssn; ?>" required>

   <label><b>class</b></label>
    <input type="text" placeholder="Enter class E for economy B for Business any other answer consider as economy" name="class" value="<?php echo $class; ?>" required>

  <?php
    if($class == 'B')
    {
      $cost=$cost*2;
    }
  ?>
  <html>
  <body>
  <form action="search.php" method="post" >
  <button button id="lol" type="submit">Payment</button>
      <?php
        $sql = "INSERT INTO 'payment' (`Payment_no`, `Name`, `Bank`, `Pin`, `Card_no`, `Type`) VALUES ('$Payment_no', '$name', '$bankname', '$pin', '$number', '$type');";
        $query_run=mysqli_query($conn,$sql);

        $sql = "INSERT INTO `ticket` (`name`, `departure_location`, `plane_no`, `class`, `date_of_fligth`, `seat_no`, `duration_in_min`, `SSN`, `Departure_time`, `Arrival_time`, `Earned_points`, `Arrival_location`, `ticket_no`, `flight_id`, `cost`) VALUES ('$name', '$departure_location', '$plane_no', '$class', '$Departure_time', '12', '100', '$ssn', '$Departure_time', '$Arrival_time', '$Earned_points', '$Arrival_location', '$ticket_no', '$flight_id', '$cost');";
        $query_run=mysqli_query($conn,$sql);

        $sql = "INSERT INTO `receive_relation` (`ticket_no`, `payment_no`) VALUES ('$ticket_no', '$Payment_no');";
        $query_run=mysqli_query($conn,$sql);
        if($query_run)
        {
          echo '<script type="text/javascript">alert("Payment successfully")</script>';
        }
        else
        {
          echo '<script type="text/javascript">alert("Try again something wrong")</script>';
        }


  ?>

  </body>
  </html>
