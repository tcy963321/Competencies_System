<?php
session_start();
	 if (!isset($_SESSION['username'])) {
					$_SESSION['msg'] = "You must log in first";
					header('location: Superiorlogin.php');
				}
$ID=$_SESSION["username"];
$conn = mysqli_connect("localhost", "root", "", "leadercompetency") or die("Connection Error: " . mysqli_error($conn));

if (count($_POST) > 0) {
    $result = mysqli_query($conn, "SELECT *from login WHERE username='$ID'");
    $row = mysqli_fetch_array($result);
    if ($_POST["currentPassword"] == $row["Password"]) {
        mysqli_query($conn, "UPDATE login set Password='" . $_POST["newPassword"] . "' WHERE username='$ID'");
        echo '<script type="text/javascript"> 
    alert("Password Changed"); 
	window.location.href = "Superiorlogin.php";
</script>';
    } else
        echo '<script type="text/javascript"> 
    alert("Current Password is not correct"); 
	window.location.href = "SuperiorChangePassword.php";
</script>';
}
?>
<html>
<head>
<title>Change Password</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="welcomeSuperior.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<script src="asset/js/jquery.2.1.3.min.js" type="text/javascript"> </script>
<script src="script.js" type="text/javascript"> </script>
</head>
<body>
<div class="tp-container">
<div class="tp-boxwrap">
<header>
<div class="tp-logo">Leadership 
Competencies</div>
</header>
<nav class="tp-nav">
</nav>
<div class="tp-content">
	<div class="wt_99 center">
	 
	</div>

	<div class="tp-contentbox">
	<div class="tp-infostrip">
		<nav>
		<ul>
			<li class="left"><a href="Welcomesuperior.php">Dashboard</a></li>
			<li class="left"><a href="SuperiorAssignASS.php">Competency</a></li>
			<li class="left"><a href="Report.php">Report</a></li>
			<li class="left"><a href="SuperiorRoles.php">Roles</a></li>
			<li class="left"><a href="Logout.php">Logout</a></li>
			<li class="right"><a href="Welcomesuperior.php">Hello <?php echo $_SESSION['username']; ?></a></li>
		<ul>
		</nav>			
	</div>
	<div class="tp-contentwrap1">
		<div class="left wt_25 side_1">

			<div class="menu_list">
				<li><a href="EditSuperiorProfile.php">Edit Profile</a></li>
				<li><a href="Educational.php">Educational Background</a></li>
				<li><a href="SuperiorChangePassword.php">Edit Password</a></li>	
				<li><a href="SuperiorChangeImage.php">Edit Image</a></li>					
			</div>
		</div>
		
<div class="right wt_75">	
	
  	<div class="tp-contentwrap2">
			<div class="strip-profile">Secure Password</div>
   <form name="frmChange" method="post" action="" onSubmit="return validatePassword()">
            <table>
                <tr>
                    <td class="td_1">Current Password</td>
                    <td class="left"><input type="password"
                        name="currentPassword" class="txtField" id="password"/><span
                        id="currentPassword" class="required"></span><i class="far fa-eye" id="togglePassword"></i></td>
                </tr>
				
                <tr>
                    <td class="td_1">New Password</td>
                    <td class="left"><input type="password" name="newPassword"
                        class="txtField" id="password2" pattern=".{8,12}" title="8 - 12 Character" size=30 pattern="[!@#$%^&*][a-z][A-Z][0-9]"/><span 
						id="newPassword" class="required"></span><i class="far fa-eye" id="togglePassword2"></i></td>
                </tr>
				
				<tr>
                <td class="td_1">Confirm Password</td>
                <td class="left"><input type="password" name="confirmPassword"
                    class="txtField" id="password3" pattern=".{8,12}" title="8 - 12 Character" size=30 pattern="[!@#$%^&*][a-z][A-Z][0-9]"/><span 
					id="confirmPassword" class="required"></span><i class="far fa-eye" id="togglePassword3"></i></td>
                </tr>
                
				<tr>
				<td class="left"><input type="submit" name="submit" value="Update" onClick="validatePassword" class="btnSubmit"/></td>
				</tr>
    </form>
	</table>
				</div>
			</div>
		</div>		
</div>
  	</div>
	<footer>
	<div class="">&copy; Copyright S52287 2021.</div>
</footer>
</div>
</div>
</body>
</html>
<script>
function validatePassword(){
    
   var InputValue = $("#password2").val();
  var regex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
    $("#passwordText").text(`Password value:- ${InputValue}`);
    
    if(!regex.test(InputValue)) {
         $("#error").text("Invalid Password");
    }
    else{
          $("#error").text("");
    }
}

function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
	currentPassword.focus();
	document.getElementById("currentPassword").innerHTML = "required";
	output = false;
}
else if(!newPassword.value) {
	newPassword.focus();
	document.getElementById("newPassword").innerHTML = "required";
	output = false;
}
else if(!confirmPassword.value) {
	confirmPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "required";
	output = false;
}
if(newPassword.value != confirmPassword.value) {
	newPassword.value="";
	confirmPassword.value="";
	newPassword.focus();
	var str = "not same";
	var result = str.fontcolor("red");
	document.getElementById("confirmPassword").innerHTML = result;
	output = false;
} 	
return output;
}

const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#password'); 
togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});

const togglePassword2 = document.querySelector('#togglePassword2');
const password2 = document.querySelector('#password2'); 
togglePassword2.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
    password2.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});

const togglePassword3 = document.querySelector('#togglePassword3');
const password3 = document.querySelector('#password3'); 
togglePassword3.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password3.getAttribute('type') === 'password' ? 'text' : 'password';
    password3.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script>
