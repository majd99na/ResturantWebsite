<div class="nav">
        <div class="website-title"><h2>Resturant</h2></div>
        <div><a href="index.php"><button id="home-btn">Home</button></a></div>
        <?php if(!isset($_SESSION['user_id'])): ?>
        <div><a href="Login.php"><button id="login-btn">Log In</button></a></div>
        <div><a href="register2.php"> <button id="reg-btn">Register</button></a></div>
        <?php endif ?>
        <?php if(isset($_SESSION['user_id']))if($_SESSION['user_id']==1): ?>
            <div><a href="admin.php"><button id="admin-btn">Admin</button></a></div>
            <?php endif ?>
        <?php  if(isset($_SESSION['user_id'])): 
        if(count($_SESSION['cart']['Title'])>0)
        echo "<style>#cart-img{background-color:red;}</style>";
        ?>
            <div><a href="logout.php"><button>Logout</button></a></div>
            <div class="user"> <h3 class="hello">Hello <?=$_SESSION['user_FName']?> </h3> </div>
            <div><a href="account.php"><button id="acc-btn">Account</button></a></div>
            <?php if($_SESSION['user_id']>1&&$_SESSION['current']=='home'){ ?>
            <div id="cart-img-container">
            <img id="cart-img" src="cart.png">
            <p id="cart-indicator"><?=count($_SESSION['cart']['Title'])?></p>
            </div>
            <?php } ?>
        <?php endif ?>
    </div>
    