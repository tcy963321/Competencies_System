<?php
// Cheeck Session
session_start();
	if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: Superiorlogin.php');
  }

// Personal information
function selfinformation(){
	$username=$_SESSION['username'];
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');		
    $sql = "SELECT * FROM account WHERE EmployeeID='$username'";
    if($result = mysqli_query($db,$sql)){
		return $result; 
    }	
} 

//---------------------------------------------------------------------


//Get Assessment Question
function getAssessmentQuestion(){
	$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
    $sql = "SELECT aquestion.ID,aquestion.AQuestion,aquestion.A_QCode,aquestion.Rating,aquestion.Status,competency.CodeCompetency,competency.Competency,competency.GroupCompetency,competency.Weightcompetency FROM aquestion JOIN competency ON aquestion.CodeACompetency=competency.CodeCompetency where aquestion.Status='Using' and competency.Status='Using'";
    if($result = mysqli_query($db,$sql)){
    return $result;
    }
}

// Select Assign Assessment to users 
function AssignAssUser(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
$username=$_SESSION['username'];	
$sql = "SELECT * FROM account WHERE EmployeeID='$username'";
if($results = mysqli_query($db,$sql)){
$rows=mysqli_fetch_array($results);
$sql="SELECT account.EmployeeID,account.Name,account.Contact_Number,account.Email,account.Department,account.Position,login.Roles,login.Status FROM account JOIN login ON account.EmployeeID=login.username WHERE Roles='User' AND Status!='Remove' AND Department='$rows[Department]'";
 if($result = mysqli_query($db, $sql)){
        return $result;
}	
} 
}

// Function received Post Assign Users Test
if(isset($_POST['AssignASSComfirm'])){
    AssignASSTest();
}

// Insert the assign user test information
function AssignASSTest(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');	
$checkbox1 = $_POST['chk'] ;
$chkuser = $_POST['chksuperior'];
$testid = $_POST['Testid'];	 
$UserEmployeeID = $_POST['UserEmployeeID'];	 
if ($checkbox1 && $chkuser && $testid && $UserEmployeeID){  
for ($i=0; $i<sizeof ($checkbox1);$i++) {
$result_explode = explode('|', $checkbox1[$i]);	
for ($y=0; $y<sizeof ($UserEmployeeID);$y++){
for ($z=0; $z<sizeof ($testid);$z++){
$query="INSERT INTO assignassuser (TestID,Question_Code,CodeCompetency, EmployeeID) VALUES ('".$testid[$z]. "','".$result_explode[0]."','".$result_explode[1]."','".$UserEmployeeID[$y]. "')";  
$query1="INSERT INTO assignsuperior (TestID,QuestionCode,CodeCompetency,EmployeeID,Candidate) VALUES ('".$testid[$z]. "','".$result_explode[0]."','".$result_explode[1]."','".$chkuser[$y]. "','".$UserEmployeeID[$y]. "')";
mysqli_query($db,$query);
mysqli_query($db,$query1);
}	 
}  
}
echo '<script type="text/javascript"> 
    alert("Assign User Successful"); 
	window.location.href = "SuperiorCheckAssTest.php";
</script>'; 
}else {
	echo '<script type="text/javascript"> 
    alert("Assign User Invalid"); 
	window.location.href = "SuperiorAssignASS.php";
</script>'; 	
}
}
//---------------------------------------------------------------------

