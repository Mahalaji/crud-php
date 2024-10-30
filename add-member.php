
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

$servername = "localhost";
$username = "root";
$password = "";
// $confirm_password = "";
$dbname = "user_details";

$conn = new mysqli($servername, $username, $password, $dbname);
$error='';
if (isset($_POST["reg_user"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $encryptpassword = sha1($password);
    $mobilenumber = $_POST['mobilenumber'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $pincode = $_POST['pincode'];
    $address = $_POST['address'];
   
     $sql1 =  "SELECT *  FROM `customer` WHERE `mobilenumber` =$mobilenumber;";
     $result = mysqli_query($conn, $sql1);
     if(mysqli_num_rows($result) >= 1){
        $error = "number already exist";

        // header('location: add-member.php');
     }
     else{
        $sql = "INSERT INTO `customer` ( `name`, `email`, `password`,`mobilenumber`,`city`,`state`,`country`,`pincode`,`address`) VALUES ( '$username', '$email', '$encryptpassword','$mobilenumber','$city','$state','$country','$pincode','$address');";
        $result = mysqli_query($conn, $sql); 
            {
            header('location: users.php');
           }
     }
    
   
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration system PHP and MySQL</title>
    <link rel="stylesheet" type="text/css" href="css files/add-member.css">
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
         <a href="profile.php"><i class="fas fa-user"></i>Profile</a>
         <a href="password.php">password</a>
         <form method="POST">
            <button name="Logout" id="log1">Log Out</button>
         </form>
        
         </div>
         </div>   
            </div>

            <h2 id="regi">Add User</h2>


            <form id="update"  method="post">
                <div id="d">
                    <div>
                        <div class="input-group">
                            <label>Username</label>
                            <input type="text" id="username" name="username" onkeyup="lettersOnly(this)">
                            <p id="name" style="color: red;"></p>
                        </div>
                        <div class="input-group">
                            <label>Email</label>
                            <input type="text" id="email" name="email">
                            <p id="mail" style="color: red;"></p>
                        </div>
                        <div class="input-group">
                            <label>Password</label>
                            <input type="password" id="password" name="password">
                            <p id="pass" style="color: red;"></p>
                        </div>
                        <div class="input-group">
                            <label>Confirm password</label>
                            <input type="password" id="confirmpassword" name="confirmpassword">
                            <p id="confirmpass" style="color: red;"></p>
                        </div>

                        <div class="input-group">
                            <label>mobile number</label>
                            <input type="text" id="mobilenumber" name="mobilenumber" >
                            <span style="color:red"><?php echo isset($error)?$error:'' ?></span>
                            <p id="number" style="color: red;"></p>
                        </div>
                    </div>
                    <div>
                   
                        <div class="input-group">
                            <label>city</label>
                            <input type="text" id="city" name="city" >
                            <p id="citye" style="color: red;"></p>

                        </div>
                        <div class="input-group">
                            <label>state</label>
                            <input type="text" id="state" name="state" >
                            <p id="statee" style="color: red;"></p>
                        </div>
                        <div class="input-group">
                            <label>Pincode</label>
                            <input type="text" id="pincode" name="pincode" >
                            <p id="pincodee" style="color: red;"></p>

                        </div>
                        <div class="input-group">
                            <label>Country</label>
                            
                            <select id="countr" name="country">
                                <?php
                                $sql2="select * from country_list;";
                                $country=mysqli_query($conn,$sql2);
                                // $c=mysqli_fetch_array($country);
                                while($c=mysqli_fetch_array($country)){
                                ?>
                                <option value="<?php echo $c['id'] ?>"><?php echo $c['country'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <p id="countrye" style="color: red;"></p>

                        </div>
                        <div class="input-group">
                            <label>Address</label>
                            <input type="text" id="address" name="address" >
                            <p id="addresse" style="color: red;"></p>

                        </div>
                    </div>
                </div>
                <div class="input-group">
                    <button type="submit" class="btn" name="reg_user">Add User</button>
                </div>



            </form>
            <script src="js file/add-member.js"></script>
            <script> 
                function lettersOnly(input){
                    var regex = /[^a-z ]/gi;
                    input.value = input.value.replace(regex, "");
                }
            </script>
</body>

</html>