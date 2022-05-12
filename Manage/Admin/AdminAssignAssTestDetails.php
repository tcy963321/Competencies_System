<?php require_once ("Adminprocesscompetency.php");
				  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: Adminlogin.php');
  }			
?>
<?php
$result = Detailsassignasstest();
                      if($result){
                     $row = mysqli_fetch_assoc($result)
?>

<!DOCTYPE html>
<html>
<title>View User Test List</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="Competency.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<body>
<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large"
  onclick="w3_close()">Close &times;</button>
  <a href="Welcomeadmin.php" class="w3-bar-item w3-button">Dashboard</a>
   <a href="AdminCreateCompetency.php" class="w3-bar-item w3-button">Competency</a>
   <div class="dropdown">
   <button class="w3-bar-item w3-button">Question List</button>
   <div class="dropdown-content">
    <a href="AdminAssessmentlist.php">Assessment</a>
    <a href="AdminEvaluatelist.php">Evaluate</a>
	</div>
	</div>
	<br>
	<a href="SelfAssessment.php" class="w3-bar-item w3-button">Self-Assessment</a>
	<a href="AdminEvaluatetest.php" class="w3-bar-item w3-button">Evaluate</a>
   <div class="dropdown">
   <button class="w3-bar-item w3-button">Leadership Competency Test</button>
   <div class="dropdown-content">
    <a href="AdminAssignASS.php">Assessment</a>
    <a href="AdminAssignEVA.php">Evaluate</a>
	</div>
	</div>
	<a href="AdminCheckAssTest.php" class="w3-bar-item w3-button">Assign User Test List</a>
	<a href="AdminCheckEvaTest.php" class="w3-bar-item w3-button">Assign Evaluate List</a>
   <div class="dropdown">
   <button class="w3-bar-item w3-button">History</button>
   <div class="dropdown-content">
    <a href="AdminViewASS.php">Assessment</a>
    <a href="AdminViewEVA.php">Evaluate</a>
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
<fieldset>
<?php //echo "<a href='AssTestAddQuest.php?TestID=$row[TestID]&EmployeeID=$row[EmployeeID]&Question[]=$row[AQuestion]' style='float:right; color:red;'>ADD Question</a>";?>
<br>
<legend>User Assessment Details Form:</legend>
<table>
<tr><td>Test ID: <?php echo $row['TestID']; ?></td></tr>
<tr><td>Employee ID: <?php echo $row['EmployeeID']; ?></td></tr>
<tr><td>Assign Time: <?php echo $row['Assign_Time']; ?></td></tr>						
</table>
<center><table id="competency" class="w3-responsive" >				
						<th>Question</th>
                        <th>Question Code</th>
                        <th>Rating</th>
						<th>Code Competency</th>
						<th>Status</th>
						
<?php	}  ?>	
<?php
$result = Detailsassignasstest();
                      if($result){
                      while ($row = mysqli_fetch_assoc($result)){
?>
<tr>
<td><?php echo $row['AQuestion']; ?></td>
<td><?php echo $row['Question_Code']; ?></td>
<td><?php echo $row['Rating']; ?></td>
<td><?php echo $row['CodeACompetency']; ?></td>
<td><?php echo $row['Status']; ?></td>
</tr>
  <?php	} } ?>	
</fieldset>  
</table>
</center>
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