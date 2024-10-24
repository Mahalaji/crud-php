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
$limit = 5;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start_serial = $limit * ($page - 1) + 1;
$offset = ($page - 1) * $limit;
$sql = "SELECT * FROM `customer` LIMIT {$offset},{$limit}";
$result = mysqli_query($con, $sql);

?>

<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<link rel="stylesheet" type="text/css" href="users.css">
<div class="wrapper">
    <?php include('sidebar.php') ?>
    <div class="main_content">
        <div class="header">Welcome
            <form align="right" method="post">
                <button name="Logout" style="padding: 7px;
    border-radius: 9px;">Log out</button>
            </form>
        </div>
        <div class="info">


            <div class="header">
                <h1>User-List</h1>
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
                            <td> <a href="password.php" class="btn btn-danger">change</a></td>
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
                    echo '<ul class="pagination">';
                    for ($i = 1; $i <= $total_page; $i++) {
                        if ($i == $page) {
                            $active = "active";
                        } else {
                            $active = "";
                        }
                        echo '<li class=' . $active . '> <a href="users.php?page=' . $i . '">' . $i . '</a></li>';
                    }
                    echo '</ul>';
                }
                ?>
            </div>
        </div>
    </div>
</div>