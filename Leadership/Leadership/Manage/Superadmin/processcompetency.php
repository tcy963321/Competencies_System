<?php
// Cheeck Session
session_start();
	if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: Adminlogin.php');
  }			
//-------------------------------------------------------------------------------

//Function received Post
if(isset($_POST['Createcompetency'])){
    Createcompetency();
}
if(isset($_POST['UpdateCom'])){
    UpdateCom();
}

if(isset($_POST['DeleteCom'])){
    DeleteCom();
}

//Create Competency
function Createcompetency(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');	
	$ID = $_POST['competencyID'];
	$competency = $_POST['competency'];
    $code_competency = $_POST['code_competency'];
	$Weight_competency = $_POST['Weight_competency'];
	$group = $_POST['group'];
	$code_check_query = "SELECT * FROM competency WHERE CodeCompetency='$code_competency' LIMIT 1";
	$result = mysqli_query($db, $code_check_query);
	$code = mysqli_fetch_assoc($result);
  if ($code) { // if user exists
    if ($code['CodeCompetency'] == $code_competency) {
    echo '<script type="text/javascript"> 
    alert("Code competency already exists in this system!!!"); 
</script>';
    }
  }else{
	if($ID && $competency && $group && $code_competency){
	$sql = "INSERT INTO competency (ID,CodeCompetency, Competency, GroupCompetency, Weightcompetency) 
                        VALUES ('$ID','$code_competency','$competency','$group','$Weight_competency')";
	mysqli_query($db,$sql);					
	echo '<script type="text/javascript"> 
    alert("Competency Successful Create"); 
	window.location.href = "SuperCreateCompetency.php";
</script>';
}
else{
echo '<script type="text/javascript"> 
    alert("Competency Unsuccessful Create"); 
	window.location.href = "SuperCreateCompetency.php";
</script>';	
}
}
}

// Get All Competency
function getcompetency(){
	$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
    $sql = "SELECT * FROM competency ORDER BY ID";
    if($result = mysqli_query($db,$sql)){
    return $result;
    }
}

// Get Competency By ID
function getcompetencybyID(){
	$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
    $ID =$_GET['id'];
    $sql = "SELECT * FROM competency where ID='$ID'";
    if($result = mysqli_query($db,$sql)){
		return $result;
    }
	}

// Delete Competency
function DeleteCom(){
	$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
	$ID =$_GET['id'];
	$sql="DELETE FROM competency WHERE ID='$ID'";
	if($result = mysqli_query($db,$sql)){
	echo '<script type="text/javascript"> 
    alert("Competency Successful Delete"); 
	window.location.href ="SuperCreateCompetency.php";
</script>';
    }
	else{
		echo '<script type="text/javascript"> 
    alert("Competency Invalid to Delete"); 
	window.location.href ="SuperCreateCompetency.php";
</script>';	
	}
}

// Update Competency
function UpdateCom(){
	$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
	$ID = $_POST['competencyID'];
	$code_competency = $_POST['code_competency'];
	$competency = $_POST['competency'];
	$group = $_POST['group'];
	$Weight_competency = $_POST['Weight_competency'];
	$status = $_POST['status'];
	$sql= "UPDATE competency set CodeCompetency='$code_competency',Competency='$competency',GroupCompetency='$group',Weightcompetency='$Weight_competency',Status='$status' WHERE ID='$ID'"; 
    if($result = mysqli_query($db,$sql)){
	echo '<script type="text/javascript"> 
    alert("Competency Successful Update"); 
	window.location.href ="SuperCreateCompetency.php";
</script>';
    }
	else{
		echo '<script type="text/javascript"> 
    alert("Competency Invalid to Update"); 
	window.location.href ="SuperEditCompetency.php";
</script>';	
	}
}

// Competency Set ID
function CompetencysetID(){
    $getid = getcompetency();
    $id = 0;
    if($getid){
        while ($row = mysqli_fetch_assoc($getid)){
            $id = $row['ID'];
        }
    }
    return ($id + 1);
}
//-------------------------------------------------------------------------------

