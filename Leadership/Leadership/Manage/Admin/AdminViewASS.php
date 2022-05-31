<?php require_once ("Adminprocesscompetency.php");
				  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: ../Adminlogin.php');
  }			
?>

<!DOCTYPE html>
<html>
<title>View User Test List</title>
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

<div class="w3-content w3-responsive" style="max-width:80%;margin-top:80px;margin-bottom:80px">
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="EmloyeeID..."/>
<div class="w3-container">
<center><table id="competency">
<tr>
                        <th>Employee ID</th>
						<th>Department</th>
						<th>Test ID</th>
					    <th>Submit Date</th>
						<th>Status</th>
						<th>Action</th>
					
</tr>
<?php
                      $result = ViewHistoryAssessment();
                      if($result){
                      while ($row = mysqli_fetch_assoc($result)){?>   
<tr>	
	<td><?php echo $row['EmployeeID']; ?></td>
	<td><?php echo $row['Department']; ?></td>
	<td><?php echo $row['TestID']; ?></td>
	<td><?php echo $row['DateTime']; ?></td>
	<td><?php echo $row['Status']; ?></td>
	<td><?php echo "<form action='AdminViewASSDetail.php?TestID=$row[TestID]&EmployeeID=$row[EmployeeID]' method='POST'><button type='submit' name='Edit' title='View Question'><i class='fas fa-eye'></i></i></button></form>";?></td>
</tr>
  <?php	} } ?>						  
</table></center>
</div>
</div>
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