<?php 
include "dbConnection.php";
unset($_SESSION['userInfo']);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["submit"])){
        $email = $_POST['email'];
        $user_name = $_POST['username'];
        $password = $_POST['password'];
        $user_type = $_POST['user_type'];

        $insertQuery = "INSERT INTO `users`(`userName`, `email`, `password`, `user_type`) 
        VALUES ('$user_name','$email','$password','$user_type')";

        $query = mysqli_query($dbConnection, $insertQuery);
        if($query) {
            $_SESSION['success_msg'] = "Registration Successful";
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
    <title>Register</title>
</head>
<body class="container-fluid">
    <?php include "navigation.php" ?>
    <?php echo isset($_SESSION['success_msg']) ? $_SESSION['success_msg'] : null;?>
    <div>
        <h3>Register Form</h3>
        <form action="" method="post" autocomplete="on">
            <input type="text" name="username" id="username" placeholder="username" required><br><br>
            <input type="email" name="email" id="email" placeholder="email" required><br><br>
            <input type="password" name="password" id="password" placeholder="password" required><br>
            <input type="hidden" name="user_type" value="user">
            <input type="submit" value="Register" name="submit" style="margin-top: 21px;">
        </form>
    </div>
</body>
</html>

<?php 
    mysqli_close($dbConnection);
    unset($_SESSION['success_msg']);
?>
