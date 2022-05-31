<?php require_once ("ReportProcess.php");
				  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: Superiorlogin.php');
  }			
?>
<!DOCTYPE html>
<html lang="en">
<title>Report Average</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="Report.css">
<link href='https://fonts.googleapis.com/css?family=RobotoDraft' rel='stylesheet' type='text/css'>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
<script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js"></script>
<script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js"></script>
<script src="https://cdn.anychart.com/releases/v8/js/anychart-radar.min.js"></script>
<link href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css" type="text/css" rel="stylesheet">
<link href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "RobotoDraft", "Roboto", sans-serif}
.w3-bar-block .w3-bar-item {padding: 16px}
table, td, th {
  border: 1px solid black;
}
tr:nth-child(even){background-color: #fff7f7}
td{
  text-align: left;	
}
</style>
<body>

<!-- Side Navigation -->
<nav class="w3-sidebar w3-bar-block w3-collapse w3-pale-red w3-animate-left w3-card" style="z-index:3;width:320px;" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" title="Close Sidemenu" 
  class="w3-bar-item w3-button w3-hide-large w3-large">Close <i class="fa fa-remove"></i></a>
  <a href="Report.php" class="w3-bar-item w3-button w3-border-bottom w3-large"><img src="imagesuploadsuperior/logo.png" style="width:60%;"></a>
  <a href="WelcomeSuperior.php" class="w3-bar-item w3-button w3-dark-grey w3-button w3-hover-black w3-left-align">Dashboard</a>
  <a href="ReportAss.php" class="w3-bar-item w3-button"><i class="fa-file-word-o w3-margin-right"></i><b>Report Assessment</b></a>
  <a href="ReportEva.php" class="w3-bar-item w3-button"><i class="fa-file-word-o w3-margin-right"></i><b>Report Evaluate</b></a>
  <a href="ReportAvrg.php" class="w3-bar-item w3-button"><i class="fa-file-word-o w3-margin-right"></i><b>Report Average</b></a>
</nav>

<!-- Overlay effect when opening the side navigation on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="Close Sidemenu" id="myOverlay"></div>

<!-- Page content -->
<div class="w3-main" style="margin-left:320px;">
<i class="fa fa-bars w3-button w3-white w3-hide-large w3-xlarge w3-margin-left w3-margin-top" onclick="w3_open()"></i>
<div id="Borge" class="w3-container w3-responsive">
<br></br>
<center><h3 class="w3-opacity">Report Average</h3></center>
<br></br>
<?php
    $results = AverageAnalysis();
        if($results){
        $rows = mysqli_fetch_assoc($results); ?>
<h4>Name: <?php echo $rows['Name']; ?></h4>
<h4>Candidate ID: <?php echo $rows['CandidateID']; ?></h4>
<h4>Department: <?php echo $rows['Department']; ?></h4>
<h4>Test ID: <?php echo $rows['TestID']; ?></h4>
<?php }?>
<fieldset>
<legend>Overview :</legend>
<table>
<th>Category</th>
<th>Competency Level</th>
<th>Score</th>
<tr>
<td>Core Competencies</td><td><?php
$total="";
$totalpoint=0.0;
$totalweigth="";
$weight=0.0;
$totalweigth2="";
$weight2=0.0;
$WeightCom=0.0;
$totalweightcom="";
$totalmark1="";
$marks1=0.0;
$totalmark2="";
$marks2=0.0;
$comlevel2=0.0;
$result = AverageAnalysis();
if($result){
while ($row = mysqli_fetch_assoc($result)){	
$point=$row['Vote'];
$rating=$row['Rating'];
$point2=$row['VoteE'];
$rating2=$row['Rating'];
$percentage=($point/$rating)*$row['Weightcompetency'];
$percentage2=($point2/$rating2)*$row['Weightcompetency'];
$totalpercent=(2*($percentage+$percentage2)/($row['Weightcompetency']*2))*100;
$total=$totalpoint+=$totalpercent;
$totalweightcom=($WeightCom+=$row['Weightcompetency']);
$totalmark1=$marks1+=$percentage;
$totalmark2=$marks2+=$percentage2;
$comlevel1=($totalmark1+$totalmark2)/($totalweightcom*2)*100;
?><?php }
if ($comlevel1>0){$levelpercent1=(round("$comlevel1",0));echo "$levelpercent1";} else{ $levelpercent1=0; echo  "$levelpercent1 "."No Result";} ?></td><td><?php if ($total>0) { $a=(round("$total",0));echo "$a";} else {$a="0"; $a1="No Result"; echo "$a "."$a1";}}?></td></tr>

<tr><td>Organization Competencies</td><td><?php
$total="";
$totalpoint=0.0;
$totalweigth="";
$weight=0.0;
$totalweigth2="";
$weight2=0.0;
$WeightCom=0.0;
$totalweightcom="";
$totalmark1="";
$marks1=0.0;
$totalmark2="";
$marks2=0.0;
$comlevel2=0.0;
$result = AverageAnalysis2();
if($result){
while ($row = mysqli_fetch_assoc($result)){	
$point=$row['Vote'];
$rating=$row['Rating'];
$point2=$row['VoteE'];
$rating2=$row['Rating'];
$percentage=($point/$rating)*$row['Weightcompetency'];
$percentage2=($point2/$rating2)*$row['Weightcompetency'];
$totalpercent=(2*($percentage+$percentage2)/($row['Weightcompetency']*2))*100;
$total=$totalpoint+=$totalpercent;
$totalweightcom=($WeightCom+=$row['Weightcompetency']);
$totalmark1=$marks1+=$percentage;
$totalmark2=$marks2+=$percentage2;
$comlevel2=($totalmark1+$totalmark2)/($totalweightcom*2)*100;
?><?php }
if ($comlevel2>0){$levelpercent2=(round("$comlevel2",0));echo "$levelpercent2";} else{ $levelpercent2=0; echo "$levelpercent2 "."No Result";} ?></td><td><?php if ($total>0) { $b=(round("$total",0));echo "$b";} else {$b="0"; $b1="No Result"; echo "$b "."$b1";}}?></td></tr>

<tr><td>Leading Other</td><td><?php
$total="";
$totalpoint=0.0;
$totalweigth="";
$weight=0.0;
$totalweigth2="";
$weight2=0.0;
$WeightCom=0.0;
$totalweightcom="";
$totalmark1="";
$marks1=0.0;
$totalmark2="";
$marks2=0.0;
$comlevel2=0.0;
$result = AverageAnalysis3();
if($result){
while ($row = mysqli_fetch_assoc($result)){	
$point=$row['Vote'];
$rating=$row['Rating'];
$point2=$row['VoteE'];
$rating2=$row['Rating'];
$percentage=($point/$rating)*$row['Weightcompetency'];
$percentage2=($point2/$rating2)*$row['Weightcompetency'];
$totalpercent=(2*($percentage+$percentage2)/($row['Weightcompetency']*2))*100;
$total=$totalpoint+=$totalpercent;
$totalweightcom=($WeightCom+=$row['Weightcompetency']);
$totalmark1=$marks1+=$percentage;
$totalmark2=$marks2+=$percentage2;
$comlevel3=($totalmark1+$totalmark2)/($totalweightcom*2)*100;
?><?php }
if ($comlevel3>0){$levelpercent3=(round("$comlevel3",0));echo "$levelpercent3";} else{ $levelpercent3=0; echo "$levelpercent3 "."No Result";} ?></td><td><?php if ($total>0) { $c=(round("$total",0));echo "$c";} else {$c="0"; $c1="No Result"; echo "$c "."$c1";}}?></td></tr>

<tr><td colspan="2"><b>Total Score:</td><td><?php $Overall=$a+$b+$c; echo"$Overall";?></b></td></tr>
<tr><td colspan="2"><b>Overall:</td><td><?php $Overall=($levelpercent1+$levelpercent2+$levelpercent3)/3; echo round("$Overall",0)."%";?></b></td></tr>
</table>
</fieldset>
<hr></hr>
<fieldset>
<legend>Core Competencies:</legend>
<table>
<tr>
<th>Code Competency</th>
<th>Competency</th>
<th>Self</th>
<th>Superior</th>
<th>Total Score</th>
<th>Level</th>
<th>Status</th>
</tr>
<?php
$result = AverageAnalysis();
if($result){
while ($row = mysqli_fetch_assoc($result)){	
$point=$row['Vote'];
$rating=$row['Rating'];
$percentage=($point/$rating)*$row['Weightcompetency'];
$point2=$row['VoteE'];
$rating2=$row['Rating'];
$percentage2=($point2/$rating2)*$row['Weightcompetency'];
$totalpercent1=$percentage/$row['Weightcompetency']*100;
$totalpercent2=$percentage2/$row['Weightcompetency']*100;
$totalmarks=$totalpercent1+$totalpercent2;
if($totalmarks<=49)
{
$level="NOVICE";
$meet="Not Requirement";	
}else if ($totalmarks<=99)
{
$level="QUALIFIED";	
$meet="Not Requirement";
}
else if ($totalmarks<=149)
{
$level="PROFICIENT";	
$meet="Meet Requirement";
}
else
{
$level="EXPERT";	
$meet="Meet Requirement";
}
?>
<tr><td><?php echo $row['CodeACompetency']; ?></td><td><?php echo $row['Competency']; ?></td><td><?php echo "$percentage"; ?>/<?php echo $row['Weightcompetency']; ?></td><td><?php echo "$percentage2"; ?>/<?php echo $row['Weightcompetency']; ?></td><td><?php echo "$totalmarks"; ?></td><td><?php echo "$level"; ?></td><td><?php echo "$meet"; ?></td></tr>
<?php }}?>
</table>
</fieldset>
<fieldset>
<legend>Organization Competencies:</legend>
<table>
<tr>
<th>Code Competency</th>
<th>Competency</th>
<th>Self</th>
<th>Superior</th>
<th>Total Score</th>
<th>Level</th>
<th>Status</th>
</tr>
<?php
$result = AverageAnalysis2();
if($result){
while ($row = mysqli_fetch_assoc($result)){	
$point=$row['Vote'];
$rating=$row['Rating'];
$percentage=($point/$rating)*$row['Weightcompetency'];
$point2=$row['VoteE'];
$rating2=$row['Rating'];
$percentage2=($point2/$rating2)*$row['Weightcompetency'];
$totalpercent1=$percentage/$row['Weightcompetency']*100;
$totalpercent2=$percentage2/$row['Weightcompetency']*100;
$totalmarks=$totalpercent1+$totalpercent2;
if($totalmarks<=49)
{
$level="NOVICE";
$meet="Not Requirement";	
}else if ($totalmarks<=99)
{
$level="QUALIFIED";	
$meet="Not Requirement";
}
else if ($totalmarks<=149)
{
$level="PROFICIENT";
$meet="Meet Requirement";	
}
else
{
$level="EXPERT";
$meet="Meet Requirement";	
}
?>
<tr><td><?php echo $row['CodeACompetency']; ?></td><td><?php echo $row['Competency']; ?></td><td><?php echo "$percentage"; ?>/<?php echo $row['Weightcompetency']; ?></td><td><?php echo "$percentage2"; ?>/<?php echo $row['Weightcompetency']; ?></td><td><?php echo "$totalmarks"; ?></td><td><?php echo "$level"; ?></td><td><?php echo "$meet"; ?></td></tr>
<?php }}?>
</table>
</fieldset>
<fieldset>
<legend>Leading Other:</legend>
<table>
<tr>
<th>Code Competency</th>
<th>Competency</th>
<th>Self</th>
<th>Superior</th>
<th>Total Score</th>
<th>Level</th>
<th>Status</th>
</tr>
<?php
$result = AverageAnalysis3();
if($result){
while ($row = mysqli_fetch_assoc($result)){	
$point=$row['Vote'];
$rating=$row['Rating'];
$percentage=($point/$rating)*$row['Weightcompetency'];
$totalpercent1=($percentage/$row['Weightcompetency'])*100;
$point2=$row['VoteE'];
$rating2=$row['Rating'];
$percentage2=($point2/$rating2)*$row['Weightcompetency'];
$totalpercent2=($percentage2/$row['Weightcompetency'])*100;
$totalmarks=$totalpercent1+$totalpercent2;
if($totalmarks<=49)
{
$level="NOVICE";
$meet="Not Requirement";	
}else if ($totalmarks<=99)
{
$level="QUALIFIED";	
$meet="Not Requirement";
}
else if ($totalmarks<=149)
{
$level="PROFICIENT";
$meet="Meet Requirement";	
}
else
{
$level="EXPERT";	
$meet="Meet Requirement";
}
?>
<tr><td><?php echo $row['CodeACompetency']; ?></td><td><?php echo $row['Competency']; ?></td><td><?php echo "$percentage"; ?>/<?php echo $row['Weightcompetency']; ?></td><td><?php echo "$percentage2"; ?>/<?php echo $row['Weightcompetency']; ?></td><td><?php echo "$totalmarks"; ?></td><td><?php echo "$level"; ?></td><td><?php echo "$meet"; ?></td></tr>
<?php }}?>
</table>
</fieldset>
<br></br>
<hr></hr>
<h3>Report Average Analysis</h3>
<div class="w3-container w3-card w3-white w3-round w3-margin">
<div class="w3-row w3-container w3-responsive" style="margin:50px 0">
<div class="w3-topbar w3-border-orange">
<div id="columnchart_material" style="width:1000px; height:400px"></div>
</div>
</div>
</div>

<div class="w3-container w3-card w3-white w3-round w3-margin">
<div class="w3-row w3-container w3-responsive" style="margin:50px 0">
<div class="w3-topbar w3-border-orange">
<div id="curve_chart" style="width:800px; height:500px"></div>
</div>
</div>
</div>

<div class="w3-container w3-card w3-white w3-round w3-margin">
<div class="w3-row w3-container w3-responsive" style="margin:50px 0">
<div class="w3-topbar w3-border-orange">
<div id="container" style="width:800px; height:350px"></div>
</div>
</div>
</div>

<div class="w3-container w3-card w3-white w3-round w3-margin">
<div class="w3-row w3-container w3-responsive" style="margin:50px 0">
<div class="w3-topbar w3-border-orange">
<div id="piechart" style="width:800px; height:350px"></div>
</div>
</div>
</div>

</div>
</div>
<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}

