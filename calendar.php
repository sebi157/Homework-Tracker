<html>
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="all.css">
</head>
<body>
<div class="cal">
            <a onclick="toggle()"> <button> <img src="calendar.png" alt="home" widtr="60px" height="60px"> </button></a>
    </div>
    <div class="container">
        <div class="calendar">
            <div class="month">
                <i class="fas fa-angle-double-left prev"></i>
                <div class="date">
                    <h1>May 2021</h1>
                </div>
                <i class="fas fa-angle-double-right next"></i>
            </div>
            <div class="weekdays">
                <div>Mon</div>
                <div>Tue</div>
                <div>Wed</div>
                <div>Thu</div>
                <div>Fri</div>
                <div>Sat</div>
                <div>Sun</div>
            </div>
            <div class="days">
            </div>    
        </div>
    </div>
    <script src = "calendar.js"></script>
</body>
</html>