// Get all Evaluate competency Question
/*function getEvaluate(){
	$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
    $sql = "SELECT equestion.ID,equestion.EQuestion,equestion.E_QCode,equestion.Option1,equestion.Option2,equestion.Option3,equestion.Option4,equestion.Option5,equestion.Status,competency.CodeCompetency,competency.Competency,competency.GroupCompetency FROM equestion JOIN competency ON equestion.CodeECompetency=competency.CodeCompetency WHERE equestion.Status='Using' and competency.Status='Using'";
    if($result = mysqli_query($db, $sql)){
        return $result;
    }
}

// Delete Evaluate Question
function DeleteEVA(){
	$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
$ID =$_GET['id'];
	$sql="Update equestion set Status='Remove' WHERE ID='$ID'";
	if($result = mysqli_query($db,$sql)){
	echo '<script type="text/javascript"> 
    alert("Evaluate Question Successful Delete"); 
	window.location.href ="SuperiorEvaluatelist.php";
</script>';
    }
	else{
		echo '<script type="text/javascript"> 
    alert("Invalid to Delete"); 
	window.location.href ="SuperiorEvaluatelist.php";
</script>';	
	}	
}

// Get Evaluate Question by ID
function getEvaluateID(){
	$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
    $ID =$_GET['id'];
	$sql = "SELECT equestion.ID,equestion.EQuestion,equestion.E_QCode,equestion.Option1,equestion.Option2,equestion.Option3,equestion.Option4,equestion.Option5,equestion.Status,competency.CodeCompetency,competency.Competency,competency.GroupCompetency FROM equestion JOIN competency ON equestion.CodeECompetency=competency.CodeCompetency where equestion.ID='$ID'";

    $result = mysqli_query($db, $sql);

    if(mysqli_num_rows($result) > 0){
        return $result;
    }
}

// Update Evaluate Question
function UpdateEVA(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
	$ID = $_POST['id'];
	$question = $_POST['question'];
    $question_code = $_POST['question_code'];
    $option1 = $_POST['option1'];
	$option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];
	$option5 = $_POST['option5'];
	$code_competency = $_POST['code_competency'];	
	$status = $_POST['status'];
if($ID && $question && $question_code && $option1 && $option2 && $option3 && $option4 && $option5 && $code_competency && $status){
$sql= "UPDATE equestion set EQuestion='$question',E_QCode='$question_code',Option1='$option1',Option2='$option2',Option3='$option3',Option4='$option4',Option5='$option5',CodeECompetency='$code_competency',Status='$status' WHERE ID='$ID'";
mysqli_query($db,$sql);
		echo '<script type="text/javascript"> 
    alert("Evaluate Competency Successful Update"); 
	window.location.href = "SuperiorEvaluatelist.php";
</script>';
	}	else{
	echo '<script type="text/javascript"> 
    alert("Sorry Invalid Update Competency"); 
	window.location.href = "SuperiorCompetencyEditEva.php";
</script>';
	}
}*/
//---------------------------------------------------------------------
/*
// Get Evaluate Question
function getEvaluateQuestion(){
	$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
    $sql = "SELECT equestion.ID,equestion.EQuestion,equestion.E_QCode,equestion.Option1,equestion.Option2,equestion.Option3,equestion.Option4,equestion.Option5,equestion.Status,competency.CodeCompetency,competency.Competency,competency.GroupCompetency FROM equestion JOIN competency ON equestion.CodeECompetency=competency.CodeCompetency where equestion.Status='Using' and competency.Status='Using'";
    if($result = mysqli_query($db,$sql)){
    return $result;
    }
}

//Function received Post Evaluate Users Test
if(isset($_POST['AssignEVAComfirm'])){
    AssignEVATest();
}

// Insert the assign user test information
function AssignEVATest(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');	
$box1=$_POST['chkEva'] ;
$chk=$_POST['chksuperior'];
$testid=$_POST['Testid'];	
$UserEmployeeID=$_POST['UserEmployeeID']; 
if ($box1 && $chk && $testid && $UserEmployeeID){  
for ($i=0; $i<sizeof ($box1);$i++) {
$result_explode = explode('|', $box1[$i]);	
for ($y=0; $y<sizeof ($chk);$y++){
for ($z=0; $z<sizeof ($testid);$z++){	
			 
}  
}
}
echo '<script type="text/javascript"> 
    alert("Assign Successful"); 
	window.location.href ="SuperiorCheckEvaTest.php";
</script>'; 
}else {
	echo '<script type="text/javascript"> 
    alert("Assign Invalid"); 
	window.location.href ="SuperiorAssignEVA.php";
</script>'; 	
}
}*/

// Select Candidate
function SlectEvatoUser(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');	
$username=$_SESSION['username'];	
$sql = "SELECT * FROM account WHERE EmployeeID='$username'";
if($results = mysqli_query($db,$sql)){
$rows=mysqli_fetch_array($results);		
$sql="SELECT account.Department,account.Name,account.EmployeeID,login.Roles From account join login on account.EmployeeID=login.Username WHERE Department='$rows[Department]' AND Roles='User'";
if($result = mysqli_query($db, $sql)){
        return $result;
}
}
}
/*
// Get all Assign Evaluate Test Question
function GetAllEvaluateTest(){
	$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
    $sql = "SELECT * FROM assignsuperior ORDER BY TestID";
    if($result = mysqli_query($db, $sql)){
        return $result;
    }
}

// Assign Evaluate Test Set ID
function EvaluateTestsetID(){
    $getid = GetAllEvaluateTest();
    $id = 0;
    if($getid){
        while ($row = mysqli_fetch_assoc($getid)){
            $id = $row['TestID'];
        }
    }
    return ($id + 1);
}*/
//---------------------------------------------------------------------

