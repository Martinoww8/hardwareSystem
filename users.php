<?php
    include 'inc/header.php';
    include 'config/db.php';

    if(!isAdmin($_SESSION['user_logged'])){
        echo "<h3>User doesn't have permissions</h3>";
    } else {
?>
    <h3 class="page-header">Users</h3>

    <div class="users-table">
        <table>
            <tr>
                <th>Username</th>
                <th>Admin permissions</th>
                <th>Change</th>
            </tr>
            <?php 
                $users = mysqli_query($conn, "SELECT * FROM users");
                if(mysqli_num_rows($users) > 0){
                    while($user = mysqli_fetch_array($users)){
                            echo "<tr>
                                <td><b>" . $user['username'] ."</b></td><td>";
                                if($user['isAdmin']){
                                    echo "Yes";
                                } else {
                                    echo "No </td>";
                                }
                                if($user['username'] !== $_SESSION['user_logged']){
                                echo "<td><a href='userChange.php?id=" .$user['id']."'><button>Change</button></a></td>";
                                } else {
                                    echo "<td>Your</td>";
                                }
                            echo "</tr>";
                    }
                }
            ?>
        </table>
    </div>
<?php 
    }
?>