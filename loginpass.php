<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_details";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("connection failed");
if (isset($_POST['email'])) {

    $email = $_POST['email'];
   
    
    $sql = "SELECT * FROM customer WHERE email='$email'";


    $result = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $con = new mysqli($servername, $username, $password, $dbname);

        if (isset($_POST["Reset"])) {
            $email = $_POST['email'];
            $password = $_POST['Newpassword'];
            $encryptpassword = sha1($password);


            $sql = "UPDATE `customer` SET `password` = '$encryptpassword' WHERE `customer`.`email` = '$email';";
            $results = mysqli_query($con, $sql);
            $count=mysqli_num_rows($result);
            if($count==1){
            {    
             header('location: welcome.php');
            }
            } else {
            echo "<script> alert('Incorrect details'); </script>";
            }
        }
    }
    else {
        echo "<script> alert('Incorrect email'); </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change password</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h2>Forget password</h2>
    <form id="Reset" method="post">
        <div class="input-group">
            <label>Email</label>
            <input type="text" id="email" name="email">
            <p id="mail" style="color: red;"></p>
        </div>
        <div class="input-group">
            <label>New password</label>
            <input type="text" id="Newpassword" name="Newpassword">
            <p id="newpass" style="color: red;"></p>
        </div>
        <div class="input-group">
            <label>Confirm password</label>
            <input type="text" id="confirmpassword" name="confirmpassword">
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