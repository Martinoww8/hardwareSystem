<?php 
    include 'inc/header.php';
    include 'config/db.php';

    if(!isset($_GET['hardwareId'])){
        header('location: hardware.php');
    }
    $hardwareId = $_GET['hardwareId'];
    $hardwareInfo = getHardwareInfo($hardwareId);
    // $result = mysqli_query($conn, "SELECT * FROM hardware WHERE hardware_id = '$hardwareId'");
    // if(mysqli_num_rows($result) > 0){
    //     while($row = mysqli_fetch_array($result)){
    //         $hardwareInfo = array("id" => $row['hardware_id'], "type" => $row['hardware_type'], "brand" => $row['hardware_brand'], 'model' => $row['hardware_model'], "sn" => $row['hardware_sn'], "os" => $row['hardware_os'], "size" => $row['hardware_size'], "info" => $row['hardware_info'], "status" => $row["status"], "givenTo" => $row['givenTo'], "purchased" => $row['purchased'] , "lastUpdate" => $row['lastUpdate']);
    //     }
    // }

    //print_r($hardwareInfo);
?>
<div>
<h3 class="page-header">Hardware Profile</h3>
<a href="hardwareEdit.php?id=<?php echo $hardwareId; ?>" class="edit_button"><button><i class="far fa-edit"></i> EDIT</button></a>
</div>

<div class="hardware-profile">
    <p><span class="hardware-desc">ID:</span><?php echo $hardwareInfo['id']; ?></p>   
    <p><span class="hardware-desc">Type: </span><?php echo $hardwareInfo['type']; ?></p>
    <p><span class="hardware-desc">Status: </span><?php echo $hardwareInfo['status']; ?> </p>
    <p><span class="hardware-desc">Given to: </span><?php echo $hardwareInfo['givenTo'];?></p>
    <p><span class="hardware-desc">Brand: </span><?php echo $hardwareInfo['brand']; ?></p>
    <p><span class="hardware-desc">Model: </span><?php echo $hardwareInfo['model']; ?> </p>
    <p><span class="hardware-desc">S/N: </span><?php echo $hardwareInfo['sn']; ?></p>
    <?php if($hardwareInfo['type'] == "PC"){
        echo "<p><span class='hardware-desc'>OS: </span>". $hardwareInfo['os'] ."</p>";
    } else if($hardwareInfo['type'] == "Monitor"){
        echo "<p><span class='hardware-desc'>Size: </span>". $hardwareInfo['size'] ."</p>";
    }
    ?>
    <p><span class="hardware-desc">Info: </span><?php echo $hardwareInfo['info']; ?></p>
    <p><span class="hardware-desc">Purchased: </span><?php echo $hardwareInfo['purchased']; ?></p>
    <p><span class="hardware-desc">Last Update: </span><?php echo $hardwareInfo['lastUpdate']; ?></p>

</div>