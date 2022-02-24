<section>
    <img style="height: 100px" src="logo.jpg" alt="logo" srcset="">
    <nav>
        <ul>
            <?php if(isset($_SESSION['userInfo'])) { ?>
                <li style="list-style-type: none;"><a style="text-decoration: none;" href="index.php">Home</a></li>
                <li style="list-style-type: none;"><a style="text-decoration: none;" href="#">Category</a>
                    <ul>
                        <li style="list-style-type: none;"><a style="text-decoration: none;" href="laptop.php" target="_blank">Laptop</a></li>
                        <li style="list-style-type: none;"><a style="text-decoration: none;" href="mobile.php" target="_blank">Mobile</a></li>
                        <li style="list-style-type: none;"><a style="text-decoration: none;" href="camera.php" target="_blank">Camera</a></li>
                    </ul>                         
                </li>
                <li style="list-style-type: none;"><a style="text-decoration: none;" href="cart.php">Cart</a></li>
                <li style="list-style-type: none;"><a style="text-decoration: none;" href="login.php">Logout</a></li>
            <?php } else { ?>
                <li style="list-style-type: none;"><a style="text-decoration: none;" href="index.php">Home</a></li>
                <li style="list-style-type: none;"><a style="text-decoration: none;" href="#">Category</a>
                    <ul>
                        <li style="list-style-type: none;"><a style="text-decoration: none;" href="laptop.php" target="_blank">Laptop</a></li>
                        <li style="list-style-type: none;"><a style="text-decoration: none;" href="mobile.php" target="_blank">Mobile</a></li>
                        <li style="list-style-type: none;"><a style="text-decoration: none;" href="camera.php" target="_blank">Camera</a></li>
                    </ul>                         
                </li>
                <li style="list-style-type: none;"><a style="text-decoration: none;" href="register.php">Register</a></li>
                <li style="list-style-type: none;"><a style="text-decoration: none;" href="login.php">Login</a></li>
            <?php } ?>
        </ul>
    </nav>
</section>