<?php
session_start();
?>
<html>
    <head>
        <title>Forgot your password?</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div class="home">
            <a href="index.php"> <button> <img src="home.png" alt="home" width="60px" height="60px"> </button></a>
        </div>
        <div class='forgot-form'>
            <p>Enter your email to reset your password!</p>    
            <form action="includes/forgot.inc.php" method="post">
                    <input type="text" name="email" placeholder="Email...">
                    <button type="submit" name="request_submit">Reset password</button>
            </form>
        </div>
    </body>
</html>