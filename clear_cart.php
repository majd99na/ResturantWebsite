<?php
session_start();
if(isset($_POST['clear-cart'])){
$i=0;
while($i<count($_SESSION['cart']['Title'])){
array_splice($_SESSION['cart']['Title'],$i);
array_splice($_SESSION['cart']['Price'],$i);
array_splice($_SESSION['cart']['Quantity'],$i);
}
$_SESSION['total']=0;
}
header('Location: index.php');
?>