
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_details";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("connection failed");
if (isset($_SESSION['id']) && isset($_POST['oldpassword'])) {
     $oldpassword = $_POST['oldpassword'];
     $encryptpass = sha1($oldpassword);
    $id = $_SESSION['id'];
    
    $sql = "SELECT * FROM `customer`WHERE id='$id' and password ='$encryptpass';";
   
    $result = mysqli_query($conn, $sql);
    // $row=mysqli_fetch_assoc($result);
    // print_r($row);die;
    
    $count = mysqli_num_rows($result);
   
    if ($count == 1) {
        $con = new mysqli($servername, $username, $password, $dbname);

        if (isset($_POST["Reset"])) {
          $oldpassword = $_POST['oldpassword'];
          $encryptpass = sha1($oldpassword);
            $password = $_POST['Newpassword'];
            $encryptpassword = sha1($password);
            $id = $_SESSION['id'];

            $sql = "UPDATE `customer` SET `password` = '$encryptpassword' WHERE `id` = $id;";
            // print_r($sql);die;
            $results = mysqli_query($con, $sql);
            $count=mysqli_num_rows($result);
            if($count==1){
            {    
             header('location: Dashboard.php');
            }
            } else {
            echo "<script> alert('Incorrect details'); </script>";
            }
        }
    }
    else {
        echo "<script> alert('Incorrect old password'); </script>";
    }
}
?>
<?php

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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change password</title>
    <link rel="stylesheet" type="text/css" href="css files/password.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<body>
<div class="wrapper">
    <?php include('sidebar.php') ?>
    <div class="main_content">
        <div class="header">welcome
        <form id="log" align="right" method="post">
            <button name="Logout" style="padding: 7px;
    border-radius: 9px;">Log out</button>
        </form>  
        </div>  
        
    
    <form id="Reset" method="post">
    <div class="input-group">
            <label>Old password</label>
            <input type="password" id="oldpassword" name="oldpassword">
            <p id="oldpass" style="color: red;"></p>
        </div>

        <div class="input-group">
            <label>New password</label>
            <input type="password" id="Newpassword" name="Newpassword">
            <p id="newpass" style="color: red;"></p>
        </div>
        <div class="input-group">
            <label>Confirm password</label>
            <input type="password" id="confirmpassword" name="confirmpassword">
            <p id="confirmpass" style="color: red;"></p>
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="Reset">Reset</button>
        </div>
    </form>
    <script src="js file/resetpass.js"></script>
    <!-- <script>
document.getElementById("name").onkeypress = function() {myFunction1()};
function myFunction1() {
  document.getElementById("name").innerHTML =" ";
}
</script> -->
</body>

</html>