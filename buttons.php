<?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
    { 
        echo "<div class='buttons'>
                <div class='loggedin'>            
                    <a href='tracker.php'><button style='margin-right: 7px;'>My Tracker</button></a>
                    <a href='includes/logout.inc.php'><button style='margin-right: 7px;'>Log out</button></a>
                </div>
                <div class='about'>
                    <a href='about.php'><button>About</button></a>
                </div>
            </div>";
    }
    else
    {
        echo "<div class='buttons'>
                <div class='login'>            
                    <a href='login.php'><button style='margin-right: 7px;'>Log In</button></a>
                    <a href='register.php'><button style='margin-left: 7px;''>Sign up</button></a>
                </div>
                <div class='about'>
                    <a href='about.php'><button>About</button></a>
                </div>
            </div>";
    }
?>