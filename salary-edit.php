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

$a='';
$con = mysqli_connect("localhost", "root", "", "user_details") or die("connection failed");

/*===============for update============Start==============*/

if (isset($_POST["update"])  ) {
    $Name = $_POST['Name'];
    $salary = $_POST['salary'];
    $id =$_POST['id'];
    
    $sql = 'UPDATE `customer` SET `name` = "' . $Name . '",`salary` = "' . $salary . '"  WHERE `customer`.`id` = ' . $id;
    if (mysqli_query($con, $sql)) {
         
        $a= "Salary updated successfully";
    } else {
        echo "Error updating Salary: ";
    }
}

/*===============for update============End==============*/

//for fetch data
$id = $_GET['id'];

$sql = "SELECT *  FROM `customer` WHERE `id` = '$id';";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update detail</title>
    <link rel="stylesheet" type="text/css" href="css files/salary-edit.css">
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
                    
                        <div class="input-group">
                            <label>Name</label>
                            <input type="text" id="Name" name="Name" onkeyup="lettersOnly(this)" value="<?php echo $row['name']; ?>" required>
                          
                        </div>
                        <div class="input-group">
                            <label>Salary</label>
                            <input type="text" id="salary" name="salary" value="<?php echo $row['salary']; ?>">
                         <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>">
                         </div>
                
                         </div>

                <div class="submit">
                    <button type="submit" class="btn" name="update">Update Salary</button>
                </div>
                <p id="p">
                   <a href="salary.php">Back</a>
                </p>
               
            </form>
            <script>
                function lettersOnly(input) {
                    var regex = /[^a-z ]/gi;
                    input.value = input.value.replace(regex, "");
                }
            </script>
          
</script>
</body>

</html>