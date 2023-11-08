<?php
// dashboard.php

// Start the session
session_start();

// Check if user is not logged in, then redirect to login page
if (!isset($_SESSION['Email'])) {
    header("Location: index.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');

*{
	list-style: none;
	text-decoration: none;
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	font-family: 'Open Sans', sans-serif;
}

body{
	background: #f5f6fa;
}

.wrapper .sidebar{
	background: rgb(5, 68, 104);
	position: fixed;
	top: 0;
	left: 0;
	width: 225px;
	height: 100%;
	padding: 20px 0;
	transition: all 0.5s ease;
}

.wrapper .sidebar .profile{
	margin-bottom: 30px;
	text-align: center;
}

.wrapper .sidebar .profile img{
	display: block;
	width: 100px;
	height: 100px;
    border-radius: 50%;
	margin: 0 auto;
}

.wrapper .sidebar .profile h3{
	color: #ffffff;
	margin: 10px 0 5px;
}

.wrapper .sidebar .profile p{
	color: rgb(206, 240, 253);
	font-size: 14px;
}

.wrapper .sidebar ul li a{
	display: block;
	padding: 13px 30px;
	border-bottom: 1px solid #10558d;
	color: rgb(241, 237, 237);
	font-size: 16px;
	position: relative;
}

.wrapper .sidebar ul li a .icon{
	color: #dee4ec;
	width: 30px;
	display: inline-block;
}

 

.wrapper .sidebar ul li a:hover,
.wrapper .sidebar ul li a.active{
	color: #0c7db1;

	background:white;
    border-right: 2px solid rgb(5, 68, 104);
}

.wrapper .sidebar ul li a:hover .icon,
.wrapper .sidebar ul li a.active .icon{
	color: #0c7db1;
}

.wrapper .sidebar ul li a:hover:before,
.wrapper .sidebar ul li a.active:before{
	display: block;
}

.wrapper .section{
	width: calc(100% - 225px);
	margin-left: 225px;
	transition: all 0.5s ease;
}

.wrapper .section .top_navbar{
	background: rgb(7, 105, 185);
	height: 50px;
	display: flex;
	align-items: center;
	padding: 0 30px;
 
}

.wrapper .section .top_navbar .hamburger a{
	font-size: 28px;
	color: #f4fbff;
}

.wrapper .section .top_navbar .hamburger a:hover{
	color: #a2ecff;
}

 

body.active .wrapper .sidebar{
	left: -225px;
}

body.active .wrapper .section{
	margin-left: 0;
	width: 100%;
}

.calendar {
    background-color: white;
    border: 1px solid #e0e0e0;
    padding: 20px;
    border-radius: 8px;
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 10px;
}

.month {
    grid-column: span 7;
    text-align: center;
    font-weight: bold;
    font-size: 24px;
    margin-bottom: 10px;
}

.day {
    text-align: center;
    font-weight: bold;
}

.date {
    text-align: center;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.today {
    background-color: #e0e0e0;
}

.empty {
    background-color: #f4f4f4;
}
.card{
            margin-top: 5px;
            margin-bottom: 5px;
            padding-top: 5px;
            padding-bottom: 5px;
            border-bottom: 4px solid grey;
            background-color: aliceblue;
            display: flex;
            align-items: center;
            text-align: center;
            justify-content:space-evenly;

            
        }
        .card-body1{
            background-color:lightseagreen;
            width: 150px;
            border: 2px solid black;
            border-radius: 5px;
            padding: auto;
            margin: auto;
            
        }
        .card-body2{
            background-color: lightskyblue;
            width: 150px;
            border: 2px solid black;
            border-radius: 5px;
            padding: auto;
            margin: auto;
            
        }
        .card-body3{
            background-color: lightyellow;
            width: 150px;
            border: 2px solid black;
            border-radius: 5px;
            padding: auto;
            margin: auto;
            
        }
        .card-body4{
            background-color: limegreen;
            width: 150px;
            border: 2px solid black;
            border-radius: 5px;
            padding: auto;
            margin: auto;
            
        }
        .card-body1:hover,.card-body2:hover,.card-body3:hover,.card-body4:hover{
            opacity: 80%;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="section">
            <div class="top_navbar">
                <div class="hamburger">
                    <a href="#">
                        <i class="fas fa-bars"></i>
                    </a>
                </div>
            </div>
            <div class="card">
                <div class="card-body1">
                    <img src="../images/employees.png" width="100" hight="50">
                  <h2 class="card-title">2</h2>
                  <p class="card-text">Total Employee</p>
                  <a href="../adminlogin/employees.php" class="btn btn-primary">View Detail</a>
                </div>
                <div class="card-body2">
                    <img src="../images/interior-design.png" width="100" hight="50">
                    <h2 class="card-title">2</h2>
                    <p class="card-text">Total Room</p>
                    <a href="../adminlogin/rooms.php" class="btn btn-primary">View Detail</a>
                  </div>
                  <div class="card-body3">
                    <img src="../images/graduated.png"  width="100" hight="50">
                    <h2 class="card-title">2</h2>
                    <p class="card-text">Total Student</p>
                    <a href="../adminlogin/Students.php" class="btn btn-primary">View Detail</a>
                  </div>
                  <div class="card-body4">
                    <img src="../images/fast-food.png"  width="100" hight="50">
                    <h2 class="card-title">0</h2>
                    <p class="card-text">Today Meal</p>
                    <a href="../adminlogin/meals.php" class="btn btn-primary">View Detail</a>
                  </div>
              </div>
            <?php

$month = isset($_POST['month']) ? intval($_POST['month']) : date('m');
$year = isset($_POST['year']) ? intval($_POST['year']) : date('Y');

function generateCalendar($month, $year) {
    $number_of_days = date('t', mktime(0, 0, 0, $month, 1, $year));
    $start_day = date('w', mktime(0, 0, 0, $month, 1, $year));
    $month_name = date('F', mktime(0, 0, 0, $month, 1, $year));

    $calendar = "<div class='calendar'>";
    $calendar .= "<div class='month'>{$month_name} {$year}</div>";

    $days_of_week = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    foreach ($days_of_week as $day) {
        $calendar .= "<div class='day'>{$day}</div>";
    }

    for ($i = 0; $i < $start_day; $i++) {
        $calendar .= "<div class='date empty'></div>";
    }

    for ($day = 1; $day <= $number_of_days; $day++) {
        if ($day == date('d') && $month == date('m') && $year == date('Y')) {
            $calendar .= "<div class='date today'>{$day}</div>";
        } else {
            $calendar .= "<div class='date'>{$day}</div>";
        }
    }

    $calendar .= "</div>";

    return $calendar;
}
?>

<form method="post" action="">
        <select name="month">
            <?php for ($i = 1; $i <= 12; $i++): ?>
            <option value="<?= $i ?>" <?= $i == $month ? 'selected' : '' ?>>
                <?= date('F', mktime(0, 0, 0, $i, 1)) ?>
            </option>
            <?php endfor; ?>
        </select>

        <select name="year">
            <?php for ($i = 2000; $i <= 2100; $i++): ?>
            <option value="<?= $i ?>" <?= $i == $year ? 'selected' : '' ?>><?= $i ?></option>
            <?php endfor; ?>
        </select>

        <input type="submit" value="Go">
    </form>
    <?= generateCalendar($month, $year); ?>
        </div>
        <div class="sidebar">
            <div class="profile">
            <img src="../images/profile.jpg" width="200px" height="200px">
            <?php 
            echo $_SESSION['Email'];
            echo '<h3><a href="../directlogout.php">Logout</h3>';
            ?>
            </div>
            <ul>
            <li>
            <a href="../adminlogin/home.php">
                        <span class="icon"><i class="fas fa-home"></i></span>
                        <span class="item">Home</span>
                    </a>
                </li>
                <li>
                    <a href="../adminlogin/attendence.php">
                        <span class="icon"><i class="fas fa-user-friends"></i></span>
                        <span class="item">Attendence</span>
                    </a>
                </li>
                <li>
                    <a href="../adminlogin/Students.php" class="active">
                        <span class="icon"><i class="fas fa-tachometer-alt"></i></span>
                        <span class="item">Students</span>
                    </a>
                </li>
                <li>
                    <a href="../adminlogin/rooms.php">
                        <span class="icon"><i class="fas fa-tachometer-alt"></i></span>
                        <span class="item">Rooms</span>
                    </a>
                </li>
                <li>
                    <a href="../adminlogin/employees.php">
                        <span class="icon"><i class="fas fa-database"></i></span>
                        <span class="item">Employees</span>
                    </a>
                </li>
                <li>
                    <a href="../adminlogin/meals.php">
                        <span class="icon"><i class="fas fa-chart-line"></i></span>
                        <span class="item">Meals </span>
                    </a>
                </li>
                <li>
                    <a href="../adminlogin/notice.php">
                        <span class="icon"><i class="fas fa-user-shield"></i></span>
                        <span class="item">Notice</span>
                    </a>
                </li>
                <li>
                    <a href="../adminlogin/setting.php">
                        <span class="icon"><i class="fas fa-cog"></i></span>
                        <span class="item">Settings</span>
                    </a>
                </li>
            </ul>
        </div>
        
    </div>
  <script>
       var hamburger = document.querySelector(".hamburger");
	hamburger.addEventListener("click", function(){
		document.querySelector("body").classList.toggle("active");
	})
  </script>
</body>
</html>