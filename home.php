<?php
include 'DB.php';
session_start();
$_SESSION['current']='home';
if(isset($_SESSION['user_id'])&&isset($_SESSION['user_username'])){
    if(isset($_POST['add-btn'])) {
        $_SESSION['total']+=explode("¥",$_SESSION['cart']['Price'][$_POST['get-id']])[1];
        $_SESSION['cart']['Quantity'][$_POST['get-id']]++;
        $added_or_reduced=true;
     }
     elseif(isset($_POST['reduce-btn'])){
         if($_SESSION['cart']['Quantity'][$_POST['get-id']]==1){
            $_SESSION['total']-=explode("¥",$_SESSION['cart']['Price'][$_POST['get-id']])[1];
            array_splice($_SESSION['cart']['Title'],$_POST['get-id'],1);
            array_splice($_SESSION['cart']['Price'],$_POST['get-id'],1);
            array_splice($_SESSION['cart']['Quantity'],$_POST['get-id'],1);
         }
         else{
         $_SESSION['total']-=explode("¥",$_SESSION['cart']['Price'][$_POST['get-id']])[1];
         $_SESSION['cart']['Quantity'][$_POST['get-id']]--;
         }
         if(count($_SESSION['cart']['Title'])>0){
             $added_or_reduced=true;
         }
         else{
             $added_or_reduced=false;
         }
     }
     elseif(isset($_POST['remove-btn'])){
            $_SESSION['total']-=explode("¥",$_SESSION['cart']['Price'][$_POST['get-id']])[1]*
            $_SESSION['cart']['Quantity'][$_POST['get-id']];
            array_splice($_SESSION['cart']['Title'],$_POST['get-id'],1);
            array_splice($_SESSION['cart']['Price'],$_POST['get-id'],1);
            array_splice($_SESSION['cart']['Quantity'],$_POST['get-id'],1);
            if(count($_SESSION['cart']['Title'])>0){
                $added_or_reduced=true;
            }
            else{
                $added_or_reduced=false;
            }
     }
?>
<!Doctype html>
<html>
<head>
<link rel="stylesheet" href="style.php">
<script src="script2.js"></script>
    <title>Burger Hut</title>
</head>
<body>
    <div class="icon"></div>
    <?php include 'nav.php' ?>  
    <section class="cards-container">
    <?php 
        $food_title=array();
        $food_ing=array();
        $food_price=array();
        $food_dir=array();
        $food_category=array();
        $get_query="SELECT * FROM food";
        $result=$db->query($get_query);
        while($fetch= mysqli_fetch_assoc($result)){
        array_push($food_title,$fetch['Title']);
        array_push($food_ing,$fetch['ingrediants']);
        array_push($food_price,'¥'.$fetch['Price']);
        array_push($food_dir,$fetch['img_dir']);
        array_push($food_category,$fetch['Category']);
        }
        $i=0;
        while($i<count($food_title)){
    ?>
        <div class="card">
            <div class="card-img" style="background-image: url('<?=$food_dir[$i]?>');"></div>
            <h2 class="food-title"><?=$food_title[$i]?></h2>
            <h6 class="food-ing"><?=$food_ing[$i]?></h6>
            <h3 class="food-price"><?=$food_price[$i]?></h3>
            <?php if($_SESSION['user_id']==1){ ?>
            <form id='form<?=$i?>' method="post" action="delete_food.php">
            <input type="hidden" name="title-to-be-deleted" value="<?=$food_title[$i]?>"> 
            <a href='javascript: submitform(<?=$i?>)'>
                <div class="hov">
                    <div class="delete-button">+</div>
                    <span class="delete-msg">Delete</span>
                </div>
            </a>
            </form>
            <form method="post">
                <input type="hidden" name="id" value="<?=$i+1?>">
                <input type="hidden" name="title" value="<?=$food_title[$i]?>">
                <input type="hidden" name="ing" value="<?=$food_ing[$i]?>">
                <input type="hidden" name="price" value="<?=$food_price[$i]?>">
                <input type="hidden" name="category" value="<?=$food_category[$i]?>">
                <button name='edit-btn' id="edit-food-btn" type="submit">Edit</button>
            </form>
            <?php } elseif($_SESSION['user_id']!=1){ ?>
                <form id='form' method="post" action="add_to_cart.php">
            <input type="hidden" name="title" value="<?=$food_title[$i]?>"> 
            <input type="hidden" name="price" value="<?=$food_price[$i]?>"> 
            <button class="add-cart-btn" type="submit">Add To Cart</button>
            </form>
            <?php } ?>
        </div>
        <?php $i++;
    } 
    if(isset($_POST['edit-btn'])){
        echo "<style>#edit-food-container{display:block;}</style>";
    ?>
            <div id="edit-food-container">
                <div id="edit-food-form">
                    <div class="close-food-edit">+</div>
                    <form name="edit-form" method="post" action="edit_food.php">
                        <input name="id" type="hidden" value=<?=$_POST['id']?>>
                <label id="edit-title-label">Title:</label><input name="title" type="text" value="<?=$_POST['title']?>">
                <label id="edit-ing-label">Ingrediants:</label><input name="ing" type="text" value="<?=$_POST['ing']?>">
                <label id="edit-price-label">Price:</label><input name="price" type="text" value="<?=explode("¥",$_POST['price'])[1]?>">
                <select id="category" name="category" required>
                    <label>Category</label>
                    <?php if($_POST['category']=='Main'): ?>
                    <option value="Main" selected="selected">Main</option>
                    <option value="Appetizer">Appetizer</option>
                    <option value="Dessert">Dessert</option>
                    <option value="Beverage">Beverage</option>
                    <option value="Breakfast">Breakfast</option>
                    <?php elseif($_POST['category']=='Appetizer'):?>
                    <option value="Main">Main</option>
                    <option value="Appetizer" selected="selected">Appetizer</option>
                    <option value="Dessert">Dessert</option>
                    <option value="Beverage">Beverage</option>
                    <option value="Breakfast">Breakfast</option>
                    <?php elseif($_POST['category']=='Dessert'):?>
                    <option value="Main" >Main</option>
                    <option value="Appetizer">Appetizer</option>
                    <option value="Dessert" selected="selected">Dessert</option>
                    <option value="Beverage">Beverage</option>
                    <option value="Breakfast">Breakfast</option>
                    <?php elseif($_POST['category']=='Beverage'):?>
                    <option value="Main" >Main</option>
                    <option value="Appetizer">Appetizer</option>
                    <option value="Dessert">Dessert</option>
                    <option value="Beverage" selected="selected">Beverage</option>
                    <option value="Breakfast">Breakfast</option>
                    <?php elseif($_POST['category']=='Breakfast'):?>
                    <option value="Main" >Main</option>
                    <option value="Appetizer">Appetizer</option>
                    <option value="Dessert" >Dessert</option>
                    <option value="Beverage" >Beverage</option>
                    <option value="Breakfast" selected="selected">Breakfast</option>
                    <?php endif ?>
                </select>
                    <button name="edit-food-submit" type="submit">Submit</button>
                    </form>
                </div>
            </div>
            <?php } ?>
    </section>
    <div class="cart-container-container">
        <div class="cart-container">
            <div class="close-cart">+</div>
            <form action="clear_cart.php" method="post">
            <button type="submit" name="clear-cart" id="clear-cart">Clear</button>
            </form>
            <div class="cart-table-container">
                <h2 id="order">Your Order</h2>
<?php if(count($_SESSION['cart']['Title'])>0){ ?>
        <table>
            <thead>
                <tr>
                <th>NO.</th>
                <th>Dish</th>
                <th>Quantity</th>
                <th>Price</th>
                </tr>
            </thead>
            <tbody>
        <?php
            $j=0;
            while($j<count($_SESSION['cart']['Title'])){
            ?>
            <tr>
                <td><?=$j+1?></td>
                <td><?=$_SESSION['cart']['Title'][$j]?></td>
                <td id="quantity"> <form method="post">
                    <button type="submit" name="reduce-btn" id="reduce-quantity-btn">-</button>
                    <input type="hidden" name="get-id" value="<?=$j?>">
                    <?=$_SESSION['cart']['Quantity'][$j]?>
                    <button type="submit" name="add-btn" id="add-quantity-btn">+</button>
                    <button type="submit" name="remove-btn" id="remove-btn">Remove</button>
                    </form>
            </td>
                <td><?=$_SESSION['cart']['Price'][$j]?></td>
            </tr>
        <?php $j++;}?>
                <tr id="total">
                    <td colspan="3" align="right">Total</td>
                    <td><?=$_SESSION['total']?></td>
                </tr>
            </tbody>
            </table>
            <?php }else echo "Your order is Empty"; ?>
            </div>
            </div>
    </div>
</body>
</html>
<?php
if(isset($added_or_reduced)){
    if($added_or_reduced){
        echo "<style>.cart-container-container{display:block;}</style>";
    }
    else{
        echo "<style>.cart-container-container{display:none;}</style>";
    }
}
    }
        else{
            header('Location: Login.php');
        }
?>