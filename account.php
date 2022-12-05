<?php
include 'DB.php';
session_start();
$_SESSION['current']='account';
if(isset($_SESSION['user_id'])&&isset($_SESSION['user_username']))
{
    $errorb=false;
    $success=false;
    $username=htmlspecialchars($_SESSION['user_username']);
    $id=htmlspecialchars($_SESSION['user_id']);
    if($_POST){
        if(isset($_POST['resetpasssubmit'])){
        $correctp=htmlspecialchars($_SESSION['password']);
        $op=htmlspecialchars($_POST['op']);
        $np=htmlspecialchars($_POST['np']);
        $np2=htmlspecialchars($_POST['np2']);
        if($np==$np2&&password_verify($op,$correctp)){
            $hashed_p=password_hash($np,PASSWORD_DEFAULT);
            $query="UPDATE users SET password='$hashed_p' WHERE ID=$id";
            $db->query($query);
            $success=true;
            header("Refresh:2;Logout.php");
        }
        else if($np!=$np2) {
            $errorb=true;
            $error="Passwords don't match";
        }
        else{
            $errorb=true;
            $error="Current password incorrect";
        }
    }
}
?>
<!Doctype html>
<html>
    <head>
        <link rel="stylesheet" href="style.php">
        <script src="script.js"></script>
        <title>
                Account Settings
        </title>
    </head>
    <body>
        <?php include 'nav.php' ?>
        <div class="user-info-container">
                <div><h1 class="edit-title">User Account</h1></div>
                        <div class="user-info">
                            <h3>First Name : <?=$_SESSION['user_FName']?></h3>
                            <h3>Last Name : <?=$_SESSION['user_LName']?> </h3>
                            <h3>Username : <?=$_SESSION['user_username']?> </h3>
                        </div>
                        <div class="buttons">
                        <div><button class="change-pass-btn">Change the Password</button></div>
                        <div><button class="delete-btn">Delete your account</button></div>
                        </div>
                        <?php if($_POST)if($success): ?>
                                    <p style="background-color: rgba(0, 255, 13, 0.459);;
                    width:5cm;text-align:center;align-items:center;display:inline-table;
                    ;font:12pt ;font-family:'Segoe UI';font-weight:bold;color:white;border-radius:5px;margin-top:-20px">
                    <?php echo "Password updated successfully, you are being directed to the Login page..."?> </p></br>
                                    <?php endif ?>
                </div>
                <div class="edit-form-container">
                        <div class="form-container" id="box1">
                        <a href="clear.php"><div class="close">+</div></a>
                             <form class="reset-pass-container" method="post" action="account.php">
                                <input class="username-input" type="text" name="username" 
                                placeholder="<?=htmlspecialchars($username)?>"  readonly >
                                <input type="password" name="op" placeholder="Enter Currrent Password">
                                <input id ="np1" type="password" name="np" placeholder="Enter New Password">
                                <input id = "np2" type="password" name="np2" placeholder="Re-enter New Password">
                                <?php if($_POST)if($errorb): ?>
                                    <script>
                                        document.querySelector('.edit-form-container').style.display="block";
                                    </script>
                                    <?php if($error=="Current password incorrect"){?>
                                        <style>
                                        #cureent-password{
                                            border:2px dashed red;
                                            outline:red;
                                        }
                                        </style>
                                    <?php }else if($error="Passwords don't match"){ ?>
                                        <style>
                                        #np1,#np2{
                                            border:2px dashed red;
                                            outline:red;
                                        }
                                        </style>
                                        <?php } ?>
                                    <p style="background-color:rgba(241, 0, 0, 0.7);
                    width:5cm;text-align:center;align-items:center;display:inline-table;
                    ;font:12pt ;font-family:'Segoe UI';font-weight:bold;color:white;border-radius:5px;margin-top:-20px">
                    <?php echo $error?> </p></br>
                                    <?php endif ?>
                                <button class="submit" type="submit" name="resetpasssubmit">Submit</button>
                            </form>
                        </div>
                </div>
                <div class="delete-form-container">
                    <div class="form-container">
                    <a href='clear.php'><div name="close2" class="close2">+</div></a>
                            <h3>Please confirm your password</h3>
                            <form  method="post" action="delete.php">
                                <input type="password" name="op" placeholder="Password">
                                <?php if($_SESSION['error']=="true"){ ?>
                                    <style>
                                        .delete-form-container{
                                            display: block;
                                        }
                                    </style>
                                    <p style="background-color:rgba(241, 0, 0, 0.7);
                    width:5cm;text-align:center;align-items:center;display:inline-table;
                    ;font:12pt ;font-family:'Segoe UI';font-weight:bold;color:white;border-radius:5px;margin-top:-20px">
                    <?php echo $_SESSION['errorm']?> </p></br>
                                    <?php } ?>
                                    <button  type="submit">Delete my account</button>
                            </form>
                            <script></script>
                    </div>
                </div>
    </body>
</html>
<?php
}
        else
        {
            header('Location: home.php');
        } 
?>