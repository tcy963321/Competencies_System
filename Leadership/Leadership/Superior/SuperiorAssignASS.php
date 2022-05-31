<?php require_once ("Superiorprocesscompetency.php");
				  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: Superiorlogin.php');
  }			
?>
<!DOCTYPE html>
<html>
<title>Assign Assessment</title>
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

<div class="w3-content" style="max-width:90%;margin-top:80px;margin-bottom:80px">
<div class="w3-container">

  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Competency..."/>
  <br><button type="button" class="collapsible" >Question</button>
  <form name="myForm" action="" method="post" enctype="multipart/form-data">
  <center><table id="competency" class="w3-responsive" >
  <tr>
						<th><div class="dropdown">
						<button class="w3-bar-item w3-button">Select (<i class='fas fa-check'></i>)</button>
						<div class="dropdown-content">
						<input type="button" onclick='selects()' value="Select All"/></button>
						<input type="button" onclick='deSelect()()' value="Clear All"/></button>
						</div>
						</div></th>
                        <th>ID</th>
                        <th>Question</th>
                        <th>Question Code</th>
						<th>Rating</th>
						<th>Code Competency</th>
						<th>Competency</th>
						<th>Weight Competency</th>
						<th>Group Competency</th>
						<th>Status</th>
   </tr>
      <?php
                      $result = getAssessmentQuestion();
                      if($result){
                           while ($row = mysqli_fetch_assoc($result)){ ?>

                        <tr>
							<td><input type="checkbox" name="chk[]" value="<?php echo $row['A_QCode']; ?>|<?php echo $row['CodeCompetency']; ?>" /></td>
                            <td><?php echo $row['ID']; ?></td>
                            <td><?php echo $row['AQuestion']; ?></td>
                            <td><?php echo $row['A_QCode']; ?></td>
                            <td><?php echo $row['Rating']; ?></td>
							<td><?php echo $row['CodeCompetency']; ?></td>
                            <td><?php echo $row['Competency']; ?></td>
							<td><?php echo $row['Weightcompetency']; ?></td>
                            <td><?php echo $row['GroupCompetency']; ?></td>
							<td><?php echo $row['Status']; ?></td>
                       </tr>
                   <?php
                           }
                       }
                   ?>
   </table></center>
</div>
</div>

<div class="w3-content" style="max-width:90%;margin-top:80px;margin-bottom:80px">
<div class="w3-container">
<br><button type="button" class="collapsible" >User Table</button>
<table id="competency" class="w3-responsive" style="display: none">
  <tr>
    <th><div class="dropdown">
		<button class="w3-bar-item w3-button">Select (<i class='fas fa-check'></i>)</button>
		<div class="dropdown-content">
		<input type="button" onclick='selectsall()' value="Select All"/></button>
	    <input type="button" onclick='unSelect()()' value="Clear All"/></button>
		</div>
	</div></th>
	<th>Employee ID</th>
    <th>Name</th>
	<th>Contact Number</th>
    <th>Email</th>
    <th>Department</th>
	<th>Position</th>
	<th>Select Candidate</th>
  </tr>
  <?php 
$result = selfinformation();
                      if($result){
                           while ($row = mysqli_fetch_assoc($result)){ ?>
  <tr>
	<td><input type="checkbox" name="chksuperior[]" required value="<?php echo $row['EmployeeID']; ?>" /></td>
	<td><?php echo $row['EmployeeID']; ?></td>
	<td><?php echo $row['Name']; ?></td>
	<td><?php echo $row['Contact_Number']; ?></td>
	<td><?php echo $row['Email']; ?></td>
	<td><?php echo $row['Department']; ?></td>
	<td><?php echo $row['Position']; ?></td>
     <?php
                           }
                       }
                   ?>
			   
<td><select id="UserEmployeeID" name="UserEmployeeID[]">
<?php 
$result = SlectEvatoUser();
                      if($result){
                           while ($row = mysqli_fetch_assoc($result)){ ?>
<option value="<?php echo $row['EmployeeID'];?>"><?php echo $row['Name']; ?>-<?php echo $row['EmployeeID'];?></option>
<?php
                           }
                       }
                   ?>
</select></td>
  </tr>	
		   
  	<tr>
	<td>Test ID :</td>
	<td><input type="text" name="Testid[]" value="<?php echo AssignTestsetID()?>" readonly /></td>
	</tr>

</table>
<br>
<button type="submit" name="AssignASSComfirm" title="Assign User" class="Assign">Assign User <i class='fas fa-pen-alt'></i></button>
</form>   
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
	td = tr[i].getElementsByTagName("td")[10];
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

            function selects(){  
                var ele=document.getElementsByName('chk[]');  
                for(var i=0; i<ele.length; i++){  
                    if(ele[i].type=='checkbox')  
                        ele[i].checked=true;  
                }  
            }  

           function deSelect(){  
                var ele=document.getElementsByName('chk[]');  
                for(var i=0; i<ele.length; i++){  
                    if(ele[i].type=='checkbox')  
                        ele[i].checked=false;  
                      
                }  
            }	

            function selectsall(){  
                var ele=document.getElementsByName('chksuperior[]');  
                for(var i=0; i<ele.length; i++){  
                    if(ele[i].type=='checkbox')  
                        ele[i].checked=true;  
                }  
            }  

           function unSelect(){  
                var ele=document.getElementsByName('chksuperior[]');  
                for(var i=0; i<ele.length; i++){  
                    if(ele[i].type=='checkbox')  
                        ele[i].checked=false;  
                      
                }  
            }	

		var coll = document.getElementsByClassName("collapsible");

var i;
for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
       
</script>
<footer class="w3-container w3-padding-64 w3-light-grey w3-center">
&copy; Copyright S52287 2021.
</footer>
</body>
</html>

