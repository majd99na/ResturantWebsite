<?php
include 'DB.php';
session_start();
if(isset($_SESSION['user_id'])){
    if($_SESSION['user_id']==1){
        if(isset($_POST['edit-food-submit'])){
            $title=$_POST['title'];
            $ing=$_POST['ing'];
            $price=$_POST['price'];
            $id=$_POST['id'];
            $edit_query="UPDATE food SET Title='$title',ingrediants='$ing',Price='$price' WHERE ID='$id'";
            $db->query($edit_query) or die ("Failed");
            header('Location:home.php');
        }        
    }
    else{
        header('Location:home.php');
    }
}
else{
    header('Location: Login.php');
}
?>