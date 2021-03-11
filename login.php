<?php
session_start();
?>
<html>
    <head>
        <title>Login</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div class="home">
            <a href="index.php"> <button> <img src="home.png" alt="home" width="60px" height="60px"> </button></a>
        </div>
        <div class="register-form">
            <p>Log In</p>
            <form action="includes/login.inc.php" method="post">
                <input type="text" name="email" placeholder="Email/Username...">
                <input type="password" name="pwd" placeholder="Password...">
                <div class='forgot'> <a href="forgot.php">Forgot your password?</a></div>
                <button type="submit" name="Submit">Log in</button>
            </form>
            <div class="already">
                <p>Don't have an account?</p>
                <a href="register.php">Sign up!</a>
            </div>
            <?php
            if(isset($_GET["error"]))
            {
                if($_GET["error"]== "emptyinput")
                {
                    echo "<div class='emptyinput'>
                            <p style='color:red;'>Please complete all fields!</p>
                        </div>";
                }
                else if($_GET["error"]== "wrongpassword")
                {
                    echo "<div class='wronglogin'>
                            <p style='color:red;'>Wrong login info!</p>
                        </div>";
                }
            }
            ?>
        </div>
    </body>
</html>