<?php 
include("dbConnection.php");
unset($_SESSION['userInfo']);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["submit"])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user_type = $_POST['user_type'];

        $select_query = "SELECT * FROM `users` WHERE `email`= '$email' AND `password` = '$password'";

        $query = mysqli_query($dbConnection, $select_query);
        
        $user_variation = mysqli_fetch_array($query);
        
        if($user_variation["user_type"] == "admin") {
            $_SESSION['userInfo'] = true;
            header('Location: admin.php');
            $_SESSION['login_success'] = "Sign in successfully.";
        } elseif($user_variation["user_type"] == "user") {
            $_SESSION['userInfo'] = true;
            header('Location: index.php');
            $_SESSION['login_success'] = "Sign in successfully.";
        } else {
            $_SESSION['login_err'] = "Something went wrong. Please try again!";;
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
    <title>Sign In</title>
</head>
<body class="container-fluid">
    <?php include("navigation.php");?>
    <!-- <?php echo isset($_SESSION['login_success']) ? $_SESSION['login_success'] : null;?> -->
    <?php echo isset($_SESSION['login_err']) ? $_SESSION['login_err'] : null;?>
    <div>
        <h3>Login Form</h3>
        <form action="" method="post" autocomplete="on">
                <input type="email" name="email" id="email" placeholder="email" required><br><br>
                <input type="password" name="password" id="password" placeholder="password" required><br><br>
                <input type="checkbox" name="checkbox" id="checkbox">
                <label for="checkbox">Remember Me!</label><br>
            <input type="hidden" name="user_type" value="admin">
            <input type="submit" value="Login" name="submit" style="margin-top: 21px;">
        </form>
    </div>
</body>
</html>

<?php 
    mysqli_close($dbConnection);
    unset($_SESSION['login_err']);
?>
