<?php
  session_start();
  $_SESSION['error']="";
  header("Refresh:0 ; url=account.php");
?>