// Function received Post Assessment 
if(isset($_POST['Createquestion'])){
    Createquestion();
}
if(isset($_POST['updateAss'])){
    UpdateASS();
}
if(isset($_POST['updateEva'])){
    UpdateEVA();
}

if(isset($_POST['DeleteEva'])){
    DeleteEVA();
}

if(isset($_POST['DeleteAss'])){
    DeleteASS();
}

//Create Competency Question
function Createquestion(){
	$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
    $code_competency = $_POST['code_competency'];
	$question = $_POST['question'];
    $question_code = $_POST['question_code'];
	$rating=$_POST['rating'];
	$Type    = $_POST['Type'];
	$code_check_query = "SELECT * FROM aquestion WHERE A_QCode='$question_code' LIMIT 1";
	$result = mysqli_query($db, $code_check_query);
	$code = mysqli_fetch_assoc($result);
  if ($code) { // if user exists
    if ($code['A_QCode'] === $question_code) {
    echo '<script type="text/javascript"> 
    alert("Question code already exists in this system!!!"); 
</script>';
    }
  }
    else if($code_competency && $question && $question_code && $rating){
		$sql = "INSERT INTO aquestion(Aquestion, A_QCode, Rating , CodeACompetency) 
                        VALUES ('$question','$question_code','$rating','$code_competency')";
		mysqli_query($db,$sql);
		echo '<script type="text/javascript"> 
    alert("Assessment Competency Successful Create"); 
	window.location.href = "Assessmentlist.php";
</script>';
	}
	else{
	echo '<script type="text/javascript"> 
    alert("Sorry Invalid Create Competency"); 
	window.location.href = "Supercompetency.php";
</script>';	
	}
}

// Get all Assessment competency Question
function getAssessment(){
	$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
    $sql = "SELECT aquestion.ID,aquestion.AQuestion,aquestion.A_QCode,aquestion.Rating,aquestion.Status,competency.CodeCompetency,competency.Competency,competency.GroupCompetency,competency.Weightcompetency FROM aquestion JOIN competency ON aquestion.CodeACompetency=competency.CodeCompetency where competency.Status='Using'";
    if($result = mysqli_query($db,$sql)){
    return $result;
    }
}

// Get Assessment Question by ID
function getAssessmentID(){
	$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
	$ID =$_GET['id'];
    $sql = "SELECT aquestion.ID,aquestion.AQuestion,aquestion.A_QCode,aquestion.Rating,aquestion.Status,competency.CodeCompetency,competency.Competency,competency.GroupCompetency FROM aquestion JOIN competency ON aquestion.CodeACompetency=competency.CodeCompetency where aquestion.ID='$ID'";
    if($result = mysqli_query($db,$sql)){
    return $result;
    }
}

// Update Assessment Question
function UpdateASS(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');	
    $ID = $_POST['id'];
	$question = $_POST['question'];
    $question_code = $_POST['question_code'];
	$rating=$_POST['rating'];
	$code_competency = $_POST['code_competency'];	
	$status = $_POST['status'];
if($ID && $question && $question_code && $rating && $code_competency && $status){
$sql= "UPDATE aquestion set AQuestion='$question',A_QCode='$question_code',Rating='$rating',CodeACompetency='$code_competency',Status='$status' WHERE ID='$ID'";
mysqli_query($db,$sql);
		echo '<script type="text/javascript"> 
    alert("Assessment Competency Successful Update"); 
	window.location.href = "Assessmentlist.php";
</script>';
	}	else{
	echo '<script type="text/javascript"> 
    alert("Sorry Invalid Update Competency"); 
	window.location.href = "CompetencyEditAss.php";
</script>';
	}
}

// Delete Assessment Question
function DeleteASS(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');	
$ID =$_GET['id'];
	$sql="DELETE FROM aquestion WHERE ID='$ID'";
	if($result = mysqli_query($db,$sql)){
	echo '<script type="text/javascript"> 
    alert("Assessment Question Successful Delete"); 
	window.location.href ="Assessmentlist.php";
</script>';
    }
	else{
		echo '<script type="text/javascript"> 
    alert("Invalid to Delete"); 
	window.location.href ="Assessmentlist.php";
</script>';	
	}
}

