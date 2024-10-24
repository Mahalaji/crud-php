<?php
session_start();
$a = '';
$con = mysqli_connect("localhost", "root", "", "user_details") or die("connection failed");

/*===============for update============Start==============*/

if (isset($_POST["update"])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $id = $_POST['id'];
    $mobilenumber = $_POST['mobilenumber'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $pincode = $_POST['pincode'];
    $address = $_POST['address'];


    

    $sql = 'UPDATE `customer` SET `name` = "' . $username . '",`email` = "' . $email . '", `mobilenumber` = "' . $mobilenumber . '",`city` = "' . $city . '",`state` = "' . $state . '",`country` = "' . $country . '",`pincode` = "' . $pincode . '",`address` = "' . $address . '" WHERE `customer`.`id` = ' . $id;
    // print_r($sql); die;
   
    if (mysqli_query($con, $sql)) {
        $a = "Record updated successfully";
        // echo "<p style='color:red;'>" . $ip['cityName'] . "</p>";

    } else {
        $a = "Error updating record: " . mysqli_error($con);
    }
}

/*===============for update============End==============*/

//for fetch data
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
    <title>profile</title>
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
            <div>
           
            </div>
            <h2 id="head"> Update-Profile</h2>
            <p id="view"><?php
            print_r($a);
            ?></p>
            <form id="update" method="post">
                <div id="d">
                    <div>
                        <div class="input-group">
                            <label>Username</label>
                            <input type="text" id="username" name="username" onkeyup="lettersOnly(this)" value="<?php echo $row['name']; ?>">
                            <p id="name" style="color: red;"></p>
                        </div>
                        <div class="input-group">
                            <label>Email</label>
                            <input type="text" id="email" name="email" value="<?php echo $row['email']; ?>">
                            <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>">
                            <p id="mail" style="color: red;"></p>
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

                        <div class="input-group">
                            <button type="submit" class="btn" name="update">update</button>
                        </div>
                    </div>
                </div>
                
                <p id="p">
                    back? <a href="Dashboard.php">Back</a>
                </p>
            </form>
            <script src="profile-update.js"></script>
            <script>
                function lettersOnly(input) {
                    var regex = /[^a-z ]/gi;
                    input.value = input.value.replace(regex, "");
                }
            </script>
</body>

</html>