<?php
// Cheeck Session
session_start();
	if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: Userlogin.php');
  }	

 
// Show Assign User Assessment 
function UserAssessment(){
	$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
	$username=$_SESSION['username'];
    $sql = "SELECT DISTINCT TestID, EmployeeID, Assign_Time FROM assignassuser where EmployeeID='$username' AND Status='Pending'";
    if($result = mysqli_query($db,$sql)){
    return $result;
    }
}

// Test Assessment
function UserTestAssessment(){
	$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
	$TestID =$_GET['TestID'];
	$EmployeeID =$_GET['EmployeeID'];
	$sql = "SELECT competency.Competency,competency.GroupCompetency,assignassuser.Assign_Time,assignassuser.Question_Code,assignassuser.TestID,assignassuser.EmployeeID,aquestion.ID,aquestion.AQuestion,aquestion.Rating,aquestion.CodeACompetency FROM assignassuser JOIN aquestion ON aquestion.A_QCode=assignassuser.Question_Code JOIN competency ON assignassuser.CodeCompetency=competency.CodeCompetency WHERE assignassuser.TestID='$TestID' AND assignassuser.EmployeeID='$EmployeeID'";
    if($result = mysqli_query($db,$sql)){
    return $result;
}}

function UserAssessmentCom(){
	$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
	$sql = "SELECT aquestion.CodeACompetency,competency.CodeCompetency,competency.Competency,competency.GroupCompetency FROM aquestion JOIN competency ON aquestion.CodeACompetency=competency.CodeCompetency";
    if($result = mysqli_query($db,$sql)){
    return $result;
}}

// Assessment Submit 
if(isset($_POST['AssessmentSubmit'])){
    UserASSSubmit();
}

//Process save assessment data
function UserASSSubmit(){
	$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
	$TestID =$_POST['TestID'];
	$EmployeeID =$_POST['EmployeeID'];
	$answer = $_POST['answer'];
	$questioncode = $_POST['questioncode'] ;
if ($TestID && $EmployeeID && $answer && $questioncode){  
for ($i=0; $i<sizeof ($questioncode);$i++) {	
$query="INSERT INTO aanswer (EmployeeID,A_QCode,TestID,Vote) VALUES ('".$EmployeeID[$i]. "','".$questioncode[$i]. "','".$TestID[$i]. "','".$answer[$i]. "')";  
mysqli_query($db,$query);
$Complete='Complete';	
$sql= "UPDATE assignassuser set Status='Complete' WHERE TestID='$TestID[$i]' AND EmployeeID='$EmployeeID[$i]' AND Question_Code='$questioncode[$i]'";
mysqli_query($db,$sql);
}
echo '<script type="text/javascript"> 
    alert("Submit Successful"); 
	window.location.href ="Welcomeuser.php";
</script>';
}
else{
echo '<script type="text/javascript"> 
	alert("Submit Failed Please Check Again"); 
	window.location.href ="UserTestAssessment.php";
</script>';
}
}

// Show History Assessment 
function HistoryAssessment(){
	$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
	$username=$_SESSION['username'];
    $sql = "SELECT DISTINCT TestID,DateTime,Status FROM aanswer where EmployeeID='$username'";
    if($result = mysqli_query($db,$sql)){
    return $result;
    }
}



?>