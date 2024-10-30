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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change password</title>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css files/Dashboard.css">
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
            <button name="Logout" id="log">Log Out</button>
         </form>
        
         </div>
         </div>
            </div>
            <img id="image" src="create.jpg">
            <div class="admin">
       
  </div>