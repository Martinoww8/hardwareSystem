<?php 
    include 'inc/header.php';
    include 'config/db.php';
?>

<h3 class="page-header">Profile</h3>

<!-- <div class="users-table" id="userTable">
        <table>
            <tr>
                <th>Username</th>
                <th>Admin permissions</th>
                <th>Change</th>
            </tr>
            <?php 
                $users = mysqli_query($conn, "SELECT * FROM users");
                $username;
                $isAdmin;
                if(mysqli_num_rows($users) > 0){
                    while($user = mysqli_fetch_array($users)){
                            $username = $user['username'];
                            $isAdmin = $user['isAdmin'];
                    }
                }
            ?>
        </table>
    </div> -->

    <div class="userChange" id="userChangeDiv" style="">
        <div class="profileInfo"> 
        <p>Username: <b><?php echo $username; ?></b></p>
        <p>Admin permissions: <?php echo isAdmin($username) ? "Yes" : "No";?></p>
        <p><button id="changePassword">Change Password</button></p>
            </div>
        <div class="changePassword" style="display:none" id="changePasswordDiv">
        <form action="config/changeLoggedUser.php" method="POST" id="changeLoggedUser">
            <input type="hidden" name="username" value="<?php echo $username?>">
            <p>New Password: <input type="text" name='newPassword' id="newPassword"></p>
            <p>Confirm Password: <input type="text" name='newPassword2' id="newPassword2"></p>
            <button id="changePasswordBtn" type="button">Save changes</button>
            </form>
        </div>
    </div>

    <?php 
        if(isset($_GET['status']) && $_GET['status'] == 's'){
            echo "<p>Password was changed successfully!</p>"; 
        } else if(isset($_GET['status']) && $_GET['status'] == 'n'){
            echo "<p>Error while changing password..</p>";
        }
    ?>

    <script>
        document.getElementById('changePassword').onclick = function(){
            document.getElementById('changePasswordDiv').style.display = "block";
        }

        document.getElementById('changePasswordBtn').onclick = function(){
            let pass = document.getElementById('newPassword').value;
            let pass2 = document.getElementById('newPassword2').value;
            let regex = /[\w\W]{8,}/g;
            if(regex.test(pass)){
                if(pass === pass2){
                    document.getElementById("changeLoggedUser").submit();
                } else {
                    alert("Passwords do not match!");
                }
            } else {
                alert("Invalid Password!");
            }
        }
    </script>