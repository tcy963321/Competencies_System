<?php
session_start();
if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: ../Adminlogin.php');
  }
(isset($_SESSION['username'])) ; ?>
<!DOCTYPE html>
<html>
<head>
<title>Role</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="welcomeSuper.css"/>
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
<div class="tp-contentbox">
	<div class="tp-infostrip">
		<nav>
		<ul>
			<li class="left"><a href="Welcomesuperadmin.php">Dashboard</a></li>
			<li class="left"><a href="SuperCreateCompetency">Competency</a></li>
			<li class="left"><a href="">Report</a></li>
			<li class="left"><a href="SuperadminRoles.php">Roles</a></li>
			<li class="left"><a href="Logout.php">Logout</a></li>
			<li class="right"><a href="Welcomesuperadmin.php">Hello <?php echo $_SESSION['username']; ?></a></li>
		<ul>
		</nav>			
	</div>
<body>
<div class="tp-contentwrap1">
		
  	<div class="tp-contentwrap2">
			<div class="strip-profile">System Management</div>
<div class="tp-logo">
<div class="strip-profile">Manage User</div>
		<p> <a href="Superadminadduser.php" style="color: red;">Add User</a> </p> 
		<p> <a href="Superadmindisplayuser.php" style="color: red;">Display User</a></p> 
</div>
<div class="tp-logo">
<div class="strip-profile">Manage Superior</div>
		<p> <a href="Superadminaddsuperior.php" style="color: red;">Add Superior</a> </p>
		<p> <a href="Superdisplaysuperior.php" style="color: red;">Display Superior</a></p>
</div>
<div class="tp-logo">
<div class="strip-profile">Manage Admin</div>
	    <p> <a href="Superadminaddadmin.php" style="color: red;">Add Admin</a> </p>
		<p> <a href="Superadmindisplayadmin.php" style="color: red;">Display Admin</a></p>
</div>
<div class="tp-logo">
<div class="strip-profile">Manage Superadmin</div>
	    <p> <a href="Superadminadd.php" style="color: red;">Add Superadmin</a> </p>
		<p> <a href="Superadmindisplay.php" style="color: red;">Display Superadmin</a></p>
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




