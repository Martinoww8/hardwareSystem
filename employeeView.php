<?php 
   if(!isset($_GET['employeeId'])){
    header("location: index.php");
}
    include 'inc/header.php';
    include 'config/db.php';

    $employeeId = $_GET['employeeId'];
    $employee = getEmployeeInfo($employeeId);
    // $employee;
    // $result = mysqli_query($conn, "SELECT * FROM employees WHERE employee_id = '$employeeId'");
    // if(mysqli_num_rows($result) !== 1){
    //     echo "Error";
    // } else {
    //     while($row = mysqli_fetch_array($result)){
    //         $employee = array('id' => $row['employee_id'] ,'branch' => $row["employee_branch"],'fname' => $row["fname"],'sname' =>  $row['sname'] ,'lname' => $row['lname'], 'position' =>  $row['position'] ,'phoneNumber' => $row['phoneNumber'] ,'mobileNumber' => $row['mobileNumber'] ,'ip' => $row['ip'] ,'email' => $row['email'] ,'lastUpdate' => $row['lastUpdate']);
    //     }

    // $employee ARRAY
    // 0 => id
    // 1 => branch
    // 2 => fname
    // 3=> sname 
    // 4 => lname 
    // 5 => position
    // 6 => phoneNumber
    // 7 => mobileNumber
    // 8 => ip
    // 9 => email
    // 10 => lastUpdate
    // 11 - 29 => hardware[1 - 19] 
    ?>

<div> <h3 class="page-header">Employee Profile</h3> 
    <a href="employeeEdit.php?employeeId=<?php echo $employeeId; ?>" class="edit_button">
        <button type='button'><i class="far fa-edit"></i> EDIT</button>
    </a>
</div>

<hr style="height:3px; margin:0; padding:0;">

    <div class="person_profile">
        <p><span class="employee_desc">ID: </span><?php echo $_GET['employeeId']; ?></p>
        <p><span class="employee_desc">Person: </span><?php echo $employee['fname'] . " " . $employee['sname'] . " " . $employee['lname']; ?></p>
        <p><span class="employee_desc">Branch: </span><?php echo $employee['branch']; ?></p>
        <p><span class="employee_desc">Position: </span><?php echo $employee['position']; ?></p>
        <p><span class="employee_desc">Mobile number: </span><?php echo $employee['mobileNumber'];?> </p>
        <p><span class="employee_desc">Phone number: </span><?php echo $employee['phoneNumber']; ?></p>
        <p><span class="employee_desc">Email: </span><?php echo $employee['email'];?></p>
        <p><span class="employee_desc">IP: </span><?php echo $employee['ip']; ?> </p>
    <hr style="height:3px; margin:0; padding:0;">
    </div>

    <div class="person_hardware"> 
        <h4>Hardware</h4>
        <?php 
            // for($a = 11; $a<30;$a++){
            //     if($employee[$a] !== 0){
            //         $hardware_result = mysqli_query($conn, "SELECT * FROM hardware WHERE hardware_id = '$employee[$a]'");
            //         if(mysqli_num_rows($hardware_result) == 1){
            //             while($row = mysqli_fetch_array($hardware_result)){
            //                 echo "<tr><td>" . $row['hardware_id'] . "</td> <td>" . $row['hardware_type'] . "</td><td>" . $row['hardware_brand'] . "</td><td>" . $row['hardware_model'] . "</td> <td>" . $row['hardware_sn'] . "</td> <td>" . $row['hardware_os'] . "</td><td>" . $row['hardware_size'] . "</td><td>" . $row['hardware_info'] . "</td> </tr>";
            //             }
            //         }
            //     }
            // }

            $hardware_result = mysqli_query($conn, "SELECT * FROM hardware WHERE givenTo = '$employeeId'");
            if(mysqli_num_rows($hardware_result) > 0){
                echo "<table class='employee_hardware_table'
                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>S/N</th>
                    <th>OS</th>
                    <th>Size</th>
                    <th>Info</th>
                    <th>Status</th>
                    <th>View </th>
                </tr>"; 

                while($row = mysqli_fetch_array($hardware_result)){
                    echo "<tr><td>" . $row['hardware_id'] . "</td> <td>" . $row['hardware_type'] . "</td><td>" . $row['hardware_brand'] . "</td><td>" . $row['hardware_model'] . "</td> <td>" . $row['hardware_sn'] . "</td> <td>" . $row['hardware_os'] . "</td><td>" . $row['hardware_size'] . "</td><td>" . $row['hardware_info'] . "</td><td>". $row['status'] ."</td><td><a href='hardwareView.php?hardwareId=" . $row['hardware_id'] ."'><button>VIEW</button></a></td></tr>";
                }
            } else {
                echo "<p>No given hardware to this profile.</p>";
            }
        ?>
        </table>
        </div>