<!DOCTYPE html>
<html>
<title>Edit User Profile</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="welcomeuser.css"/>
<script src="asset/js/jquery.2.1.3.min.js" type="text/javascript"> </script>
<script src="script.js" type="text/javascript"> </script>
</head>
<body>

<?php
				session_start();
				 if (!isset($_SESSION['username'])) {
					$_SESSION['msg'] = "You must log in first";
					header('location: Userlogin.php');
				}
				$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
				$ID= $_SESSION["username"];
				$sql=mysqli_query($db,"SELECT * FROM account where EmployeeID='$ID' ");
				$row  = mysqli_fetch_array($sql);	


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
	window.location.href = "Welcomeuser.php";
</script>';


   }else{
       echo '<script type="text/javascript"> 
    alert("Data Not Updated"); 
	window.location.href = "EditUserProfile.php";
</script>';
   }
   
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
			<li class="left"><a href="Welcomeuser.php">Home</a></li>
			<li class="left"><a href="">Competency</a></li>
			<li class="left"><a href="">Report</a></li>
			<li class="left"><a href="Logout.php">Logout</a></li>
			<li class="right"><a href="Welcomeuser.php">Hello <?php echo $_SESSION['username']; ?></a></li>
		<ul>
		</nav>			
	</div>

	<div class="tp-contentwrap1">
		<div class="left wt_25 side_1">

			<div class="menu_list">
				<li><a href="EditUserProfile.php">Edit Profile</a></li>	
				<li><a href="UserChangePassword.php">Edit Password</a></li>	
				<li><a href="UserChangeImage.php">Edit Image</a></li>		
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
				<td  class="left"><input type="text" name="name" value="<?php  echo  $row['Name'];  ?>" placeholder="Name"/></td>
			    </tr>
				
				<tr>
				<td class="td_1">Identity Card/ PassportNumber :</td>
				<td  class="left"><input type="text" name="ic" value="<?php  echo  $row['IC'];  ?>" placeholder="IC"/></td>
				</tr>
			  
				<tr>
				<td class="td_1">Contact Number :</td>
				<td  class="left"><input type="text" name="contact_number" value="<?php  echo  $row['Contact_Number'];  ?>" placeholder="Contact number"/></td>
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
				<td  class="left"><input type="Date" name="dob" value="<?php  echo  $row['Date_of_Birth'];  ?>" placeholder="dd/mm/yyyy"/></td>
				</tr>
			
				<tr>
				<td class="td_1">Address :</td>
				<td  class="left"><textarea name="address" placeholder="Address"  rows="2" cols="25"><?php  echo  $row['Address'];?></textarea></td>
				</tr>
				<tr>
				
				<td class="td_1">Email :</td>
				<td  class="left"><input type="text" name="email" value="<?php  echo  $row['Email'];  ?>" placeholder="Email"/></td>
				</tr>
				<tr>
				
				<td class="td_1">Department :</td>
				<td  class="left"><input type="text" name="department" value="<?php  echo  $row['Department'];  ?>" placeholder="Department"/></td>
				</tr>
			
				<tr>
				<td class="td_1">Position :</td>
				<td  class="left"><input type="text" name="position" value="<?php  echo  $row['Position'];  ?>" placeholder="Position"/></td>
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

</body>
</html>
