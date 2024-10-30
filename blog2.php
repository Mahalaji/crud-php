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
if (isset($_POST['Add-Blog'])) {
    header('location: blog-add.php');
}
?>
<?php
if (isset($_POST['Blog-Recycle'])) {
    header('location: Blog-Recycle.php');
}
?>
<?php
        $con = mysqli_connect("localhost", "root", "", "user_details") or die("connection failed");

    
       
        // delete status
        if (isset($_POST['Recyclee'])) {
            $id = $_POST['Recyclee'];
            $sql = 'UPDATE `blog` SET `recycle` = "' . 0 . '" WHERE `blog`.`id` = ' . $id;
            if (mysqli_query($con, $sql)) {
                // header('location: users.php');
            } else {
                echo "data not delete";
            }
        }
        ?> 

<?php
// fetch  data
$con = mysqli_connect("localhost", "root", "", "user_details") or die("connection failed");

$limit = 4;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start_serial = $limit * ($page - 1) + 1;
$offset = ($page - 1) * $limit;
$sql = "SELECT * FROM `blog` where recycle=1 LIMIT {$offset},{$limit}"  ;
$result = mysqli_query($con, $sql);

?>

<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<link rel="stylesheet" type="text/css" href="css files/blog2.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<div class="wrapper">
    <?php include('sidebar.php') ?>
    <div class="main_content">
        <div class="header">Welcome 
        <div class="dropdown">
         <button class="Account">Account</button>
         <div class="dropdown-content">
         <a href="profile.php"><i class="fas fa-user"></i> Profile</a>
         <a href="password.php"> password</a>
         <form method="POST">
            <button name="Logout"  id="log">Log Out</button>
         </form>
        
         </div>
         </div>
           
            </div>

        <div class="info" style=" background: white;">


            <div class="header"
                style=" background: white;">
                <div id="back">
                    <h1>Blog-List
        <form align="right" method="post">
        <a href="newblog.php"><i class="fa-solid fa-eye" id="blogsite"></i></a>
                    <form align="right" method="post">
                <button name="Add-Blog" style="padding: 7px;
    border-radius: 9px;   background: azure;">Add-Blog</button>

                     <form align="right" method="post">
                <button name="Blog-Recycle" style="padding: 7px;
    border-radius: 9px;   background: azure;">Recycle</button>
                    </h1>
                    <table>
                        <tr>
                            <th>S.no</th>
                            <th>Name</th>
                            <th>image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Create Date</th>
                            <th>Update Date</th>
                            <th>Delete Status</th>
                            <th>Edit</th>
                            
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
                                <form action="#" method="POST">
                                    <button type="submit" class="btn" name="Recyclee" value="<?php echo $row['id'] ?>"style="    padding: 5px;
                                       background: azure;
                                       border-radius: 7px;
                                       border: 1px solid grey;">Delete</button>
                                </form>
                            </td>
                                <td> <a href="http://localhost//mahala/login/blog-edit.php?id=<?php echo $row['id'] ?>" class="btn btn-primary"style="    padding: 5px;
                                       background: azure;
                                       border-radius: 7px;
                                       border: 1px solid grey;">edit</a></td>
                         
                            <!-- <td> <a href="password.php" class="btn btn-danger">change</a></td>  -->
                        </tr>
                    <?php
                            }
                    ?>

                    </table>

                    <?php
                            $sql1 = "SELECT * FROM `blog` where recycle=1";
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
                                    echo '<a class="' . $active . '" href="blog2.php?page=' . $i . '">' . $i . '</a>';
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