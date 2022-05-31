<?php require_once ("processcompetency.php");
				  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
    header('location: ../Adminlogin.php');
  }			
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
  <a href="Welcomesuperadmin.php" class="w3-bar-item w3-button">Dashboard</a>
   <a href="SuperCreateCompetency.php" class="w3-bar-item w3-button">Competency</a>
 <a href="Assessmentlist.php" class="w3-bar-item w3-button">Assessment List</a>
	<a href="SelfAssessment.php" class="w3-bar-item w3-button">Self-Assessment</a>	
  <a href="Evaluate.php" class="w3-bar-item w3-button">Evaluate</a>	
  <a href="AssignASS.php" class="w3-bar-item w3-button">Assign Assessment</a>
	<a href="CheckAssTest.php" class="w3-bar-item w3-button">Assign User Test List</a>
	<a href="CheckEvaTest.php" class="w3-bar-item w3-button">Assign Evaluator Test List</a>
	<div class="dropdown">
   <button class="w3-bar-item w3-button">Remove List</button>
   <div class="dropdown-content">
    <a href="RemoveAssessment.php">Assessment</a>
    <a href="RemoveEvaluate.php">Evaluate</a>
	</div>
	</div>
	<br>
	<div class="dropdown">
   <button class="w3-bar-item w3-button">History</button>
   <div class="dropdown-content">
    <a href="HistoryAssessment.php">Assessment</a>
    <a href="HistoryEvaluate.php">Evaluate</a>
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
$result = Detailsansevatest();
                      if($result){
                     $row = mysqli_fetch_assoc($result)
?>
<fieldset>
<br>
<legend>Evaluate Details Form:</legend>
<table>
<tr><td>Test ID: <?php echo $row['TestID']; ?></td></tr>
<tr><td>Evaluator ID: <?php echo $row['EmployeeID']; ?></td></tr>
<tr><td>Candidate ID: <?php echo $row['CandidateID']; ?></td></tr>
<tr><td>Date Time: <?php echo $row['DateTime']; ?></td></tr>						
</table>
<center><table id="competency" class="w3-responsive" >				
						<th>Question</th>
                        <th>Question Code</th>
                        <th>Vote</th>
						<th>Code Competency</th>
						<th>Competency</th>
						<th>Group Competency</th>
<?php	}  ?>	
<?php
$result = Detailsansevatest();
                      if($result){
                      $row = mysqli_fetch_assoc($result)
?>
<tr>
<td><?php echo $row['AQuestion']; ?></td>
<td><?php echo $row['E_QCode']; ?></td>
<td><?php echo $row['VoteE']; ?></td>
<td><?php echo $row['CodeACompetency']; ?></td>
<?php	 } ?>	
 <?php
                      $results=Detailsevacom();
                      if($results){
                     $rows = mysqli_fetch_assoc($results)?> 
<td><?php echo $rows['Competency']; ?></td>
<td><?php echo $rows['GroupCompetency']; ?> </td>
 <?php	}  ?>
</tr>

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