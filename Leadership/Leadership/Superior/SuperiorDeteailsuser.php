<?php
session_start();
	 if (!isset($_SESSION['username'])) {
					$_SESSION['msg'] = "You must log in first";
					header('location: Superiorlogin.php');
				}
(isset($_SESSION['username'])) ; ?>
<!DOCTYPE html>
<html>
<head>
<title>View User</title>
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
			<li class="left"><a href="Welcomesuperior.php">Dashboard</a></li>
			<li class="left"><a href="SuperiorAssignASS.php">Competency</a></li>
			<li class="left"><a href="Report.php">Report</a></li>
			<li class="left"><a href="SuperiorRoles.php">Roles</a></li>
			<li class="left"><a href="Logout.php">Logout</a></li>
			<li class="right"><a href="Welcomesuperior.php">Hello <?php echo $_SESSION['username']; ?></a></li>
		<ul>
		</nav>			
	</div>
	<?php
// Include the database configuration file
$conn = mysqli_connect("localhost", "root", "", "leadercompetency");
$id= $_GET["id"];
// Get images from the database
$query = $conn->query("SELECT * FROM account where EmployeeID='$id'");
if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = '../User/imagesuploadedf/'.$row["image_url"];
?>
<?php }}?>
	<div class="tp-contentwrap1">
	<div class="left wt_25 side_1">
	<div class="image_block">
    <img src="<?php echo $imageURL; ?>" height="187" />
	</div>	
	</div>
	<div class="right wt_75">
	<?php
					$id= $_GET["id"];
          $db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
					$sql="SELECT account.EmployeeID,account.Name,account.IC,account.Contact_Number,account.Gender,account.Date_of_Birth,account.Address,account.Email,account.Position,account.Department,login.Password FROM  account join login on account.EmployeeID=login.Username where EmployeeID='$id'";
					$result=mysqli_query($db,$sql);
					$rows=mysqli_fetch_array($result);
			?>
	<div class="tp-contentwrap2">
	<div class="strip-profile">User Details Information</div>
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
				<td class="td_1">Password :</td>
				<td  class="left"><?php  echo  $rows['Password'];  ?></td>
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
					$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
					$id= $_GET["id"];
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
<footer>
	<div class="">&copy; Copyright S52287 2021.</div>
</footer>
</div>
</div>
</body>
</html>