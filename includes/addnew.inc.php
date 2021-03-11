<?php
session_start();
if (isset($_POST["submit"]))
{
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    if (isset($_SESSION['userid']))
    {
        $uid=$_SESSION['userid'];
    }
    $uid = $_SESSION['userid'];
    $date = $_POST["duedate"];
    $subject = $_POST["subject"];
    $priority = $_POST["priority"];
    $details = $_POST["details"];
    if(!emptyInputAdd($date,$subject,$priority))
    {
        addHw($uid,$date,$subject,$priority,$details);
    }
    else
    {
        header("location: ../tracker.php?error=emptyaddinput");
        exit();
    }
}
else
{
    echo 'Connection error';
    header("location: ../tracker.php");
    exit();
}