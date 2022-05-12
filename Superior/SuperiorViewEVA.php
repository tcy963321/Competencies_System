<?php require_once ("Superiorprocesscompetency.php");
				  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: Superiorlogin.php');
  }			
?>
<!DOCTYPE html>
<html>
<title>View User Test List</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="competency.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<body>
<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large"
  onclick="w3_close()">Close &times;</button>
  <a href="Welcomesuperior.php" class="w3-bar-item w3-button">Dashboard</a>
	<a href="SelfAssessment.php" class="w3-bar-item w3-button">Self-Assessment</a>
  <a href="SuperiorAssignASS.php" class="w3-bar-item w3-button">Assign Test</a>
	<a href="SuperiorCheckAssTest.php" class="w3-bar-item w3-button">Assign User Test List</a>
	<a href="SuperiorCheckEvaTest.php" class="w3-bar-item w3-button">Assign Evaluate List</a>
	   <div class="dropdown">
   <button class="w3-bar-item w3-button">History</button>
   <div class="dropdown-content">
    <a href="SuperiorViewASS.php">Assessment</a>
    <a href="SuperiorViewEVA.php">Evaluate</a>
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
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Test ID..."/>
<center><table id="competency">
<tr>
                        <th>Test ID</th>
						<th>Candidate</th>
					    <th>Assign Date</th>
						<th>Status</th>
						<th>Action</th>
					
</tr>
<?php
                      $result = HistoryEvaluate();
                      if($result){
                      while ($row = mysqli_fetch_assoc($result)){?>   
<tr>	
	<td><?php echo $row['TestID']; ?></td>
	<td><?php echo $row['CandidateID']; ?></td>
	<td><?php echo $row['DateTime']; ?></td>
	<td><?php echo $row['Status']; ?></td>
	<td><?php echo "<form action='SuperiorViewEvaDetail.php?TestID=$row[TestID]&EmployeeID=$row[CandidateID]' method='POST'><button type='submit' name='Edit' title='View Question'><i class='fas fa-eye'></i></i></button></form>";?></td>
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

function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("competency");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
	td = tr[i].getElementsByTagName("td")[0];
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
<footer class="w3-container w3-padding-64 w3-light-grey w3-center">
&copy; Copyright S52287 2021.
</footer>
</body>
</html>