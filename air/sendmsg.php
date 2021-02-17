<?php

$db = mysqli_connect('localhost', 'root', '', 'air');
if($db->connect_errno > 0) {
  die('Unable to connect database [' . $db->connect_error . ']');
}

if(isset($_POST['name'])) {
  $name = $_POST['name'];
  $surname = $_POST['surname'];

  echo $name . " " . $surname . "<br>";

  $sql_statement = "INSERT INTO "
}

else {
  echo "Nope";
}

?>
