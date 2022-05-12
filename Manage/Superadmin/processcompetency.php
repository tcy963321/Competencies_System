<?php
// Cheeck Session
session_start();
	if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: Adminlogin.php');
  }			

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
	if($_POST['group']== "Other"){
	$group = $_POST['othergroup'];
	}else{
	$group = $_POST['group'];
	}
	if($ID && $competency && $group && $code_competency){
	$sql = "INSERT INTO competency (ID,CodeCompetency, Competency, GroupCompetency) 
                        VALUES ('$ID','$code_competency','$competency','$group')";
	mysqli_query($db,$sql);					
	echo '<script type="text/javascript"> 
    alert("Competency Successful Create"); 
	window.location.href = "SuperCreateCompetency.php";
</script>';
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
	$status = $_POST['status'];
	if($_POST['group'] == "Other"){
	$group = $_POST['othergroup'];	
	}else{
	$group = $_POST['group'];
	}
	$sql= "UPDATE competency set CodeCompetency='$code_competency',Competency='$competency',GroupCompetency='$group',Status='$status' WHERE ID='$ID'"; 
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

//
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
    $option1 = $_POST['option1'];
	$option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];
	$option5 = $_POST['option5'];
	$Type    = $_POST['Type'];
    if($code_competency && $question && $question_code && $option1 && $option2 && $option3 && $option4 && $option5 && $Type=="Assessment"){
		$sql = "INSERT INTO aquestion(Aquestion, A_QCode, Option1, Option2, Option3, Option4, Option5, CodeACompetency) 
                        VALUES ('$question','$question_code','$option1','$option2','$option3','$option4','$option5','$code_competency')";
		mysqli_query($db,$sql);
		echo '<script type="text/javascript"> 
    alert("Assessment Competency Successful Create"); 
	window.location.href = "Assessmentlist.php";
</script>';
	}
	else if($code_competency && $question && $question_code && $option1 && $option2 && $option3 && $option4 && $option5 && $Type=="Evaluate"){
	$sql = "INSERT INTO equestion (Equestion, E_QCode, Option1, Option2, Option3, Option4, Option5, CodeECompetency) 
                        VALUES ('$question','$question_code','$option1','$option2','$option3','$option4','$option5','$code_competency')";
	mysqli_query($db, $sql);	
			echo '<script type="text/javascript"> 
    alert("Evaluate Competency Successful Create"); 
	window.location.href = "Evaluatelist.php";
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
    $sql = "SELECT aquestion.ID,aquestion.AQuestion,aquestion.A_QCode,aquestion.Option1,aquestion.Option2,aquestion.Option3,aquestion.Option4,aquestion.Option5,aquestion.Status,competency.CodeCompetency,competency.Competency,competency.GroupCompetency FROM aquestion JOIN competency ON aquestion.CodeACompetency=competency.CodeCompetency";
    if($result = mysqli_query($db,$sql)){
    return $result;
    }
}

// Get Evaluate Question by ID
function getAssessmentID(){
	$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
	$ID =$_GET['id'];
    $sql = "SELECT aquestion.ID,aquestion.AQuestion,aquestion.A_QCode,aquestion.Option1,aquestion.Option2,aquestion.Option3,aquestion.Option4,aquestion.Option5,aquestion.Status,competency.CodeCompetency,competency.Competency,competency.GroupCompetency FROM aquestion JOIN competency ON aquestion.CodeACompetency=competency.CodeCompetency where aquestion.ID='$ID'";
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
    $option1 = $_POST['option1'];
	$option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];
	$option5 = $_POST['option5'];
	if($_POST['group'] == "Other"){
	$group = $_POST['othergroup'];	
	}else{
	$group = $_POST['group'];
	}
	$competency = $_POST['competency'];
	$code_competency = $_POST['code_competency'];	
	$status = $_POST['status'];
if($ID && $question && $question_code && $option1 && $option2 && $option3 && $option4 && $option5 && $code_competency && $status){
$sql= "UPDATE aquestion set AQuestion='$question',A_QCode='$question_code',Option1='$option1',Option2='$option2',Option3='$option3',Option4='$option4',Option5='$option5',CodeACompetency='$code_competency',Status='$status' WHERE ID='$ID'";
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
}

// Get all Evaluate competency Question
function getEvaluate(){
	$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
    $sql = "SELECT equestion.ID,equestion.EQuestion,equestion.E_QCode,equestion.Option1,equestion.Option2,equestion.Option3,equestion.Option4,equestion.Option5,competency.CodeCompetency,competency.Competency,competency.GroupCompetency FROM equestion JOIN competency ON equestion.CodeECompetency=competency.CodeCompetency";
    if($result = mysqli_query($db, $sql)){
        return $result;
    }
}

// Get Assessment Question by ID
function getEvaluateID(){
	$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
    $ID =$_GET['id'];
	$sql = "SELECT equestion.ID,equestion.EQuestion,equestion.E_QCode,equestion.Option1,equestion.Option2,equestion.Option3,equestion.Option4,equestion.Option5,competency.CodeCompetency,competency.Competency,competency.GroupCompetency FROM equestion JOIN competency ON equestion.CodeECompetency=competency.CodeCompetency where equestion.ID='$ID'";

    $result = mysqli_query($db, $sql);

    if(mysqli_num_rows($result) > 0){
        return $result;
    }
}

// Update Evaluate Question
function UpdateEVA(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
$sql="UPDATE set"	;
}

// Delete Evaluate Question
function DeleteEVA(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');	
	
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
?>