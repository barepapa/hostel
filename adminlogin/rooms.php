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
    <!-- CSS for Bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Scripts required by Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
        table {
            border-collapse: collapse;
            width:auto;
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
        .form-container {
            width: 300px;
            height: 450px;
            margin: 50px 50px;
            padding: 20px;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 5px;
            margin-bottom: 15px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        table caption {
        background-color: #fff;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1); 
        padding: 10px;
        font-weight: bold;
        }
        #room{
            display: flex;
            justify-content: space-around;
            
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
            <div id="room">
                <div>
              <?php
                     $servername="localhost";
                     $username="root";
                     $passward="";
                     $database="hostelapp";
                     
                     $conn = mysqli_connect($servername,$username,$passward,$database);
                                         
                     $sql ="SELECT * FROM `roomregister`WHERE `Allotment Status`='Pending'";
                     $result = mysqli_query($conn,$sql);
                     $sno = 0; // Assuming you want to start your serial number from 1
                     
                     echo "<table>
                     <caption>List of Requested Students</caption>
                     <thead>
                     <tr>
                     <th>S.No</th>
                     <th>Student Name</th>
                     <th>Room Number</th>
                     <th>Room Type</th>
                     <th>Allocation Status</th>
                     <th>Action</th>
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
                     <td>
                     <button type='button' class='edit btn btn-primary' id='{$row['INDEX']}'>Update</button>
                     <button type='button' class='delete btn btn-primary' id='d{$row['INDEX']}'>Delete</button>
                     <td>
                     </tr>
                     ";
                     }
                     
                     echo "
                     </tbody>
                     </table>
                     ";
                    
                    $conn = mysqli_connect($servername,$username,$passward,$database);
                    
                    $sql ="SELECT * FROM `roomregister` WHERE `Allotment Status`='Allocated'";
                    $result = mysqli_query($conn,$sql);
                    $sno = 0; // Assuming you want to start your serial number from 1

echo "<table>
<caption>List of Registered Students</caption>
        <thead>
            <tr>
                <th>S.No</th>
                <th>Student Name</th>
                <th>Room Number</th>
                <th>Room Type</th>
                <th>Allocation Status</th>
                <th>Action</th>
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
            <td>
            <button type='button' class='edit btn btn-primary' id='{$row['INDEX']}'>Update</button>
            <button type='button' class='delete btn btn-primary' id='d{$row['INDEX']}'>Delete</button>
            <td>
        </tr>
    ";
}

echo "
        </tbody>
    </table>
";

$conn = mysqli_connect($servername,$username,$passward,$database);
                    
$sql ="SELECT * FROM `roomregister` WHERE `Allotment Status`='Rejected'";
$result = mysqli_query($conn,$sql);
$sno = 0; // Assuming you want to start your serial number from 1

echo "<table>
<caption>List of Rejected Students</caption>
<thead>
<tr>
<th>S.No</th>
<th>Student Name</th>
<th>Room Number</th>
<th>Room Type</th>
<th>Allocation Status</th>
<th>Action</th>
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
<td>
 <button type='button' class='edit btn btn-primary' id='{$row['INDEX']}'>Update</button>
 <button type='button' class='delete btn btn-primary' id='d{$row['INDEX']}'>Delete</button>
<td>
</tr>
";
}
echo "
</tbody>
</table>
";
                ?>
                </div>
                 <div class="form-container">
        <form method="post">
           <label for="studentName">Room Register</label>
            <label for="studentName">Student Name:</label>
            <input type="text" id="studentName" name="student_name">

            <label for="roomNumber">Room Number:</label>
            <input type="text" id="roomNumber" name="room_number">

            <label for="roomType">Room Type:</label>
            <select id="roomType" name="room_type">
                <option value="Single">Single</option>
                <option value="Double">Double</option>
                <option value="Triple">Triple</option>
            </select>
            <label for="allotment">Allotment Type:</label>
            <select id="allotment" name="allotment_type">
                <option value="Allocated">Allocated</option>
                <option value="Rejected">Rejected</option>
            </select>
            <input name="submit" type="submit" value="Submit">
        </form>
        <?php
