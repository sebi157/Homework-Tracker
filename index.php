<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, "homework");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
<html>
<head>
    <title>Minimalistic homework tracker</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <div class="st_page">
        <p>Your digital homework tracker.</p>
        <p>Stay productive.</p>
        <div class="logo">
            <img src="logo.png" alt="Logo" width="230px" height="140px">
        </div>
        <?php
            include_once 'buttons.php';
        ?>
    </div>
</body>
</html>