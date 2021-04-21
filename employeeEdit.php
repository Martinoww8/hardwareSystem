<?php 
    include 'inc/header.php';
    $employee = getEmployeeInfo($_GET['employeeId']);
?>

<h3 class="page-header">Employee Edit</h3>

<form action="config/employeeEdit_.php" method="POST">
<table>
    <tr>
        <td><b>First name</b></td>
        <td><input type='text' name='fname' value='<?php echo $employee['fname']; ?>'</td>
    </tr>
    <tr>
        <td><b>Second name</b></td>
        <td><input type='text' name='sname' value='<?php echo $employee['sname']; ?>'</td>
    </tr>
    <tr>
        <td><b>Last name</b></td>
        <td><input type='text' name='lname' value='<?php echo $employee['lname']; ?>'</td>
    </tr>
    <tr>
        <td><b>Branch</b></td>
        <td><input type='text' name='branch' value='<?php echo $employee['branch']; ?>'</td>
    </tr>
    <tr>
        <td><b>Position</b></td>
        <td><input type='text' name='position' value='<?php echo $employee['position']; ?>'</td>
    </tr>
    <tr>
        <td><b>Email</b></td>
        <td><input type='text' name='email' value='<?php echo $employee['email']; ?>'</td>
    </tr>
    <tr>
        <td><b>Phone</b></td>
        <td><input type='text' name='phoneNumber' value='<?php echo $employee['phoneNumber']; ?>'</td>
    </tr>
    <tr>
        <td><b>Mobile</b></td>
        <td><input type='text' name='mobileNumber' value='<?php echo $employee['mobileNumber']; ?>'</td>
    </tr>
    <tr>
        <td><b>IP</b></td>
        <td><input type='text' name='ip' value='<?php echo $employee['ip']; ?>'</td>
    </tr>
    <tr>
        <td><input type="hidden" name='employeeId' value="<?php echo $employee['id']; ?>"></td>
        <td><button type='submit' value="submit">SUBMIT CHANGES</button></td>
    </tr>
</table>
</form>

