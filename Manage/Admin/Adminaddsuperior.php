<?php
session_start();
if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: ../Adminlogin.php');
  }
// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $department= mysqli_real_escape_string($db, $_POST['department']);


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($name)) { array_push($errors, "Name is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
     if (empty($department)) { array_push($errors, "Department is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM login WHERE username='$username' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = ($password_1);//encrypt the password before saving in the database

 	$query = "INSERT INTO account (EmployeeID, Name,  Email, Department) 
  			  VALUES('$username', '$name', '$email' ,'$department')";
  	mysqli_query($db, $query);
	$query = "INSERT INTO login (Username, Password,  Roles, Status) 
  			  VALUES('$username', '$password', 'Superior','Activate')";
  	mysqli_query($db, $query);
  	echo '<script type="text/javascript"> 
    alert("Added Account"); 
	window.location.href = "Admindisplaysuperior.php";
</script>';
  }
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Add Superior</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="welcomeSuperior.css"/>
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
			<li class="left"><a href="Welcomeadmin.php">Dashboard</a></li>
			<li class="left"><a href="">Competency</a></li>
			<li class="left"><a href="">Report</a></li>
			<li class="left"><a href="AdminRoles.php">Roles</a></li>
			<li class="left"><a href="Logout.php">Logout</a></li>
			<li class="right"><a href="Welcomeadmin.php">Hello <?php echo $_SESSION['username']; ?></a></li>
		<ul>
		</nav>			
	</div>
	<div class="tp-contentwrap1">
	<div class="left wt_25 side_1">

			<div class="menu_list">
				<li><a href="Admindisplaysuperior.php">Display Superior</a></li>					
			</div>		
	</div>
		
	<div class="tp-contentwrap2">
			<div class="strip-profile">Add Superior</div>

 
  <form method="post" action="">
  <table>
  	<?php include('errors.php'); ?>
  	<tr>
	<td class="td_1">EmployeeID</td>
  	   <td class="left"><input type="text" name="username" value="<?php echo $username; ?>"></td>
	</tr>
	
	<tr>
  	<td class="td_1">Password</td>
  	  <td class="left"><input type="password" name="password_1"></td>
	</tr>
	
	<tr>
  	<td class="td_1">Confirm password</td>
  	  <td class="left"><input type="password" name="password_2"></td>
	</tr>
	
	<tr>
	<td class="td_1">Name</td>
  	  <td class="left"><input type="text" name="name"></td>
	</tr>
	
	<tr>
	<td class="td_1">Email</td>
  	  <td class="left"><input type="email" name="email"></td>
	</tr>
	
	<tr>
	<td class="td_1">Department</td>
  	  <td class="left"><input type="text" name="department"></td>
	</tr>
  	
  	<tr>
  	  <td class="left"><button type="submit" class="btn" name="reg_user">Register</button></td>  
	</tr>
	</form>
	</table>
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


