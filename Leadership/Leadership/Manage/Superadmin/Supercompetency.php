<?php require_once ("processcompetency.php");
				  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
	  header('location: ../Adminlogin.php');
  }			
?>
 <?php
                      $result = getcompetencybyID();
                      if($result){
                           while ($row = mysqli_fetch_assoc($result)){ ?>
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
<div class="w3-content" style="max-width:1100px;margin-top:80px;margin-bottom:80px">
<div class="w3-container">
<form action="" method="post" enctype="multipart/form-data">
			 <fieldset>
  <legend>Create Competency Form:</legend>
			<table>
			    <tr>
				<td>Competency :</td>
				<td><input type="text" name="competency" value="<?php echo $row['Competency']; ?>" readonly size="28"/></td>
			    </tr>
				
				<tr>
				<td>Group Competency :</td>
				<td><input type="text" name="groupcompetency" value="<?php echo $row['GroupCompetency']; ?>" readonly size="28"/></td>
				</tr>
			  
				<tr>
				<td>Code Competency :</td>
				<td><input type="text" name="code_competency" value="<?php echo $row['CodeCompetency']; ?>" readonly /></td>
				</tr>
			
				<tr>
				<td>Question :</td>		
				<td><textarea name="question" placeholder="Question"  rows="4" cols="25" required></textarea></td>
				</tr>
				
				<tr>
				<td>Question Code :</td>
				<td><input type="text" name="question_code" value="" placeholder="Question Code" required /></td>
				</tr>
			
				<tr>
				<td>Rating :</td>
				<td><input type="number" name="rating" value="" placeholder="Rating" min="1" max="10" required /></td>
				</tr>
			
				<tr>
				<td><button type="submit" name="Createquestion" title="Create">Create Question <i class='fas fa-plus'></i></button>
				</tr>
				</table>
				</fieldset>
				</form>  
				    <?php
                           }
                       }
                   ?>
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
 
<script>
        $(document).ready(function() {
            $("input[type='radio']").change(function() {
                if ($(this).val() == "Other") {
                    $("#othergroup").show();
                } else {
                    $("#othergroup").hide();
                }
            });
        });
    </script>	
</body>
</html>