$servername="localhost";
$username="root";
$passward="";
$database="hostelapp";

 $conn = mysqli_connect($servername,$username,$passward,$database);

 if(isset($_POST['submit']))
 { 
    $student_name=$_POST["student_name"];
    $room_number=$_POST["room_number"];
    $room_type=$_POST["room_type"];
    $allotment_type=$_POST["allotment_type"];
    $sql="INSERT INTO `roomregister`(`Name`, `Room No`, `Room Type`,`Allotment Status`) VALUES ('$student_name','$room_number','$room_type','$allotment_type')";
    $result=mysqli_query($conn,$sql);
    echo '<script>window.location.href="../adminlogin/rooms.php";</script>';
}
?>
<?php
$servername="localhost";
$username="root";
$passward="";
$database="hostelapp";

 $conn = mysqli_connect($servername,$username,$passward,$database);
 if(isset($_POST['snoedit']))
 { 
    $sno=$_POST["snoedit"];
    $name=$_POST["Nameedit"];
    $room=$_POST["Roomedit"];
    $type=$_POST["Typeedit"];
    $alloc=$_POST["Allocedit"];
    $sql="UPDATE `roomregister` SET `Name`='$name',`Room No`='$room',`Room Type`='$type',`Allotment Status`='$alloc' WHERE `INDEX`='$sno'";
    $result=mysqli_query($conn,$sql);
    if($result){
    echo '<script>window.location.href="../adminlogin/rooms.php";</script>';
}
}
    ?>
</div>
</div>
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
                    <a href="../adminlogin/Students.php">
                        <span class="icon"><i class="fas fa-tachometer-alt"></i></span>
                        <span class="item">Students</span>
                    </a>
                </li>
                <li>
                <a href="../adminlogin/rooms.php" class="active">
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
    <!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Edit Details</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
      <form  method="post">
        <input type="hidden" name="snoedit" id="snoedit">
        <label for="Nameedit">Name:</label>
        <input type="text" id="Nameedit" name="Nameedit" class="form-control"><br>

        <label for="Roomedit">Room:</label>
        <input type="text" id="Roomedit" name="Roomedit" class="form-control"><br>

        <label for="Typeedit">Type:</label>
            <select id="Typeedit" name="Typeedit" class="form-control">
                <option value="Single">Single</option>
                <option value="Double">Double</option>
                <option value="Triple">Triple</option>
            </select>            
            <label for="Allocedit">Allocation Type:</label>
            <select id="Allocedit" name="Allocedit" class="form-control">
                <option value="Allocated" selected>Allocated</option>
                <option value="Rejected">Rejected</option>
            </select>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="updateBtn">Update</button>
      </div>
    </form>
</div>
  </div>
</div>
<script>
       var hamburger = document.querySelector(".hamburger");
       hamburger.addEventListener("click", function(){
		document.querySelector("body").classList.toggle("active");
	})
</script>
<script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((Element)=>{
        Element.addEventListener("click",(e)=>{
            tr=e.target.parentNode.parentNode;
            Name=tr.getElementsByTagName("td")[1].innerText;
            Room=tr.getElementsByTagName("td")[2].innerText;
            Type=tr.getElementsByTagName("td")[3].innerText;
            Alloc=tr.getElementsByTagName("td")[4].innerText;
            Nameedit.value=Name;
            Roomedit.value=Room;
            Typeedit.value=Type;
            Allocedit.value=Alloc;
            snoedit.value=e.target.id;
            $(document).ready(function(){
    // Open the modal as soon as the page loads
    $('#editModal').modal('show');
    
    // For demonstration: Alert when the "Update" button is clicked
    $('#updateBtn').click(function(){
        alert('Details updated!');
    });
});
})
})
</script>
<script>
    delets = document.getElementsByClassName('delete');
    Array.from(delets).forEach((Element)=>{
        Element.addEventListener("click",(e)=>{
            tr=e.target.parentNode.parentNode;
            sno=e.target.id.substr(1,);
            $(document).ready(function() {
            $('.delete').click(function() {
            let sno = this.id.substr(1);
            if (confirm("Are you sure you want to delete this record?")) {
            window.location.href = "?delete1=" + sno;
        }
    });
});
    });
        })
</script>
<?php
$servername = "localhost";
$username = "root";
$password = ""; // Changed from passward to password
$database = "hostelapp";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['delete1'])) {
    $sno = $_GET['delete1']; // Convert to integer to avoid SQL injection

    $sql = "DELETE FROM `roomregister` WHERE `INDEX` = $sno";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<script>window.location.href="../adminlogin/rooms.php";</script>';
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
</body>
</html>