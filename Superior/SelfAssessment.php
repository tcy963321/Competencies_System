<?php require_once ("Superiorprocesscompetency.php");
				  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: Superiorlogin.php');
  }			
?>
<!DOCTYPE html>
<html>
<title>Evaluate</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="competency.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<body>
<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large"
  onclick="w3_close()">Close &times;</button>
  <a href="Welcomesuperior.php" class="w3-bar-item w3-button">Dashboard</a>
	<a href="SelfAssessment.php" class="w3-bar-item w3-button">Self-Assessment</a>
  <a href="SuperiorAssignASS.php" class="w3-bar-item w3-button">Assign Test</a>
	<a href="SuperiorCheckAssTest.php" class="w3-bar-item w3-button">Assign User Test List</a>
	<a href="SuperiorCheckEvaTest.php" class="w3-bar-item w3-button">Assign Evaluate List</a>
	   <div class="dropdown">
   <button class="w3-bar-item w3-button">History</button>
   <div class="dropdown-content">
    <a href="SuperiorViewASS.php">Assessment</a>
    <a href="SuperiorViewEVA.php">Evaluate</a>
	</div>
	</div>
</div>

<div id="main">
<div class="w3-teal">
  <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
  <div class="w3-container">
   <div class="tp-logo">Leadership 
Competencies</div>
  </div>
</div>
</div>
<div class="w3-content"style="max-width:90%;margin-top:80px;margin-bottom:80px">
<div class="w3-container">

<?php
    $result = SuperiorAssessment();
        if($result){
                    while ($row = mysqli_fetch_assoc($result)){ ?>
<fieldset>
<br>
<legend>User Assessment :</legend>
<table>
<tr><td>Test ID: <?php echo $row['TestID']; ?></td></tr>
<tr><td>Employee ID: <?php echo $row['EmployeeID']; ?></td></tr>
<tr><td>Assign Time: <?php echo $row['Assign_Time']; ?></td></tr>
<tr><td><?php echo"1. Assessment Attempt Candidate must answer all the question and no time limitation.</tr></td><tr><td>2.  Candidate be honest to answer the questions. <button type='button'><a href='SuperiorAssessment.php?TestID=$row[TestID]&EmployeeID=$row[EmployeeID]' class='w3-bar-item w3-button' style='color:#633c05;'><b>Start Now</b></a></button></td></tr>";?>	
</div>
</table>
</fieldset>

                   <?php
                           }
                       }
                   ?>

</div>
</div>
<script>
function w3_open() {
  document.getElementById("main").style.marginLeft = "25%";
  document.getElementById("mySidebar").style.width = "25%";
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("openNav").style.display = 'none';
}
function w3_close() {
  document.getElementById("main").style.marginLeft = "0%";
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("openNav").style.display = "inline-block";
}

</script>
<footer class="w3-container w3-padding-64 w3-light-grey w3-center">
&copy; Copyright S52287 2021.
</footer>
</body>
</html>