// Get all Evaluate competency Question
/*function getEvaluate(){
	$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
    $sql = "SELECT equestion.ID,equestion.EQuestion,equestion.E_QCode,equestion.Option1,equestion.Option2,equestion.Option3,equestion.Option4,equestion.Option5,equestion.Status,competency.CodeCompetency,competency.Competency,competency.GroupCompetency FROM equestion JOIN competency ON equestion.CodeECompetency=competency.CodeCompetency";
    if($result = mysqli_query($db, $sql)){
        return $result;
    }
}

// Get Assessment Question by ID
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
	window.location.href = "Evaluatelist.php";
</script>';
	}	else{
	echo '<script type="text/javascript"> 
    alert("Sorry Invalid Update Competency"); 
	window.location.href = "CompetencyEditEva.php";
</script>';
	}
}

// Delete Evaluate Question
function DeleteEVA(){
$ID =$_GET['id'];
	$sql="DELETE FROM equestion WHERE ID='$ID'";
	if($result = mysqli_query($db,$sql)){
	echo '<script type="text/javascript"> 
    alert("Evaluate Question Successful Delete"); 
	window.location.href ="Evaluatelist.php";
</script>';
    }
	else{
		echo '<script type="text/javascript"> 
    alert("Invalid to Delete"); 
	window.location.href ="Evaluatelist.php";
</script>';	
	}	
}*/
//-------------------------------------------------------------------------------

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
$sql="SELECT account.EmployeeID,account.Name,account.Contact_Number,account.Email,account.Department,account.Position,login.Roles,login.Status FROM account JOIN login ON account.EmployeeID=login.username where Status!='Remove' ";
 if($result = mysqli_query($db, $sql)){
        return $result;
    }	
}

// Function received Post Assign Users Test
if(isset($_POST['AssignASSComfirm'])){
    AssignASSTest();
}

