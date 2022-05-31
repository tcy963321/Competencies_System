<!DOCTYPE html>
<html>
<title>Superadmin Dashboard</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="welcomeSuper.css"/>
<script src="asset/js/jquery.2.1.3.min.js" type="text/javascript"> </script>
<script src="script.js" type="text/javascript"> </script>
</head>
<body>
<?php
				session_start();
				  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: ../Adminlogin.php');
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
        $imageURL = 'imagesuploadsadmin/'.$row["image_url"];
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
			<li class="left"><a href="Welcomesuperadmin.php">Dashboard</a></li>
			<li class="left"><a href="SuperCreateCompetency.php">Competency</a></li>
			<li class="left"><a href="Report.php">Report</a></li>
			<li class="left"><a href="SuperadminRoles.php">Roles</a></li>
			<li class="left"><a href="Logout.php">Logout</a></li>
			<li class="right"><a href="Welcomesuperadmin.php">Hello <?php echo $_SESSION['username']; ?></a></li>
		<ul>
		</nav>			
	</div>
	<div class="tp-contentwrap1">
		<div class="left wt_25 side_1">
			
			<div class="image_block">
      <img src="<?php echo $imageURL; ?>"/>
			</div>
			<div class="menu_list">
				<li><a href="EditSuperadminProfile.php">Profile</a></li>
				<li><a href="Educational.php">Educational Background</a></li>
				<li><a href="SuperadminChangePassword.php">Change Password</a></li>
				<li><a href="SuperadminChangeImage.php">Edit Image</a></li>	
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
			<br></br>
					<?php
					$id= $_SESSION["username"];
          $db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
					$sql="SELECT * FROM  background  where  EmployeeID='$id'";
					$result=mysqli_query($db,$sql);
					$Rows=mysqli_fetch_array($result);
			?>
			<fieldset>
			<legend><b>Educational Background:</b></legend>
			<table>
			<tr>
				<td class="td_1">Education 1 :</td>
				<td  class="left"><?php  echo  $Rows['Education1'];  ?></td>
			</tr>
			<tr>
				<td class="td_1">School 1 :</td>
				<td  class="left"><?php  echo  $Rows['School1'];  ?></td>
			</tr>
			<tr>
				<td class="td_1">Education 2  :</td>
				<td  class="left"><?php  echo  $Rows['Education2'];  ?></td>
			</tr>
			<tr>
				<td class="td_1">School 2 :</td>
				<td  class="left"><?php  echo  $Rows['School2'];  ?></td>
			</tr>
			<tr>
				<td class="td_1">Education 3 :</td>
				<td  class="left"><?php  echo  $Rows['Education3'];  ?></td>
			</tr>
			<tr>
				<td class="td_1">School 3 :</td>
				<td  class="left"><?php  echo  $Rows['School3'];  ?></td>
			</tr>
			<tr>
				<td class="td_1">Specialized Field  :</td>
				<td  class="left"><?php  echo  $Rows['Field'];  ?></td>
			</tr>
			</table>
			</fieldset>
			</div>
			</div>
		</div>	
</div>
</div>
</div>
</div>
<footer>
&copy; Copyright S52287 2021.
</footer>
</body>
</html>



