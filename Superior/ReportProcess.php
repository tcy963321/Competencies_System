<?php
// Cheeck Session
session_start();
	if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location:Superiorlogin.php');
  }	
  
function getAssessment(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
    $sql = "SELECT aquestion.A_QCode,aquestion.AQuestion,aquestion.Rating,competency.CodeCompetency,competency.Competency,competency.GroupCompetency,competency.Weightcompetency FROM aquestion JOIN competency ON aquestion.CodeACompetency=competency.CodeCompetency where competency.Status='Using' and aquestion.Status='Using' ORDER BY competency.ID ";
    if($result = mysqli_query($db,$sql)){
    return $result;
    }	
} 

function getAssListReport(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
$username=$_SESSION['username'];	
$sql = "SELECT * FROM account WHERE EmployeeID='$username'";
if($results = mysqli_query($db,$sql)){
$rows=mysqli_fetch_array($results);		
$sql = "SELECT DISTINCT aanswer.TestID,aanswer.EmployeeID,aanswer.DateTime,account.Department FROM aanswer JOIN account ON aanswer.EmployeeID=account.EmployeeID WHERE account.Department='$rows[Department]'";
    if($result = mysqli_query($db, $sql)){
        return $result;
    }		
}
}

function getEvaListReport(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
$username=$_SESSION['username'];	
$sql = "SELECT * FROM account WHERE EmployeeID='$username'";
if($results = mysqli_query($db,$sql)){
$rows=mysqli_fetch_array($results);		
    $sql = "SELECT DISTINCT eanswer.TestID,eanswer.CandidateID,eanswer.EmployeeID,eanswer.DateTime,account.Department FROM eanswer JOIN account ON eanswer.CandidateID=account.EmployeeID WHERE Department='$rows[Department]' and eanswer.EmployeeID='$username'";
    if($result = mysqli_query($db, $sql)){
        return $result;
    }		
}
}

function AssReportAnalysis(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
$TestID=$_GET["TestID"];
$EmployeeID=$_GET["EmployeeID"]; 
$username=$_SESSION['username'];	
$sql = "SELECT * FROM account WHERE EmployeeID='$username'";
if($results = mysqli_query($db,$sql)){
$rows=mysqli_fetch_array($results);		
$sql = "SELECT aanswer.EmployeeID,aanswer.A_QCode,aanswer.TestID,aanswer.Vote,aanswer.DateTime,aquestion.AQuestion,aquestion.Rating,aquestion.CodeACompetency,competency.Competency,competency.GroupCompetency,competency.Weightcompetency,account.Name,account.Department FROM aanswer JOIN aquestion ON aanswer.A_QCode=aquestion.A_QCode JOIN competency ON aquestion.CodeACompetency=competency.CodeCompetency JOIN account ON account.EmployeeID=aanswer.EmployeeID WHERE aanswer.TestID='$TestID' AND aanswer.EmployeeID='$EmployeeID' AND Department='$rows[Department]' AND Competency.GroupCompetency IN ('Core Competencies')";
if($result = mysqli_query($db, $sql)){
return $result;
    }		
}
}

function AssReportAnalysis2(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
$TestID=$_GET["TestID"];
$EmployeeID=$_GET["EmployeeID"]; 
$username=$_SESSION['username'];	
$sql = "SELECT * FROM account WHERE EmployeeID='$username'";
if($results = mysqli_query($db,$sql)){
$rows=mysqli_fetch_array($results);		
$sql = "SELECT aanswer.EmployeeID,aanswer.A_QCode,aanswer.TestID,aanswer.Vote,aanswer.DateTime,aquestion.AQuestion,aquestion.Rating,aquestion.CodeACompetency,competency.Competency,competency.GroupCompetency,competency.Weightcompetency,account.Name,account.Department FROM aanswer JOIN aquestion ON aanswer.A_QCode=aquestion.A_QCode JOIN competency ON aquestion.CodeACompetency=competency.CodeCompetency JOIN account ON account.EmployeeID=aanswer.EmployeeID WHERE aanswer.TestID='$TestID' AND aanswer.EmployeeID='$EmployeeID' AND Department='$rows[Department]' AND Competency.GroupCompetency IN ('Organization Competencies')";
if($result = mysqli_query($db, $sql)){
return $result;
    }
}	
}