// Insert the assign user test 
function AssignASSTest(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');	
$checkbox1 = $_POST['chk'] ;
$chkuser = $_POST['chksuperior'];
$UserEmployeeID=$_POST['UserEmployeeID'];
$testid = $_POST['testid'];	 
if ($checkbox1 && $chkuser && $testid){  
for ($i=0; $i<sizeof ($checkbox1);$i++) {
$result_explode = explode('|', $checkbox1[$i]);	
for ($y=0; $y<sizeof ($chkuser);$y++){
for ($z=0; $z<sizeof ($testid);$z++){
$query="INSERT INTO assignassuser (TestID, Question_Code,CodeCompetency, EmployeeID) VALUES ('".$testid[$z]. "','".$result_explode[0]."','".$result_explode[1]."','".$UserEmployeeID[$y]. "')";  
$query1="INSERT INTO assignsuperior (TestID,QuestionCode,CodeCompetency,EmployeeID,Candidate) VALUES ('".$testid[$z]. "','".$result_explode[0]."','".$result_explode[1]."','".$chkuser[$y]. "','".$UserEmployeeID[$y]. "')";
mysqli_query($db,$query);
mysqli_query($db,$query1);	
}	 
}  
}
echo '<script type="text/javascript"> 
    alert("Assign User Successful"); 
	window.location.href = "CheckAssTest.php";
</script>'; 
}else {
	echo '<script type="text/javascript"> 
    alert("Assign User Invalid"); 
	window.location.href = "AssignASS.php";
</script>'; 	
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

// Get all Assign Test Question
function getallAssignTestAss(){
	$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
    $sql = "SELECT * FROM assignassuser ORDER BY TestID";
    if($result = mysqli_query($db, $sql)){
        return $result;
    }
}
//-------------------------------------------------------------------------------

// View all assign user test list
function Viewassignasstest(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');		
$sql="SELECT DISTINCT assignassuser.EmployeeID, assignassuser.TestID, assignassuser.Status, assignassuser.Assign_Time, account.Name FROM assignassuser JOIN account on account.EmployeeID=assignassuser.EmployeeID WHERE assignassuser.Status='Pending' ";
if($result = mysqli_query($db, $sql)){
        return $result;
    }
}

// Select the users view test deatils
function Detailsassignasstest(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');		
$TestID=$_GET["TestID"];
$EmployeeID=$_GET["EmployeeID"];
$sql="SELECT assignassuser.ID,assignassuser.TestID,assignassuser.Question_Code,assignassuser.EmployeeID,assignassuser.Status,assignassuser.Assign_Time,aquestion.AQuestion,
aquestion.Rating,aquestion.CodeACompetency FROM assignassuser JOIN aquestion on assignassuser.Question_Code=aquestion.A_QCode WHERE TestID='$TestID' AND EmployeeID='$EmployeeID'";
if($result = mysqli_query($db, $sql)){
        return $result;
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
	$sql="DELETE FROM assignassuser WHERE TestID='$TestID' AND EmployeeID='$EmployeeID'";
	if($result = mysqli_query($db,$sql)){
	echo '<script type="text/javascript"> 
    alert("Successful Delete"); 
</script>';
    }
	else{
		echo '<script type="text/javascript"> 
    alert("Invalid to Delete"); 
</script>';	
	}	
}
//-------------------------------------------------------------------------------

// View all assign evaluator test list
function Viewassignevatest(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');		
$sql="SELECT DISTINCT assignsuperior.EmployeeID, assignsuperior.TestID, assignsuperior.Status, assignsuperior.AssignDate, assignsuperior.Candidate, account.Name FROM assignsuperior JOIN account on account.EmployeeID=assignsuperior.EmployeeID WHERE assignsuperior.Status='Pending'";
if($result = mysqli_query($db, $sql)){
        return $result;
    }
}

// Select the view evaluate test deatils
function Detailsassignevatest(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');		
$TestID=$_GET["TestID"];
$EmployeeID=$_GET["EmployeeID"];
$sql="SELECT assignsuperior.ID,assignsuperior.TestID,assignsuperior.QuestionCode,assignsuperior.EmployeeID,assignsuperior.Candidate,assignsuperior.Status,assignsuperior.AssignDate,aquestion.AQuestion,
aquestion.Rating,aquestion.CodeACompetency FROM assignsuperior JOIN aquestion on assignsuperior.QuestionCode=aquestion.A_QCode WHERE TestID='$TestID' AND EmployeeID='$EmployeeID'";
if($result = mysqli_query($db, $sql)){
        return $result;
    }
}

// Function received Post delete Evalaute Assign User
if(isset($_POST['EvaluatorTestDel'])){
    EvaluateTestDel();
}

// Delete Assign User Test
function EvaluateTestDel()
{
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
$TestID =$_GET['TestID'];
$EmployeeID=$_GET['EmployeeID'];
	$sql="DELETE FROM assignsuperior WHERE TestID='$TestID' AND EmployeeID='$EmployeeID'";
	if($result = mysqli_query($db,$sql)){
	echo '<script type="text/javascript"> 
    alert("Successful Delete"); 
</script>';
    }
	else{
		echo '<script type="text/javascript"> 
    alert("Invalid to Delete"); 
</script>';	
	}	
}
//-------------------------------------------------------------------------------

//Get Evaluate Question
function getEvaluateQuestion(){
	$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
    $sql = "SELECT aquestion.ID,aquestion.AQuestion,aquestion.A_QCode,aquestion.Rating,aquestion.Status,competency.CodeCompetency,competency.Competency,competency.GroupCompetency FROM aquestion JOIN competency ON aquestion.CodeACompetency=competency.CodeCompetency where equestion.Status='Using' and competency.Status='Using'";
    if($result = mysqli_query($db,$sql)){
    return $result;
    }
}

// Select Assign evaluate to evaluator
function AssignEvaUser(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');	
$username=$_SESSION['username'];
$sql="SELECT account.EmployeeID,account.Name,account.Contact_Number,account.Email,account.Department,account.Position,login.Roles,login.Status FROM account JOIN login ON account.EmployeeID=login.username where Roles!='User' AND Status!='Remove' AND login.Username='$username' ";
 if($result = mysqli_query($db, $sql)){
        return $result;
    }	
}

// Select Candidate
function SlectEvatoUser(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');		
$sql="SELECT account.Department,account.Name,account.EmployeeID,login.Roles From account join login on account.EmployeeID=login.Username WHERE Roles!='Superadmin'";
if($result = mysqli_query($db, $sql)){
        return $result;
}
}

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
}
//-------------------------------------------------------------------------------

// Show Self-Assessment 
function SelfAssessment(){
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
	window.location.href = "Welcomesuperadmin.php";
</script>';
}
else{
echo '<script type="text/javascript"> 
	alert("Submit Failed Please Check Again"); 
	window.location.href = "SuperadminAssessment.php?TestID=1&EmployeeID=A00008";
</script>';
}
}
//-------------------------------------------------------------------------------

// View all assign user test list
function Viewasscomplete(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');		
$sql="SELECT DISTINCT assignassuser.EmployeeID, assignassuser.TestID, assignassuser.Status, assignassuser.Assign_Time, account.Name FROM assignassuser JOIN account on account.EmployeeID=assignassuser.EmployeeID WHERE assignassuser.Status='Complete' ";
if($result = mysqli_query($db, $sql)){
        return $result;
    }
}

// Select the view assessment test more deatils
function Detailsansasstest(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');		
$TestID=$_GET["TestID"];
$EmployeeID=$_GET["EmployeeID"];
$QCode=$_GET["QCode"];
$sql="SELECT aanswer.TestID,aanswer.A_QCode,aanswer.EmployeeID,aanswer.Vote,aanswer.DateTime,aanswer.Status,aquestion.AQuestion,aquestion.CodeACompetency FROM aquestion JOIN aanswer on aanswer.A_QCode=aquestion.A_QCode WHERE TestID='$TestID' AND EmployeeID='$EmployeeID' AND aanswer.A_QCode='$QCode';";
if($result = mysqli_query($db, $sql)){
        return $result;
    }
}
//-------------------------------------------------------------------------------

// View all assign evaluator compelete test list
function Viewcompeleteeva(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');		
$sql="SELECT DISTINCT assignsuperior.EmployeeID, assignsuperior.TestID, assignsuperior.Status, assignsuperior.AssignDate, assignsuperior.Candidate, account.Name FROM assignsuperior JOIN account on account.EmployeeID=assignsuperior.EmployeeID WHERE assignsuperior.Status='Complete'";
if($result = mysqli_query($db, $sql)){
        return $result;
    }
}

// Select the view evaluate test more deatils
function Detailsansevatest(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');		
$TestID=$_GET["TestID"];
$EmployeeID=$_GET["EmployeeID"];
$Code=$_GET["ECode"];
$QCode=$_GET["QCode"];
$sql="SELECT eanswer.CandidateID,eanswer.TestID,eanswer.E_QCode,eanswer.EmployeeID,eanswer.VoteE,eanswer.DateTime,eanswer.Status,aquestion.AQuestion,aquestion.CodeACompetency FROM aquestion JOIN eanswer on eanswer.E_QCode=aquestion.A_QCode WHERE TestID='$TestID' AND CandidateID='$EmployeeID' AND eanswer.E_QCode='$QCode';";
if($result = mysqli_query($db, $sql)){
        return $result;
    }
}
//-------------------------------------------------------------------------------

// Show Evaluate test 
function AdminEvaluatetest(){
	$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
	$username=$_SESSION['username'];
    $sql = "SELECT DISTINCT TestID,EmployeeID,Candidate,AssignDate FROM assignsuperior where EmployeeID='$username' AND Status='Pending'";
    if($result = mysqli_query($db,$sql)){
    return $result;
    }
}

// Evaluate Test
function EvaTest(){
	$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
	$TestID =$_GET['TestID'];
	$EmployeeID =$_GET['EmployeeID'];
	$sql = "SELECT competency.Competency,competency.GroupCompetency,assignsuperior.AssignDate,assignsuperior.QuestionCode,assignsuperior.Candidate,assignsuperior.TestID,assignsuperior.EmployeeID,aquestion.ID,aquestion.AQuestion,aquestion.Rating,aquestion.CodeACompetency FROM assignsuperior JOIN aquestion ON aquestion.A_QCode=assignsuperior.QuestionCode JOIN competency ON assignsuperior.CodeCompetency=competency.CodeCompetency WHERE assignsuperior.TestID='$TestID' AND assignsuperior.Candidate='$EmployeeID'";
    if($result = mysqli_query($db,$sql)){
    return $result;
}}

// Evalaute Submit 
if(isset($_POST['EvaluateSubmit'])){
    AdminEvaSubmit();
}

//Process save Evaluate data
function AdminEvaSubmit(){
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
	window.location.href = "HistoryEvaluate.php";
</script>';
}
else{
echo '<script type="text/javascript"> 
	alert("Submit Failed Please Check Again"); 
	window.location.href = "AdminStartEva.php?TestID=1&EmployeeID=A00008";
</script>';
}
}
//-------------------------------------------------------------------------------

