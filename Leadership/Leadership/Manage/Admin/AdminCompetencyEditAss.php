<?php require_once ("Adminprocesscompetency.php");
				  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: ../Adminlogin.php');
  }			
?>
<!DOCTYPE html>
<html>
<title>Update Competency</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="Competency.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<body>
<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large"
  onclick="w3_close()">Close &times;</button>
  <a href="Welcomeadmin.php" class="w3-bar-item w3-button">Dashboard</a>
   <a href="AdminCreateCompetency.php" class="w3-bar-item w3-button">Competency</a>
   <a href="AdminAssessmentlist.php" class="w3-bar-item w3-button">Question List</a>
	<a href="SelfAssessment.php" class="w3-bar-item w3-button">Self-Assessment</a>
	<a href="AdminEvaluatetest.php" class="w3-bar-item w3-button">Evaluate</a>
<a href="AdminAssignASS.php" class="w3-bar-item w3-button">Assign Test</a>
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
<div class="w3-content" style="max-width:1100px;margin-top:80px;margin-bottom:80px">
<div class="w3-container">
				 <?php
                      $result = getAssessmentID();
                      if($result){
                      while ($row = mysqli_fetch_assoc($result)){?>
<form action="" method="post" enctype="multipart/form-data">
			 <fieldset>
  <legend>Update Competency Form:</legend>
			<table>
				<tr>
				<td>ID :</td>
				<td><input type="text" name="id" value="<?php echo $row['ID'];?>" readonly /></td>
			    </tr>
			
				<tr>
				<td>Question :</td>		
				<td><textarea name="question" rows="6" cols="30" required > <?php echo $row['AQuestion']; ?> </textarea></td>
				</tr>
				
				<tr>
				<td>Question Code :</td>
				<td><input type="text" name="question_code" required value="<?php echo $row['A_QCode']; ?>"/></td>
				</tr>
				
				<tr>
				<td>Rating :</td>
				<td><input type="number" name="rating" required value="<?php echo $row['Rating']; ?>" min="1" max="10"/></td>
				</tr>
				
				<tr>
				<?php $group=$row['GroupCompetency']; if($group=="Core Competencies"){$CC="checked";}else{$CC="";}if($group=="Leading Other"){$LO="checked";}else{$LO="";} if($group=="Organization Competencies"){$OC="checked";}else{$OC="";} if($group!="Organization Competencies" && $group!="Core Competencies" && $group!="Leading Other"){$Other=$group; $OtherGroup="checked";}else{$Other="";$OtherGroup="";} ?>
				<td>Group Competency :</td>
				<td><input type="radio" id="myRadio" name="group" value="Core Competencies" <?php echo $CC;?> /> Core Competencies</td>
				</tr>
				<tr><td></td>
				<td><input type="radio" id="myRadio2" name="group" value="Leading Other"  <?php echo $LO;?> /> Leading Other</td>
				</tr>
				<tr><td></td>
				<td><input type="radio" id="myRadio3" name="group" value="Organization Competencies"  <?php echo $OC;?> /> Organization Competencies</td>
				</tr>
						
				<tr>
				<td>Competency :</td>		
				<td><input type="text" name="competency" required value="<?php echo $row['Competency']; ?>" readonly /></td>	
				</tr>
				
				<tr>
				<td>Code Competency :</td>
				<td><input type="text" name="code_competency" required value="<?php echo $row['CodeCompetency']; ?>"/></td>
				</tr>
				
				<tr hidden>
				<?php $status=$row['Status']; if($status=="Using"){$CC="checked";}else{$CC="";}if($status=="Remove"){$LO="checked";}else{$LO="";}?>
				<td>Status :</td>
				<td><input type="radio" name="status" value="Using" <?php echo $CC;?> /> Using</td>
				</tr>
				<tr hidden><td></td>
				<td><input type="radio" name="status" value="Remove"  <?php echo $LO;?> /> Remove</td>
				</tr>
				
				<tr>
				<td><button type="submit" name="updateAss" title="Update">Update Competency <i class='fas fa-pen-alt'></i></td></button>
				</tr>
				</table>
				</fieldset>
				</form> 
					<?php	} } ?>
<label>List of Competency:</label>
</div>
	<?php
	$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
	$sql="select Competency, CodeCompetency from competency";
	$result = $db->query($sql);
	if ($result) {
		while($rows = $result->fetch_assoc()) {
			//echo $rows['Competency'];
?><?php echo "(".$rows['CodeCompetency']."=".$rows['Competency'].") ";?><?php }}?> 
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

document.getElementById("myRadio").disabled = true;
document.getElementById("myRadio2").disabled = true;
document.getElementById("myRadio3").disabled = true;
document.getElementById("myRadio4").disabled = true;
</script>
</body>
</html>