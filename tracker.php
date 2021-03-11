<?php
session_start();
if(!isset($_SESSION['loggedin'])){
   header("Location:Login.php");
}
?>
<html>
<head>
    <title>My tracker</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="all.css">
</head>
<body>
        <div class="home">
            <a href="index.php"> <button> <img src="home.png" alt="home" width="60px" height="60px"> </button></a>
        </div>
        <script type="text/javascript">
            function showDiv(){
                document.getElementById('add-container').style.display = 'block';
                document.getElementById('empty-error').style.display = 'none';
            }
            function showDiv2(){
                document.getElementById('add-container').style.display = 'nonce';
                document.getElementById('add-hw').style.display = 'block';
            }
        </script>
        <?php
            require_once "includes/dbh.inc.php";
            if (isset($_SESSION['userid']))
            {
                $uid=$_SESSION['userid'];
            }
            $query = "SELECT * FROM hw WHERE user=$uid";
            $result = mysqli_query($conn,$query);
            
            echo "<div id=\"hw-table\">";
                echo "<table>";
                    echo "<tr style=\"border-bottom: 1px solid black;>\"><td> Due date </td> <td> Subject </td> <td> Priority </td><td> Details </td></tr>";
                    while($row = mysqli_fetch_array($result))
                    {
                        echo "<tr><td>" . $row['duedate'] . "</td><td>" . $row['subj'] . "</td><td>" . $row['priority'] . "</td><td>" . $row['details'] . "</td>
                        <td id=\"del\"><i class=\"far fa-trash-alt\"></i></td></tr>";
                    }           

                echo "</table>";
            echo "</div>";
            
            mysqli_close($conn);
        ?>
        <div id="tracker-buttons">    
            <div id="add-hw" style="display:block;" onclick="showDiv()">
                <input type="button" name="add-hw" value="Add new homework" onclick="toggle()" />
            </div>
            <div id="load-more" style="display:block;" onclick="showDiv()">
                <input type="button" name="load-more" value="Load more results" onclick="toggle()" />
            </div>
        </div>
        </div>  
        <div id="add-container" style="display:none;">
            <div class="add-form">
                <p>Add new homework: </p>   
                <form action="includes/addnew.inc.php" method = "post"> 
                    <input type="date" name="duedate" placeholder="Due date...">
                    <input type="text" name="subject" placeholder="Subject...">
                    <input type="number" name ="priority" max=3 min=1 placeholder="Priority (1/2/3)...">
                    <input type="text" name="details" placeholder="Details...">
                    <button id="add-hw-button" type="submit" name="submit" onclick="showDiv2()">Add homework</button>
                </form>
            </div>
        </div>
        <?php
        if(isset($_GET["error"]))
        {
            if($_GET["error"]== "emptyaddinput")
            {
                echo "<div id=\"empty-error\"> 
                            <p  style=\"color: red;\"> Please complete the date, subject and priority! (details optional). </p> 
                    </div>";
            }
        }
        ?>
</body>
</html>