<?php

require 'dbconfig/config.php';
    @$age="";
    @$email="";
    @$name="";
    @$address="";
    @$username="";
    @$surname="";
    @$password="";
    @$password_check="";

?>

<!DOCTYPE html>
<html>
<head>
<title>Welcome to the Register page</title>
<link rel="stylesheet" href="assets/registerStyle.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&display=swap" rel="stylesheet">
</head>

<body>

  <div class="wrapper">
    <div class="title">
      Register Here
    </div>
    <div class="social_media">
      <div class="item">
        <i class="fab fa-facebook-f"></i>
      </div>
      <div class="item">
        <i class="fab fa-twitter"></i>
      </div>
      <div class="item">
        <i class="fab fa-google-plus-g"></i>
      </div>
    </div>

    <form action = "register.php" method = "post">
      <div class="form">
        <div class="input_field">
          <input type="text" placeholder="Username" name = "username" class="input" value = "<?php echo $username; ?>">
          <i class="fas fa-user"></i>
        </div>
        <div class="input_field">
          <input type="text" placeholder="Email" class="input" name = "email" value = "<?php echo $email; ?>">
          <i class="far fa-envelope"></i>
        </div>
        <div class = "input_field">
          <input type = "text" placeholder = "Address" class = "input" name = "address" value = "<?php echo $address; ?>">
          <i class="fas fa-map-marked-alt"></i>
        </div>
        <div class = "input_field">
          <input type = "text" placeholder = "Name" class = "input" name = "name" value = "<?php echo $name; ?>">
          <i class="fas fa-id-card"></i>
        </div>
        <div class = "input_field">
          <input type = "number" placeholder = "Age" class = "input" name = "address" value = "<?php echo $age; ?>">
          <i class="fas fa-id-card"></i>
        </div>
        <div class="input_field">
          <input type="password" placeholder="Password" class="input" name = "password" value = "<?php echo $password; ?>">
          <i class="fas fa-lock"></i>
        </div>
        <div class = "input_field">
          <input type = "password" placeholder = "Confirm Password" name = "password_check" class = "input" value="<?php echo $password_check; ?>">
          <i class="fas fa-lock"></i>
        </div>

        <div class="btn2">
          <button id = "btn2" class = "btn2" name = "register" type = "submit">Register</button>
        </div>

    </form>

      <div class="btn">
        <a href = "index.php">Back to Login</a>
      </div>


    </div>


  </div>



<?php

    if(isset($_POST['register'])){

        //echo '<script type="text/javascript">alert("Insert Clicked")</script>';
        @$age=$_POST['age'];
        @$username=$_POST['username'];
        @$email=$_POST['email'];
        @$password_check=$_POST['password_check'];
        @$password=$_POST['password'];
        @$surname=$_POST['surname'];
        @$address=$_POST['address'];
        @$name=$_POST['name'];
        $flag =true;

        if($age=="" || $username=="" || $email=="" || $password=="" || $password_check=="" || $surname =="" || $address =="" || $name =="")
        {
            echo '<script type="text/javascript">alert("Insert values in all fields")</script>';
        }
        else if($password != $password_check ){
            echo '<script type="text/javascript">alert("Passwords dont match")</script>';
        }
        $sql = "SELECT * FROM users U WHERE U.username = '$username'" ;
        $result = $con->query($sql);
        if ($result->num_rows !=0)
        {
            $flag=false;
            echo '<script type="text/javascript">alert("username allready exist")</script>';

        }
        $sql = "SELECT * FROM users U WHERE U.email ='$email'" ;
        $result = $con->query($sql);
        if ($result->num_rows !=0 )
        {
            $flag=false;
            echo '<script type="text/javascript">alert("email allready exist")</script>';
        }

        if(true){
            $sql = "INSERT INTO users (`age`, `email`, `name`, `points`, `address`, `pasword`, `username`, `registration_date`, `is_admin`) VALUES ('$age', '$email', '$name', '0', '$address', '$password', '$username', '2021-01-12 00:00:00', '0')";
            $query_run=mysqli_query($con,$sql);
            if($query_run)
            {
                    echo '<script type="text/javascript">alert("Values inserted successfully")</script>';
            }
            else{
                echo '<script type="text/javascript">alert("Values Not inserted")</script>';
            }
        }

    }

?>
</body>
</html>
