<?php 
    include 'inc/header.php';
    include 'config/db.php';

    if(!isset($_GET['type'])){
        $sql = "SELECT  *FROM hardware";
    } else {
        $hardwareType = $_GET['type'];
        if($hardwareType == "all"){
            $sql = "SELECT * FROM hardware";
        } else if($hardwareType == "pc"){
            $sql = "SELECT * FROM hardware WHERE hardware_type = 'PC'";
        } else if($hardwareType == "laptop"){
            $sql = "SELECT * FROM hardware WHERE hardware_type = 'laptop'";
        } else if($hardwareType == 'monitor'){
            $sql = "SELECT * FROM hardware WHERE hardware_type = 'monitor'";
        } else if($hardwareType == "printer"){
            $sql = "SELECT * FROM hardware WHERE hardware_type = 'printer'";
        } else {
            $sql = "SELECT  *FROM hardware";
        }
    }

    if(isset($_GET['search'])){
        $search = $_GET['search'];
        $sql = "SELECT * FROM hardware WHERE hardware_type LIKE '%{$search}%' OR hardware_brand LIKE '%{$search}%' OR hardware_model LIKE '%{$search}%' OR hardware_sn LIKE '%{$search}%' OR hardware_os LIKE '%{$search}%' OR hardware_size LIKE '%{$search}%' OR status LIKE '%{$search}%' OR purchased LIKE '%{$search}%'";
    }
?>
<h3 class="page-header">Hardware</h3>

<div class='hardware-bar'>
        <a class="add-hardware" id="myBtn" onclick="showModal()">
                <button>Add Hardware <i class="fas fa-plus-square"></i></button>
        </a>
        <form action="" method='get'>
            <input type="text" name='search' placeholder="Search">
            <button type='submit'><i class="fas fa-search"></i> SEARCH</button>
        </form>
</div>

<div class='modal-add' id="myModal" style="display:none;">

    <div class="modal-add-content">
        <span class="close">&times;</span>
        <h1>Add hardware</h1>
        <form action="config/addHardware.php" method='POST'>
            <p><span class="input-desc">Type:</span></p>
            <select name="hardware-type" id="hardware-type">
                <option value="PC">PC</option>
                <option value="Laptop">Laptop</option>
                <option value="Monitor">Monitor</option>
                <option value="Printer">Printer</option>
                <option value="Other">Other</option>
            </select>
            <p><span class="input-desc">Brand:</span></p>
            <input type="text" name="hardware-brand">
            <p><span class="input-desc">Model:</span></p>
            <input type="text" name="hardware-model">
            <p><span class="input-desc">Serial Number: </span></p>
            <input type="text" name="hardware-sn">
            <p><span class="input-desc">OS: </span></p>
            <input type="text" name="hardware-os">
            <p><span class="input-desc">Size (Monitor only): </span></p>
            <input type="text" name="hardware-size">
            <p><span class="input-desc">Purchased: </span></p>
            <input type="text" name="hardware-purchased">
            <p><span class="input-desc">Additional info: </span></p>
            <textarea name="hardware-info" id="hardware-info" cols="30" rows="10"></textarea>
            <!-- <p><span class="input-desc">Status: </span></p>
            <input type="text" name="hardware-status"> --> 
            <p><span class="input-desc">Given to:</span></p>
            <select name="givenTo" id="givenTo">
                <option value="0">Not given</option>
                <?php 
                    $allEmployees = getAllEmployees();
                    for($a = 0; $a < count($allEmployees); $a++){
                        $employeeId = explode("-", $allEmployees[$a])[2];
                        echo "<option value='" . $employeeId ."'>" . $allEmployees[$a] . "</option>";
                    }   
                ?>
            </select>
            <button type='submit' name='submit'>ADD</button>
            </select>
        </form>
    </div>
</div>
<div class='hardware-table'>
    
        <?php 
            $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) !== 0){
                    echo "<table>
                            <tr>
                                <th>ID</th>
                                <th>Type</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>S/N</th>
                                <th>Status</th>
                                <th>Given to</th>
                                <th>Edit</th>
                            </tr>"; 
                    while($row = mysqli_fetch_array($result)){
                        $hardwareId = $row['hardware_id'];
                        echo "<tr> <td>".$row['hardware_id'] . "</td><td>" . $row['hardware_type']."</td><td>".$row['hardware_brand']."</td><td>".$row['hardware_model']."</td><td>".$row['hardware_sn']."</td><td>" . $row['status'] ."</td>";
                        if($row['givenTo'] !== 0){
                            $employeeId = $row['givenTo'];
                            $employee_result = mysqli_query($conn, "SELECT fname, lname FROM employees WHERE employee_id = '$employeeId'");
                            $employeeNames;
                            if(mysqli_num_rows($employee_result) > 0){
                                while($row = mysqli_fetch_array($employee_result)){
                                    $employeeNames = $row['fname'] . " " . $row['lname'];
                                }
                                echo "<td>" . $employeeNames . "</td>";
                            } else {
                                echo "<td></td>";
                            }   
                        } else {
                            echo "<td> - <td>";
                        }
                        echo "<td><a href='hardwareView.php?hardwareId=".$hardwareId ."'><button class='hardwares_view_button'>View</button> </a></td>";
                    } 
                } else {
                    echo "<h4>No hardware records</h4>";
                }
        ?>
        </tr>
    </table>
</div>

<script>
    var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
function showModal() {
  modal.style.display = "block";
  modal.style.zIndex="10";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>