<?php require_once ("processcompetency.php");
				  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: Adminlogin.php');
  }			
?>
<!DOCTYPE html>
<html>
<title>Update Competency</title>
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
   <div class="dropdown">
   <button class="w3-bar-item w3-button">Question List</button>
   <div class="dropdown-content">
    <a href="Assessmentlist.php">Assessment</a>
    <a href="Evaluatelist.php">Evaluate</a>
	</div>
	</div>
	<br>
   <div class="dropdown">
   <button class="w3-bar-item w3-button">Leadership Competency Test</button>
   <div class="dropdown-content">
    <a href="">Assessment</a>
    <a href="">Evaluate</a>
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
				<td>Bil :</td>
				<td><input type="text" name="id" value="<?php echo $row['ID'];?>" readonly /></td>
			    </tr>
			
				<tr>
				<td>Question :</td>		
				<td><textarea name="question" rows="6" cols="30"> <?php echo $row['AQuestion']; ?> </textarea></td>
				</tr>
				
				<tr>
				<td>Question Code :</td>
				<td><input type="text" name="question_code" value="<?php echo $row['A_QCode']; ?>"/></td>
				</tr>
			
				<tr>
				<td>Option 1 :</td>
				<td><input type="text" name="option1" value="<?php echo $row['Option1']; ?>"/></td>
				</tr>
				<tr>
				
				<td>Option 2 :</td>
				<td><input type="text" name="option2" value="<?php echo $row['Option2']; ?>"/></td>
				</tr>
				<tr>
				
				<td> Option 3 :</td>
				<td><input type="text" name="option3" value="<?php echo $row['Option3']; ?>"/></td>
				</tr>
				
				<tr>
				<td>Option 4 :</td>
				<td><input type="text" name="option4" value="<?php echo $row['Option4']; ?>"/></td>
				</tr>
				
				<tr>
				<td>Option 5 :</td>
				<td><input type="text" name="option5" value="<?php echo $row['Option5']; ?>"/></td>
				</tr>
				
				<tr>
				<?php $group=$row['GroupCompetency']; if($group=="Core Competencies"){$CC="checked";}else{$CC="";}if($group=="Leading Other"){$LO="checked";}else{$LO="";} if($group=="Organization Competencies"){$OC="checked";}else{$OC="";} if($group!="Organization Competencies" && $group!="Core Competencies" && $group!="Leading Other"){$Other=$group; $OtherGroup="checked";}else{$Other="";$OtherGroup="";} ?>
				<td>Group Competency :</td>
				<td><input type="radio" name="group" value="Core Competencies" <?php echo $CC;?> readonly /> Core Competencies</td>
				</tr>
				<tr><td></td>
				<td><input type="radio" name="group" value="Leading Other"  <?php echo $LO;?> readonly /> Leading Other</td>
				</tr>
				<tr><td></td>
				<td><input type="radio" name="group" value="Organization Competencies"  <?php echo $OC;?> readonly /> Organization Competencies</td>
				</tr>
				<tr><td></td>
				<td><input type="radio" name="group" value="Other" <?php echo $OtherGroup;?> readonly /><input "type="text" name="othergroup" id="otherField" value="<?php echo $Other;?>" placeholder="Other" readonly /></td>
				</tr>
						
				<tr>
				<td>Competency :</td>		

				<td><input type="text" name="competency" value="<?php echo $row['Competency']; ?>" readonly /></td>	
				</tr>
				
				<tr>
				<td>Code Competency :</td>
				<td><input type="text" name="code_competency" value="<?php echo $row['CodeCompetency']; ?>"/></td>
				</tr>
				
				<tr>
				<?php $status=$row['Status']; if($status=="Using"){$CC="checked";}else{$CC="";}if($status=="Remove"){$LO="checked";}else{$LO="";}?>
				<td>Status :</td>
				<td><input type="radio" name="status" value="Using" <?php echo $CC;?> /> Using</td>
				</tr>
				<tr><td></td>
				<td><input type="radio" name="status" value="Remove"  <?php echo $LO;?> /> Remove</td>
				</tr>
				
				<tr>
				<td><button type="submit" name="updateAss" title="Update">Update Competency <i class='fas fa-pen-alt'></i></button>
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
</script>
</body>
</html>