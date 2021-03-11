<?php
$serverName = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "homework";

$conn = mysqli_connect($serverName,$dbuser,$dbpass,$dbname);

if(!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}