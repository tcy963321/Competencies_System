<?php
session_start();
(isset($_SESSION['username'])) ;
$id=$_GET['id'];
$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');

if(isset($_POST['Delete']))
{
$result=mysqli_query($db,"DELETE FROM account WHERE EmployeeID ='$id'") or die (mysqli_error($db));
if (mysqli_query($db, $result))
{
echo '<script type="text/javascript"> 
    alert("ERROR: Could not able to execute.."); 
	window.location.href = "SuperadminRoles.php";
</script>';		
}
else{
	echo '<script type="text/javascript"> 
    alert("Deleted successfully."); 
	window.location.href = "SuperadminRoles.php";
</script>';

}
}
	mysqli_close($db);
?>