function myFunc(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show"; 
    x.previousElementSibling.className += " w3-red";
  } else { 
    x.className = x.className.replace(" w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-red", "");
  }
}
</script>
<script>
var openTab = document.getElementById("firstTab");
openTab.click();
</script>
<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Competency', 'Assessment', 'Evaluate', 'Average'],
<?php 
$result = Averagegraph();
while($row = mysqli_fetch_array($result))
{
$point=$row['Vote'];
$rating=$row['Rating'];
$percentage=($point/$rating)*$row['Weightcompetency'];
$marks=$percentage/$row['Weightcompetency']*100;	
$point2=$row['VoteE'];
$percentage2=($point2/$rating)*$row['Weightcompetency'];
$marks2=$percentage2/$row['Weightcompetency']*100;	
$Average=($marks+$marks2)/2;
echo "['".$row['Competency']."',".$marks.",".$marks2.",".$Average."],";
}
?>
        ]);

        var options = {
          chart: {
            title: 'Bar Chart',
            subtitle: 'Leadership Competencies Report',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
</script>
<script type="text/javascript">
      google.charts.load('current', {'packages':['linechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Competency', 'Assessment', 'Evaluate', 'Average'],
<?php 
$result = Averagegraph();
while($row = mysqli_fetch_array($result))
{
$point=$row['Vote'];
$rating=$row['Rating'];
$percentage=($point/$rating)*$row['Weightcompetency'];
$marks=$percentage/$row['Weightcompetency']*100;	
$point2=$row['VoteE'];
$percentage2=($point2/$rating)*$row['Weightcompetency'];
$marks2=$percentage2/$row['Weightcompetency']*100;	
$Average=($marks+$marks2)/2;
echo "['".$row['Competency']."',".$marks.",".$marks2.",".$Average."],";
}
?>
        ]);

        var options = {
          title: 'Line Chart Analysis',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script> 
	  
<?php
if ($levelpercent1>0)
{
$APercentage=$levelpercent1;		
}
else{
$APercentage=0;	
}
if ($levelpercent2>0)
{
$BPercentage=$levelpercent2;		
}
else{
$BPercentage=0;	
}
if ($levelpercent3>0)
{
$CPercentage=$levelpercent3;		
}
else{
$CPercentage=0;	
}
?>
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Group Competency', 'Percentage'],
<?php
{
	echo "['".'Core Competencies'."',".$APercentage."],['".'Organization Competencies'."',".$BPercentage."],['".'Leading Other'."',".$CPercentage."]";
}
?>
		
		]);
        var options = {
          title: 'Pie chart Analysis',
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
</script>
 <script>
    anychart.onDocumentReady(function () {
      // create data set on our data
      var dataSet = anychart.data.set([
<?php 
$result = Averagegraph();
while($row = mysqli_fetch_array($result))
{
$point=$row['Vote'];
$rating=$row['Rating'];
$percentage=($point/$rating)*$row['Weightcompetency'];
$marks=$percentage/$row['Weightcompetency']*100;	
$point2=$row['VoteE'];
$percentage2=($point2/$rating)*$row['Weightcompetency'];
$marks2=$percentage2/$row['Weightcompetency']*100;	
$Average=($marks+$marks2)/2;
echo "['".$row['Competency']."',".$marks.",".$marks2.",".$Average."],";
}
?>
      ]);

      // map data for the first series, take x from the zero column and value from the first column of data set
      var data1 = dataSet.mapAs({ x: 0, value: 1 });
      // map data for the second series, take x from the zero column and value from the second column of data set
      var data2 = dataSet.mapAs({ x: 0, value: 2 });
      // map data for the third series, take x from the zero column and value from the third column of data set
      var data3 = dataSet.mapAs({ x: 0, value: 3 });
     
	 // create radar chart
      var chart = anychart.radar();

      // set chart title text settings
      chart.title(
        'Radar Average Analysis'
      );

      // set chart yScale settings
      chart.yScale().minimum(0).maximumGap(0).ticks().interval(50);

      // set xAxis labels settings
      chart.xAxis().labels().padding(5);

      // set chart legend settings
      chart.legend().align('center').enabled(true);

      // create first series with mapped data
      var series1 = chart.line(data1).name('Assessment');
      series1.markers().enabled(true).type('circle').size(3);
      // create first series with mapped data
      var series2 = chart.line(data2).name('Evaluate');
      series2.markers().enabled(true).type('circle').size(3);
      // create first series with mapped data
      var series3 = chart.line(data3).name('Average');
      series3.markers().enabled(true).type('circle').size(3);

      // chart tooltip format
      chart.tooltip().format('Value: {%Value}');

      // set container id for the chart
      chart.container('container');
      chart.draw();
    });
</script>
</body>
</html>
