<?php
  include 'searchHeader.php';
?>

<h1>Search Page</h1>

<form action = "willSearch.php" method = "POST">
    <p>Order by:
    <p>Price:<input type="checkbox" id="Price" ></p>
    <p>Distance:<input type="checkbox" id="Distance"></p>
    <p>Popularity:<input type="checkbox" id="Popularity"></p>
    <button type "submit" name = "submit">Search</button>
</form>


<div class = "ticket-container">
<?php
  session_start();
  if(isset($_POST['submit-search'])) {
    echo "Anan";

    $searchDep = mysqli_real_escape_string($conn, $_POST['departure']);
    $searchArr = mysqli_real_escape_string($conn, $_POST['arrival']);
    $searchDateBeg = date("Y-m-d", strtotime($_POST['departure-time-beg']));

    $_SESSION['departure'] = $searchDep;
    $_SESSION['arrival'] = $searchArr;
    $_SESSION['departure-time-beg'] = $searchDateBeg;

    if($searchDateBeg == "1970-01-01") {
        $sql = "SELECT * FROM flight WHERE Destination LIKE '%$searchArr%' AND Source LIKE '%$searchDep%'";
    } else {
        $sql = "SELECT * FROM flight WHERE Destination LIKE '%$searchArr%' AND Source LIKE '%$searchDep%' AND Departure_time LIKE '%$searchDateBeg%'";
    }

    $result = mysqli_query($conn, $sql);
    $queryResult = mysqli_num_rows($result);

    echo "There are " .$queryResult. " results!";

    if($queryResult > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        $diff = $row['Total_Seats'] - $row['Sold_Seats'];
        echo "<a href = 'flight.php?title=".$row['flight_id']."'><div class = 'ticket-box'>
          <h3>".$row['Source']. ' ' .$row['Destination']."</h3>
          <h4>".$row['Departure_time']. ' --- ' .$row['Arrival_time']. ' --> ' .$row['Current_price']. ' TL'."</h4>
          <p>".'Last ' .$diff. ' tickets left!'."</p>
        </div>";
      }
    } else {
      echo "There are no results.";
    }

  } else {
    if(!isset($_POST['Date']) && !isset($_POST['Point']) && !isset($_POST['Price']) && !isset($_POST['Distance'])) {
      $searchDep = $_SESSION['departure'];
      $searchArr = $_SESSION['arrival'];
      $searchDateBeg = $_SESSION['departure-time-beg'];

      if($searchDateBeg == "1970-01-01") {
          if(!isset($_POST['Price']) && !isset($_POST['Distance']) && !isset($_POST['Popularity'])) {
              echo "baban";
              $sql = "SELECT * FROM flight WHERE Destination LIKE '%$searchArr%' AND Source LIKE '%$searchDep%'";
          } elseif(!isset($_POST['Distance']) && !isset($_POST['Popularity'])) {
              $sql = "SELECT * FROM flight WHERE Destination LIKE '%$searchArr%' AND Source LIKE '%$searchDep%' ORDER BY Current_price";
          } elseif(!isset($_POST['Distance']) && !isset($_POST['Price'])) {
              $sql = "SELECT * FROM flight WHERE Destination LIKE '%$searchArr%' AND Source LIKE '%$searchDep%' ORDER BY Sold_Seats";
          } else {
              $sql = "SELECT * FROM flight WHERE Destination LIKE '%$searchArr%' AND Source LIKE '%$searchDep%' ORDER BY Distance";
          }
      } else {
          if(!isset($_POST['Price']) && !isset($_POST['Distance']) && !isset($_POST['Popularity'])) {
              $sql = "SELECT * FROM flight WHERE Destination LIKE '%$searchArr%' AND Source LIKE '%$searchDep%' AND Departure_time LIKE '%$searchDateBeg%'";
          } elseif(!isset($_POST['Distance']) && !isset($_POST['Popularity'])) {
              $sql = "SELECT * FROM flight WHERE Destination LIKE '%$searchArr%' AND Source LIKE '%$searchDep%' AND Departure_time LIKE '%$searchDateBeg%' ORDER BY Current_price";
          } elseif(!isset($_POST['Distance']) && !isset($_POST['Price'])) {
              $sql = "SELECT * FROM flight WHERE Destination LIKE '%$searchArr%' AND Source LIKE '%$searchDep%' AND Departure_time LIKE '%$searchDateBeg%' ORDER BY Sold_Seats";
          } else {
              $sql = "SELECT * FROM flight WHERE Destination LIKE '%$searchArr%' AND Source LIKE '%$searchDep%' AND Departure_time LIKE '%$searchDateBeg%' ORDER BY Distance";
          }
      }
      $result = mysqli_query($conn, $sql);
      $queryResult = mysqli_num_rows($result);
      if($queryResult > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          $diff = $row['Total_Seats'] - $row['Sold_Seats'];
          echo "<a href = 'flight.php?title=".$row['flight_id']."'><div class = 'ticket-box'>
            <h3>".$row['Source']. ' ' .$row['Destination']."</h3>
            <h4>".$row['Departure_time']. ' --- ' .$row['Arrival_time']. ' --> ' .$row['Current_price']. ' TL'."</h4>
            <p>".'Last ' .$diff. ' tickets left!'."</p>
          </div>";
        }
      } else {
        echo "There are no results.";
      }
    }
  }
 ?>

</div>
