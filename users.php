<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: login.php');
}
?>
<?php
if (isset($_POST['Logout'])) {
    session_destroy();
    header('location: login.php');
}
?>
<?php
if (isset($_POST['Add-User'])) {
    header('location: add-member.php');
}
?>
<?php
if (isset($_POST['User-Salary'])) {
    header('location: salary.php');
}
?>
<?php
$con = mysqli_connect("localhost", "root", "", "user_details") or die("connection failed");

// delete data
if (isset($_POST['delete'])) {
    $id = $_POST['delete'];

    $sql = "DELETE FROM `customer` where customer.id=$id";
    if (mysqli_query($con, $sql)) {
        header('location: users.php');
    } else {
        echo "data not delete";
    }
}
?>

<?php
// fetch  data
$limit = 3;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start_serial = $limit * ($page - 1) + 1;
$offset = ($page - 1) * $limit;
$sql = "SELECT * FROM `customer` LIMIT {$offset},{$limit}";
$result = mysqli_query($con, $sql);

?>

<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<link rel="stylesheet" type="text/css" href="css files/users.css">
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

<div class="wrapper">
    <?php include('sidebar.php') ?>
    <div class="main_content">
        <div class="header">Welcome
        <div class="dropdown">
         <button class="Account">Account</button>
         <div class="dropdown-content">
         <a href="profile.php"><i class="fas fa-user"></i>Profile</a>
         <a href="password.php">password</a>
         <form method="POST">
            <button name="Logout" id="log">Log Out</button>
         </form>
        
         </div>
         </div>
        </div>
        <div class="info" style=" background: white;" height="auto;">


            <div class="header" style=" background: white;">
                <h1 id="user">User-List
                <form align="right" method="post">
                <button name="Add-User" style="padding: 7px;
    border-radius: 9px;   background: azure;">Add-User</button>
     <form align="right" method="post">
                <button name="User-Salary" style="padding: 7px;
    border-radius: 9px;   background: azure;">User-Salary</button>
                </h1>
                <table>
                    <tr>
                        <th>S.no</th>
                        <th>name</th>
                        <th>email</th>
                        <th>edit</th>
                        <th>delete</th>
                        <th>Password-Change</th>
                    </tr>
                    <tr>
                        <?php

                        // $i = 1;
                        while ($row = mysqli_fetch_assoc($result)) {

                        ?>
                            <td> <?php echo $start_serial++; ?></td>
                            <td> <?php echo $row['name']; ?></td>
                            <td> <?php echo $row['email']; ?></td>
                            <td> <a href="http://localhost//mahala/login/user-detail-edit.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">edit</a></td>
                            <td>
                                <form action="#" method="POST">
                                    <button type="submit" class="btn" name="delete" value="<?php echo $row['id'] ?>" style="    padding: 5px;
                                       background: azure;
                                       border-radius: 7px;
                                       border: 1px solid grey;">delete</button>
                                </form>
                            </td>
                            <td> <a href="http://localhost//mahala/login/user-detail-password.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">change</a></td>
                    </tr>
                <?php
                        }
                ?>

                </table>
                <?php
                $sql1 = "SELECT * FROM `customer`";
                $result1 = mysqli_query($con, $sql1) or die("Query failed");
                if (mysqli_num_rows($result1) > 0) {
                    $total_record = mysqli_num_rows($result1);

                    $total_page = ceil($total_record / $limit);
                    echo '<div class="pagination">';
                    for ($i = 1; $i <= $total_page; $i++) {
                        if ($i == $page) {
                            $active = "active";
                        } else {
                            $active = "";
                        }
                        echo '<a class="' . $active . '" href="users.php?page=' . $i . '">' . $i . '</a>';
                    }
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>