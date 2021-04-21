<?php 
    if(!isset($_GET['id'])){
        header('location: users.php');
    }
    include 'inc/header.php';
    include 'config/db.php';

    if(!isAdmin($_SESSION['user_logged'])){
        echo "<h3> User doesn't have permissions</h3>";
    } else {
    
    $userId = $_GET['id'];

?>

        <h3 class="page-header">User Change</h3>

        <!-- Remove button "REMOVE" for logged user -->
        <?php if($userId !== userId($_SESSION['user_logged'])){  ?>
        <a id="myBtn" onclick="showModal()"><button class="userRemoveButton"><i class="far fa-trash-alt"></i> Delete user</button></a>
        <?php }; ?>


        <?php 
            $result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$userId'");
            if(mysqli_num_rows($result) == 1){
                while($row = mysqli_fetch_array($result)){
                    echo "<form action='config/userChange_.php' method='POST' id='userChangeForm'> 
                    <p>Username: <b>". $row['username'] ." </b></p>
                    <p>New Password: <input type='text' name='password' id='password'></p>
                    <p>Confirm Password <input type='text' name='password2' id='password2'></p>
                    <p>Admin permissions: <select name='isAdmin'> 
                        <option value='0'>No</option>
                        <option value='1'>Yes</option>
                    </select></p>
                    <input type='hidden' name='id' value='" . $userId ."'>
                    <button type='button' id='userChangeBtn' name='userChangeSubmit'>Save changes </button>
                    </form>";
                }
            }
        ?>

        <form action="config/userRemove.php" style="display:none;" id="userRemove" method="POST">
            <input type="text" name="userId" value="<?php echo $userId; ?>">
        </form>

<div class='modal-add' id="myModal" style="display:none;">

<div class="modal-add-content">
    <span class="close">&times;</span>
    <p>Are you sure you want to delete that profile?</p>
    <a><button id='userRemoveBtn'>YES</button></a>
    <p id="closeModal"><button>NO</button></p>
    
</div>
</div>

        <script src='js/func.js'></script>

        <script>

            //User info validation
            let userBtn = document.getElementById('userChangeBtn');
            userBtn.onclick = function(){
                let password = document.getElementById('password');
                let password2 = document.getElementById('password2');
                if(password.value !== password2.value){
                    alert('Passwords are not matching');
                }else {
                    document.getElementById('userChangeForm').submit();
                }
            }

            //Modal box

            var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
var denyButton = document.getElementById("closeModal");

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

denyButton.onclick = function(){
    modal.style.display = "none";
}

//Remove User

document.getElementById('userRemoveBtn').onclick = function(){
    document.getElementById("userRemove").submit();
}


        </script>
    

<?php 
    }
?>