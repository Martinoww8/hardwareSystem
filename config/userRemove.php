<?php
    include 'db.php';
    $id = $_POST['userId'];
    $result = mysqli_query($conn, "DELETE FROM users WHERE id = '$id'");
    if($result){
        header('location: ../users.php');
    } else {
        echo "Error";
    }
?>