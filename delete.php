<?php
include 'DB.php';
session_start();
if(isset($_SESSION['user_id'])&&isset($_SESSION['user_username'])):
    
    if($_POST&&isset($_POST['op'])){
        if(password_verify($_POST['op'],$_SESSION['password'])){
            $id=$_SESSION['user_id'];
    $query="DELETE FROM users WHERE id= $id ";
    $db->query($query);
    $db->query("ALTER TABLE users AUTO_INCREMENT=1");
    session_start();
    session_unset();
    session_destroy();
    header('Location: Login.php');
        }
        else{
            $_SESSION['error']="true";
            $_SESSION['errorm']="Couldn't delete your account";
            header ('Location: account.php');
        }
    }
else
header ('Location : index.php');
endif
?>