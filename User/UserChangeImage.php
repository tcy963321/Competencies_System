<?php
session_start();
 if (!isset($_SESSION['username'])) {
	 	echo '<script type="text/javascript"> 
    alert("You must log in first"); 
</script>';
					header('location: Userlogin.php');
				}
$ID=$_SESSION["username"];
//This code shows how to Upload And Insert Image Into Mysql Database Using Php Html.
//connecting to uploadFile database.
$conn = mysqli_connect("localhost", "root", "", "leadercompetency");
if($conn) {
//if connection has been established display connected.
echo "";
}
//if button with the name uploadfilesub has been clicked
if(isset($_POST['uploadfilesub'])) {
//declaring variables
$filename = $_FILES['uploadfile']['name'];
$filetmpname = $_FILES['uploadfile']['tmp_name'];
//folder where images will be uploaded
$folder = 'imagesuploadedf/';
//function for saving the uploaded images in a specific folder
move_uploaded_file($filetmpname, $folder.$filename);
//inserting image details (ie image name) in the database
$sql ="UPDATE account set image_url='$filename' where EmployeeID='$ID' ";
$qry = mysqli_query($conn, $sql);
if( $qry) {
	echo '<script type="text/javascript"> 
    alert("Image uploaded"); 
</script>';
}
}
?>
<!DOCTYPE html>
<html>
<title>Change Image</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="welcomeuser.css"/>
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
		<div class="tp-contentwrap2">
			<div class="strip-profile">Change Profile Picture</div>
			<form action="" method="post" enctype="multipart/form-data" >
			<table>
			<tr>
<td class="left"><input type="file" name="uploadfile" /></td>
<td class="left"><input type="submit" name="uploadfilesub" value="upload" /><td>
</tr><br></br>
<?php
// Include the database configuration file
$conn = mysqli_connect("localhost", "root", "", "leadercompetency");

// Get images from the database
$query = $conn->query("SELECT * FROM account where EmployeeID='$ID'");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'imagesuploadedf/'.$row["image_url"];
?>
  		<div class="image_block">
      <img src="<?php echo $imageURL; ?>"alt="" width="190" height="150"/>
			</div>
<?php }
}else{ ?>
    <p>No image(s) found...</p>
<?php } ?>

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