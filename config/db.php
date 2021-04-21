<?php 

    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "hardwareSystem";

    $conn = new mysqli($db_host, $db_user,$db_pass, $db_name);

    if(!$conn){
        echo "Error: " . $conn->connect_error;
    }


?>