<?php 
    include 'config/db.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Hardware Inventory</title>
</head>
<body>
    <div class="login-main">
        <div class="login">
        <p class="login-error" id="loginError" <?php if(isset($_GET['errorLogin'])){ echo "style='display:block'"; } ?> >Invalid username or password</p>
            <h3>Inventory System</h3>
            <div class="login-form">
                <form action="config/login-process.php" method="POST" id="loginForm">
                    <p><input type="text" name="username" placeholder="Username" id='loginUser'></p>
                    <p><input type="password" name="password" placeholder="Password" id='loginPass'></p>
                    <p><button type="button" onclick="login()" id='loginButton'>LOGIN</button></p>
                </form>
            </div>
        </div>
    </div>
</body>

<script>
    let inputPass= document.getElementById('loginPass');
    inputPass.addEventListener("keyup", function(event) {
    if (event.keyCode === 13) {
        event.preventDefault();
        document.getElementById("loginButton").click();
    }

    
});

    function login(){
        let username = document.getElementById('loginUser').value;
        let password = document.getElementById('loginPass').value;
        let button = document.getElementById('loginButton');
        let userRegex = /[A-Za-z0-9_.]/;
        let passRegex = /[A-Za-z0-9_.]/;
        if(userRegex.test(username) && passRegex.test(password)){
            document.getElementById("loginForm").submit();
        } else {
            document.getElementById("loginError").style.display = "block";
            document.getElementById("loginError").style.position = "";
        }
        
    }
</script>
</html>