// Get all Assign Test Question
function getallAssignTestAss(){
	$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
    $sql = "SELECT * FROM assignassuser ORDER BY TestID";
    if($result = mysqli_query($db, $sql)){
        return $result;
    }
}

// Assign Test Set ID
function AssignTestsetID(){
    $getid = getallAssignTestAss();
    $id = 0;
    if($getid){
        while ($row = mysqli_fetch_assoc($getid)){
            $id = $row['TestID'];
        }
    }
    return ($id + 1);
}
//---------------------------------------------------------------------

// View all assign user test list
function Viewassignasstest(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');	
$username=$_SESSION['username'];	
$sql = "SELECT * FROM account WHERE EmployeeID='$username'";
if($results = mysqli_query($db,$sql)){
$rows=mysqli_fetch_array($results);		
$sql="SELECT DISTINCT assignassuser.EmployeeID,assignassuser.TestID,assignassuser.Status,assignassuser.Assign_Time,account.Name FROM assignassuser JOIN account WHERE account.EmployeeID=assignassuser.EmployeeID AND account.Department='$rows[Department]' AND assignassuser.Status='Pending'";
if($result = mysqli_query($db, $sql)){
        return $result;
}
}
}

// Function received Post delete Assessment Assign User
if(isset($_POST['AssignUserTestDel'])){
    AssignUserTestDel();
}

// Delete Assign User Test
function AssignUserTestDel()
{
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
$TestID =$_GET['TestID'];
$EmployeeID=$_GET['EmployeeID'];
	$sql="Update assignassuser Set Status='Remove' WHERE TestID='$TestID' AND EmployeeID='$EmployeeID'";
	if($result = mysqli_query($db,$sql)){
	echo '<script type="text/javascript"> 
    alert("Successful Delete"); 
	window.location.href ="SuperiorCheckAssTest.php";
</script>';
    }
	else{
		echo '<script type="text/javascript"> 
    alert("Invalid to Delete"); 
	window.location.href ="SuperiorCheckAssTest.php";
</script>';	
	}	
}

// Select the users view test deatils
function Detailsassignasstest(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');		
$TestID=$_GET["TestID"];
$EmployeeID=$_GET["EmployeeID"];
$sql="SELECT assignassuser.ID,assignassuser.TestID,assignassuser.Question_Code,assignassuser.EmployeeID,assignassuser.Status,assignassuser.Assign_Time,aquestion.AQuestion,
aquestion.Rating,aquestion.CodeACompetency
FROM assignassuser JOIN aquestion on assignassuser.Question_Code=aquestion.A_QCode WHERE TestID='$TestID' AND EmployeeID='$EmployeeID'";
if($result = mysqli_query($db, $sql)){
        return $result;
    }
}
//---------------------------------------------------------------------

// View all user complete test assessment list
function ViewHistoryAssessment(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
$username=$_SESSION['username'];	
$sql = "SELECT * FROM account WHERE EmployeeID='$username'";
if($results = mysqli_query($db,$sql)){
$rows=mysqli_fetch_array($results);	
$sql="SELECT DISTINCT account.Department,aanswer.EmployeeID,aanswer.TestID,aanswer.DateTime,aanswer.Status FROM aanswer JOIN account on aanswer.EmployeeID=account.EmployeeID WHERE account.Department='$rows[Department]'";
if($result = mysqli_query($db, $sql)){
        return $result;
}
}
}

function ViewUserAssessmentDetails(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');		
$EmployeeID=$_GET["EmployeeID"];
$sql="SELECT * FROM account WHERE EmployeeID='$EmployeeID'";
if($result = mysqli_query($db, $sql)){
        return $result;
    }
}

// View History Assessment Details
function ViewHistoryAssessmentDetails(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');		
$TestID=$_GET["TestID"];
$EmployeeID=$_GET["EmployeeID"];
$sql="SELECT A_QCode,Vote,TestID,DateTime,Status FROM aanswer WHERE TestID='$TestID' AND EmployeeID='$EmployeeID'";
if($result = mysqli_query($db, $sql)){
        return $result;
    }
}

