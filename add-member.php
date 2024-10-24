
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
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            list-style: none;
            text-decoration: none;
            font-family: 'Josefin Sans', sans-serif;
        }

        body {
            background-color: #f3f5f9;
        }

        #regi {
            margin: 2rem 1rem;
        }

        #img {
            margin: 0 1rem 2rem;
            /* width: 3rem; */
            /* height: 3rem; */
        }

        .wrapper {
            display: flex;
            position: relative;
        }

        .wrapper .sidebar {
            width: 200px;
            height: 100%;
            background: #343a40;
            padding: 0px 0px;
            position: fixed;
        }

        .wrapper .sidebar h2 {
            color: #fff;
            text-transform: uppercase;
            text-align: center;
            margin-bottom: 30px;
        }

        .wrapper .sidebar ul li {
            padding: 15px;
            border-bottom: 1px solid #bdb8d7;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        .wrapper .sidebar ul li a {
            color: #bdb8d7;
            display: block;
        }

        .wrapper .sidebar ul li a .fas {
            width: 25px;
        }

        .wrapper .sidebar ul li:hover {
            background-color: #594f8d;
        }

        .wrapper .sidebar ul li:hover a {
            color: #fff;
        }

        .wrapper .sidebar .social_media {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
        }

        .wrapper .sidebar .social_media a {
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

        .wrapper .main_content {
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

        .wrapper .main_content .info {
            margin: 20px;
            color: #717171;
            line-height: 25px;
        }

        .wrapper .main_content .info div {
            margin-bottom: 20px;
        }

        @media (max-height: 500px) {
            .social_media {
                display: none !important;
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <?php include('sidebar.php') ?>
        <div class="main_content">
            <div class="header">Welcome
            <form id="log" align="right" method="post">
            <button name="Logout" style="padding: 7px;
    border-radius: 9px;">Log out</button>
        </form>    
            </div>

            <h2 id="regi">Add Member</h2>


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
                            <input type="text" id="country" name="country" >
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
                    <button type="submit" class="btn" name="reg_user">Add Member</button>
                </div>



            </form>
            <script src="add-member.js"></script>
            <script> 
                function lettersOnly(input){
                    var regex = /[^a-z ]/gi;
                    input.value = input.value.replace(regex, "");
                }
            </script>
</body>

</html>