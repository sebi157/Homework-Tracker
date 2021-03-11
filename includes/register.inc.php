<?php
if (isset($_POST["submit"]))
{
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $confirm_pwd = $_POST["confirm_pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($name,$email,$username,$pwd,$confirm_pwd) !== false)
    {
        header("location: ../register.php?error=emptyinput");
        exit();
    }
    if (invalidUid($username) !== false)
    {
        header("location: ../register.php?error=invalidUid");
        exit();
    }
    if (invalidEmail($email) !== false)
    {
        header("location: ../register.php?error=invalidEmail");
        exit();
    }
    if (invalidPwdMatch($pwd,$confirm_pwd) !== false)
    {
        header("location: ../register.php?error=passwordsdontmatch");
        exit();
    }
    if (UidExists($conn,$username,$email) !== false)
    {
        header("location: ../register.php?error=UsernameTaken");
        exit();
    }

    createUser($conn,$name,$email,$pwd,$username);
}
else
{
    header("location: ../register.php");
    exit();
}