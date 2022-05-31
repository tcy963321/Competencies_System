<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');

if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $role = mysqli_real_escape_string($db, $_POST['Role']);

  if (count($errors) == 0 && $role=='Superadmin') {
  	$query = "SELECT * FROM login WHERE username='$username' AND Password='$password' AND Status='Activate' AND Roles='Superadmin'" ;
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location:../Manage/Superadmin/Welcomesuperadmin.php');
  	} else {
  		array_push($errors, "Wrong username/password combination");
  	} 
  }
  
  else{
  	$query = "SELECT * FROM login WHERE username='$username' AND Password='$password' AND Status='Activate' AND Roles='Admin'" ;
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location:../Manage/Admin/Welcomeadmin.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}
?>