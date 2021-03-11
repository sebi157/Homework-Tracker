<?php

function emptyInputSignup($name,$email,$username,$pwd,$confirm_pwd)
{
    $result;
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($confirm_pwd))
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return  $result;
}

function invalidUid($username)
{
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username))
    {
        $result = true;
    }
    else
    {
        $result = false;
    }

    return  $result;
}
function invalidEmail($email)
{
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return  $result;
}
function invalidPwdMatch($pwd, $confirm_pwd)
{
    $result;
    if ($pwd !== $confirm_pwd)
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return  $result;
}
function UidExists($conn,$username,$email)
{
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../register.php?error=StmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ss" , $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData))
    {
        return $row;
    }
    else
    {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn,$name,$email,$pwd,$username)
{
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../register.php?error=StmtFailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt,"ssss" , $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt); 
    header("location: ../register.php?error=none");
    exit();
}

function emptyInputLogin($email,$pwd)
{
    $result;
    if (empty($email) || empty($pwd))
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return  $result;
}
function loginUser($conn, $email, $pwd)
{
    $uidExists = UidExists($conn,$email,$email);
    if($uidExists === false)
    {
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    $pwdH = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdH);

    if($checkPwd===false)
    {
        header("location: ../login.php?error=wrongpassword");
        exit();
    }
    else if ($checkPwd ===true)
    {
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['userid'] = $uidExists["usersId"];
        $_SESSION['useruid'] = $uidExists["usersUid"];
        header("location: ../index.php");
        exit();
    }
}
function emptyInputAdd($date,$subject,$priority)
{
    $result;
    if (empty($date) || empty($subject) || empty($priority))
    {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return  $result;
}
function addHw($uid,$date,$subject,$priority,$details)
{
    $sql = "INSERT INTO hw (user,duedate,subj,priority,details) VALUES ('$uid','$date','$subject','$priority','$details')";
    $serverName = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "homework";
    $conn = mysqli_connect($serverName,$dbuser,$dbpass,$dbname);

    if(mysqli_query($conn, $sql))
    {
        header("location: ../tracker.php");
        echo "Homework inserted successfully.";
    } 
    else
    {
        echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
    }
    mysqli_close($conn);
}