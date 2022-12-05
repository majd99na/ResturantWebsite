<?php
session_start();
$_SESSION['current']='login';
if(!isset($_SESSION['user_id'])&&!isset($_SESSION['user_username'])){
if($_POST){
include 'DB.php';
$pass=FALSE;$userexist=FALSE;
if(isset($_POST['username'])){
$givenusername=$_POST['username'];
}
else{
    echo 'Errrr';
}
if(isset($_POST['password'])){
$givenpassword=$_POST['password'];
}
//$sql="SELECT username FROM users WHERE username=$givenusername";
//$result=mysqli_query($conn,$sql);
if ($result = mysqli_query($db, "SELECT * FROM users WHERE username='$givenusername'")) {
    $fetched=mysqli_fetch_assoc($result);
    if($result->num_rows<1){
        $userexist=TRUE;
        $error='Username does not exist';
    }   
    else if(!password_verify($givenpassword,$fetched['password'])){
        $pass=TRUE;
        $error='Incorrect password';
    }
    else if($fetched['username']==$givenusername && password_verify($givenpassword,$fetched['password'])){
            $pass=TRUE;
            $username=$fetched['username'];
            $id=$fetched['ID'];
            $FNAME=$fetched['FirstName'];
            $LNAME=$fetched['LastName'];
            $password=$fetched['password'];
            $_SESSION['user_id']=$id;
            $_SESSION['user_username']=$username;
            $_SESSION['user_FName']=$FNAME;
            $_SESSION['user_LName']=$LNAME;
            $_SESSION['password']=$password;
            $_SESSION['error']="";
            $_SESSION['cart']['Title'] = array();
            $_SESSION['cart']['Price'] = array();
            $_SESSION['cart']['Quantity'] = array();
            $_SESSION['total'] = 0;
             header('Location: index.php');
}
}
}
?>
<!Doctype html>
<html lang="en">
    <head>

        <link rel="stylesheet" href="style.php">
        <title>Log in</title>
    </head>
    <body>
    <?php include 'nav.php' ?>
        <div class="container">
        <div class="loginbox">
            <form method="post" action="Login.php" autocomplete="off">
                <input class="username" type="text" name="username" placeholder="Username" autofocus><br>
                <input class="password"type="password" name="password" placeholder="Password"><br>
                <?php if($_POST)if($pass):?>
                    <style>
                        .password{
                            border:2px solid red;
                    </style>
                    <p style="background-color:rgba(241, 0, 0, 0.349);
                    width:5cm;text-align:center;align-items:center;display:inline-table;
                    ;font:12pt ;font-family:'Segoe UI';font-weight:bold;color:white;border-radius:5px">
                    <?php echo $error?> </p>
                    <?php endif?>
                    <?php if($_POST)if($userexist):?>
                        <p style="background-color:rgba(241, 0, 0, 0.349);
                    width:5cm;text-align:center;align-items:center;display:inline-table;
                    ;font:12pt ;font-family:'Segoe UI';font-weight:bold;color:white;
                    border-radius:5px;">
                    <?php echo $error ?> </p>
                    <style>
                        .username{
                            border:2px solid red;
                    </style>
                    <?php endif?>

                <button class="login-button" name="submit"type="submit">Log In</button>
            </form>
            <a class="forgot-password">Forgot password?</a>
        </div>
    </div>
    </body>

</html>
<?php }
else header('Location: home.php');
?>