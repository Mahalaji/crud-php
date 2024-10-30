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

$a = '';
$con = mysqli_connect("localhost", "root", "", "user_details") or die("connection failed");

/*===============for update============Start==============*/

if (isset($_POST["update"])) {
    $Name = $_POST['Name'];
    $content = $_POST['content'];
    $id = $_POST['id'];
    $UpdateDate = $_POST['UpdateDate'];
    $Title = $_POST['Title'];
    $file = $_FILES['imagee']['name'];
    $file_name = str_replace(" ", "", $file);
    $tempname= $_FILES['imagee']['tmp_name'];
    $folder = 'image/'.$file_name;
    $needheight = 150;
    $needwidth = 200;

    $arrtest = getimagesize($tempname);

     $actualwidth = $arrtest[0];
     $actualheight = $arrtest[1];

     if($needwidth >= $actualwidth && $needheight >= $actualheight){
        $sql = 'UPDATE `blog` SET `Name` = "' . $Name . '",`Title` = "' . $Title . '", `Description` = "' . $content . '",`Update Date` = "' . $UpdateDate . '",`image` = "' . $file_name . '" WHERE `blog`.`id` = ' . $id;
         $result = mysqli_query($con, $sql);
        if(move_uploaded_file($tempname,$folder)){
            $a = "Record updated successfully";
    
        }
        else{
            echo"file not upload";
        }
     }
     else{ $error = "size should be width=200px height=150px";
    }
        
}

/*===============for update============End==============*/

//for fetch data
$id = $_GET['id'];


$sql = "SELECT *  FROM `blog` WHERE `id` = '$id';";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$Updatetime=date('Y-m-d ');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <link rel="stylesheet" type="text/css" href="css files/blog-edit.css">
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
            <h2 id="head"> Update-Blog</h2>
            <p id="view"><?php
                            print_r($a);
                            ?></p>
            <form id="update" method="post" enctype="multipart/form-data">
                <div id="d">
                    <div>
                        <div class="input-group">
                            <label>Name</label>
                            <input type="text" id="name" name="Name" onkeyup="lettersOnly(this)" value="<?php echo $row['Name']; ?>" required>
                        </div>
                        <div class="input-group">
                            <label>Title</label>
                            <input type="text" id="Title" name="Title" value="<?php echo $row['Title']; ?>" required>
                            <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>">
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
                    <div class="input-group">
                    <label>Image</label>
                    <img src="image/<?php echo $row['image'] ?>"/>
                    <input type="file" id="imagee" name="imagee"/>
                    <span style="color:red"><?php echo isset($error)?$error:'' ?></span>
                    
                    </div>
                        <div class="input-group">
                            <label>Create Date</label>
                            <input type="text" id="CreateDate" name="CreateDate" value="<?php echo $row['Create Date']; ?>" readonly="readonly">
                        </div>
                        <div class="input-group">
                            <label>Update Date</label>
                            <input type="text" id="UpdateDate" name="UpdateDate" value="<?php echo $Updatetime ?>" readonly="readonly">
                        </div>
                     

                      
                    </div>
                </div>
                <div class="submit">
                            <button type="submit" class="btn" name="update">update</button>
                        </div>
                <p id="p">

                     <a href="blog2.php">Back</a>
                    
                </p>
            </form>
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