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
    <h3 style="margin: 0px; float: left; padding-right: 35px">Invoice No.</h3>
    <h3 style="margin: 0px">Date</h3>
    <span style="padding-right: 50px">000003410</span>
    <span><?php echo date('d-m-y h:i:s') ?></span>
    
    
    <table>
        <tr>
            <th>Item</th>
            <th>Category</th>
            <th>Price</th>
            <th>Vat</th>
            <th>Total</th>
        </tr>
    <?php 
        $sum = 0;
        $total = 0;
    ?>
    <?php while($user = mysqli_fetch_assoc($query)) { ?>
        <tr>
            <td><?php echo $user['product_name'];?></td>
            <td><?php echo $user['category'];?></td>
            <td><?php echo "$". ($user['product_price'])?></td>
            <td><?php echo "$". ($user['product_price']*.05)?></td>
            <td><?php echo "$" . $sum  =  ($user['product_price']) + ($user['product_price'])*.05?></td>
            <?php $total = $total + $sum ?>
        </tr>
    <?php } ?>
    </table>
    <hr style="width: 250px; margin-left: 0px">
    <span style="margin-left: 165px"><?php echo 'Total $'. $total ?></span>
</body>
</html>
<?php 
    mysqli_close($dbConnection);
?>