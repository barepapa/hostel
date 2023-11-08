<?php

//index.php

//Include Configuration File
include('config.php');

$login_button = '';

if(isset($_GET["code"]))
{
 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
 if(!isset($token['error']))
 {
 
  $google_client->setAccessToken($token['access_token']);

 
  $_SESSION['access_token'] = $token['access_token'];


  $google_service = new Google_Service_Oauth2($google_client);

 
  $data = $google_service->userinfo->get();

 
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
 }
}


if(!isset($_SESSION['access_token']))
{

 $login_button = '<a onclick="location.href="login.php"" href="'.$google_client->createAuthUrl().'">Login With Google</a>';
}

?>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/logi.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>www.recboyshostel.com</title>
    <script src="js/logi.js"></script>
</head>
<body>
    <header>
    <div><img id="i1" src="images/512px-Rec (1).webp"></div>
    <h1>www.recboyshostel.com</h1>
    </header>
    <nav>
    <h2>User Login</h2>
    </nav>
    <main>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <form id="form" method="post">
    <div>
    <label for="exampleInputEmail1" class="loginform">Email</label>
    </div>
    <div>
    <input name="Email" namplaceholder="Email" type="email"  class="loginform" id="exampleInputEmail1" required>
    </div>
    <div>
    <label for="exampleInputPassword1" class="loginform">Password</label>
    </div>
    <div>
    <input name="Pass" placeholder="Password" type="password" class="loginform" id="exampleInputPassword1" maxlength="8">
    <input type="checkbox" onclick="myFunction()">Show Password
    <script>
    function myFunction() {
     var x = document.getElementById("exampleInputPassword1");
     if (x.type === "password") {
      x.type = "text";
      } else {
        x.type = "password";
       }
     }  
     </script>
    </div>
    <span id="captcha" class="captcha"><script>createCaptcha();</script>
    </span>
    <span class="restart">
    <a href="#" onclick="createCaptcha()"><img id="rotateImage" src="images/reload-icon-16914.png" width="20px" height="20px"></a>
    </span>
      <div class="input">
        <input oninput="validateCaptcha()"
          type="text"
          name="reCaptcha"
          id="reCaptcha"
          placeholder="Type The Captcha"
          required
        />
      </div>
      <div id="errCaptcha" class="errmsg"></div>
    <?php 
  $servername="localhost";
  $username="root";
  $passward="";
  $database="hostelapp";
  
  $conn = mysqli_connect($servername,$username,$passward,$database);
    if($_SERVER['REQUEST_METHOD'] =="POST"){
    $Email= $_POST["Email"];
    $Pass = $_POST["Pass"];
    $_SESSION["Email"]=$_POST["Email"];
    $sql = "SELECT 'logindatabase' as source FROM `logindatabase` WHERE `Email` = '[$Email]' AND `Password` = '[$Pass]'
    UNION
    SELECT 'adminlogin' as source FROM `adminlogin` WHERE `Email` = '$Email' AND `Password` = '$Pass'
    UNION
    SELECT 'studentlogin' as source FROM `studentlogin` WHERE `Email` = '$Email' AND `Password` = '$Pass'";
    $result=mysqli_query($conn,$sql);
    if ($row = mysqli_fetch_assoc($result)) {
      switch ($row['source']) {
        case 'adminlogin':
          header("Location: ../Hostel2.O/adminlogin/home.php");
          break;
          case 'studentlogin':
            header("Location: ../Hostel2.O/studentlogin/home.php");
            break;
            case 'logindatabase':
                header("Location: ../Hostel2.O/directlogin.php");
                break;
      }
  } else {
      echo "<div class='alert alert-danger' role='alert'>
            Invalid Credential
            </div>";
  }
  }
  ?>
    <div class="login" id="signin" align ="center">
    <input id="submit" type="submit" value="Sign in" style="
    border:1px solid black;
    border-radius:10px;
    width: 100px;
    background-color: #00B0F0;">
    <div>
    </div>
    </div>
    <div class="login" align ="center"> 
    <a style="text-decoration: none" href="adminlogin/adminlogin.php">you are admin or Hostler?</a>
    </div>
    <div class="login" id="signupnow" align ="center">
    <h6>Don't have an account? <a style="text-decoration: none" href="registration.php">Sign up now</a></h6>
    </div>
   <?php
   if($login_button == '')
   {
    echo '<h3><a href="logout.php">Logout</h3></div>';

  }
   else
   {
    echo '<div class="login" align="center"><img src="images\googleimg.jpg" width="30px" height="30px">'.$login_button . '</div>';
   }
   ?>
</form>
</main>
</body>
</html>