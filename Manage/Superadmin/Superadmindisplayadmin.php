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
<title>View Superadmin</title>
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
	<div class="wt_99 center">
	 
	</div>

	<div class="tp-contentbox">
	<div class="tp-infostrip">
		<nav>
		<ul>
<li class="left"><a href="Welcomesuperadmin.php">Dashboard</a></li>
			<li class="left"><a href="SuperCreateCompetency.php">Competency</a></li>
			<li class="left"><a href="">Report</a></li>
			<li class="left"><a href="SuperadminRoles.php">Roles</a></li>
			<li class="left"><a href="Logout.php">Logout</a></li>
			<li class="right"><a href="Welcomesuperadmin.php">Hello <?php echo $_SESSION['username']; ?></a></li>
		<ul>
		</nav>			
	</div>
	<div class="tp-contentwrap1">
	
	<div class="left wt_25 side_1">
			<div class="menu_list">
				<li><a href="Superadminaddadmin.php">Add Admin</a></li>					
			</div>		
	</div>
	
	<div class="tp-contentwrap2">	
	
	<div class="strip-profile">View Admin</div>
<div class="strip-profile"><input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for EmployeeID.." title="Type in a ID" ></div>
<div class="center wt_75">
<table id="myTable" >
  <tr>
    <th>Employee ID</th>
    <th>Name</th>
    <th>IC</th>
	<th>Contact Number</th>
    <th>Gender</th>
    <th>Date of Birth</th>
	<th>Address</th>
    <th>Email</th>
    <th>Department</th>
	<th>Position</th>
    <th>Image URL</th>
	<th>Password</th>
	<th>Roles</th>
    <th>Status</th>
	<th>Image</th>
	<th>Action</th>
  </tr>
    <?php
$conn = mysqli_connect("localhost", "root", "", "leadercompetency");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT account.EmployeeID,account.Name,account.IC,account.Contact_Number,account.Gender,account.Date_of_Birth,account.Address,account.Email,account.Department,account.Position,account.image_url,login.Password,login.Roles,login.Status FROM account JOIN login ON account.EmployeeID=login.username where Roles='Admin'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
	$imageURL = 'imagesuploadadmin/'.$row["image_url"];	
echo "<tr><td>" . $row["EmployeeID"]. "</td><td>" . $row["Name"] . "</td><td>". $row["IC"]. "</td><td>" . $row["Contact_Number"]. "</td><td>" . $row["Gender"] . "</td><td>". $row["Date_of_Birth"]. "</td><td>" . $row["Address"]. "</td><td>" . $row["Email"] . "</td><td>". $row["Department"]. "</td><td>" . $row["Position"]. "</td><td>" . $row["image_url"] . "</td><td>". $row["Password"]. "</td><td>" . $row["Roles"] . "</td><td>". $row["Status"]. "</td><td>'<img src=$imageURL;/>'</td><td><form action='SuperEditAdmin.php?id=$row[EmployeeID]' method='POST'><input type='submit' name='Edit' value='Edit' /></form><form class='delete_button' action='SuperadminDeleteRoles.php?id=$row[EmployeeID]' method='POST'><input type='submit' name='Delete' value='Delete' /></form></td></tr>";

}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
	</div>
	</div>
	</div>
	</div>
	</div>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

$('.delete_button').click(function(e){
        var result = confirm("Are you sure you want to delete this user?");
        if(!result) {
            e.preventDefault();
        }
    })
</script>

<footer>
	<div class="">&copy; Copyright S52287 2021.</div>
</footer>
</div>
</div>
</body>
</html>

 