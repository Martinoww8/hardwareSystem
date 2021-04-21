<?php 
    if(!isset($_GET['id'])){
        header('location: hardware.php');
    }

    include 'inc/header.php';
    include 'config/db.php';
    $id = $_GET['id'];
    $hardware = getHardwareInfo($id);
    //print_r($hardware);

?>

<h3 class="page-header">Hardware Edit</h3>

<form action="config/hardwareEdit_.php" method="POST">

    <p><span class="input-desc">Type: </span><input type="text" name="type" value="<?php echo $hardware['type']; ?>"></p>
    <p><span class="input-desc">Brand: </span><input type="text" name="brand" value="<?php echo $hardware['brand']; ?>"></p>
    <p><span class="input-desc">Model: </span><input type="text" name="model" value="<?php echo $hardware['model']; ?>"></p>
    <p><span class="input-desc">S/N: </span><input type="text" name="sn" value="<?php echo $hardware['sn'];  ?>"></p>
    <p><span class="input-desc">OS: </span><input type="text" name="os" value="<?php echo $hardware['os']; ?>"></p>
    <p><span class="input-desc">Size: </span><input type="text" name="size" value="<?php echo $hardware['size']; ?>"></p>
    <p><span class="input-desc">Info: </span><input type="text" name="info" value="<?php echo $hardware['info']; ?>"></p>
    <!-- <p><span class="input-desc">Status: </span><input type="text" name="status" value="<?php echo $hardware['status']; ?>"></p> -->
    <p><span class="input-desc">Given to: </span><select name="givenTo">
        <option value="0">Not given</option>
        <?php 
            $allEmployees = getAllEmployees();
            for($a = 0; $a < count($allEmployees); $a++){
                $employeeId = explode("-", $allEmployees[$a])[2];
                echo "<option value='" . $employeeId ."'";
                    if($id == $employeeId){
                        echo " selected ";
                    }
                echo ">" . $allEmployees[$a] . "</option>";
            }   
        ?>
    </select></p>
    <p><span class="input-desc">purchased: </span><input type="text" name="purchased" value="<?php echo $hardware['purchased']; ?>"></p>
    <input type="hidden" value="<?php echo $id; ?>" name="id">  
    <p> <span class="input-desc"></span><button type="submit">SUBMIT EDIT</button></p>
</form>


