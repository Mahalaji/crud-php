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

        #image {
            width: 100%;
            height: 86vh;
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

        .button {
            background-color: grey;
            border: none;
            color: white;
            padding: 10px 15px;
            text-align: right;
            text-decoration: none;
            display: right;
            font-size: 16px;
            margin: auto;
            cursor: pointer;
            float: right;
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
            <form align="right" method="post">
            <button name="Logout" style="padding: 7px;
    border-radius: 9px;">Log out</button>
        </form>
    
            </div>
            <img id="image" src="create.jpg">
            <div class="admin">
       
  </div>