<?php 
session_start();
$_SESSION['current']='reg';
if(!isset($_SESSION['user_id'])&&!isset($_SESSION['user_username'])){
include 'DB.php';
$iserror=FALSE;
if($_POST){
if(isset($_POST['username']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['password'])){
    $username=$_POST['username'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $pass=password_hash($_POST['password'],PASSWORD_DEFAULT);
}
else{
    echo '<p style="color:white">You left an empty input</p>';
}
$checkquery="SELECT username FROM users WHERE username='$username'";
$insert_query="INSERT INTO users(FirstName,LastName,username,password) VALUES ('$fname','$lname','$username','$pass') ";
if($result=$db->query($checkquery)){
    if($result->num_rows>0){
    $iserror=TRUE;
    $error = 'Error, username exists';
    }
    else{
        if($db->query($insert_query))
        header('Location: Login.php');
        else{
            $iserror=TRUE;
            if(strlen($username)>8) $error='Username can\'t be more than 8 charecters';
            else{
            $error = 'Couldn\'t Register , try again';
            }

        }
    }

}
}
include 'nav.php';
?>

<!Doctype html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="style.php">
        <title>Registeration-2</title>
    </head>
    <body>
    <?php if($_SERVER['PHP_SELF']=="/alex/register2.php") $_COOKIE['current']="reg-btn"; ?>
        <div class="container">
            <div class="registerbox">
                <form method="post" action="register2.php" autocomplete="off">
                <input type="text" name="fname" placeholder="First Name"  required autofocus><br>
                <input type="text" name="lname" placeholder="Last Name"><br>
                <input type="text" name="username" placeholder="Username" required ><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <?php
                if($iserror) { ?>
                    <p style="background-color:rgba(241, 0, 0, 0.349);
                    width:5cm;text-align:center;align-items:center;display:inline-table;
                    ;font:12pt ;font-family:'Segoe UI';
                    font-weight:bold;color:white;border-radius:5px;margin-bottom:-1cm"> <?php echo $error ?> </p>;
                <?php } ?>
                <button type="submit">Register</button>
                 </form>
                <a href="login.php" class="reset">Have an account? log in here</a>
            </div>
         </div>
    </body>
</html>
<?php }
else header('Location: home.php');
?>