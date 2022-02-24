<?php 
    include("dbConnection.php");

    $select_query = "SELECT * FROM `cart`";
    // $select_query = "SELECT * FROM `cart` WHERE `product_id`='6'";

    $query = mysqli_query($dbConnection, $select_query);

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["remove"])){
            $product_id = $_POST['product_id'];

            $delete_query = "DELETE FROM `cart` WHERE `cart`.`product_id` = '$product_id'";
            $result = mysqli_query($dbConnection, $delete_query);
            if($result) {
                $_SESSION['success_msg'] = "add to cart Successful";
            }
            
        }
    }

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
            <form action="" method="post">
                <h3><?php echo $user['product_name'];?></h3>
                <p><?php echo "$". ($user['product_price'])?></p>
                <p><?php echo $user['category'];?></p>
                <input type="hidden" name="product_id" value="<?php echo $user['product_id'];?>">
                <input type="submit" value="remove" name="remove">
            </form>
        </div>
    <?php } ?>
</body>
</html>
<?php 
    mysqli_close($dbConnection);
?>