function AssReportAnalysis3(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
$TestID=$_GET["TestID"];
$EmployeeID=$_GET["EmployeeID"]; 
$username=$_SESSION['username'];	
$sql = "SELECT * FROM account WHERE EmployeeID='$username'";
if($results = mysqli_query($db,$sql)){
$rows=mysqli_fetch_array($results);		
$sql = "SELECT aanswer.EmployeeID,aanswer.A_QCode,aanswer.TestID,aanswer.Vote,aanswer.DateTime,aquestion.AQuestion,aquestion.Rating,aquestion.CodeACompetency,competency.Competency,competency.GroupCompetency,competency.Weightcompetency,account.Name,account.Department FROM aanswer JOIN aquestion ON aanswer.A_QCode=aquestion.A_QCode JOIN competency ON aquestion.CodeACompetency=competency.CodeCompetency JOIN account ON account.EmployeeID=aanswer.EmployeeID WHERE account.Department='$rows[Department]' AND aanswer.TestID='$TestID' AND aanswer.EmployeeID='$EmployeeID' AND Department='$rows[Department]' AND Competency.GroupCompetency IN ('Leading Other')";
if($result = mysqli_query($db, $sql)){
return $result;
    }		
}
}

function Assgraph(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
$TestID=$_GET["TestID"];
$EmployeeID=$_GET["EmployeeID"];	
$sql="SELECT aanswer.EmployeeID,aanswer.A_QCode,aanswer.TestID,aanswer.Vote,aanswer.DateTime,aquestion.AQuestion,aquestion.Rating,aquestion.CodeACompetency,competency.Competency,competency.GroupCompetency,competency.Weightcompetency FROM aanswer JOIN aquestion ON aanswer.A_QCode=aquestion.A_QCode JOIN competency ON aquestion.CodeACompetency=competency.CodeCompetency WHERE aanswer.TestID='$TestID' AND aanswer.EmployeeID='$EmployeeID'";	
if($result = mysqli_query($db, $sql)){
return $result;
    }
}

function EvaReportAnalysis(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
$TestID=$_GET["TestID"];
$EmployeeID=$_GET["EmployeeID"]; 
$username=$_SESSION['username'];	
$sql = "SELECT * FROM account WHERE EmployeeID='$username'";
if($results = mysqli_query($db,$sql)){
$rows=mysqli_fetch_array($results);		
$sql = "SELECT eanswer.CandidateID,eanswer.E_QCode,eanswer.TestID,eanswer.Vote,eanswer.DateTime,aquestion.AQuestion,aquestion.Rating,aquestion.CodeACompetency,competency.Competency,competency.GroupCompetency,competency.Weightcompetency,account.Name,account.Department FROM eanswer JOIN aquestion ON eanswer.E_QCode=aquestion.A_QCode JOIN competency ON aquestion.CodeACompetency=competency.CodeCompetency JOIN account ON account.EmployeeID=eanswer.CandidateID WHERE account.Department='$rows[Department]' AND eanswer.TestID='$TestID' AND eanswer.CandidateID='$EmployeeID' AND Competency.GroupCompetency IN ('Core Competencies')";
if($result = mysqli_query($db, $sql)){
return $result;
    }		
}
}

