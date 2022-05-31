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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<body>
<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large"
  onclick="w3_close()">Close &times;</button>
  <a href="Welcomesuperadmin.php" class="w3-bar-item w3-button">Dashboard</a>
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
			 <fieldset>
  <legend>Create Competency Form:</legend>
			<table>
			    <tr>
				<td>ID :</td>
				<td><input type="text" name="competencyID" value="<?php echo CompetencysetID();?>" readonly /></td>
			    </tr>
			
			    <tr>
				<td>Competency :</td>
				<td><input type="text" name="competency" value="" required id="my-field"  placeholder="Competency" required /></td>
			    </tr>
				
				<tr>
				<td>Group Competency :</td>
				<td><input type="radio" name="group" value="Core Competencies" checked /> Core Competencies</td>
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
				<td><input type="number" name="Weight_competency" value="" placeholder="Weight Competency" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" min="1" max="100" required /></td>
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
  <table id="competency" class="">
  <tr>
                        <th>ID</th>
						<th>Code Competency</th>
						<th>Competency</th>
						<th>Group Competency</th>
						<th>Weight Competency</th>
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
							<form action='SuperCompetency.php?id=$row[ID]' method='POST'><button type='submit' name='Create' title='Create Question'><i class='fas fa-plus'></i></button></form>
							<form action='SuperEditCompetency.php?id=$row[ID]' method='POST'><button type='submit' name='Update' title='Edit'><i class='fas fa-edit btnedit'></i></button></form>
							<form class='delete_button' action='SuperCreateCompetency.php?id=$row[ID]' method='POST'><button type='submit' title='Delete' name='DeleteCom'><i class='fas fa-trash-alt'></i></button></form>";?></td>
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

        $(document).ready(function() {
            $("input[type='radio']").change(function() {
                if ($(this).val() == "Other") {
                    $("#othergroup").show();
                } else {
                    $("#othergroup").hide();
                }
            });
        });
		
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
    td = tr[i].getElementsByTagName("td")[0];
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

function testInput(event) {
   var value = String.fromCharCode(event.which);
   var pattern = new RegExp(/[a-zåäö ]/i);
   return pattern.test(value);
}

$('#my-field').bind('keypress', testInput);


</script>
</body>
</html>
	