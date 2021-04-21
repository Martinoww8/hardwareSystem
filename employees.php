<?php
    include 'inc/header.php';
    include 'config/db.php';
?>

    <h3 class="page-header">Employees</h3>

    <div class='employees-search'>
        <a class="add-employee" id="myBtn" onclick="showModal()">
                <button>Add Employee <i class="fas fa-plus-square"></i></button>
        </a>
        <form action="" method='get'>
            <input type="text" name='search' placeholder="Search">
            <button type='submit'><i class="fas fa-search"></i> SEARCH</button>
        </form>
</div>

<!-- Modal box add Employee --> 
<div class='modal-add' id="myModal" style="display:none;">

    <div class="modal-add-content">
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
            <p><span class="input-desc">First Name:</span><input type="text" name="employee-fname" id="employee-fname"></p>
            <p><span class="input-desc">Second Name:</span><input type="text" name="employee-sname" id="employee-sname"></p>
            <p><span class="input-desc">Last Name:</span><input type="text" name="employee-lname" id="employee-lname"></p>
            <p><span class="input-desc">Position:</span><input type="text" name="employee-position" id="employee-position"></p>
            <p><span class="input-desc">Phone number:</span><input type="text" name="employee-phoneNumber" id="employee-phoneNumber"></p>
            <p><span class="input-desc">Mbile number:</span><input type="text" name="employee-mobileNumber" id="employee-mobileNumber"></p>
            <p><span class="input-desc">IP Address:</span><input type="text" name="employee-ip" id="employee-ip"></p>
            <p><span class="input-desc">Email:</span><input type="text" name="employee-email" id="employee-email"></p>
            <button type='button' name="addEmployee" onclick='addEmployee()' >ADD</button>
            </select>
        </form>
    </div>
</div>
<!-- End of modal box --> 

        <?php
        if(isset($_GET['search'])){
            $search = $_GET['search'];
            $result = mysqli_query($conn, "SELECT * FROM employees WHERE employee_branch LIKE '%{$search}%' OR fname LIKE '%{$search}%' OR sname LIKE '%{$search}%' OR lname LIKE '%{$search}%' OR position LIKE '%{$search}%' OR phoneNumber LIKE '%{$search}%' OR mobileNumber LIKE '%{$search}%' OR ip LIKE '%{$search}%' OR email LIKE '%{$search}%'");
        } else {
            $result = mysqli_query($conn, "SELECT * FROM employees");
        }
    if(mysqli_num_rows($result) > 0){
        echo "<div class='employees-table'>
        <table>
            <tr>
                <th>ID</th>
                <th>Branch</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Position</th>
                <th>Email</th>
                <th>Last Update</th>
                <th>Edit</th>
            </tr>"; 
        while($row = mysqli_fetch_array($result)){
        echo "<tr><td>" . $row['employee_id'] . "</td><td>" . $row['employee_branch'] . "</td><td>" . $row['fname'] . "</td><td>" . $row['lname'] . "</td> <td>" . $row['position'] . "</td> <td>". $row['email'] . " </td> <td>". $row['lastUpdate'] . "</td><td> <a href='employeeView.php?employeeId=" . $row['employee_id'] . "'><button class='employees_view_button'>View</button> </a></td></tr>";
        }
    } else {
        echo "No results";
    }
        ?>
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

// Validation of Add Employee input values

function addEmployee(){
    // let branch = document.getElementById("employee-branch").value;
    // let fname = document.getElementById("employee-fname").value;
    // let sname = document.getElementById("employee-sname").value;
    // let lname = document.getElementById('employee-lname').value;
    // let position = document.getElementById('employee-position').value;
    // let phoneNumber = document.getElementById("employee-phoneNumber").value;
    // let mobileNumber = document.getElementById("employee-mobileNumber").value;
    // let ip = document.getElementById("employee-ip").value;
    // let mail = document.getElementById('employee-email').value;

    console.log(branch);
}
</script>

<?php 
include "inc/footer.php"; 
?>