<?php require_once ("Adminprocesscompetency.php");
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
  <a href="Welcomeadmin.php" class="w3-bar-item w3-button">Dashboard</a>
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
<form action="" method="post" enctype="multipart/form-data">
			 <fieldset>
  <legend>Create Competency Form:</legend>
			<table>
			    <tr>
				<td>ID :</td>
				<td><input type="text" name="competencyID" value="<?php echo CompetencysetID();?>" readonly /></td>
			    </tr>
			
			    <tr>
				<td>Competency :</td>
				<td><input type="text" name="competency" value="" placeholder="Competency" required onkeypress="return /[a-z]/i.test(event.key)"/></td>
			    </tr>
				
				<tr>
				<td>Group Competency :</td>
				<td><input type="radio" name="group" value="Core Competencies"/> Core Competencies</td>
				</tr>
				<tr><td></td>
				<td><input type="radio" name="group" value="Leading Other"/> Leading Other</td>
				</tr>
				<tr><td></td>
				<td><input type="radio" name="group" value="Organization Competencies"/> Organization Competencies</td>
				</tr>
  
				<tr>
				<td>Code Competency :</td>
				<td><input type="text" name="code_competency" value="" placeholder="Code Competency" required /></td>
				</tr>
			
				<tr>
				<td>Weight Competency :</td>
				<td><input type="number" name="Weight_competency" value="" placeholder="Weight Competency" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" /></td>
				</tr>
			
				<tr>
				<td><button type="submit" name="Createcompetency" title="Create">Create Competency <i class='fas fa-plus'></i></button>
				</tr>
				</table>
				</fieldset>
				</form>  
</div>
</div>

<div class="w3-content w3-responsive"style="margin-bottom:80px">
<div class="w3-container">
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Competency Code...">
  <table id="competency">
  <tr>
                        <th>ID</th>
						<th>Code Competency</th>
						<th>Competency</th>
						<th>Group Competency</th>
						<th>Weight competency</th>
						<th>Status</th>
						<th>Action</th>
   </tr>
          <?php
                      $result = getcompetency();
                      if($result){
                           while ($row = mysqli_fetch_assoc($result)){ 
						  ?>

                        <tr>
                            <td><?php echo $row['ID']; ?></td>
							<td><?php echo $row['CodeCompetency']; ?></td>
                            <td><?php echo $row['Competency']; ?></td>
                            <td><?php echo $row['GroupCompetency']; ?></td>
							<td><?php echo $row['Weightcompetency']; ?></td>
                            <td><?php echo $row['Status']; ?></td>
							<td><?php echo "
							<form action='Admincompetency.php?id=$row[ID]' method='POST'><button type='submit' name='Create' title='Create Question'><i class='fas fa-plus'></i></button></form>
							<form action='AdminEditCompetency.php?id=$row[ID]' method='POST'><button type='submit' name='Update' title='Edit'><i class='fas fa-edit btnedit'></i></button></form>
							<form class='delete_button' action='AdminCreateCompetency.php?id=$row[ID]&Status=$row[Status]' method='POST'><button type='submit' title='Delete' name='DeleteCom'><i class='fas fa-trash-alt'></i></button></form>";?></td>
                       </tr>
                   <?php
                           }
                       }
                   ?>
   </table>
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
		
		$('.delete_button').click(function(e){
        var result = confirm("Are you sure you want to delete this competency?");
        if(!result) {
            e.preventDefault();
        }
    })
	
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("competency");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
	td = tr[i].getElementsByTagName("td")[1];
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
	