//View Question Details
function ViewQuestionDetails(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');		
$AQCODE=$_GET["AQCODE"];
$sql="SELECT * FROM aquestion WHERE A_QCode='$AQCODE'";
if($result = mysqli_query($db, $sql)){
        return $result;
    }
}

//View Competency Details
function CheckCompetencyDetails(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');		
$AQCODE=$_GET["AQCODE"];
$AComCode=$_GET["CodeA"];
$sql="SELECT * FROM competency WHERE CodeCompetency='$AComCode'";
if($result = mysqli_query($db, $sql)){
        return $result;
    }
}
//---------------------------------------------------------------------

// View all Evaluate test list
function ViewEvatest(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');	
$username=$_SESSION['username'];	
$sql = "SELECT * FROM account WHERE EmployeeID='$username'";
if($results = mysqli_query($db,$sql)){
$rows=mysqli_fetch_array($results);		
$sql="SELECT DISTINCT assignsuperior.EmployeeID,assignsuperior.Candidate,assignsuperior.TestID,assignsuperior.Status,assignsuperior.AssignDate,account.Name FROM assignsuperior JOIN account on account.EmployeeID=assignsuperior.Candidate WHERE account.Department='$rows[Department]' AND assignsuperior.Status='Pending' AND assignsuperior.EmployeeID='$rows[EmployeeID]'";
if($result = mysqli_query($db, $sql)){
        return $result;
}
}
}

// Function received Post delete Evaluate
if(isset($_POST['EvaTestDel'])){
    EvluateTestDel();
}

// Delete Evaluate Test
function EvluateTestDel()
{
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
$TestID =$_GET['TestID'];
$EmployeeID=$_GET['EmployeeID'];
	$sql="Update assignsuperior Set Status='Remove' WHERE TestID='$TestID' AND Candidate='$EmployeeID'";
	if($result = mysqli_query($db,$sql)){
	echo '<script type="text/javascript"> 
    alert("Successful Delete"); 
	window.location.href ="SuperiorCheckEvaTest.php";
</script>';
    }
	else{
		echo '<script type="text/javascript"> 
    alert("Invalid to Delete"); 
	window.location.href ="SuperiorCheckEvaTest.php";
</script>';	
	}	
}

// Show Evaluate test 
function SuperiorEvaluatetest(){
	$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
	$TestID=$_GET["TestID"];
	$EmployeeID=$_GET["EmployeeID"];
    $sql = "SELECT DISTINCT TestID,EmployeeID,Candidate,AssignDate FROM assignsuperior where Candidate='$EmployeeID' AND TestID='$TestID' AND Status='Pending'";
    if($result = mysqli_query($db,$sql)){
    return $result;
    }
}

// Evaluate Test
function EvaTest(){
	$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
	$TestID =$_GET['TestID'];
	$EmployeeID =$_GET['EmployeeID'];
	$sql = "SELECT competency.Competency,competency.GroupCompetency,assignsuperior.AssignDate,assignsuperior.QuestionCode,assignsuperior.Candidate,assignsuperior.TestID,assignsuperior.EmployeeID,aquestion.ID,aquestion.AQuestion,aquestion.Rating,Aquestion.CodeACompetency FROM assignsuperior JOIN aquestion ON aquestion.A_QCode=assignsuperior.QuestionCode JOIN competency ON assignsuperior.CodeCompetency=competency.CodeCompetency  WHERE assignsuperior.TestID='$TestID' AND assignsuperior.Candidate='$EmployeeID'";
    if($result = mysqli_query($db,$sql)){
    return $result;
}}

// Evalaute Submit 
if(isset($_POST['EvaluateSubmit'])){
    SuperiorEvaSubmit();
}

//Process save assessment data
function SuperiorEvaSubmit(){
	$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
	$TestID =$_POST['TestID'];
	$EmployeeID =$_POST['EmployeeID'];
	$Candidate =$_POST['Candidate'];
	$answer = $_POST['answer'];
	$questioncode = $_POST['questioncode'] ;
if ($TestID && $EmployeeID && $Candidate && $answer && $questioncode){  
for ($i=0; $i<sizeof ($questioncode);$i++) {	
$query="INSERT INTO eanswer (EmployeeID,CandidateID,E_QCode,TestID,VoteE) VALUES ('".$EmployeeID[$i]. "','".$Candidate[$i]. "','".$questioncode[$i]. "','".$TestID[$i]. "','".$answer[$i]. "')";  
mysqli_query($db,$query);
$Complete='Complete';	
$sql= "UPDATE assignsuperior set Status='Complete' WHERE TestID='$TestID[$i]' AND EmployeeID='$EmployeeID[$i]' AND QuestionCode='$questioncode[$i]'";
mysqli_query($db,$sql);
}
echo '<script type="text/javascript"> 
    alert("Submit Successful"); 
	window.location.href = "SuperiorViewEVA.php";
</script>';
}
else{
echo '<script type="text/javascript"> 
	alert("Submit Failed Please Check Again"); 
	window.location.href = "SuperiorStartEva.php?TestID=1&EmployeeID=A00008";
</script>';
}
}

