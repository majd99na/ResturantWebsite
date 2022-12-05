<?php
include 'DB.php';
if(isset($_POST['title-to-be-deleted'])){
    $title=$_POST['title-to-be-deleted'];
    $query = "DELETE FROM food WHERE Title='$title'";
    $dir_query = "SELECT img_dir FROM food WHERE Title='$title'";
    $dir_result=$db->query($dir_query);
    $dir=mysqli_fetch_assoc($dir_result);
    $db->query($query) or die ("No can do");
    $db->query("ALTER TABLE food AUTO_INCREMENT=1");
    unlink($dir['img_dir']);
    header('Location: index.php');
}
?>
