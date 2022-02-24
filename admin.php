<?php 
include "dbConnection.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["create_category"])){
        $category_name = $_POST['category'];

        $insertQuery = "INSERT INTO `category`(`category_name`) 
        VALUES ('$category_name')";

        $query = mysqli_query($dbConnection, $insertQuery);
        if($query) {
            $_SESSION['success_msg'] = "Category Create Successful";
        }
        
    }
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["create_product"])){
        $product_name = $_POST['name'];
        $product_price = $_POST['price'];
        $category = $_POST['category'];

        $insertQuery = "INSERT INTO `product`(`product_name`, `product_price`, `category`) 
        VALUES ('$product_name', '$product_price', '$category')";

        $query = mysqli_query($dbConnection, $insertQuery);
        if($query) {
            $_SESSION['success_msg'] = "Product Create Successful";
        }
        
    }
}
?>
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
    <?php echo isset($_SESSION['success_msg']) ? $_SESSION['success_msg'] : null;?>
    <h3>Create Category</h3>
    <form action="" method="post" autocomplete="on">
        <input type="text" name="category" id="category" placeholder="enter category name" required><br><br>
        <input type="submit" name="create_category" value="Create Category">
    </form>
    <h3>Create Product</h3>
    <form action="" method="post" autocomplete="on">
        <input type="text" name="name" id="name" placeholder="enter product name" required><br><br>
        <input type="number" name="price" id="price" placeholder="enter product price" required><br><br>
        <input type="text" name="category" id="category" placeholder="enter product category name" required><br><br>
        <input type="submit" name="create_product" value="Create Product">
    </form>
</body>
</html>
<?php 
    mysqli_close($dbConnection);
    unset($_SESSION['success_msg']);
?>