<?php include "dbConnection.php" ?>
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
    <?php include "product.php" ?>    
    <?php include "category.php" ?>    
</body>
</html>
<?php 
    mysqli_close($dbConnection);
?>