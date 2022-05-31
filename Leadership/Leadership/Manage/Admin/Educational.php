<?php
session_start();
if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: ../Adminlogin.php');
  }
				$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
				$ID= $_SESSION["username"];
				$sql=mysqli_query($db,"SELECT * FROM background where EmployeeID='$ID' ");
				$rows  = mysqli_fetch_array($sql);	


if(isset($_POST['submiteducation']))
{
	 
	$ID= $_SESSION["username"];
// store data in session variable through user
	   
// get values form input text and number
  $education1 =$_POST['education1'];
  $education2 = $_POST['education2'];
  $education3 =$_POST['education3'];
  $school1 =$_POST['school1'];
  $school2 = $_POST['school2'];
  $school3 = $_POST['school3'];
  $field =$_POST['field'];
           
   // mysql query to Update data
   $query = "UPDATE background SET EmployeeID='$ID',Education1='$education1',Education2='$education2',Education3='$education3',School1='$school1',School2='$school2',School3='$school3',Field='$field' WHERE EmployeeID = '$ID'";
   $result = mysqli_query($db, $query);
   
   if($result)
   {
       echo '<script type="text/javascript"> 
    alert("Data Updated"); 
	window.location.href = "Welcomeadmin.php";
</script>';

   }else{
       echo '<script type="text/javascript"> 
    alert("Data Not Updated"); 
	window.location.href = "Educational.php";
</script>';
   }
   
}
?>
<!DOCTYPE html>
<html>
<title>Educational</title>
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
			<li><a href="EditAdminProfile.php">Edit Profile</a></li>	
			<li><a href="Educational.php">Educational Background</a></li>
			<li><a href="AdminChangePassword.php">Edit Password</a></li>
			<li><a href="AdminChangeImage.php">Edit Image</a></li>		
			</div>
		</div>

		<div class="right wt_75">
			<div class="tp-contentwrap2">
			<div class="strip-profile">Educational Background</div>
			<form action="" method="post" enctype="multipart/form-data">
			<table>
			    <tr>
				<td class="td_1">Education 1 :</td>
				<td  class="left"><input type="text" name="education1" size="36" value="<?php  echo  $rows['Education1']; ?>" placeholder="eg: M.Sc" required id="my-field1" /></td>
			    </tr>
				
				<tr>
				<td class="td_1">Name of School 1:</td>
				<td  class="left"><input type="text" name="school1" size="36" value="<?php  echo  $rows['School1']; ?>" placeholder="Name of school" required id="my-field2" /></td>
			    </tr>
				
				<tr>
				<td class="td_1">Education 2 :</td>
				<td  class="left"><input type="text" name="education2" size="36" value="<?php  echo  $rows['Education2']; ?>" placeholder="eg: B.Sc. IT" id="my-field3"  /></td>
				</tr>
				
				<tr>
				<td class="td_1">Name of School 2:</td>
				<td  class="left"><input type="text" name="school2" size="36" value="<?php  echo  $rows['School2']; ?>" placeholder="Name of school" id="my-field4" /></td>
			    </tr>
			  
				<tr>
				<td class="td_1">Education 3 :</td>
				<td  class="left"><input type="text" name="education3" size="36" value="<?php  echo  $rows['Education3'];  ?>" placeholder="eg: STPM" id="my-field5" /></td>
				</tr>
				
				<tr>
				<td class="td_1">Name of School 3:</td>
				<td  class="left"><input type="text" name="school3" size="36" value="<?php  echo  $rows['School3']; ?>" placeholder="Name of school" id="my-field6"  /></td>
			    </tr>
			
				<tr>
				<td class="td_1">Specialized Field :</td>
				<td  class="left"><textarea name="field" placeholder="Specialized Field"  rows="2" cols="25" required id="my-field7" ><?php  echo  $rows['Field'];  ?></textarea></td>
				</tr>
				<tr>
			
				<tr>
				<td  class="left"><input type="submit" name="submiteducation" value="Update" class="btn"/></td>
				</tr>
				</table>
				</form>  
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


function testInput3(event) {
   var value = String.fromCharCode(event.which);
   var pattern = new RegExp(/[a-zåäö ]/i);
   return pattern.test(value);
}

$('#my-field3').bind('keypress', testInput3);


function testInput4(event) {
   var value = String.fromCharCode(event.which);
   var pattern = new RegExp(/[a-zåäö ]/i);
   return pattern.test(value);
}

$('#my-field4').bind('keypress', testInput4);


function testInput5(event) {
   var value = String.fromCharCode(event.which);
   var pattern = new RegExp(/[a-zåäö ]/i);
   return pattern.test(value);
}

$('#my-field5').bind('keypress', testInput5);

function testInput6(event) {
   var value = String.fromCharCode(event.which);
   var pattern = new RegExp(/[a-zåäö ]/i);
   return pattern.test(value);
}

$('#my-field6').bind('keypress', testInput6);


function testInput7(event) {
   var value = String.fromCharCode(event.which);
   var pattern = new RegExp(/[a-zåäö ]/i);
   return pattern.test(value);
}

$('#my-field7').bind('keypress', testInput7);


</script>
</body>
</html>