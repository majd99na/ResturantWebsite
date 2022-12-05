<?php 
session_start();
if(isset($_SESSION['user_id'])){
    if(isset($_POST['title'])){
        if(!in_array($_POST['title'],$_SESSION['cart']['Title'])){
        $_SESSION['total']+=explode("¥",$_POST['price'])[1];
        array_push($_SESSION['cart']['Title'],$_POST['title']);
        array_push($_SESSION['cart']['Price'],$_POST['price']);
        array_push($_SESSION['cart']['Quantity'],1);
        }
        else{
            $id = array_search($_POST['title'],$_SESSION['cart']['Title']);
            $_SESSION['cart']['Quantity'][$id]+=1;
            $_SESSION['total']+=explode("¥",$_POST['price'])[1];
        }

    }
     header ('Refresh:0 ; home.php');
}
?>