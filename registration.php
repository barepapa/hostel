<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/registration.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>registration form</title>
</head>
<body>
    <header>
    <div><img id="i1" src="images/512px-Rec (1).webp"></div>
    <h1>www.recboyshostel.com</h1>
    </header>
    <nav>
    <h2>Admin Panel</h2>
    </nav>
    <main>
    <form id="form" action="registration.php" method="post">
    <div>
    <label for="exampleInputName1" class="loginform">Name</label>
    </div>
    <div>
    <input name="Name" placeholder="Enter Full Name" type="text"  class="loginform" id="exampleInputName1" required>
    </div>
    <div>
    <label for="exampleInputEmail1" class="loginform">Email Id</label>
    </div>
    <div>
    <input name="Email" placeholder="Email Id" type="email"  class="loginform" id="exampleInputEmail1" required>
    </div>
    <div class="pass">
      <label for="pass" class="loginform">New Password</label>
			<input id="pass" type="password" name="pass" placeholder="Enter Password" required>
      <label for="confirm_pass" class="loginform">Confirm Password</label>
			<input name="Pass" id="confirm_pass" type="password" name="confirm_pass" placeholder="Confirm Password" required onkeyup="validate_password()">
		</div>
		<span id="wrong_pass_alert"></span>
		<div class="buttons">
			<button name="submit" id="create" class="submit_btn" onclick="wrong_pass_alert()" type="submit" value="Create" style="
    border:1px solid black;
    border-radius:10px;
    width: 100px;
    background-color: #00B0F0;
    margin-top:20px;">
				Create
			</button>
      <button type="submit" value="Create" style="
    border:1px solid black;
    border-radius:10px;
    width: 100px;
    background-color: #00B0F0;
    margin-top:20px;">
				Cancel
			</button>
		</div>
    <script>
		function validate_password() {

			var pass = document.getElementById('pass').value;
			var confirm_pass = document.getElementById('confirm_pass').value;
			if (pass != confirm_pass) {
				document.getElementById('wrong_pass_alert').style.color = 'red';
				document.getElementById('wrong_pass_alert').innerHTML
					= '☒ Use same password';
				document.getElementById('create').disabled = true;
				document.getElementById('create').style.opacity = (0.4);
			} else {
				document.getElementById('wrong_pass_alert').style.color = 'green';
				document.getElementById('wrong_pass_alert').innerHTML =
					'🗹 Password Matched';
				document.getElementById('create').disabled = false;
				document.getElementById('create').style.opacity = (1);
			}
		}

		function wrong_pass_alert() {
			if (document.getElementById('pass').value != "" &&
				document.getElementById('confirm_pass').value != "") {
				alert("Your response is submitted");
			} else {
				alert("Please fill all the fields");
			}
		}
	</script>
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
    </div>
</form>
</main>
</body>
</html>