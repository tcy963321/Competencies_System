<!DOCTYPE html>
<html>
<title>Edit Superior Profile</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="welcomeSuperior.css"/>
<script src="asset/js/jquery.2.1.3.min.js" type="text/javascript"> </script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="script.js" type="text/javascript"> </script>
</head>
<body>

<?php
				session_start();
				 if (!isset($_SESSION['username'])) {
					$_SESSION['msg'] = "You must log in first";
					header('location: Superiorlogin.php');
				}
				$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
				$ID= $_SESSION["username"];
				$sql=mysqli_query($db,"SELECT * FROM account where EmployeeID='$ID' ");
				$row  = mysqli_fetch_array($sql);
				$sqlsss=mysqli_query($db,"SELECT Department FROM account where EmployeeID='$ID'");
				$rowsss=mysqli_fetch_array($sqlsss);

if(isset($_POST['submit']))
{
	 
	$ID= $_SESSION["username"];
// store data in session variable through user
	    

   // get values form input text and number
  $name =$_POST['name'];
  $ic = $_POST['ic'];
   $gender =$_POST['gender'];
  $email =$_POST['email'];
  $contact_number = $_POST['contact_number'];
  $address = $_POST['address'];
  $position =$_POST['position'];
  $dob =$_POST['dob'];
  $department =$_POST['department'];
           
   // mysql query to Update data
   $query = "UPDATE account SET Name='$name',IC='$ic',Contact_Number='$contact_number',Gender='$gender',Date_of_Birth='$dob',Address='$address',Email='$email',Department='$department',Position='$position' WHERE EmployeeID = '$ID'";
   $result = mysqli_query($db, $query);
   
   if($result)
   {
       echo '<script type="text/javascript"> 
    alert("Data Updated"); 
	window.location.href = "Welcomesuperior.php";
</script>';


   }else{
       echo '<script type="text/javascript"> 
    alert("Data Not Updated"); 
	window.location.href = "EditSuperiorProfile.php";
</script>';
   }
   mysqli_close($db);
}				
?>

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
			<?php
					$id= $_SESSION["username"];
          $db1 = mysqli_connect('localhost', 'root', '', 'leadercompetency');
		  
					$sql="SELECT * FROM  account  where  EmployeeID='$id'";
					$result=mysqli_query($db1,$sql);
					$rows=mysqli_fetch_array($result);
			?>
			<div class="tp-contentwrap2">
			<div class="strip-profile">Personal Info</div>
			<form action="" method="post" enctype="multipart/form-data">
			<table>
			    <tr>
				<td class="td_1">Name :</td>
				<td  class="left"><input type="text" name="name" id="my-field" value="<?php  echo  $row['Name'];  ?>" placeholder="Name" required maxlength="50" size="50"/></td>
			    </tr>
				
				<tr>
				<td class="td_1">Identity Card/ PassportNumber :</td>
				<td  class="left"><input type="text" name="ic" value="<?php  echo  $row['IC'];  ?>" placeholder="IC" required maxlength="12" size="12"/></td>
				</tr>
			  
				<tr>
				<td class="td_1">Contact Number :</td>
				<td class="left"><input type="text" name="contact_number" value="<?php  echo  $row['Contact_Number'];  ?>" placeholder="Contact number" required  maxlength="11" size="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"/></td>
				</tr>
			
				<tr>
				<td class="td_1">Gender :</td>		
				<td  class="left"><?php $sad=$row['Gender']; if($sad=="male"){$rs="selected";}else{$rs="";}if($sad=="female"){$acer="selected";}else{$acer="";}  ?>
				<select name="gender">
					<option value="male" <?php echo $rs;?> >Male</option>
					<option value="female" <?php echo $acer;?> >Female</option>
				</select></td>	
				</tr>
				
				<tr>
				<td class="td_1">Date Of Birth :</td>
				<td  class="left"><input type="text" name="dob" id="txtfuturedate" class="datepicker" value="<?php  echo  $row['Date_of_Birth'];  ?>" placeholder="dd/mm/yyyy" required /></td>
				</tr>
			
				<tr>
				<td class="td_1">Address :</td>
				<td  class="left"><textarea name="address" placeholder="Address"  rows="2" cols="25" required><?php  echo  $row['Address'];?></textarea></td>
				</tr>
				<tr>
				
				<td class="td_1">Email :</td>
				<td  class="left"><input type="email" name="email" value="<?php  echo  $row['Email'];  ?>" placeholder="Email" required /></td>
				</tr>
				
				<tr>
				<td class="td_1">Department :</td>
				<td  class="left">
				<select name="department">	
<option value="<?php echo $rowsss['Department'];?>"><?php echo $rowsss['Department'];?></option>
<option>--</option>

<?php
$conn = mysqli_connect("localhost", "root", "", "leadercompetency");
$result=mysqli_query($conn,"SELECT * FROM Department");
if ($result->num_rows > 0) {
while($rowww = $result->fetch_assoc()) {?>
<option value="<?php echo $rowww['Department'];?>"><?php echo $rowww['Department'];?></option>
<?php				
}
}
?>
</select></td>
				</tr>
			
				<tr>
				<td class="td_1">Position :</td>
				<td  class="left"><input type="text" name="position" id="my-field2" value="<?php  echo  $row['Position'];  ?>" placeholder="Position" required  maxlength="50" size="50" /></td>
				</tr>
			
				<tr>
				<td  class="left"><input type="submit" name="submit" value="Update" class="btn"/></td>
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
<script>
$("#txtfuturedate").datepicker({
    maxDate: 0
});


function testInput(event) {
   var value = String.fromCharCode(event.which);
   var pattern = new RegExp(/[a-zåäö ]/i);
   return pattern.test(value);
}

$('#my-field').bind('keypress', testInput);


function testInput2(event) {
   var value = String.fromCharCode(event.which);
   var pattern = new RegExp(/[a-zåäö ]/i);
   return pattern.test(value);
}

$('#my-field2').bind('keypress', testInput2);

</script> 
</body>
</html>

