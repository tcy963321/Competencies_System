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
<title>Department List</title>
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
			<li class="left"><a href="SuperCreateCompetency.php">Competency</a></li>
			<li class="left"><a href="Report.php">Report</a></li>
			<li class="left"><a href="SuperadminRoles.php">Roles</a></li>
			<li class="left"><a href="Logout.php">Logout</a></li>
			<li class="right"><a href="Welcomesuperadmin.php">Hello <?php echo $_SESSION['username']; ?></a></li>
		<ul>
		</nav>			
	</div>
<body>
<div class="tp-contentwrap1">
	<div class="left wt_25 side_1">
			<div class="menu_list">
			<li><a href="CreateDepartment.php">Create Department</a></li>						
			</div>		
	</div>
<div class="strip-profile">Department List</div>
<div class="center wt_75">
<table id="myTable" >
  <tr>
	<th>No. </th>
    <th>Department</th>
	<th>Action</th>
  </tr>
  <?php
$conn = mysqli_connect("localhost", "root", "", "leadercompetency");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$ID= $_SESSION["username"];
$sql = "Select * FROM department";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["ID"]. "</td><td>" . $row["Department"]. "</td><td><form action='EditDepartment.php?id=$row[ID]' method='POST'><input type='submit' name='Edit' value='Edit' /></form><form class='delete_button' action='DepartmentList.php?id=$row[ID]' method='POST'><input type='submit' name='Delete' value='Delete' /></form></td></tr>"; 
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
<?php
$db = mysqli_connect("localhost", "root", "", "leadercompetency");
if(isset($_POST['Delete']))
{
$id=$_GET['id'];
$result=mysqli_query($db,"Delete FROM department WHERE ID='$id'") or die (mysqli_error($db));
if (mysqli_query($db, $result))
{
echo '<script type="text/javascript"> 
    alert("ERROR: Could not able to execute.."); 
	window.location.href = "DepartmentList.php";
</script>';		
}
else{
	echo '<script type="text/javascript"> 
    alert("Deleted successfully."); 
	window.location.href = "DepartmentList.php";
</script>';
}
}
?>

	</div>
	</div>
	</div>
	</div>
	<footer>
	<div class="">&copy; Copyright S52287 2021.</div>
</footer>
</div>
</div>
<script>
		$('.delete_button').click(function(e){
        var result = confirm("Are you sure you want to delete this Department?");
        if(!result) {
            e.preventDefault();
        }
    })
</script>
</body>
</html>