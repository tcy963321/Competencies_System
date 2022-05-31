<?php
 session_start();
 if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: ../Adminlogin.php');
  }
(isset($_SESSION['username'])) ;
$id=$_GET['id'];
				$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
				$sql=mysqli_query($db,"SELECT account.EmployeeID,account.Name,account.IC,account.Contact_Number,account.Gender,account.Date_of_Birth,account.Address,account.Email,account.Department,account.Position,account.image_url,login.Password,login.Roles,login.Status FROM account JOIN login ON account.EmployeeID=login.username where EmployeeID='$id'");
				$row  = mysqli_fetch_array($sql);
				$sqls=mysqli_query($db,"SELECT * FROM background where EmployeeID='$id'");
				$rows  = mysqli_fetch_array($sqls);
				$sqlsss=mysqli_query($db,"SELECT Department FROM account where EmployeeID='$id'");
				$rowsss=mysqli_fetch_array($sqlsss);	
		

if(isset($_POST['submitinfo']))
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
  $education1 =$_POST['education1'];
  $school1 =$_POST['school1'];
  $education2 =$_POST['education2'];
  $school2 =$_POST['school2'];
  $education3 =$_POST['education3'];
  $school3 =$_POST['school3'];
  $field =$_POST['field'];
           
   // mysql query to Update data
   $query = "UPDATE account, login set login.Password='$password', login.Roles='$roles', login.Status='$status',account.Name='$name',account.IC='$ic',account.Contact_Number='$contact_number',account.Gender='$gender',account.Date_of_Birth='$dob',account.Address='$address',
account.Email='$email',account.Department='$department',account.Position='$position' where account.EmployeeID=login.username AND EmployeeID='$id'"; 
   $query1 = "UPDATE background SET Education1 = '$education1', Education2= '$education2',Education3 = '$education3', School1= '$school1', School2= '$school2', School3= '$school3', Field= '$field' WHERE EmployeeID = '$id'";
   $result = mysqli_query($db, $query);
   $result1 = mysqli_query($db, $query1);
   if($result&$result1)
   {
       echo '<script type="text/javascript"> 
    alert("Data Updated"); 
	window.location.href = "Admindisplayuser.php";
</script>';


   }else{
       echo '<script type="text/javascript"> 
    alert("Data Not Updated"); 
	window.location.href = "AdminEditUser.php";
</script>';
   }
   mysqli_close($db);
}				
?>

<!DOCTYPE html>
<html>
<title>Admin Edit User Profile</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="welcomeSuperior.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<script src="asset/js/jquery.2.1.3.min.js" type="text/javascript"> </script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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

			<div class="menu_list">
			<li><a href="Adminadduser.php">Add User</a></li>
			<li><a href="Admindisplayuser.php">Display User</a></li>	
			</div>
		</div>

		<div class="right wt_75">
			<div class="tp-contentwrap2">
			<div class="strip-profile">User Info</div>
			<form action="" method="post" enctype="multipart/form-data">
			<table>
			    <tr>
				<td class="td_1">Name :</td>
				<td  class="left"><input type="text" name="name" value="<?php  echo  $row['Name'];  ?>" placeholder="Name" required onkeypress="return /[a-z]/i.test(event.key)" maxlength="50" size="50"/></td>
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
$result=mysqli_query($conn,"SELECT * FROM department");
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
				<td  class="left"><input type="text" name="position" value="<?php  echo  $row['Position'];  ?>" placeholder="Position" required onkeypress="return /[a-z]/i.test(event.key)" maxlength="50" size="50" /></td>
				</tr>
				
				<tr>
				<td class="td_1">Password :</td>
				<td  class="left"><input type="password" id="password" name="password" value="<?php  echo  $row['Password'];  ?>" placeholder="Password" pattern=".{8,12}" title="8 - 12 Character include [!@#$%^&*][a-z][A-Z][0-9]" size=30 pattern="[!@#$%^&*][a-z][A-Z][0-9]" required /><i class="far fa-eye" id="togglePassword"></i></td>
				</tr>
				
				<tr>
				<td class="td_1">Roles :</td>
				<td  class="left"><input type="text" name="roles" value="<?php  echo  $row['Roles'];  ?>" placeholder="Roles" readonly /></td>
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
				<td class="td_1">Education 1 :</td>
				<td  class="left"><input type="text" name="education1" size="36" value="<?php  echo  $rows['Education1']; ?>" placeholder="eg: M.Sc" required onkeypress="return /[a-z]/i.test(event.key)" /></td>
			    </tr>
				
				<tr>
				<td class="td_1">Name of School 1:</td>
				<td  class="left"><input type="text" name="school1" size="36" value="<?php  echo  $rows['School1']; ?>" placeholder="Name of school" required onkeypress="return /[a-z]/i.test(event.key)" /></td>
			    </tr>
				
				<tr>
				<td class="td_1">Education 2 :</td>
				<td  class="left"><input type="text" name="education2" size="36" value="<?php  echo  $rows['Education2']; ?>" placeholder="eg: B.Sc. IT" onkeypress="return /[a-z]/i.test(event.key)" /></td>
				</tr>
				
				<tr>
				<td class="td_1">Name of School 2:</td>
				<td  class="left"><input type="text" name="school2" size="36" value="<?php  echo  $rows['School2']; ?>" placeholder="Name of school" onkeypress="return /[a-z]/i.test(event.key)" /></td>
			    </tr>
			  
				<tr>
				<td class="td_1">Education 3 :</td>
				<td  class="left"><input type="text" name="education3" size="36" value="<?php  echo  $rows['Education3'];  ?>" placeholder="eg: STPM" onkeypress="return /[a-z]/i.test(event.key)" /></td>
				</tr>
				
				<tr>
				<td class="td_1">Name of School 3:</td>
				<td  class="left"><input type="text" name="school3" size="36" value="<?php  echo  $rows['School3']; ?>" placeholder="Name of school" onkeypress="return /[a-z]/i.test(event.key)" /></td>
			    </tr>
			
				<tr>
				<td class="td_1">Specialized Field :</td>
				<td  class="left"><textarea name="field" placeholder="Specialized Field"  rows="2" cols="25" required onkeypress="return /[a-z]/i.test(event.key)"><?php  echo  $rows['Field'];  ?></textarea></td>
				</tr>
			
				<tr>
				<td  class="left"><input type="submit" name="submitinfo" onClick="validatePassword()" value="Update" class="btn"/></td>
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

function validatePassword(){
    
   var InputValue = $("#password").val();
  var regex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
    $("#passwordText").text(`Password value:- ${InputValue}`);
    
    if(!regex.test(InputValue)) {
         $("#error").text("Invalid Password");
    }
    else{
          $("#error").text("");
    }
}

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
<script>
$("#txtfuturedate").datepicker({
    maxDate: 0
});
</script> 
</body>
</html>

		

		