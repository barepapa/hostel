<?php
$servername="localhost";
$username="root";
$passward="";
$database="hostelapp";

 $conn = mysqli_connect($servername,$username,$passward,$database);

 if(isset($_POST['submit']))
 {
    $Name=$_POST["Name"];
    $Email=$_POST["Email"];
    $Pass=$_POST["Pass"];
    $sql="INSERT INTO `logindatabase`(`Name`, `Email`, `Password`) VALUES ('[$Name]','[$Email]','[$Pass]');";
    $result=mysqli_query($conn,$sql);
    if($result){
      echo"insertion Successful";
      header("Location: ../Hostel2.O/login.php");
    }
    else{
      echo"fail";
    }
 }
?>