// Function received Post Evaluate 
if(isset($_POST['AssignEVAComfirm'])){
    AssignEVATest();
}

// Insert the assign user test information
function AssignEVATest(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');	
$box1=$_POST['chk'] ;
$chk=$_POST['chkuser'];
$testid=$_POST['testid'];	
$UserEmployeeID=$_POST['UserEmployeeID']; 
if ($box1 && $chk && $testid && $UserEmployeeID){  
for ($i=0; $i<sizeof ($box1);$i++) {
$result_explode = explode('|', $box1[$i]);	
for ($y=0; $y<sizeof ($chk);$y++){
for ($z=0; $z<sizeof ($testid);$z++){	
$query="insert into assignsuperior (TestID,QuestionCode,CodeCompetency,EmployeeID,Candidate) VALUES ('".$testid[$z]."','".$result_explode[0]."','".$result_explode[1]."','".$chk[$y]."','".$UserEmployeeID."')";  
mysqli_query($db,$query);			 
}  
}
}
echo '<script type="text/javascript"> 
    alert("Assign Successful"); 
	window.location.href ="CheckEvaTest.php";
</script>'; 
}else {
	echo '<script type="text/javascript"> 
    alert("Assign Invalid"); 
	window.location.href ="AssignEVA.php";
</script>'; 	
}
}
//-------------------------------------------------------------------------------

