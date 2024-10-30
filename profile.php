
<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "user_details") or die("connection failed");
$id = $_SESSION['id'];

$sql = "SELECT *  FROM `customer` WHERE `id` = '$id';";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
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
  <title>Home</title>
  <link rel="stylesheet" type="text/css" href="css files/profile.css">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
 
</head>

<body>
  <div class="wrapper">
    <?php include('sidebar.php') ?>
    <div class="main_content">
      <div class="header">Welcome
      <div class="dropdown">
         <button class="Account">Account</button>
         <div class="dropdown-content">
         <a href="profile-update.php"><i class="fas fa-user"></i>Profile</a>
         <a href="password.php">password</a>
         <form method="POST">
            <button name="Logout" id="log1">Log Out</button>
         </form>
        
         </div>
         </div>   
      </div>
      <form id="update" method="post">
        <div id="d">
          <div>
            <div class="input-group">
              <label>Username</label>
              <input type="text" id="username" name="username" onkeyup="lettersOnly(this)" value="<?php echo $row['name']; ?>">

            </div>
            <div class="input-group">
              <label>Email</label>
              <input type="text" id="email" name="email" value="<?php echo $row['email']; ?>">
            </div>
            <div class="input-group">
              <label>mobile number</label>
              <input type="text" id="mobilenumber" name="mobilenumber" value="<?php echo $row['mobilenumber']; ?>" required>
            </div>
            <div class="input-group">
              <label>city</label>
              <input type="text" id="city" name="city" value="<?php echo $row['city']; ?>" required>

            </div>
          </div>
          <div>
            <div class="input-group">
              <label>state</label>
              <input type="text" id="state" name="state" value="<?php echo $row['state']; ?>" required>
              <p id="name" style="color: red;"></p>
            </div>
            <div class="input-group">
              <label>Pincode</label>
              <input type="text" id="pincode" name="pincode" value="<?php echo $row['pincode']; ?>" required>

            </div>
            <div class="input-group">
              <label>Country</label>
              <input type="text" id="country" name="country" value="<?php echo $row['country']; ?>" required>

            </div>
            <div class="input-group">
              <label>Address</label>
              <input type="text" id="address" name="address" value="<?php echo $row['address']; ?>" required>

            </div>
          </div>
        </div>
</body>

</html>