function EvaReportAnalysis2(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
$TestID=$_GET["TestID"];
$EmployeeID=$_GET["EmployeeID"]; 
$username=$_SESSION['username'];	
$sql = "SELECT * FROM account WHERE EmployeeID='$username'";
if($results = mysqli_query($db,$sql)){
$rows=mysqli_fetch_array($results);		
$sql = "SELECT eanswer.CandidateID,eanswer.E_QCode,eanswer.TestID,eanswer.Vote,eanswer.DateTime,aquestion.AQuestion,aquestion.Rating,aquestion.CodeACompetency,competency.Competency,competency.GroupCompetency,competency.Weightcompetency,account.Name,account.Department FROM eanswer JOIN aquestion ON eanswer.E_QCode=aquestion.A_QCode JOIN competency ON aquestion.CodeACompetency=competency.CodeCompetency JOIN account ON account.EmployeeID=eanswer.CandidateID WHERE account.Department='$rows[Department]' AND eanswer.TestID='$TestID' AND eanswer.CandidateID='$EmployeeID' AND Competency.GroupCompetency IN ('Organization Competencies')";
if($result = mysqli_query($db, $sql)){
return $result;
    }		
}
}

function EvaReportAnalysis3(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
$TestID=$_GET["TestID"];
$EmployeeID=$_GET["EmployeeID"]; 
$username=$_SESSION['username'];	
$sql = "SELECT * FROM account WHERE EmployeeID='$username'";
if($results = mysqli_query($db,$sql)){
$rows=mysqli_fetch_array($results);		
$sql = "SELECT eanswer.CandidateID,eanswer.E_QCode,eanswer.TestID,eanswer.Vote,eanswer.DateTime,aquestion.AQuestion,aquestion.Rating,aquestion.CodeACompetency,competency.Competency,competency.GroupCompetency,competency.Weightcompetency,account.Name,account.Department FROM eanswer JOIN aquestion ON eanswer.E_QCode=aquestion.A_QCode JOIN competency ON aquestion.CodeACompetency=competency.CodeCompetency JOIN account ON account.EmployeeID=eanswer.CandidateID WHERE account.Department='$rows[Department]' AND eanswer.TestID='$TestID' AND eanswer.CandidateID='$EmployeeID' AND Competency.GroupCompetency IN ('Leading Other')";
if($result = mysqli_query($db, $sql)){
return $result;
    }		
}
}

function Evagraph(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
$TestID=$_GET["TestID"];
$EmployeeID=$_GET["EmployeeID"];	
$sql = "SELECT eanswer.CandidateID,eanswer.E_QCode,eanswer.TestID,eanswer.Vote,eanswer.DateTime,aquestion.AQuestion,aquestion.Rating,aquestion.CodeACompetency,competency.Competency,competency.GroupCompetency,competency.Weightcompetency,account.Name,account.Department FROM eanswer JOIN aquestion ON eanswer.E_QCode=aquestion.A_QCode JOIN competency ON aquestion.CodeACompetency=competency.CodeCompetency JOIN account ON account.EmployeeID=eanswer.CandidateID WHERE eanswer.TestID='$TestID' AND eanswer.CandidateID='$EmployeeID'";	
if($result = mysqli_query($db, $sql)){
return $result;
    }
}

function getAverageReport(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
$username=$_SESSION['username'];	
$sql = "SELECT * FROM account WHERE EmployeeID='$username'";
if($results = mysqli_query($db,$sql)){
$rows=mysqli_fetch_array($results);		
$sql = "Select DISTINCT eanswer.TestID,eanswer.CandidateID,eanswer.EmployeeID FROM eanswer JOIN aanswer ON eanswer.TestID=aanswer.TestID JOIN account ON account.EmployeeID=eanswer.CandidateID WHERE account.Department='$rows[Department]'";	
if($result = mysqli_query($db, $sql)){
return $result;
    }
}
}

function AverageAnalysis(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
$TestID=$_GET["TestID"];
$EmployeeID=$_GET["EmployeeID"]; 
$sql = "SELECT eanswer.CandidateID,eanswer.EmployeeID,eanswer.E_QCode,eanswer.TestID,eanswer.VoteE,eanswer.DateTime,aanswer.Vote,aquestion.AQuestion,aquestion.Rating,aquestion.CodeACompetency,competency.Competency,competency.GroupCompetency,competency.Weightcompetency,account.Name,account.Department FROM eanswer JOIN aquestion ON eanswer.E_QCode=aquestion.A_QCode JOIN competency ON aquestion.CodeACompetency=competency.CodeCompetency JOIN account ON account.EmployeeID=eanswer.CandidateID JOIN aanswer ON aanswer.A_QCode=eanswer.E_QCode WHERE eanswer.TestID='$TestID' AND aanswer.TestID='$TestID' AND eanswer.CandidateID='$EmployeeID' AND aanswer.EmployeeID='$EmployeeID' AND Competency.GroupCompetency IN ('Core Competencies')";
if($result = mysqli_query($db, $sql)){
return $result;
    }		
}

