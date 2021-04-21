<?php 
    include 'db.php';

    if(!isset($_POST['employeeId'])){
        header('location: ../employees.php');
    }
    $id = $_POST['employeeId'];
    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $lname = $_POST['lname'];
    $branch = $_POST['branch'];
    $position = $_POST['position'];
    $phone = $_POST['phoneNumber'];
    $mobile = $_POST['mobile'];
    $ip = $_POST['ip'];
    $email = $_POST['email'];

    $result = mysqli_query($conn, "UPDATE employees SET employee_branch = '$branch', fname = '$fname' , sname = '$sname' , lname = '$lname' , position = '$position' , phoneNumber = '$phone' , mobileNumber = '$mobile', ip = '$ip' , email = '$email', lastUpdate = CURRENT_TIMESTAMP() WHERE employee_id = '$id'");
    if(!result){
        echo "Error while editing employee";
    } else {
        header('location: ../employeeView.php?employeeId='.$id);
    }
?>