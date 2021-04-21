<?php 
    // function showEmployees(){
    //     $sql = "SELECT * FROM employees";
    //     $employees = array();
    //     $result = mysqli_query($conn, $sql);
    //     if(!$result){
    //         return "Error";
    //     } else {
    //         if(mysqli_num_rows($result) > 0){
    //             while($row = mysqli_fetch_array($result)){
                    
    //             }
    //         }
    //     }


    //Return array with hardware info by given id


    function getHardwareInfo($id){
        include 'db.php';
        $result = mysqli_query($conn, "SELECT * FROM hardware WHERE hardware_id = '$id'");
        $hardwareInfo;
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                $hardwareInfo = array("id" => $row['hardware_id'], "type" => $row['hardware_type'], "brand" => $row['hardware_brand'], 'model' => $row['hardware_model'], "sn" => $row['hardware_sn'], "os" => $row['hardware_os'], "size" => $row['hardware_size'], "info" => $row['hardware_info'], "status" => $row["status"], "givenTo" => $row['givenTo'], "purchased" => $row['purchased'] , "lastUpdate" => $row['lastUpdate']);
            }
    }
        return $hardwareInfo;
    }

    //Return array with employee info given by id

    function getEmployeeInfo($employeeId){
        include 'db.php';
        $employee;
    $result = mysqli_query($conn, "SELECT * FROM employees WHERE employee_id = '$employeeId'");
    if(mysqli_num_rows($result) !== 1){
        return "Error";
    } else {
        while($row = mysqli_fetch_array($result)){
            $employee = array('id' => $row['employee_id'] ,'branch' => $row["employee_branch"],'fname' => $row["fname"],'sname' =>  $row['sname'] ,'lname' => $row['lname'], 'position' =>  $row['position'] ,'phoneNumber' => $row['phoneNumber'] ,'mobileNumber' => $row['mobileNumber'] ,'ip' => $row['ip'] ,'email' => $row['email'] ,'lastUpdate' => $row['lastUpdate']);
        }
        return $employee;
    }
}

    //Return array with all employees

    function getAllEmployees(){
        include 'db.php';
        $employeesArr = array();
        $allEmployees = mysqli_query($conn, "SELECT employee_id, employee_branch, fname, lname FROM employees ORDER BY fname ASC");
                    if(mysqli_num_rows($allEmployees) !== 0){
                        $a = 0;
                        while($row = mysqli_fetch_array($allEmployees)){
                            $employeeInfo = $row['fname'] . " " . $row['lname'] . "-" . $row['employee_branch'] . "-" . $row['employee_id'];
                            array_push($employeesArr, $employeeInfo);
                        }
                    }
        return $employeesArr;
    }

    //Return true or false if user have admin permissions

    function isAdmin($username){
        include 'db.php';
        $result = mysqli_query($conn, "SELECT isAdmin FROM users WHERE username = '$username'");
        $isAdmin;
        if(mysqli_num_rows($result) == 1){
            while($row = mysqli_fetch_array($result)){
                $isAdmin = $row['isAdmin'];
            }
        }
        return $isAdmin;
    }

    //Return array of user info

    function getUserInfo($id){
        include 'db.php';
        $user;
        $result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
        if(mysqli_num_rows($result) !== 1){
            return "Error";
        } else {
            while($row = mysqli_num_rows($result)){
                $user = array('username' => $row['username'], 'isAdmin' => $row['isAdmin'], 'dateCreated' => $row['dateCreated']);
            }
            return $user;
        }
    }

    //Return user ID 

    function userId($username){
        include 'db.php';
        $result = mysqli_query($conn, "SELECT id FROM users WHERE username = '$username'");
        $userId;
        if(mysqli_num_rows($result) == 1){
            while($row = mysqli_fetch_array($result)){
                $userId = $row["id"];
            }
        return $userId;
        }
    }

    //is username free

    function isUsernameFree($username){
        include 'db.php';
        $result = mysqli_query($conn, "SELECT username FROM users");
        $isFree = true;
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                if($row['username'] == $username){
                    $isFree = false;
                }
            }
            return $isFree;
        }
    }
    
?>