<?php
// dashboard.php

// Start the session
session_start();

// Check if user is not logged in, then redirect to login page
if (!isset($_SESSION['user_email_address'])) {
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
            background-color: aliceblue;
            display: flex;
            align-items: center;
            text-align: center;
            justify-content:space-evenly;
            border-radius: 2px solid red;
            padding-top: 5px;
            padding-bottom: 5px;
            border-bottom: 4px solid grey;

            
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
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 50px auto;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f5f5f5;
        }
        tr:hover {
            background-color: #ddd;
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
                        Dashboard
                    </a>
                </div>
            </div>
            <?php
                     $servername="localhost";
                     $username="root";
                     $passward="";
                    $database="hostelapp";
                    
                    $conn = mysqli_connect($servername,$username,$passward,$database);
                    
                    $sql ="SELECT * FROM `roomregister` WHERE `Allotment Status`='Allocated'";
                    $result = mysqli_query($conn,$sql);
                    $sno = 0; // Assuming you want to start your serial number from 1

echo "
    <table>
        <thead>
            <tr>
                <th>S.No</th>
                <th>Student Name</th>
                <th>Room Number</th>
                <th>Room Type</th>
                <th>Allocation Status</th>
            </tr>
        </thead>
        <tbody>
";

while ($row = mysqli_fetch_assoc($result)) {
    $sno++;
    echo "
        <tr>
            <td>{$sno}</td>
            <td>{$row['Name']}</td>
            <td>{$row['Room No']}</td>
            <td>{$row['Room Type']}</td>
            <td>{$row['Allotment Status']}</td>
        </tr>
    ";
}

echo "
        </tbody>
    </table>
";

                ?>
</div>
<div class="sidebar">
    <div class="profile">
            <?php
            $servername="localhost";
            $username="root";
            $passward="";
            $database="hostelapp";
            
            $conn = mysqli_connect($servername,$username,$passward,$database);
            $Name=$_SESSION['user_first_name'].$_SESSION['user_last_name'];
            $Email=$_SESSION['user_email_address'];
            $Pass=rand(10000000,99999999);
             $sql="SELECT * FROM `logindatabase` WHERE `Email` ='[$Email]'";
            $result=mysqli_query($conn,$sql);
            $num = mysqli_num_rows($result);
    if($num >=1){
    }
    else{
                $sql="INSERT INTO `logindatabase`(`Name`, `Email`, `Password`) VALUES ('[$Name]','[$Email]','[$Pass]');";
                $result=mysqli_query($conn,$sql);
    }
             echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
             echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />';
             echo '<h3>'.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h3>';
             echo '<h3>'.$_SESSION['user_email_address'].'</h3>';
             echo '<h3><a href="../logout.php">Logout</h3></div>';
             
                ?>
            </div>
            <ul>
                <li>
                    <a href="../afterlogin.php">
                        <span class="icon"><i class="fas fa-home"></i></span>
                        <span class="item">Home</span>
                    </a>
                </li>
                <li>
                    <a href="../afterlogin/attendence.php">
                        <span class="icon"><i class="fas fa-user-friends"></i></span>
                        <span class="item">Attendence</span>
                    </a>
                </li>
                <li>
                    <a href="../afterlogin/Students.php">
                        <span class="icon"><i class="fas fa-tachometer-alt"></i></span>
                        <span class="item">Students</span>
                    </a>
                </li>
                <li>
                    <a href="../afterlogin/rooms.php" class="active">
                        <span class="icon"><i class="fas fa-tachometer-alt"></i></span>
                        <span class="item">Rooms</span>
                    </a>
                </li>
                <li>
                    <a href="../afterlogin/employees.php">
                        <span class="icon"><i class="fas fa-database"></i></span>
                        <span class="item">Employees</span>
                    </a>
                </li>
                <li>
                    <a href="../afterlogin/meals.php">
                        <span class="icon"><i class="fas fa-chart-line"></i></span>
                        <span class="item">Meals </span>
                    </a>
                </li>
                <li>
                    <a href="../afterlogin/notice.php">
                        <span class="icon"><i class="fas fa-user-shield"></i></span>
                        <span class="item">Notice</span>
                    </a>
                </li>
                <li>
                    <a href="../afterlogin/setting.php">
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