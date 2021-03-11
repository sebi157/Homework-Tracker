<html>
    <head>
        <title>Sign up</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div class="home">
            <a href="index.php"> <button> <img src="home.png" alt="home" width="60px" height="60px"> </button></a>
        </div> 
        <div class="register-form">
            <p>Sign up</p>
            <form action="includes/register.inc.php" method="post">
                <input type="text" name="name" placeholder="Your name...">
                <input type="text" name="email" placeholder="Email address...">
                <input type="text" name="username" placeholder="Username...">
                <input type="password" name="pwd" placeholder="Password...">
                <input type="password" name="confirm_pwd" placeholder="Confirm password...">
                <button type="submit" name="submit">Sign up</button>
            </form>
            <div class="already">
                <p>Already have an account?</p>
                <a href="login.php">Log in!</a>
            </div>
            <?php
            if(isset($_GET["error"]))
            {
                if($_GET["error"]== "emptyinput")
                {
                    echo "<script>alert('Please complete all fields!');</script>";
                }
                else if($_GET["error"]== "invalidUid")
                {
                    echo "<script>alert('Please choose a valid username! (A-Z, a-z, 1-9)');</script>";
                }
                else if($_GET["error"]== "invalidEmail")
                {
                    echo "<script>alert('Invalid Email!');</script>";
                }
                else if($_GET["error"]== "passwordsdontmatch")
                {
                    echo "<script>alert('The passwords don't match!');</script>";
                }
                else if($_GET["error"]== "stmtFailed")
                {
                    echo "<script>alert('Something went wrong. Please try again!');</script>";
                }
                else if($_GET["error"]== "UsernameTaken")
                {
                    echo "<script>alert('That username is already taken!');</script>";
                }
                else if($_GET["error"]== "none")
                {
                    echo "<script>alert('You have signed up!');</script>";
                }
            }
        
        ?>
        </div>
        
    </body>
</html>