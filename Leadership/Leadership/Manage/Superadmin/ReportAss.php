<?php require_once ("ReportProcess.php");
				  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: ../Adminlogin.php');
  }			
?>
<!DOCTYPE html>
<html lang="en">
<title>Report Assessment</title>
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
  <a href="Report.php" class="w3-bar-item w3-button w3-border-bottom w3-large"><img src="imagesuploadsadmin/logo.png" style="width:60%;"></a>
    <a href="Welcomesuperadmin.php" class="w3-bar-item w3-button w3-dark-grey w3-button w3-hover-black w3-left-align">Dashboard</a>
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

<center>
<h2>Assessment Report Lists</h2>
<br></br>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Employee ID...">
<table id="competency">
<tr>
						<th>EmployeeID</th>
						<th>TestID</th>
						<th>Date-Time</th>
						<th>Action</th>
<?php
$result = getAssListReport();
if($result){
while ($row = mysqli_fetch_assoc($result)){	?>
<tr>
                            <td><?php echo $row['EmployeeID']; ?></td>
                            <td><?php echo $row['TestID']; ?></td>
							<td><?php echo $row['DateTime']; ?></td>
							<td><?php echo "<form action='AssReportAnalysis.php?TestID=$row[TestID]&EmployeeID=$row[EmployeeID]' method='POST'><button type='submit' name='Edit' title='View Report'><i class='fa fa-eye'></i></i></button></form>";?></td>
							</tr>
                   <?php
                           }
                       }
                   ?>
</tr>
</table></center>
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

function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("competency");
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
</script>

</body>
</html>
