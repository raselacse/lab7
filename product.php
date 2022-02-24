<?php 
    include("dbConnection.php");
    $select_query = "SELECT * FROM `product`";
    $query = mysqli_query($dbConnection, $select_query);

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["add_to_cart"])){
            $product_id = $_POST['product_id'];
            $product_name = $_POST['product_name'];
            $product_price = $_POST['product_price'];
            $category = $_POST['category'];
    
            $insertQuery = "INSERT INTO `cart`(`product_id`, `product_name`, `product_price`, `category`) 
            VALUES ('$product_id', '$product_name', '$product_price', '$category')";
    
            $cart = mysqli_query($dbConnection, $insertQuery);
            if($cart) {
                $_SESSION['success_msg'] = "add to cart Successful";
            }
            
        }
    }

?>
   <h3>Our Products</h3>
    <?php while($user = mysqli_fetch_assoc($query)) { ?>
        <div style="width: 5rem; border: 1px solid black; padding: 10px; margin-right: 10px; float: left">
            <form action="" method="post">
                <h3><?php echo $user['product_name'];?></h3>
                <p><?php echo "$". $user['product_price'];?></p>
                <p><?php echo $user['category'];?></p>
                <!-- <a href="#">add to cart</a> -->
                
                <input type="hidden" name="product_id" value="<?php echo $user['product_id'];?>">
                <input type="hidden" name="product_name" value="<?php echo $user['product_name'];?>">
                <input type="hidden" name="product_price" value="<?php echo $user['product_price'];?>">
                <input type="hidden" name="category" value="<?php echo $user['category'];?>">
                <input type="submit" value="add to cart" name="add_to_cart">
            </form>
        </div>
    <?php } ?>
<?php 
    mysqli_close($dbConnection);
?>