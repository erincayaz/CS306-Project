<?php
    session_start();
    include('connection.php');
    $username = $_POST['user'];
    $password = $_POST['pass'];

    $_SESSION['user'] = $_POST['user'];

        //to prevent from mysqli injection
        $username = stripcslashes($username);
        $password = stripcslashes($password);
        $username = mysqli_real_escape_string($con, $username);
        $password = mysqli_real_escape_string($con, $password);

        $sql = "select *from users where username = '$username' and pasword = '$password'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if($count == 1){
            if($row['is_admin'] == 1) {
              header("Location: admin.php");
            } else {
            echo "<h1><center> Login successful </center></h1>";
            header("Location: main.php");
            }
        }
        else{
            echo "<h1> Login failed. Invalid username or password.</h1>";
            header("Location: index.php");
        }
        exit;
?>