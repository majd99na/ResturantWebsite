<?php
$db=new mysqli('localhost','Alex','','resturantweb');
if($db->connect_error){
    die("Error :" . $db->connect_error);
}
?>