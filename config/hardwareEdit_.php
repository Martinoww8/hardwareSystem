<?php 
    include 'db.php';
    
    if(!isset($_POST["id"])){
        header('location: ../hardware.php?type=all');
    }

    $id = $_POST['id'];
    $type = $_POST['type'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $sn = $_POST['sn'];
    $os = $_POST['os'];
    $size = $_POST['size'];
    $info = $_POST['info'];
    $givenTo = $_POST['givenTo'];
    $purchased = $_POST['purchased'];

    if($givenTo){
        $status = "In Use";
    } else {
        $status = "In Stock";
    }

    $result = mysqli_query($conn, "UPDATE hardware SET hardware_type = '$type' , hardware_brand = '$brand', hardware_model = '$model', hardware_sn = '$sn', hardware_os = '$os' , hardware_size = '$size', hardware_info = '$info' , status = '$status' , purchased = '$purchased', givenTo = '$givenTo' , lastUpdate = CURRENT_TIMESTAMP() WHERE hardware_id = '$id'"); 
    if(!$result){
        echo "Error while updating hardware record";
    } else {
        header('location: ../hardwareView.php?hardwareId=' . $id);
    }
?>


