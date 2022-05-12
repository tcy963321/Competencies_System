<?php require_once ("processcompetency.php");
				  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: Adminlogin.php');
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
<div class="w3-content" style="max-width:90%;margin-top:80px;margin-bottom:80px">
<div class="w3-container">
   <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Question Code..">
   <center><table id="competency" class="w3-responsive">
  <tr>
                        <th>ID</th>
                        <th>Question</th>
                        <th>Question Code</th>
                        <th>Option 1</th>
                        <th>Option 2</th>
						<th>Option 3</th>
						<th>Option 4</th>
						<th>Option 5</th>
						<th>Code Competency</th>
						<th>Competency</th>
						<th>Group Competency</th>
						<th>Status</th>
						<th>Action</th>
   </tr>
      <?php
                      $result = getAssessment();
                      if($result){
                           while ($row = mysqli_fetch_assoc($result)){ ?>

                        <tr>
                            <td><?php echo $row['ID']; ?></td>
                            <td><?php echo $row['AQuestion']; ?></td>
                            <td><?php echo $row['A_QCode']; ?></td>
                            <td><?php echo $row['Option1']; ?></td>
							<td><?php echo $row['Option2']; ?></td>
                            <td><?php echo $row['Option3']; ?></td>
                            <td><?php echo $row['Option4']; ?></td>
                            <td><?php echo $row['Option5']; ?></td>
							<td><?php echo $row['CodeCompetency']; ?></td>
                            <td><?php echo $row['Competency']; ?></td>
                            <td><?php echo $row['GroupCompetency']; ?></td>
							<td><?php echo $row['Status']; ?></td>
							<td><?php echo "<form action='CompetencyEditAss.php?id=$row[ID]' method='POST'><button type='submit' name='Edit' title='Edit'><i class='fas fa-edit btnedit'></i></button></form><form class='delete_button' action='processcompetency.php?id=$row[ID]' method='POST'><button type='submit' title='Delete' name='DeleteAss'><i class='fas fa-trash-alt'></i></button></form>"; ?></td>
                       </tr>
                   <?php
                           }
                       }
                   ?>
   </table></center>
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

function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("competency");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
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
