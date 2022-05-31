<?php require_once ("ReportProcess.php");
				  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: ../Adminlogin.php');
  }			
?>
<!DOCTYPE html>
<html lang="en">
<title>Report</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="Report.css">
<link href='https://fonts.googleapis.com/css?family=RobotoDraft' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><style>
html,body,h1,h2,h3,h4,h5 {font-family: "RobotoDraft", "Roboto", sans-serif}
.w3-bar-block .w3-bar-item {padding: 16px}
table, td, th {
  border: 1px solid black;
}
tr:nth-child(even){background-color: #fff7f7}
td{
  text-align: left;	
}

</style>
<body>

<!-- Side Navigation -->
<nav class="w3-sidebar w3-bar-block w3-collapse w3-pale-red w3-animate-left w3-card" style="z-index:3;width:320px;" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" title="Close Sidemenu" 
  class="w3-bar-item w3-button w3-hide-large w3-large">Close <i class="fa fa-remove"></i></a>
  <a href="Report.php" class="w3-bar-item w3-button w3-border-bottom w3-large"><img src="imagesuploadadmin/logo.png" style="width:60%;"></a>
    <a href="Welcomeadmin.php" class="w3-bar-item w3-button w3-dark-grey w3-button w3-hover-black w3-left-align">Dashboard</a>
  <a href="ReportAss.php" class="w3-bar-item w3-button"><i class="fa-file-word-o w3-margin-right"></i><b>Report Assessment</b></a>
  <a href="ReportEva.php" class="w3-bar-item w3-button"><i class="fa-file-word-o w3-margin-right"></i><b>Report Evaluate</b></a>
  <a href="ReportAvrg.php" class="w3-bar-item w3-button"><i class="fa-file-word-o w3-margin-right"></i><b>Report Average</b></a>
</nav>

<!-- Overlay effect when opening the side navigation on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="Close Sidemenu" id="myOverlay"></div>

<!-- Page content -->
<div class="w3-main" style="margin-left:320px;">
<i class="fa fa-bars w3-button w3-white w3-hide-large w3-xlarge w3-margin-left w3-margin-top" onclick="w3_open()"></i>
<div id="Borge" class="w3-container w3-responsive">
<div class="w3-row-padding w3-responsive">
<div class="w3-container w3-card w3-white w3-round w3-margin">
<form action="" method="post" enctype="multipart/form-data">
<legend>Assessment:</legend>
<br></br>
<table class="w3-responsive">
<tr>
						<th>Code Competency</th>
						<th>Competency</th>
						<th>Weight Competency</th>
						<th>Group Competency</th>
						<th>Question</th>
						<th>Question Code</th>
						<th>Rating</th>
<?php
$result = getAssessment();
if($result){
while ($row = mysqli_fetch_assoc($result)){	?>
<tr>
                            <td><?php echo $row['CodeCompetency']; ?></td>
                            <td><?php echo $row['Competency']; ?></td>
							<td><?php echo $row['Weightcompetency']; ?></td>
							<td><?php echo $row['GroupCompetency']; ?></td>
							<td><?php echo $row['AQuestion']; ?></td>
                            <td><?php echo $row['A_QCode']; ?></td>
                            <td><?php echo $row['Rating']; ?></td>
							</tr>
                   <?php
                           }
                       }
                   ?>
</tr>
</table>
</form> 
</div>
</div>
</div>
</div>
<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}

function myFunc(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show"; 
    x.previousElementSibling.className += " w3-red";
  } else { 
    x.className = x.className.replace(" w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-red", "");
  }
}
</script>

<script>
var openTab = document.getElementById("firstTab");
openTab.click();
</script>

</body>
</html>
