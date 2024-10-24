
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
    <link rel="stylesheet" type="text/css" href="password.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<style>
    @import url('https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap');

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  list-style: none;
  text-decoration: none;
  font-family: 'Josefin Sans', sans-serif;
}

body{
   background-color: #f3f5f9;
}
#img{
  margin: 0 1rem 2rem;
  /* width: 3rem; */
  /* height: 3rem; */
}
.wrapper{
  display: flex;
  position: relative;
}

.wrapper .sidebar{
  width: 200px;
  height: 100%;
  background: #343a40;
  padding: 0px 0px;
  position: fixed;
}

.wrapper .sidebar h2{
  color: #fff;
  text-transform: uppercase;
  text-align: center;
  margin-bottom: 30px;
}

.wrapper .sidebar ul li{
  padding: 15px;
  border-bottom: 1px solid #bdb8d7;
  border-bottom: 1px solid rgba(0,0,0,0.05);
  border-top: 1px solid rgba(255,255,255,0.05);
}    

.wrapper .sidebar ul li a{
  color: #bdb8d7;
  display: block;
}

.wrapper .sidebar ul li a .fas{
  width: 25px;
}

.wrapper .sidebar ul li:hover{
  background-color: #594f8d;
}
    
.wrapper .sidebar ul li:hover a{
  color: #fff;
}
 
.wrapper .sidebar .social_media{
  position: absolute;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
  display: flex;
}

.wrapper .sidebar .social_media a{
  display: block;
  width: 40px;
  background: #594f8d;
  height: 40px;
  line-height: 45px;
  text-align: center;
  margin: 0 5px;
  color: #bdb8d7;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
}

.wrapper .main_content{
  width: 100%;
  margin-left: 200px;
}

.wrapper .main_content .header {
            padding: 20px;
            background: #343a40;
            color: #717171;
            border-bottom: 1px solid #e0e4e8;
            margin-top: 0px;
            width: auto;
            text-align: left;
        }


.wrapper .main_content .info{
  margin: 20px;
  color: #717171;
  line-height: 25px;
}

.wrapper .main_content .info div{
  margin-bottom: 20px;
}

@media (max-height: 500px){
  .social_media{
    display: none !important;
  }
}
</style>
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
    <script src="resetpass.js"></script>
    <!-- <script>
document.getElementById("name").onkeypress = function() {myFunction1()};
function myFunction1() {
  document.getElementById("name").innerHTML =" ";
}
</script> -->
</body>

</html>