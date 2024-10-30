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
<link rel="stylesheet" type="text/css" href="css files/salary.css">
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
            <button name="Logout" id="log1">Log Out</button>
         </form>
        
         </div>
         </div>  
        </div>
        <div class="info" style=" background: white;">


            <div class="header"
            style=" background: white;">
                <h1>Salary-List</h1>
                <table>
                    <tr>
                        <th>S.no</th>
                        <th>name</th>
                        <th>salary</th>
                        <th>edit</th>
                       
                    </tr>
                    <tr>
                        <?php

                        // $i = 1;
                        while ($row = mysqli_fetch_assoc($result)) {

                        ?>
                            <td> <?php echo $start_serial++; ?></td>
                            <td> <?php echo $row['name']; ?></td>
                            <td> <?php echo $row['salary']; ?></td>
                            <td> <a href="http://localhost//mahala/login/salary-edit.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">edit</a></td>
                          
                          
                            
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
                        echo '<a class="' . $active . '" href="salary.php?page=' . $i . '">' . $i . '</a>';
                    }
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>