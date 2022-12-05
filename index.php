<?php
session_start();
include 'nav.php';
include 'DB.php';
$_SESSION['current']="index";
if(!isset($_SESSION['user_id'])&&!isset($_SESSION['user_username'])){
    
?>
<!Doctype html>
<html>
    <head>
        <link rel="stylesheet" href="style.php">
        <title>Resturant</title>
    </head>
    <body>
        <div id="breakfast"><h1>Breakfast</h1></div>
        <div class="slides">
            <div class="slide">
            <div class="img" style="background-image:url('UploadFolder/Asian-Bowl.png');"></div>
            </div>
            <div class="slide">
            <div class="img" style="background-image:url('UploadFolder/Beef-Stew.png');"></div>
            </div>
        </div>
        <div id="main"><h1>Main-Course</h1></div>
        <div id="desserts"><h1>Desserts</h1></div>
    </body>
</html>

<?php } else 
header('Location: home.php');
?>