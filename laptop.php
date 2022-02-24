<?php 
include("dbConnection.php");

    $select_query = "SELECT * FROM `product` WHERE `category` = 'laptop'";

    $query = mysqli_query($dbConnection, $select_query);

?>
   <h3>Our Products</h3>
    <?php while($user = mysqli_fetch_assoc($query)) { ?>
        <div style="width: 5rem; border: 1px solid black; padding: 10px; margin-right: 10px; float: left">
            <div>
                <h3><?php echo $user['product_name'];?></h3>
                <p><?php echo "$". $user['product_price'];?></p>
                <p><?php echo $user['category'];?></p>
                <a href="#">add to cart</a>
            </div>
        </div>
    <?php } ?>
<?php 
    mysqli_close($dbConnection);
?>