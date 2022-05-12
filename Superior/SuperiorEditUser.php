<!DOCTYPE html>
<html>
<title>Superior Edit User Profile</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="welcomeSuperior.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<script src="asset/js/jquery.2.1.3.min.js" type="text/javascript"> </script>
<script src="script.js" type="text/javascript"> </script>
</head>
<body>
<?php
 session_start();
 	 if (!isset($_SESSION['username'])) {
					$_SESSION['msg'] = "You must log in first";
					header('location: Superiorlogin.php');
				}
(isset($_SESSION['username'])) ;
$id=$_GET['id'];
				$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
				$sql=mysqli_query($db,"SELECT account.EmployeeID,account.Name,account.IC,account.Contact_Number,account.Gender,account.Date_of_Birth,account.Address,account.Email,account.Department,account.Position,account.image_url,login.Password,login.Roles,login.Status FROM account JOIN login ON account.EmployeeID=login.username where EmployeeID='$id'");
				$row  = mysqli_fetch_array($sql);

if(isset($_POST['submit']))
{
 

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
  $password =$_POST['password'];
  $roles =$_POST['roles'];
  $status =$_POST['Status'];
           
   // mysql query to Update data
   $query = "UPDATE account, login set login.Password='$password', login.Roles='$roles', login.Status='$status',account.Name='$name',account.IC='$ic',account.Contact_Number='$contact_number',account.Gender='$gender',account.Date_of_Birth='$dob',account.Address='$address',
account.Email='$email',account.Department='$department',account.Position='$position' where account.EmployeeID=login.username AND EmployeeID='$id'"; 
   $result = mysqli_query($db, $query);
   
   if($result)
   {
       echo '<script type="text/javascript"> 
    alert("Data Updated"); 
	window.location.href = "Superiordisplayuser.php";
</script>';


   }else{
       echo '<script type="text/javascript"> 
    alert("Data Not Updated"); 
	window.location.href = "SuperiorEditUser.php";
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
			<li class="left"><a href="">Competency</a></li>
			<li class="left"><a href="">Report</a></li>
			<li class="left"><a href="SuperiorRoles.php">Roles</a></li>
			<li class="left"><a href="Logout.php">Logout</a></li>
			<li class="right"><a href="Welcomesuperior.php">Hello <?php echo $_SESSION['username']; ?></a></li>
		<ul>
		</nav>			
	</div>

	<div class="tp-contentwrap1">
		<div class="left wt_25 side_1">

			<div class="menu_list">
			<li><a href="Superioradduser.php">Add User</a></li>
			<li><a href="Superiordisplayuser.php">Display User</a></li>	
			</div>
		</div>

		<div class="right wt_75">
			<div class="tp-contentwrap2">
			<div class="strip-profile">User Info</div>
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
				<td class="left"><input type="text" name="contact_number" value="<?php  echo  $row['Contact_Number'];  ?>" placeholder="Contact number"/></td>
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
				<td class="td_1">Password :</td>
				<td  class="left"><input type="password" id="password" name="password" value="<?php  echo  $row['Password'];  ?>" placeholder="Password"/><i class="far fa-eye" id="togglePassword"></i></td>
				</tr>
				
				<tr>
				<td class="td_1">Roles :</td>
				<td  class="left"><input type="text" name="roles" value="<?php  echo  $row['Roles'];  ?>" placeholder="Roles"/></td>
				</tr>
				
				<tr>
				<td class="td_1">Status :</td>
				<td  class="left"><?php $sad=$row['Status']; if($sad=="Activate"){$act="selected";}else{$act="";}if($sad=="Unactivate"){$unact="selected";}else{$unact="";}?>
				<select name="Status">
					<option value="Activate" <?php echo $act;?> >Activate</option>
					<option value="Unactivate" <?php echo $unact;?> >Unactivate</option>
				</select></td>
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
const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#password'); 
togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script>  
</body>
</html>

		