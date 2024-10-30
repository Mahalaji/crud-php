<?php
session_start();
$a='';
$con = mysqli_connect("localhost", "root", "", "user_details") or die("connection failed");

/*===============for update============Start==============*/

if (isset($_POST["update"])  ) {
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
    if (mysqli_query($con, $sql)) {
         
        $a= "Record updated successfully";
    } else {
        echo "Error updating record: ";
    }
}

/*===============for update============End==============*/

//for fetch data
$id = $_GET['id'];

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
    <title>update detail</title>
    <link rel="stylesheet" type="text/css" href="css files/user-detail-edit.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    
</head>

<body>
    <div class="wrapper">
        <?php include('sidebar.php') ?>
        <div class="main_content">
            <div class="header">welcome
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
            <h2 id="head"> Update-details</h2>
            <p id="view"><?php
            echo $a;
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
                            <input type="text" id="mobilenumber" name="mobilenumber" value="<?php echo $row['mobilenumber']; ?>" >
                            <p id="number" style="color: red;"></p>
                        </div>
                        <div class="input-group">
                            <label>city</label>
                            <input type="text" id="city" name="city" value="<?php echo $row['city']; ?>" >
                            <p id="citye" style="color: red;"></p>
                        </div>
                    </div>
                    <div>
                        <div class="input-group">
                            <label>state</label>
                            <input type="text" id="state" name="state" value="<?php echo $row['state']; ?>">
                            <p id="statee" style="color: red;"></p>
                        </div>
                        <div class="input-group">
                            <label>Pincode</label>
                            <input type="text" id="pincode" name="pincode" value="<?php echo $row['pincode']; ?>" >
                            <p id="pincodee" style="color: red;"></p>
                        </div>
                        <div class="input-group">
                            <label>Country</label>
                            <input type="text" id="country" name="country" value="<?php echo $row['country']; ?>" >
                            <p id="countrye" style="color: red;"></p>
                        </div>
                        <div class="input-group">
                            <label>Address</label>
                            <input type="text" id="address" name="address" value="<?php echo $row['address']; ?>" >
                            <p id="addresse" style="color: red;"></p>
                        </div>
                    </div>
                </div>

                <div class="input-group">
                    <button type="submit" class="btn" name="update">update</button>
                </div>
                <p>
                    back? <a href="users.php">Back</a>
                </p>
            </form>
            <script src="js file/user-detail-edit-script.js"></script>
            <script>
                function lettersOnly(input) {
                    var regex = /[^a-z ]/gi;
                    input.value = input.value.replace(regex, "");
                }
            </script>
            <script>
  setTimeout(function(){
    document.getElementById('countrye').style.display = 'none';
    
  }, 5000);
</script>
</body>

</html>