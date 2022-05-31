<?php
session_start();
if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: ../Adminlogin.php');
  }
(isset($_SESSION['username'])) ;
$errors = array();  ?>
<!DOCTYPE html>
<html>
<head>
<title>Department</title>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="welcomeSuperior.css"/>
<script src="asset/js/jquery.2.1.3.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
			<li class="left"><a href="Welcomeadmin.php">Dashboard</a></li>
			<li class="left"><a href="AdminCreateCompetency.php">Competency</a></li>
			<li class="left"><a href="Report.php">Report</a></li>
			<li class="left"><a href="AdminRoles.php">Roles</a></li>
			<li class="left"><a href="Logout.php">Logout</a></li>
			<li class="right"><a href="Welcomeadmin.php">Hello <?php echo $_SESSION['username']; ?></a></li>
		<ul>
		</nav>			
	</div>
<body>
<div class="tp-contentwrap1">
	<div class="left wt_25 side_1">
			<div class="menu_list">
			<li><a href="DepartmentList.php">Department List</a></li>						
			</div>		
	</div>
<div class="strip-profile">Create Department</div>
   <form name="frmChange" method="post" action="">
            <table>
			<?php include('errors.php'); ?>
                <tr>
                    <td class="td_1">Department Name: </td>
                    <td class="left"><input type="text" name="department" value=""></td>
                </tr>
				<tr>
				<td class="left"><input type="submit" name="submit" value="Save" class="btnSubmit"/></td>
				</tr>
    </form>
	</table>
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
<?php
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');	
if (isset($_POST['submit'])) {
 $department= mysqli_real_escape_string($db, $_POST['department']);
 
 $depart_check_query = "SELECT * FROM department WHERE Department='$department' LIMIT 1";
  $result = mysqli_query($db, $depart_check_query);
  $departs = mysqli_fetch_assoc($result);
  
  if ($departs) { // if user exists
    if ($departs['department'] == $department) {
     echo '<script type="text/javascript"> 
    alert("Department already exists"); 
	window.location.href = "CreateDepartment.php";
</script>';
    }
  }
else{
	if ($department)
	{
	$query = "INSERT INTO department (Department) 
  			  VALUES('$department')";
  	mysqli_query($db, $query);
  	echo '<script type="text/javascript"> 
    alert("Department is Added"); 
	window.location.href = "DepartmentList.php";
</script>';
	}
	else{
echo '<script type="text/javascript"> 
    alert("Save Failed"); 
	window.location.href = "CreateDepartment.php";
</script>';	
	}
}
}	
?>	