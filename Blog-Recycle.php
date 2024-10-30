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
// fetch  data
$con = mysqli_connect("localhost", "root", "", "user_details") or die("connection failed");

$limit = 4;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start_serial = $limit * ($page - 1) + 1;
$offset = ($page - 1) * $limit;
$sql = "SELECT * FROM `blog` where recycle=0 LIMIT {$offset},{$limit}"  ;
$result = mysqli_query($con, $sql);

?>
     <?php
    // restore data
        if (isset($_POST['restore'])) {
            $id = $_POST['restore'];
            // $_SESSION['statusid'] ="$id";

            $sql = 'UPDATE `blog` SET `recycle` = "' . 1 . '" WHERE `blog`.`id` = ' . $id;
            if (mysqli_query($con, $sql)) {
                header("Refresh:0");

            } else {
                echo "data not restore";
            }
        }
        ?>
<?php
    // delete data
        if (isset($_POST['delete'])) {
            $id = $_POST['delete'];
            // $_SESSION['statusid'] ="$id";

            $sql = "DELETE FROM `blog` where blog.id=$id";
            if (mysqli_query($con, $sql)) {
                header("Refresh:0");

            } else {
                echo "data not delete";
            }
        }
        ?>
   
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<link rel="stylesheet" type="text/css" href="css files/blog2.css">
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

        <div class="info" style=" background: white">


            <div class="header"
                style=" background: white">
                <!-- <div id="back">
                    <h1>Blog-Recycle
                    <form align="right" method="post">
                    </h1> -->
                     <table>
                        <tr>
                            <th>S.no</th>
                            <th>Name</th>
                            <th>image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Create Date</th>
                            <th>Update Date</th>
                            <th>Restore</th>
                            <th>Delete</th>
             
                        </tr>
                        <tr>
                        <?php
                         while ($row = mysqli_fetch_assoc($result)) {
                        ?>

                                <td> <?php echo $start_serial++ ?></td>
                                <td> <?php echo $row['Name']; ?></td>
                                <td> <img src="image/<?php echo $row['image'] ?>"/></td>
                                <td> <?php echo $row['Title']; ?></td>
                                <td> <?php echo $row['Description']; ?></td>
                                <td> <?php echo $row['Create Date']; ?></td>
                                <td> <?php echo $row['Update Date']; ?></td>
                                <td>
                                <form action="" method="POST">
                                    <button type="submit" class="btn" name="restore" value="<?php echo $row['id'] ?>" style="    padding: 5px;
                                       background: azure;
                                       border-radius: 7px;
                                       border: 1px solid grey;">`Restore`</button>
                                </form>
                            </td>
                                <td>
                                <form action="#" method="POST">
                                    <button type="submit" class="btn" name="delete" value="<?php echo $row['id'] ?>" style="    padding: 5px;
                                       background: azure;
                                       border-radius: 7px;
                                       border: 1px solid grey;">delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php
                            }
                    ?>

                    </table>
                    <?php
                            $sql1 = "SELECT * FROM `blog` where recycle=0";
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
                                    echo '<a class="' . $active . '" href="Blog-Recycle.php?page=' . $i . '">' . $i . '</a>';
                                }
                                echo '</div>';
                            }
                            ?>
                </div>
            </div>
        </div>
    </div>
</div>
<img src="image/<?php echo $row['image'] ?>"/>