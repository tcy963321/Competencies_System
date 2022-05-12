<?php require_once ("Adminprocesscompetency.php");
				  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: ../Adminlogin.php');
  }			
?>

<!DOCTYPE html>
<html>
<title>View User Assessment Details</title>
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
<div class="w3-content"style="max-width:90%;margin-top:80px;margin-bottom:80px">
<div class="w3-container">

<form action="" method="post" enctype="multipart/form-data">
<?php
                      $results=ViewUserAssessmentDetails();
                      if($results){
                      $rows=mysqli_fetch_array($results);	{?> 
 <fieldset>
  <legend>Assessment Details:</legend>
			<table>
				<tr>
				<td>EmployeeID :</td>
				<td><?php echo $rows['EmployeeID']; ?></td>
			    </tr>
				<tr>
				<td>Name :</td>		
				<td><?php echo $rows['Name']; ?></td>
				</tr>
				<tr>
				<td>Department :</td>
				<td><?php echo $rows['Department']; ?></td>
				</tr>
				<tr>
				<td>Position :</td>
				<td><?php echo $rows['Position']; ?></td>
				</tr>
					<?php	} } ?>	
				<?php
                      $results=ViewHistoryAssessmentDetails();
                      if($results){
                      $rows=mysqli_fetch_array($results);	{?> 	
				<tr>
				<td>Test ID :</td>
				<td><?php echo $rows['TestID']; ?></td>
				</tr>	
				<tr>
				<td>Submit Date :</td>
				<td><?php echo $rows['DateTime']; ?></td>
				</tr>
				<tr>
				<td>Status :</td>
				<td><?php echo $rows['Status']; ?></td>
				</tr>
				</table>
				</fieldset>
				</form> 
	<?php	} } ?>
<center><table id="competency">
<tr>
					    <th>Question Code</th>
						<th>Vote</th>
						<th>More Information</th>
					
</tr>
<?php
                      $result = ViewHistoryAssessmentDetails();
                      if($result){
                      while ($row = mysqli_fetch_assoc($result)){?>   
<tr>
	<td><?php echo $row['A_QCode']; ?></td>
	<td><?php echo $row['Vote'];?></td>
	<td><?php echo "<form action='QuestionView.php?AQCODE=$row[A_QCode]' method='POST' target='_blank' rel='noopener noreferrer'><button type='submit' name='Edit' title='View Question'><i class='fas fa-eye'></i></i></button></form>";?></td>
</tr>
  <?php	} } ?>						  
</table></center>

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