// View all assign user test list
function Viewassremove(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');		
$sql="SELECT DISTINCT assignassuser.EmployeeID, assignassuser.TestID, assignassuser.Status, assignassuser.Assign_Time, account.Name FROM assignassuser JOIN account on account.EmployeeID=assignassuser.EmployeeID WHERE assignassuser.Status='Remove' ";
if($result = mysqli_query($db, $sql)){
        return $result;
    }
}
//-------------------------------------------------------------------------------

// View all assign evaluator Remove test list
function Viewremoveeva(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');		
$sql="SELECT DISTINCT assignsuperior.EmployeeID, assignsuperior.TestID, assignsuperior.Status, assignsuperior.AssignDate, assignsuperior.Candidate, account.Name FROM assignsuperior JOIN account on account.EmployeeID=assignsuperior.EmployeeID WHERE assignsuperior.Status='Remove'";
if($result = mysqli_query($db, $sql)){
        return $result;
    }
}
//-------------------------------------------------------------------------------

// Select the competency deatils
function Detailsevacom(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');		
$Code=$_GET["ECode"];
$sql="SELECT * FROM competency WHERE CodeCompetency='$Code'";
if($result = mysqli_query($db, $sql)){
        return $result;
    }
}
//-------------------------------------------------------------------------------

// Select the competency deatils
function Detailsasscom(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');		
$Code=$_GET["ACode"];
$sql="SELECT * FROM competency WHERE CodeCompetency='$Code'";
if($result = mysqli_query($db, $sql)){
        return $result;
    }
}
//-------------------------------------------------------------------------------
// Personal information
function selfinformation(){
	$username=$_SESSION['username'];
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');		
    $sql = "SELECT * FROM account WHERE EmployeeID='$username'";
    if($result = mysqli_query($db,$sql)){
		return $result;
    }	
}
?>