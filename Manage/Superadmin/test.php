 <?php require_once ("processcompetency.php");
				  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: Adminlogin.php');
  }	?>		
 <?php
 //$result = getcompetencybyID();
                   //  if($result){
                         //  while ($row = mysqli_fetch_assoc($result)){ ?>
<form action="" method="post" enctype="multipart/form-data">
<tr>
				<td class="td_1">Competency :</td>		
				<td  class="left">
				<select name="competency">
<?php
	$db = mysqli_connect('localhost', 'root', '', 'leadercompetency');
	$sql="select Competency from competency";
	$result = $db->query($sql);
	if ($result) {
		while($row = $result->fetch_assoc()) {
			


?>
<?php $group=$row['GroupCompetency']; if($group=="Core Competencies"){$CC="checked";}else{$CC="";}if($group=="Leading Other"){$LO="checked";}else{$LO="";} if($group=="Organization Competencies"){$OC="checked";}else{$OC="";} if($group!="Organization Competencies" && $group!="Core Competencies" && $group!="Leading Other"){$Other=$group; $OtherGroup="checked";}else{$Other="";$OtherGroup="";} ?>
					<?php echo "<option>$row[Competency]</option>"; 
					  }}?>
				</select></td>	
				</tr>
				<?php echo "ABC"; ?>
				<tr>
				<td  class="left"><input type="submit" name="submit" value="Update" class="btn"/></td>
				</tr>
				</form> 
				   <?php
                           //}
                       //}
                   ?>
				  <?php
$conn = mysqli_connect("localhost", "root", "", "leadercompetency");
				if(isset($_POST['submit']))
{$name =$_POST['competency'];
	echo "Competency IS "; echo $name;
	}				
?>
<?php
echo $_SERVER['PHP_SELF'];
echo "<br>";
echo $_SERVER['SERVER_NAME'];
echo "<br>";
echo $_SERVER['HTTP_HOST'];
echo "<br>";
echo $_SERVER['REMOTE_ADDR'];
//echo $_SERVER['HTTP_REFERER'];
echo "<br>";
//echo $_SERVER['HTTP_USER_AGENT'];
echo "<br>";
echo $_SERVER['SCRIPT_NAME'];
?>