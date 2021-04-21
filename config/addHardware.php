<?php 
    include 'db.php';

    if(!isset($_POST['submit'])){
        header('location: ../index.php');
    }


    // <p><span class="input-desc">Type:</span></p>
    // <select name="hardware-type" id="hardware-type">
    //     <option value="PC">PC</option>
    //     <option value="Laptop">Laptop</option>
    //     <option value="Monitor">Monitor</option>
    //     <option value="Printer">Printer</option>
    //     <option value="Other">Other</option>
    // </select>
    // <p><span class="input-desc">Brand:</span></p>
    // <input type="text" name="hardware-brand">
    // <p><span class="input-desc">Model:</span></p>
    // <input type="text" name="hardware-model">
    // <p><span class="input-desc">Serial Number: </span></p>
    // <input type="text" name="hardware-sn">
    // <p><span class="input-desc">Status: </span></p>
    // <input type="text" name="hardware-status">
    // <button type='button' name='submit'>ADD</button>
    
    $type = $_POST['hardware-type'];
    $brand = $_POST['hardware-brand'];
    $model = $_POST['hardware-model'];
    $sn = $_POST['hardware-sn'];
    $givenTo = $_POST['givenTo'];
    $os = $_POST['hardware-os'];
    $size = $_POST['hardware-size'];
    $info = $_POST['hardware-info'];
    $purchased = $_POST['hardware-purchased'];

    if(!$givenTo){
        $status = "In Stock";
    } else {
        $status = "In Use";
    }

    $sql = "INSERT INTO hardware(hardware_type, hardware_brand, hardware_model, hardware_sn,hardware_os,hardware_size,hardware_info,status,givenTo, purchased, lastUpdate) VALUES ('$type' , '$brand' , '$model' , '$sn' , '$os' , '$size' , '$info' , '$status' , '$givenTo' , '$purchased' , CURRENT_TIMESTAMP())";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        echo "Erorr while adding hardware";
    } else {
        header('location: ../hardware.php?type=all');
    }
?>