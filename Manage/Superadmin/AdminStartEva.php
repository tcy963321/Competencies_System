<?php require_once ("processcompetency.php");
				  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: ../Adminlogin.php');
  }			
?>
<!DOCTYPE html>
<html>
<title>Competency</title>
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
	<a href="CheckAssTest.php" class="w3-bar-item w3-button">User Test List</a>
	<a href="CheckEvaTest.php" class="w3-bar-item w3-button">Evaluator Test List</a>
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
  <button id="openNav" class="w3-button w3-xlarge" onclick="w3_open()">&#9776;</button>
  <div class="w3-container">
   <div class="tp-logo">Leadership 
Competencies</div>
  </div>
</div>
</div>
<div class="w3-content" style="max-width:1100px;margin-top:80px;margin-bottom:80px">
<div class="w3-container">

<form action="" method="post" enctype="multipart/form-data">
<?php
    $results = EvaTest();
        if($results){
        $rows = mysqli_fetch_assoc($results); ?>
<fieldset>
<br>
<legend>Evaluate :</legend>
<table>
<tr><td><input type="hidden" name="TestID[]" value="<?php echo $rows['TestID']; ?>"></input><b>Test ID: <?php echo $rows['TestID']; ?></b></td></tr>
<tr><td><input type="hidden" name="EmployeeID[]" value="<?php echo $rows['EmployeeID']; ?>"></input><b>Employee ID: <?php echo $rows['EmployeeID']; ?></b></td></tr>
<tr><td><input type="hidden" name="Candidate[]" value="<?php echo $rows['Candidate']; ?>"></input><b>Candidate: <?php echo $rows['Candidate']; ?></b></td></tr>
<tr><td><b>Assign Date: <?php echo $rows['AssignDate']; ?></b></td></tr>
</table></fieldset><br>


<?php
$result = EvaTest();
if($result){
while ($row = mysqli_fetch_assoc($result)){	?>
<br>
<fieldset>
<table>
<tr><td><input type="hidden" name="TestID[]" value="<?php echo $rows['TestID']; ?>"></input></td></tr>
<tr><td><input type="hidden" name="EmployeeID[]" value="<?php echo $rows['EmployeeID']; ?>"></input></td></tr>
<tr><td><input type="hidden" name="Candidate[]" value="<?php echo $rows['Candidate']; ?>"></input></td></tr>
<tr><td><b>Competency Code: <i><?php echo $row ['CodeACompetency'] ; ?></i></b></td></tr>
<tr><td><b>Competency: <i><?php echo $row ['Competency'] ; ?></i></b></td></tr>
<tr><td><b>Group Competency: <i><?php echo $row ['GroupCompetency'] ; ?></i></b></td></tr>
<tr><td><input type='hidden' name='questioncode[]' value="<?php echo $row ['QuestionCode'] ; ?>"></input><b>Question Code: <i><?php echo $row ['QuestionCode']; ?></i></b></td></tr>
<tr><td>Question: <?php echo $row ['AQuestion']; ?></td></tr> 
<tr><td><select name="answer[]" id="answer" required>
<option value="" selected >-</option>
<?php 
$x = 1;
while($x <=$row ['Rating'] ) {
?> 
<option value="<?php echo "$x";?>"><?php echo "$x";?></option><?php  $x++;}?>
</select></td></tr>  
</table>
</fieldset>
<?php }}?>
<button type="Submit" name="EvaluateSubmit"><b>Submit</b></button>
<?php }?>
<br>


</form>


</div>
</div>
<footer class="w3-container w3-padding-64 w3-light-grey w3-center">
&copy; Copyright S52287 2021.
</footer>

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
</body>
</html>

