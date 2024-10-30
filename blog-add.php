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

$error = '';


$servername = "localhost";
$username = "root";
$password = "";
// $confirm_password = "";
$dbname = "user_details";

$conn = new mysqli($servername, $username, $password, $dbname);
$error="";
if (isset($_POST["update"])) {
    $Name = $_POST['Name'];
    $content = $_POST['content'];
    $file = $_FILES['image']['name'];
    $file_name = str_replace(" ", "", $file);
    $tempname= $_FILES['image']['tmp_name'];
    $folder = 'image/'.$file_name;
    $DeleteStatus = $_POST['DeleteStatus'];
    $UpdateDate = $_POST['UpdateDate'];
    $CreateDate = $_POST['CreateDate'];
    $Title = $_POST['Title'];

    $needheight = 150;
    $needwidth = 200;

    $arrtest = getimagesize($tempname);

     $actualwidth = $arrtest[0];
     $actualheight = $arrtest[1];

     if($needwidth > $actualwidth && $needheight > $actualheight){
        $sql = "INSERT INTO `blog` ( `Name`, `Title`, `Description`, `Create Date`, `Update Date`, `Delete Status`, `image`) VALUES ( '$Name', '$Title', '$content', '$CreateDate', '$UpdateDate', '$DeleteStatus','$file_name');";
    
        $result = mysqli_query($conn, $sql);
        if(move_uploaded_file($tempname,$folder)){
            header("location:blog2.php");
    
        }
        else{
            echo"file not upload";
        }
     }
     else{ $error = "size should be width=200px height=150px";
    }
   
   
}


$Updatetime=date('Y-m-d ');
$CreateDate=date('Y-m-d ');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <link rel="stylesheet" type="text/css" href="css files/blog-add.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
    
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
            <div>

            </div>
            <h2 id="head"> Add-Blog</h2>
            
            <form id="update" method="post" enctype="multipart/form-data">
                <div id="d">
                    <div>
                        <div class="input-group">
                            <label>Name</label>
                            <input type="text" id="name" name="Name" onkeyup="lettersOnly(this)" required>
                        </div>
                        <div class="input-group">
                            <label>Title</label>
                            <input type="text" id="Title" name="Title" required>
                            
                        </div>
                        <div class="input-wrapper">
                        <label>Description</label>
                        <!-- <h2>Description</h2> -->
                    <textarea name="content" id="editor" >
                     &lt;p&gt;Your massage .&lt;/p&gt;
                       </textarea>
                        </div>
                        
                    </div>
                    <div>
                          <div class="im">
                            <label>Image</label>
                            <input type="file" id="image" name="image"/>
                            <span style="color:red"><?php echo isset($error)?$error:'' ?></span>
                          </div>
                        <div class="input-group">
                            <label>Create Date</label>
                            <input type="text" id="CreateDate" name="CreateDate" value="<?php echo $CreateDate ?>" >
                        </div>
                        <div class="input-group">
                            <label>Update Date</label>
                            <input type="text" id="UpdateDate" name="UpdateDate" value="<?php echo $Updatetime ?>" >
                        </div>
                     

                        <div class="submit">
                            <button type="submit" class="btn" name="update">Add Blog</button>
                        </div>
                    </div>
                 
               
                </div>
              
            </form>
            <script src="profile-update.js"></script>
            <script>
                function lettersOnly(input) {
                    var regex = /[^a-z ]/gi;
                    input.value = input.value.replace(regex, "");
                }
            </script>
        <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
            editor.resize(300,500);
    </script>
    <script> CKEDITOR.replace('editor')</script>
</body>

</html>