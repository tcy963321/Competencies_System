<?php require_once ("Userprocesscompetency.php");
	if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: Userlogin.php');
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
<div id="main">
<div class="w3-teal">
  <button id="openNav" class="w3-button w3-teal w3-xlarge"></button>
  <div class="w3-container">
   <div class="tp-logo">Leadership 
Competencies</div>
  </div>
</div>
</div>
<div class="w3-content" style="max-width:1100px;margin-top:80px;margin-bottom:80px">
<div class="w3-container">
<form action="Userprocesscompetency.php" method="post" enctype="multipart/form-data">
<?php
    $results = UserTestAssessment();
        if($results){
        $rows = mysqli_fetch_assoc($results); ?>
<fieldset>
<br>
<legend>Assessment :</legend>
<table>
<tr><td><input type="hidden" name="TestID[]" value="<?php echo $rows['TestID']; ?>"></input><b>Test ID: <?php echo $rows['TestID']; ?></b></td></tr>
<tr><td><input type="hidden" name="EmployeeID[]" value="<?php echo $rows['EmployeeID']; ?>"></input><b>Employee ID: <?php echo $rows['EmployeeID']; ?></b></td></tr>
<tr><td><b>Assign Time: <?php echo $rows['Assign_Time']; ?></b></td></tr>
</table></fieldset><br>


<?php
$result = UserTestAssessment();
if($result){
while ($row = mysqli_fetch_assoc($result)){	?>
<br>
<fieldset>
<table>
<tr><td><input type="hidden" name="TestID[]" value="<?php echo $rows['TestID']; ?>"></input></td></tr>
<tr><td><input type="hidden" name="EmployeeID[]" value="<?php echo $rows['EmployeeID']; ?>"></input></td></tr>
<tr><td><b>Competency Code: <i><?php echo $row ['CodeACompetency'] ; ?></i></b></td></tr>
<tr><td><b>Competency: <i><?php echo $row ['Competency'] ; ?></i></b></td></tr>
<tr><td><b>Group Competency: <i><?php echo $row ['GroupCompetency'] ; ?></i></b></td></tr>
<tr><td><input type='hidden' name='questioncode[]' value="<?php echo $row ['Question_Code'] ; ?>"></input><b>Question Code: <i><?php echo $row ['Question_Code']; ?></i></b></td></tr>
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
<button type="Submit" name="AssessmentSubmit"><b>Submit</b></button>
<?php }?>
<br>
</form>
</div>
</div>
<footer class="w3-container w3-padding-64 w3-light-grey w3-center">
&copy; Copyright S52287 2021.
</footer>


</body>
</html>