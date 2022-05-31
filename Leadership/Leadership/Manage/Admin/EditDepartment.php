<?php
session_start();
if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: ../Adminlogin.php');
  }
(isset($_SESSION['username'])) ;
$errors = array();  ?>
<?php
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
$id=$_GET['id'];
$depart_check_query = "SELECT * FROM department WHERE ID='$id'";
$result = mysqli_query($db, $depart_check_query);
$departs = mysqli_fetch_assoc($result);
?>
<?php
$db = mysqli_connect("localhost", "root", "", "leadercompetency");
if(isset($_POST['Update']))
{
$id=$_POST['ID'];	
$department=$_POST['department'];
$result="Update Department set Department='$department' WHERE ID='$id'";
if (mysqli_query($db, $result))
{
	echo '<script type="text/javascript"> 
    alert("Update successfully."); 
	window.location.href = "DepartmentList.php";
</script>';	
}
else{
echo '<script type="text/javascript"> 
    alert("ERROR: Could not able to execute.."); 
	window.location.href = "EditDepartment.php";
</script>';	
}
}
?>
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
				<li><a href="CreateDepartment.php">Create Department</a></li>	
				<li><a href="DepartmentList.php">Department List</a></li>					
			</div>		
	</div>
<div class="strip-profile">Edit Department</div>
   <form name="frmChange" method="post" action="">
            <table>
                <tr>
                    <td class="td_1">Department Name: </td>
					<td class="left"><input type="hidden" name="ID" value="<?php echo $departs['ID']; ?>"></td>
                    <td class="left"><input type="text" name="department" value="<?php echo $departs['Department']; ?>"></td>
                </tr>
				<tr>
				<td class="left"><input type="submit" name="Update" value="Update" class="btnSubmit"/></td>
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
