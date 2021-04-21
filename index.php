<?php
    include 'inc/header.php';
    include 'config/db.php';

    $employees_number = mysqli_num_rows(mysqli_query($conn, "SELECT *FROM employees"));
    $pc_number = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM hardware WHERE hardware_type ='PC'"));
    $laptop_number = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM hardware WHERE hardware_type ='Laptop'"));
    $monitor_number = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM hardware WHERE hardware_type = 'Monitor'"));
    $printer_number = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM hardware WHERE hardware_type = 'Printer'"));
    
    ?>
    <div class="dashboard-header">
        <h3 class='page-header'>Dashboard</h3>
        <div class="flex-container">
            <a href="employees.php">
            <div class="dashboard-item" id="dashboard-employees">
                <img src="style/images/user.png" alt="user-icon">
                <p>Employees:
                    <?php echo $employees_number; ?>
                </p> 
            </div>
            </a>
            <a href="hardware.php?type=pc">
            <div class="dashboard-item" id="dashboard-computers">
                <img src="style/images/computer.png" alt="pc-icon">
                <p>PC: <?php echo $pc_number; ?></p> 
            </div>
            </a>
            <a href="hardware.php?type=laptop">
            <div class="dashboard-item" id="dashboard-laptops">
                <img src="style/images/laptop.png" alt="laptop-icon">
                <p>Laptops: <?php echo $laptop_number; ?></p> 
            </div>
            </a>
            <a href='hardware.php?type=monitor'>
            <div class="dashboard-item" id="dashboard-others">
               <img src="style/images/others.png" alt="others-icon">
               <p>Monitors: <?php echo $monitor_number; ?></p> 
            </div>
            </a>
            <a href='hardware.php?type=printer'>
            <div class="dashboard-item" id="dashboard-printers">
                <img src="style/images/printer.png" alt="printer-icon">
                <p>Printers: <?php echo $printer_number; ?></p> 
            </div>
            </a>
        </div>
<?php 
    include 'inc/footer.php';
?>
