<?php
if (isset($_POST["request_submit"]))
{
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);
    $url = "www.hwtracker.net/forgotpwd/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);
    $expires = date("U") + 1800;
    require 'dbh.inc.php';

    $userEmail = $_POST["email"];
    $sql = "DELETE FROM pwdreset WHERE pwdResetEmail=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_init($stmt,$sql))
    {
        echo "There was a server error!";
        exit();
    }
    else
    {
        mysql_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO pwdreset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?,?,?,?);";
}
else
{
    header("Location: ../index.php");
}