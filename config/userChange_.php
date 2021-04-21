<?php 
    include 'db.php';
    
    if(!isset($_POST['password'])){
        header('location: ../users.php'); 
    }
    $id = $_POST['id'];
    $pass = $_POST['password'];
    echo $pass;
    $isAdmin = $_POST['isAdmin'];
        if(strlen($pass) !== 0){
            $result = mysqli_query($conn, "UPDATE users SET password = '$pass', isAdmin = '$isAdmin' WHERE id = '$id'");
        } else {
            $result = mysqli_query($conn, "UPDATE users SET isAdmin = '$isAdmin' WHERE id = '$id'");
        }
        if($result){
           header('location: ../users.php');
        } else {
        echo "Error";
    }
?>