function AverageAnalysis2(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
$TestID=$_GET["TestID"];
$EmployeeID=$_GET["EmployeeID"]; 		
$sql = "SELECT eanswer.CandidateID,eanswer.EmployeeID,eanswer.E_QCode,eanswer.TestID,eanswer.VoteE,eanswer.DateTime,aanswer.Vote,aquestion.AQuestion,aquestion.Rating,aquestion.CodeACompetency,competency.Competency,competency.GroupCompetency,competency.Weightcompetency,account.Name,account.Department FROM eanswer JOIN aquestion ON eanswer.E_QCode=aquestion.A_QCode JOIN competency ON aquestion.CodeACompetency=competency.CodeCompetency JOIN account ON account.EmployeeID=eanswer.CandidateID JOIN aanswer ON aanswer.A_QCode=eanswer.E_QCode WHERE eanswer.TestID='$TestID' AND aanswer.TestID='$TestID' AND eanswer.CandidateID='$EmployeeID' AND aanswer.EmployeeID='$EmployeeID' AND Competency.GroupCompetency IN ('Organization Competencies')";
if($result = mysqli_query($db, $sql)){
return $result;
    }		
}

function AverageAnalysis3(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
$TestID=$_GET["TestID"];
$EmployeeID=$_GET["EmployeeID"]; 	
$sql = "SELECT eanswer.CandidateID,eanswer.EmployeeID,eanswer.E_QCode,eanswer.TestID,eanswer.VoteE,eanswer.DateTime,aanswer.Vote,aquestion.AQuestion,aquestion.Rating,aquestion.CodeACompetency,competency.Competency,competency.GroupCompetency,competency.Weightcompetency,account.Name,account.Department FROM eanswer JOIN aquestion ON eanswer.E_QCode=aquestion.A_QCode JOIN competency ON aquestion.CodeACompetency=competency.CodeCompetency JOIN account ON account.EmployeeID=eanswer.CandidateID JOIN aanswer ON aanswer.A_QCode=eanswer.E_QCode WHERE eanswer.TestID='$TestID' AND aanswer.TestID='$TestID' AND eanswer.CandidateID='$EmployeeID' AND aanswer.EmployeeID='$EmployeeID' AND Competency.GroupCompetency IN ('Leading Other')";
if($result = mysqli_query($db, $sql)){
return $result;
    }		
}

function Averagegraph(){
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
$TestID=$_GET["TestID"];
$EmployeeID=$_GET["EmployeeID"];	
$sql = "SELECT eanswer.CandidateID,eanswer.EmployeeID,eanswer.E_QCode,eanswer.TestID,eanswer.VoteE,eanswer.DateTime,aanswer.Vote,aquestion.AQuestion,aquestion.Rating,aquestion.CodeACompetency,competency.Competency,competency.GroupCompetency,competency.Weightcompetency,account.Name,account.Department FROM eanswer JOIN aquestion ON eanswer.E_QCode=aquestion.A_QCode JOIN competency ON aquestion.CodeACompetency=competency.CodeCompetency JOIN account ON account.EmployeeID=eanswer.CandidateID JOIN aanswer ON aanswer.A_QCode=eanswer.E_QCode WHERE eanswer.TestID='$TestID' AND aanswer.TestID='$TestID' AND eanswer.CandidateID='$EmployeeID' AND aanswer.EmployeeID='$EmployeeID'";	
if($result = mysqli_query($db, $sql)){
return $result;
    }
}
?>

  