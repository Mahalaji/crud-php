<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_details";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("connection failed");
if (isset($_POST['username']) && isset($_POST['password'])) 
{
   // print_r($_POST);
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $encryptpassword = sha1($password);

      $sql= "SELECT * FROM customer WHERE name='$username' AND password='$encryptpassword'"; 
     

     
        
      $result = mysqli_query($conn, $sql); 
        
        $cdd=mysqli_fetch_assoc($result);
        if(isset($cdd['id'])){
            $id = $cdd['id'];
        }
        else{
            print_r(" ");
        }
       
        // echo $id; die;
        // print_r($_SESSION['id']);die;
        $count=mysqli_num_rows($result);
        
        if($count==1)
        {    
         $_SESSION['username'] = "$username";
         $_SESSION['password'] = "$encryptpassword";  
         $_SESSION['id'] = "$id";
        

         header('location: Dashboard.php');           
        }else
        {        
           echo "<script> alert('Incorrect details'); </script>";
        }
    }  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration form</title>
    <link rel="stylesheet" type="text/css" href="loginstyle.css">
</head>

<body>
    <div class="header"></div>
    <h2>Login</h2>
    <form action="login.php" id="login" method="post">

        <div class="input-group">
            <label>Username</label>
            <input type="text" id="username" name="username" onkeyup="lettersOnly(this)">
            <p id="name" style="color: red;"></p>
        </div>

        <div class="input-group">
            <label>password</label>
            <input type="password" id="password" name="password">
            <p id="pass" style="color: red;"></p>
        </div>

        <div class="input-group">
            <button type="submit" class="btn" id="check" name="login_user">Login</button>
        </div>
       
     
    </form>
        

    <script>

function lettersOnly(input) {
    var regex = /[^a-z ]/gi;
    input.value = input.value.replace(regex, "");
}
</script>   
</body>

</html>