<?php 
include("dbConnection.php");

    $select_query = "SELECT * FROM `cart`";

    $query = mysqli_query($dbConnection, $select_query);

?>

<?php include_once "dbConnection.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <?php include "navigation.php" ?>
    <h3>My Products</h3>
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
</body>
</html>
<?php 
    mysqli_close($dbConnection);
?>