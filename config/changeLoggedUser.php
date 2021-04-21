<?php 
    include 'db.php';
    include "func.php";

    $password = $_POST['newPassword'];
    $username = $_POST['username'];
    $id = userId($username);
    $result = mysqli_query($conn, "UPDATE users SET password = '$password' WHERE id = '$id'");
    if($result){
        header('location: ../profile.php?status=s');
    } else {
        header('location: ../profile.php?status=n');
    }

?>