// Select the Evaluate test deatils
function DetailsEvatest(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');		
$TestID=$_GET["TestID"];
$EmployeeID=$_GET["EmployeeID"];
$sql="SELECT assignsuperior.ID,assignsuperior.TestID,assignsuperior.QuestionCode,assignsuperior.Candidate,assignsuperior.EmployeeID,assignsuperior.Status,assignsuperior.AssignDate,aquestion.AQuestion,
aquestion.Rating,aquestion.CodeACompetency
FROM assignsuperior JOIN aquestion on assignsuperior.QuestionCode=aquestion.A_QCode WHERE TestID='$TestID' AND Candidate='$EmployeeID'";
if($result = mysqli_query($db, $sql)){
        return $result;
    }
}
//---------------------------------------------------------------------

// Show History Evaluate 
function HistoryEvaluate(){
	$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
    $username=$_SESSION['username'];
	$sql = "SELECT DISTINCT TestID,DateTime,CandidateID,Status,EmployeeID FROM eanswer where EmployeeID='$username'";
    if($result = mysqli_query($db,$sql)){
    return $result;
    }
}

// View History Evaluate Details
function ViewHistoryEvaDetails(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');		
$TestID=$_GET["TestID"];
$EmployeeID=$_GET["EmployeeID"];
$sql="SELECT E_QCode,VoteE,TestID,DateTime,Status,EmployeeID FROM eanswer WHERE TestID='$TestID' AND CandidateID='$EmployeeID'";
if($result = mysqli_query($db, $sql)){
        return $result;
    }
}

function ViewUserEvaDetails(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');		
$EmployeeID=$_GET["EmployeeID"];
$sql="SELECT * FROM account WHERE EmployeeID='$EmployeeID'";
if($result = mysqli_query($db, $sql)){
        return $result;
    }
}

//View Question Details
function ViewQuestionEvaDetails(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');		
$EQCODE=$_GET["EQCODE"];
$sql="SELECT * FROM aquestion WHERE A_QCode='$EQCODE'";
if($result = mysqli_query($db, $sql)){
        return $result;
    }
}

//View Competency Details
function CheckCompetencyEvaDetails(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');		
$EQCODE=$_GET["EQCODE"];
$EComCode=$_GET["CodeE"];
$sql="SELECT * FROM competency WHERE CodeCompetency='$EComCode'";
if($result = mysqli_query($db, $sql)){
        return $result;
    }
}
//---------------------------------------------------------------------

// Show Assessment 
function SuperiorAssessment(){
	$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
	$username=$_SESSION['username'];
    $sql = "SELECT DISTINCT TestID, EmployeeID, Assign_Time FROM assignassuser where EmployeeID='$username' AND Status='Pending'";
    if($result = mysqli_query($db,$sql)){
    return $result;
    }
}

// Test Assessment
function SuperiorTestAssessment(){
	$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
	$TestID =$_GET['TestID'];
	$EmployeeID =$_GET['EmployeeID'];
	$sql = "SELECT competency.Competency,competency.GroupCompetency,assignassuser.Assign_Time,assignassuser.Question_Code,assignassuser.TestID,assignassuser.EmployeeID,aquestion.ID,aquestion.AQuestion,aquestion.Rating,aquestion.CodeACompetency FROM assignassuser JOIN aquestion ON aquestion.A_QCode=assignassuser.Question_Code JOIN competency ON assignassuser.CodeCompetency=competency.CodeCompetency  WHERE assignassuser.TestID='$TestID' AND assignassuser.EmployeeID='$EmployeeID'";
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
	window.location.href = "WelcomeSuperior.php";
</script>';
}
else{
echo '<script type="text/javascript"> 
	alert("Submit Failed Please Check Again"); 
	window.location.href = "SuperiorAssessment.php?TestID=1&EmployeeID=A00008";
</script>';
}
}
//---------------------------------------------------------------------
?>