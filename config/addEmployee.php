<!-- <div class="modal-add-content">
        <span class="close">&times;</span>
        <h1>Add Employee</h1>
        <form action="config/addEmployee.php" method='POST'>
            <p><span class="input-desc">Branch: </span><select name="employee-branch" id="employee-branch">
                <option value="Sofia">Sofia</option>
                <option value="Plovdiv">Plovdiv</option>
                <option value="Burgas">Burgas</option>
                <option value="Varna">Varna</option>
                <option value="Ruse">Ruse</option>
            </select></p>
            <p><span class="input-desc">First Name:</span><input type="text" name="employee-fname"></p>
            <p><span class="input-desc">Second Name:</span><input type="text" name="employee-sname"></p>
            <p><span class="input-desc">Last Name:</span><input type="text" name="employee-lname"></p>
            <p><span class="input-desc">Position:</span><input type="text" name="employee-position"></p>
            <p><span class="input-desc">Phone number:</span><input type="text" name="employee-phoneNumber"></p>
            <p><span class="input-desc">Mbile number:</span><input type="text" name="employee-mobileNumber"></p>
            <p><span class="input-desc">IP Address:</span><input type="text" name="employee-ip"></p>
            <p><span class="input-desc">Email:</span><input type="text" name="employee-email"></p>
            <button type='submit'>ADD</button> -->

<?php 
    include 'db.php';
    if(!isset($_POST['addEmployee'])){
        header("location: ../index.php");
    }

    $employee_branch = $_POST['employee-branch'];
    $employee_fname = $_POST['employee-fname'];
    $employee_sname = $_POST['employee-sname'];
    $employee_lname = $_POST['employee-lname'];
    $employee_position = $_POST['employee-position'];
    $employee_phoneNumber = $_POST['employee-phoneNumber'];
    $employee_mobileNumber = $_POST['employee-mobileNumber'];
    $employee_ip = $_POST['employee-ip'];
    $employee_email = $_POST['employee-email'];


    $sql = "INSERT INTO employees(employee_branch, fname, sname, lname, position, phoneNumber, mobileNumber, ip, email, lastUpdate) VALUES('$employee_branch','$employee_fname','$employee_sname','$employee_lname','$employee_position','$employee_phoneNumber','$employee_mobileNumber','$employee_ip','$employee_email',CURRENT_TIMESTAMP())";
    $result = mysqli_query($conn, $sql);
    if(!$result){
       echo "Error while adding employee..";
    } else {
         header('location: ../index.php');
    }
?>