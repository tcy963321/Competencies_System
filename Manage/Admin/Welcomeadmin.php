<!DOCTYPE html>
<html>
<title>Admin Dashboard</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="welcomeSuperior.css"/>
<script src="asset/js/jquery.2.1.3.min.js" type="text/javascript"> </script>
<script src="script.js" type="text/javascript"> </script>
</head>
<body>
<?php
				session_start();
				  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: Adminlogin.php');
  }
				$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
				$ID= $_SESSION["username"];
				$sql=mysqli_query($db,"SELECT * FROM login where username='$ID' ");
				$row  = mysqli_fetch_array($sql);			
?>
<?php
// Include the database configuration file
$conn = mysqli_connect("localhost", "root", "", "leadercompetency");

// Get images from the database
$query = $conn->query("SELECT * FROM account where EmployeeID='$ID'");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'imagesuploadadmin/'.$row["image_url"];
?>
<?php }
}else{ ?>
    <p>No image(s) found...</p>
<?php } ?>
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
			<li class="left"><a href="AdminCreateCompetency.php">Competency</a></li>
			<li class="left"><a href="Report.php">Report</a></li>
			<li class="left"><a href="AdminRoles.php">Roles</a></li>
			<li class="left"><a href="Logout.php">Logout</a></li>
			<li class="right"><a href="Welcomeadmin.php">Hello <?php echo $_SESSION['username']; ?></a></li>
		<ul>
		</nav>			
	</div>
	<div class="tp-contentwrap1">
		<div class="left wt_25 side_1">
			
			<div class="image_block">
      <img src="<?php echo $imageURL; ?>"/>
			</div>
			<div class="menu_list">
				<li><a href="EditAdminProfile.php">Edit Profile</a></li>	
				<li><a href="AdminChangePassword.php">Edit Password</a></li>
				<li><a href="AdminChangeImage.php">Edit Image</a></li>	
			</div>
		</div>
		<div class="right wt_75">
			<?php
					$id= $_SESSION["username"];
          $db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
					$sql="SELECT * FROM  account  where  EmployeeID='$id'";
					$result=mysqli_query($db,$sql);
					$rows=mysqli_fetch_array($result);
			?>
			<div class="tp-contentwrap2">
			<div class="strip-profile">General Info</div>
			<table>
			<tr>
				<td class="td_1">EmployeeID :</td>
				<td  class="left"><?php  echo  $rows['EmployeeID'];  ?></td>
			</tr>
			<tr>
				<td class="td_1">Name :</td>
				<td  class="left"><?php  echo  $rows['Name'];  ?></td>
			</tr>
			<tr>
				<td class="td_1">IC :</td>
				<td  class="left"><?php  echo  $rows['IC'];  ?></td>
			</tr>
			<tr>
				<td class="td_1">Contact Number :</td>
				<td  class="left"><?php  echo  $rows['Contact_Number'];  ?></td>
			</tr>
			<tr>
				<td class="td_1">Gender :</td>
				<td  class="left"><?php  echo  $rows['Gender'];  ?></td>
			</tr>
			<tr>
				<td class="td_1">Date Of Birth :</td>
				<td  class="left"><?php  echo  $rows['Date_of_Birth'];  ?></td>
			</tr>
			<tr>
				<td class="td_1">Address :</td>
				<td  class="left"><?php  echo  $rows['Address'];  ?></td>
			</tr>
			<tr>
				<td class="td_1">Email :</td>
				<td  class="left"><?php  echo  $rows['Email'];  ?></td>
			</tr>
			<tr>
				<td class="td_1">Department :</td>
				<td  class="left"><?php  echo  $rows['Department'];  ?></td>
			</tr>
			<tr>
				<td class="td_1">Position :</td>
				<td  class="left"><?php  echo  $rows['Position'];  ?></td>
			</tr>
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

