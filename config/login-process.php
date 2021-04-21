<?php 
    session_start();
    include 'db.php';

    if(!isset($_POST['username'] , $_POST['password'])){
        header('location:../login.php');
    } else {
        $username = $_POST['username'];
        $password = $_POST['password'];
    }

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    if(!$result){
        die("Database access failed: " . mysqli_error()); 
    } 
        
    $rows = mysqli_num_rows($result);

    if($rows == 1){
        while($row = mysqli_fetch_array($result)){
            if($row['username'] == $username && $row['password'] == $password){
                header("location:../index.php");
                $_SESSION['login'] = true;
                $_SESSION['user_logged'] = $username;
            } else if($row[username] !== $username || $row[password] !== $password){
                header("location: ../login.php?errorLogin");
            }
        }
    } else {
        header("location: ../login.php?errorLogin");
    }
?>