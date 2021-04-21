<?php 
session_start();
if(!isset($_SESSION['login'])){
    header("location:login.php");
}
if(!isset($_SESSION['user_logged'])){
    header('location:login.php');
}
include 'config/func.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="font/css/all.css">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <title>Hardware System</title>
</head>
<body>
<div class="main-nav">
    <a href="index.php">
        <div class='logo'>
            <p>Hardware System</p>
        </div>
    </a>
    <div class="user" id="userDiv" onclick='showUser()'>
        <p> <img src="style/images/profile-user.png" alt="profile-user" height="30px" width="30px"> <?php echo $_SESSION['user_logged']; ?> <!-- <img src="style/images/arrowDown.png" id="userArrow" alt="down-arrow" height="15px" width="15px">--> <i class="fa fa-caret-down"></i> </p>
    </div>
    <div class="user-dropmenu" id="userDropdown" style="display:none"> 
        <a href='profile.php'> <p>Profile</p> </a>
        <a href='config/logout.php'> <p>Logout</p> </a>
    </div>
</div>

<!-- Left sidebar navigation -->
<div class="left-nav" id="leftnav">
    <a href="employees.php" class="left-nav-item">
    <div>
        <p><i class="fas fa-user-friends"></i> Employees </p>
    </div>
    </a>
    <a  class="left-nav-item" id="left-nav-item-dropdown" onclick="leftNavDropdown()">
        <div id="left-nav-item-dropdown-div">
            <p><i class="fas fa-server"></i> Hardware  <i class="fa fa-caret-down"></i></p>
    </div>
    </a>
    <div class='left-nav-subitems' id="left-nav-subitems" style="display:none">
            <a href="hardware.php?type=all">
                <div>
                    <p>All hardware</p>
                </div>
            </a>
            <a href="hardware.php?type=pc">
                <div>
                    <p><i class="fas fa-hdd"></i> Computers</p>
                </div>
            </a>
            <a href="hardware.php?type=laptop">
                <div>
                    <p><i class="fas fa-laptop"></i> Laptops</p>
                </div>
            </a>
            <a href="hardware.php?type=monitor">
                <div>
                    <p><i class="fas fa-desktop"></i> Monitors</p>
                </div>
            </a>
            <a href="hardware.php?type=printer">
                <div>
                    <p><i class="fas fa-print"></i> Printers</p>
                </div>
            </a>
        </div>
        <a href="users.php" class="left-nav-item">
    <div <?php echo isAdmin($_SESSION['user_logged']) ? "" : "style='display:none;'";?>>
        <p><i class="fas fa-user-cog"></i> Manage Users </p>
    </div>
    </a>
    <div class='left-nav-date'>
        <?php echo "<p>" . date("D d M Y") . "</p>"; ?>
    </div>
        <div class="hide-button" id="hide-button" onclick="hideNavigation()">
        <p>Hide navigation <i class="fas fa-angle-double-left"></i></p>
    </div>
</div>
<div class='main' id="mainDiv">

<!-- button leftSide navigation -->

<div id="showLeftNavigation" onclick="showNavigation()">
    <p><i class="fas fa-angle-double-right"></i></p>
</div>

<!-- Modal Box Employee -->

<div id="modalEmployee" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span id="closeEmployeeModal">&times;</span>
    <p>Some text in the Modal..</p>
  </div>

</div>


<script>
    let userDropdown = document.getElementById("userDropdown");
    function showUser(){
            if(userDropdown.style.display == "none"){
                userDropdown.style.display = "block";
            } else {
                userDropdown.style.display="none";
            }
        }

    //left side navigation dropdown 

    let dropdownButton = document.getElementById("left-nav-item-dropdown-div");
    let dropdownSection = document.getElementById("left-nav-subitems");

    function leftNavDropdown(){
        if(dropdownSection.style.display === "none"){
            dropdownButton.style.backgroundColor = "#44638b";
            dropdownSection.style.display = "block";
        } else {
            dropdownSection.style.display = "none";
            dropdownButton.style.backgroundColor = "#233143"
        }
    }

    //hide left navigation
    let leftSideNavigation = document.getElementById("leftnav");
    let mainDiv = document.getElementById("mainDiv");
    let showNavigationButton = document.getElementById("showLeftNavigation");
    function hideNavigation(){
            leftSideNavigation.style.display = "none";
            mainDiv.style.margin = "0px";
            showLeftNavigation.style.display = "block";
    }

    function showNavigation(){
        leftSideNavigation.style.display = "block";
        mainDiv.style.marginLeft = "220px";
        showNavigationButton.style.display = "none";
    }







</script>

