<!doctype html>  
<html>    
<title>Subject Registration </title>  
<head>
<link rel="stylesheet" href="registerstyle.css">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    </head>

<body  style="background: linear-gradient(to right, darkslateblue 0%, darkturquoise 96%);">
<br>
	<h4><object align="right" width="190"><a href ="studentlogin.php" class="text-dark" onclick="alert('You have logged out successfully!!;') <?php session_destroy(); ?>">Logout</a></object></h4>
	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
 <a href="subjectregistration.php">Subject Registration</a>
  <a href="studentstuedit.php">Edit Profile</a>
  <a href="studentprofilesembacklog.php">Subjects Pending</a>
  <a href="about.php">About US</a>
  <a href="#">Contact US</a>
</div>
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>
	&nbsp;
	&nbsp;
	<center><img src="logo.png" height="65" width="120"></img></center>
	&nbsp;
	&nbsp;
	<br>
	<br>
	<br>
	<br>
	<br>
   <h1><center> Subject Registration </Center>
 </h1>
<br>

<?php
    session_start();
	$ur=$_SESSION['user'];
	$pw=$_SESSION['pass'];
	$sapid=$_SESSION['sapid'];
	$subjects1 = array();
	$subjects2 = array();
	$subjects3 = array();
	$subjects4 = array();
	$subjects5 = array();
    $subjects6 = array();
	$selected = array();
	global $stubacklog;
	global $backlog1,$nr1;
	global $backlog2,$nr2;
	global $backlog3,$nr3;
	global $backlog4,$nr4;
	global $s6validate1;
	global $s6validate2;
	global $s6validate3;
	global $s6validate4;
	global $query13;
	global $numrows13;
	global $i,$nextregister,$count,$f;
	global $selected0,$selected1,$selected2,$selected3,$selected4,$selected5,$selected6,$selected7; 
	
	$c=0;
	$f=0;
	$date=date("Y-m-d", strtotime("+6 month"));
    $d = date_parse_from_format("Y-m-d", $date);
    $month=$d["month"];
	
	$con=mysqli_connect('localhost','root','') or die(mysql_error());  
    mysqli_select_db($con,'sophomore') or die("cannot select DB");  
    $query1=mysqli_query($con,"SELECT * FROM student_registration WHERE Username='".$ur."' AND Password='".$pw."'");
	$numrows1=mysqli_num_rows($query1);
	$query2=mysqli_query($con,"SELECT * FROM student_subjects WHERE SAPID='".$sapid."'");
    $numrows2=mysqli_num_rows($query2);

	
	while($row1=mysqli_fetch_assoc($query1))
      {  
        $stusemester=$row1['semester'];
		$stuyear=$row1['stuyear'];
	  }
	
	while($row2=mysqli_fetch_assoc($query2))
	  {
		$stubacklog=$row2['backlog'];
		$backlog1=$row2['backlog1'];
        $backlog2=$row2['backlog2'];
        $backlog3=$row2['backlog3'];
        $backlog4=$row2['backlog4'];
		$nr1=$row2['nr1'];
		$nr2=$row2['nr2'];
		$nr3=$row2['nr3'];
		$nr4=$row2['nr4'];
		$nextregister=$row2['nextregister'];
	  }
	  
	if($stuyear>=2012 &&  $stuyear<=2015)
	{
	$query3=mysqli_query($con,"SELECT * FROM sbmp_subjects WHERE semester='1'");
	$numrows3=mysqli_num_rows($query3);
	$query4=mysqli_query($con,"SELECT * FROM sbmp_subjects WHERE semester='2'");
	$numrows4=mysqli_num_rows($query4);
	$query5=mysqli_query($con,"SELECT * FROM sbmp_subjects WHERE semester='3'");
	$numrows5=mysqli_num_rows($query5);
	$query6=mysqli_query($con,"SELECT * FROM sbmp_subjects WHERE semester='4'");
	$numrows6=mysqli_num_rows($query6);
	$query7=mysqli_query($con,"SELECT * FROM sbmp_subjects WHERE semester='5'");
	$numrows7=mysqli_num_rows($query7);
	$query8=mysqli_query($con,"SELECT * FROM sbmp_subjects WHERE semester='6'");
	$numrows8=mysqli_num_rows($query8);
	$query9=mysqli_query($con,"SELECT * FROM sbmp_subjects WHERE subject='".$backlog1."'");
	$numrows9=mysqli_num_rows($query9);
	$query10=mysqli_query($con,"SELECT * FROM sbmp_subjects WHERE subject='".$backlog2."'");
	$numrows10=mysqli_num_rows($query10);
	$query11=mysqli_query($con,"SELECT * FROM sbmp_subjects WHERE subject='".$backlog3."'");
	$numrows11=mysqli_num_rows($query11);
	$query12=mysqli_query($con,"SELECT * FROM sbmp_subjects WHERE subject='".$backlog4."'");
	$numrows12=mysqli_num_rows($query12);	
	}
	else if($stuyear>=2016 && $stuyear<=2019)
	{
	$query3=mysqli_query($con,"SELECT * FROM sbmpnew_subjects WHERE semester='1'");
	$numrows3=mysqli_num_rows($query3);
	$query4=mysqli_query($con,"SELECT * FROM sbmpnew_subjects WHERE semester='2'");
	$numrows4=mysqli_num_rows($query4);
	$query5=mysqli_query($con,"SELECT * FROM sbmpnew_subjects WHERE semester='3'");
	$numrows5=mysqli_num_rows($query5);
	$query6=mysqli_query($con,"SELECT * FROM sbmpnew_subjects WHERE semester='4'");
	$numrows6=mysqli_num_rows($query6);
	$query7=mysqli_query($con,"SELECT * FROM sbmpnew_subjects WHERE semester='5'");
	$numrows7=mysqli_num_rows($query7);
	$query8=mysqli_query($con,"SELECT * FROM sbmpnew_subjects WHERE semester='6'");
	$numrows8=mysqli_num_rows($query8);
	$query9=mysqli_query($con,"SELECT * FROM sbmpnew_subjects WHERE subject='".$backlog1."'");
	$numrows9=mysqli_num_rows($query9);
	$query10=mysqli_query($con,"SELECT * FROM sbmpnew_subjects WHERE subject='".$backlog2."'");
	$numrows10=mysqli_num_rows($query10);
	$query11=mysqli_query($con,"SELECT * FROM sbmpnew_subjects WHERE subject='".$backlog3."'");
	$numrows11=mysqli_num_rows($query11);
	$query12=mysqli_query($con,"SELECT * FROM sbmpnew_subjects WHERE subject='".$backlog4."'");
	$numrows12=mysqli_num_rows($query12);
	}
	
	echo '<br/>';
	
	while($row3=mysqli_fetch_assoc($query3))
	  {
		$subjects1[] = $row3;
	  }
	
	while($row4=mysqli_fetch_assoc($query4))
	  {
		$subjects2[] = $row4;
	  }
	
    while($row5=mysqli_fetch_assoc($query5))
	  {
		$subjects3[] = $row5;
	  }
	  
	while($row6=mysqli_fetch_assoc($query6))
	  {
		$subjects4[] = $row6;
	  }
	  
	while($row7=mysqli_fetch_assoc($query7))
	  {
		$subjects5[] = $row7;
	  }
	  
	while($row8=mysqli_fetch_assoc($query8))
	  {
		$subjects6[] = $row8;
	  }
	  
	while($row9=mysqli_fetch_assoc($query9))
      {  
        $s6validate1=$row9['semester'];
	  }
	  
	while($row10=mysqli_fetch_assoc($query10))
      {  
        $s6validate2=$row10['semester'];
	  }
	  
	while($row11=mysqli_fetch_assoc($query11))
      {  
        $s6validate3=$row11['semester'];
	  }
	  
	while($row12=mysqli_fetch_assoc($query12))
      {  
        $s6validate4=$row12['semester'];
	  }
	  
if(date("n")<$nextregister)
{
	echo "<script type='text/javascript'>alert('Complete the current semester first!!!')</script>";
}
	  
else if(date("n")==$nextregister)
{
if($stusemester==0)
{
	
echo '<h4><center>';
echo '<form method="POST">';

echo 'Select the subjects:-<br >';

echo '<b>--></b>';
echo '<input type="checkbox" name="Subject1" value="A" >';
echo $subjects1[0]['subject'];
echo '<br /><br />&nbsp;&nbsp;';

echo '<b>--></b>';
echo '<input type="checkbox" name="Subject2" value="B" >';
echo $subjects1[1]['subject'];
echo '<br /><br />&nbsp;&nbsp;';

echo '<b>--></b>';
echo '<input type="checkbox" name="Subject3" value="C" >';
echo $subjects1[2]['subject'];
echo '<br /><br />&nbsp;&nbsp;';

echo '<b>--></b>';
echo '<input type="checkbox" name="Subject4" value="D" >';
echo $subjects1[3]['subject'];
echo '<br /><br />&nbsp;&nbsp;';

echo '<b>--></b>';
echo '<input type="checkbox" name="Subject5" value="E" >';
echo $subjects1[4]['subject'];
echo '<br /><br />&nbsp;&nbsp;';

echo '<b>--></b>';
echo '<input type="checkbox" name="Subject6" value="X" >';
echo $subjects1[5]['subject'];
echo '<br /><br />&nbsp;&nbsp;';

echo '<button type="submit" name="button1" class="btn btn-success" value="Submit" >';	

echo '</form>';
echo '</center></h4>';

if(isset($_POST['button1']))
 {  
  
if($_POST['Subject1']=='A')
{
	
	$i=$subjects1[0]['subject'];
	$selected0=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects1[0]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects1[0]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects1[0]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects1[0]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($_POST['Subject2']=='B')
{
	$i=$subjects1[1]['subject'];
	$selected1=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects1[1]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects1[1]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects1[1]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects1[1]['subject'];
	}
	else 
	{
		$f=1;
	}
}
if($_POST['Subject3']=='C')
{
	$i=$subjects1[2]['subject'];
	$selected2=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects1[2]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects1[2]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects1[2]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects1[2]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($_POST['Subject4']=='D')
{
	$i=$subjects1[3]['subject'];
	$selected3=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects1[3]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects1[3]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects1[3]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects1[3]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($_POST['Subject5']=='E')
{
    $i=$subjects1[4]['subject'];
	$selected4=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects1[4]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects1[4]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects1[4]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects1[4]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($_POST['Subject6']=='X')
{
	$i=$subjects1[5]['subject'];
	$selected5=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects1[5]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects1[5]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects1[5]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects1[5]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($f==0 && $count<9)
{
$sqla="UPDATE student_subjects SET Subject1='$selected0',Subject2='$selected1',Subject3='$selected2',Subject4='$selected3',Subject5='$selected4',Subject6='$selected5' WHERE SAPID='".$sapid."'";

if(mysqli_query($con, $sqla)){
	$sqlb="UPDATE student_registration SET semester=1 WHERE sap_id='".$sapid."'";
	if(mysqli_query($con, $sqlb)){
		$sqlc="UPDATE student_subjects SET nextregister='$month' WHERE SAPID='".$sapid."'";
		if(mysqli_query($con, $sqlc)){
			$sqld="UPDATE student_subjects SET nr1='$nr1' ,nr2='$nr2', nr3='$nr3', nr4='$nr4' WHERE SAPID='".$sapid."'";
			  if(mysqli_query($con, $sqld)){
	echo "<script type='text/javascript'>alert('You have registered Successfully!!!')</script>";
}}}}

else
{
	echo "<script type='text/javascript'>alert('Registration failure!!!')</script>";
}
}
else
{
	$f=0;
	echo "<script type='text/javascript'>alert('Registration failure since the number of pending subjects or subjects registered has reached limit!!!')</script>";
}
} 
}

if($stusemester==1)
{
	if($stubacklog==1)
	{

echo '<h4><center>';
echo '<form method="POST">';

echo 'Select the subjects:-<br />';
echo '<br /><br />&nbsp;&nbsp;';

if($subjects2[0]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects1" value="A" >';
echo $subjects2[0]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects2[1]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects2" value="B" >';
echo $subjects2[1]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects2[2]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects3" value="C" >';
echo $subjects2[2]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects2[3]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects4" value="D" >';
echo $subjects2[3]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects2[4]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects5" value="E" >';
echo $subjects2[4]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects2[5]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects6" value="X" >';
echo $subjects2[5]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

	
if ($backlog1!="")
{
echo '6';
echo '<input type="checkbox" name="backlogs1" value="F">';
echo $backlog1;
echo '<br /><br /><br />&nbsp;&nbsp';
}
	
if ($backlog2!="")
{
echo '7';
echo '<input type="checkbox" name="backlogs2" value="G">';
echo $backlog2;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($backlog3!="")
{
echo '8';
echo '<input type="checkbox" name="backlogs3" value="H">';
echo $backlog3;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($backlog4!="")
{
echo '9';
echo '<input type="checkbox" name="backlogs4" value="I">';
echo $backlog4;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($nr1!="")
{
echo '10';
echo '<input type="checkbox" name="nrs1" value="J">';
echo $nr1;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($nr2!="")
{
echo '11';
echo '<input type="checkbox" name="nrs2" value="K">';
echo $nr2;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($nr3!="")
{
echo '12';
echo '<input type="checkbox" name="nrs3" value="L">';
echo $nr3;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($nr4!="")
{
echo '13';
echo '<input type="checkbox" name="nrs4" value="M">';
echo $nr4;
echo '<br /><br /><br />&nbsp;&nbsp';
}

echo '<input type="submit" name="button1" value="Submit">';
echo '</form>';
echo '</center></h4>';

if(isset($_POST['button1']))
 {  
  
if($_POST['Subjects1']=='A')
{
	
	$i=$subjects2[0]['subject'];
	array_push($selected, $i);
	$count=$count+1;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects2[0]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects2[0]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects2[0]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects2[0]['subject'];
	}
	else
	{
		echo "<script type='text/javascript'>alert('Please select more subjects since you have pending unregistered functions!!!')</script>";
	}
}
if($_POST['Subjects2']=='B')
{
	$i=$subjects2[1]['subject'];
	array_push($selected, $i);
	$count=$count+1;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects2[1]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects2[1]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects2[1]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects2[1]['subject'];
	}
	else 
	{
		echo "<script type='text/javascript'>alert('Please select more subjects since you have pending unregistered functions!!!')</script>";
	}
}
if($_POST['Subjects3']=='C')
{
	$i=$subjects2[2]['subject'];
	array_push($selected, $i);
	$count=$count+1;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects2[2]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects2[2]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects2[2]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects2[2]['subject'];
	}
	else
	{
		echo "<script type='text/javascript'>alert('Please select more subjects since you have pending unregistered functions!!!')</script>";
	}
}
if($_POST['Subjects4']=='D')
{
	$i=$subjects2[3]['subject'];
	array_push($selected, $i);
	$count=$count+1;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects2[3]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects2[3]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects2[3]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects2[3]['subject'];
	}
	else
	{
		echo "<script type='text/javascript'>alert('Please select more subjects since you have pending unregistered functions!!!')</script>";
	}
}
if($_POST['Subjects5']=='E')
{
    $i=$subjects2[4]['subject'];
	array_push($selected, $i);
	$count=$count+1;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects2[4]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects2[4]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects2[4]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects2[4]['subject'];
	}
	else
	{
		echo "<script type='text/javascript'>alert('Please select more subjects since you have pending unregistered functions!!!')</script>";
	}
}

if ($backlog1!="")
{
if($_POST['backlogs1']=='F')
{
	$i=$backlog1;
	array_push($selected, $i);
	$count=$count+1;
	$backlog1="";
}

}
if ($backlog2!=""){
if($_POST['backlogs2']=='G')
{
	$i=$backlog2;
	array_push($selected, $i);
	$count=$count+1;
	$backlog2="";
}

}
if ($backlog3!=""){
if($_POST['backlogs3']=='H')
{
	$i=$backlog3;
	array_push($selected, $i);
	$count=$count+1;
	$backlog3="";
}

}
if ($backlog4!=""){
if($_POST['backlogs4']=='I')
{
	$i=$backlog4;
	array_push($selected, $i);
	$count=$count+1;
	$backlog4="";
}

}
$selected0=$selected[0];
$selected1=$selected[1];
$selected2=$selected[2];
$selected3=$selected[3];
$selected4=$selected[4];
$selected5=$selected[5];
$selected6=$selected[6];
echo $selected[0];
$sqla="UPDATE student_subjects SET Subject1='$selected0',Subject2='$selected1',Subject3='$selected2',Subject4='$selected3',Subject5='$selected4',Subject6='$selected5' ,Subject7='$selected6' ,backlog1='$backlog1' ,backlog2='$backlog2' ,backlog3='$backlog3' ,backlog4='$backlog4' WHERE SAPID='".$sapid."'";

if(mysqli_query($con, $sqla)){
	$sqlb="UPDATE student_registration SET semester=2 WHERE sap_id='".$sapid."'";
	if(mysqli_query($con, $sqlb)){
		$sqlc="UPDATE student_subjects SET nextregister='$month' WHERE SAPID='".$sapid."'";
		if(mysqli_query($con, $sqlc)){
			$sqld="UPDATE student_subjects SET nr1='$nr1' ,nr2='$nr2', nr3='$nr3', nr4='$nr4' WHERE SAPID='".$sapid."'";
			  if(mysqli_query($con, $sqld)){
	echo "<script type='text/javascript'>alert('You have registered Successfully!!!')</script>";
}}}}

else
{
	echo "<script type='text/javascript'>alert('Registration failure!!!')</script>";
	 echo("Error description: " . mysqli_error($con));
}
 }
	}
	
else if($stubacklog==0)
{
echo '<h4><center>';
echo '<form method="post">';

echo 'Select the subjects:-<br />';

if($subjects2[0]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects1" value="A" />';
echo $subjects2[0]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects2[1]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects2" value="B" />';
echo $subjects2[1]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects2[2]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects3" value="C" />';
echo $subjects2[2]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects2[3]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects4" value="D" />';
echo $subjects2[3]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects2[4]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects5" value="E" />';
echo $subjects2[4]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects2[5]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects6" value="X" />';
echo $subjects2[5]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects2[6]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects7" value="Y" />';
echo $subjects2[6]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

	echo '<input type="submit" name="button1" class="btn btn-success" value="Submit">';
echo '</form>';
echo '</center></h4>'; 
if(isset($_POST['button1']))
 {  
  
if($_POST['Subjects1']=='A')
{
	
	$i=$subjects2[0]['subject'];
	$selected0=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects2[0]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects2[0]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects2[0]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects2[0]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($_POST['Subjects2']=='B')
{
	$i=$subjects2[1]['subject'];
	$selected1=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects2[1]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects2[1]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects2[1]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects2[1]['subject'];
	}
	else 
	{
		$f=1;
	}
}
if($_POST['Subjects3']=='C')
{
	$i=$subjects2[2]['subject'];
	$selected2=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects2[2]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects2[2]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects2[2]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects2[2]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($_POST['Subjects4']=='D')
{
	$i=$subjects2[3]['subject'];
	$selected3=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects2[3]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects2[3]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects2[3]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects2[3]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($_POST['Subjects5']=='E')
{
    $i=$subjects2[4]['subject'];
	$selected4=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects2[4]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects2[4]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects2[4]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects2[4]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($_POST['Subjects6']=='X')
{
	$i=$subjects2[5]['subject'];
	$selected5=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects2[5]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects2[5]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects2[5]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects2[5]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($f==0)
{
$sqla="UPDATE student_subjects SET Subject1='$selected0',Subject2='$selected1',Subject3='$selected2',Subject4='$selected3',Subject5='$selected4',Subject6='$selected5' WHERE SAPID='".$sapid."'";

if(mysqli_query($con, $sqla)){
	$sqlb="UPDATE student_registration SET semester=2 WHERE sap_id='".$sapid."'";
	if(mysqli_query($con, $sqlb)){
		$sqlc="UPDATE student_subjects SET nextregister='$month' WHERE SAPID='".$sapid."'";
		if(mysqli_query($con, $sqlc)){
			$sqld="UPDATE student_subjects SET nr1='$nr1' ,nr2='$nr2', nr3='$nr3', nr4='$nr4' WHERE SAPID='".$sapid."'";
			  if(mysqli_query($con, $sqld)){
	echo "<script type='text/javascript'>alert('You have registered Successfully!!!')</script>";
}}}}

else
{
	echo "<script type='text/javascript'>alert('Registration failure!!!')</script>";
}
}
else
{
	$f=0;
	echo "<script type='text/javascript'>alert('Registration failure since the number of pending subjects or subjects registered has reached limit!!!')</script>";
}
} 
}
}
if($stusemester==2)
{
	if($stubacklog==1)
	{

echo '<h4><center>';
echo '<form method="post">';

echo 'Select the subjects:-<br />';
echo '<br /><br />&nbsp;&nbsp;';

if($subjects3[0]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects1" value="A" />';
echo $subjects3[0]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects3[1]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects2" value="B" />';
echo $subjects3[1]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects3[2]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects3" value="C" />';
echo $subjects3[2]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects3[3]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects4" value="D" />';
echo $subjects3[3]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects3[4]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects5" value="E" />';
echo $subjects3[4]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects3[5]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects6" value="X" />';
echo $subjects3[5]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}
	
if ($backlog1!="")
{
echo '6';
echo '<input type="checkbox" name="backlog1" value="F" checked>';
echo $backlog1;
echo '<br /><br /><br />&nbsp;&nbsp';
}
	
if ($backlog2!="")
{
echo '7';
echo '<input type="checkbox" name="backlog2" value="G" checked>';
echo $backlog2;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($backlog3!="")
{
echo '8';
echo '<input type="checkbox" name="backlog3" value="H" checked />';
echo $backlog3;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($backlog4!="")
{
echo '9';
echo '<input type="checkbox" name="backlog4" value="I" checked />';
echo $backlog4;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($nr1!="")
{
echo '10';
echo '<input type="checkbox" name="nr1" value="J" checked />';
echo $nr1;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($nr2!="")
{
echo '11';
echo '<input type="checkbox" name="nr2" value="K" checked />';
echo $nr2;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($nr3!="")
{
echo '12';
echo '<input type="checkbox" name="nr3" value="L" checked />';
echo $nr3;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($nr4!="")
{
echo '13';
echo '<input type="checkbox" name="nr4" value="M" checked />';
echo $nr4;
echo '<br /><br /><br />&nbsp;&nbsp';
}

echo '<input type="submit" name="button1" value="Submit">';
echo '</form>';
echo '</center></h4>';

if(isset($_POST['button1']))
 {  
  
if($_POST['Subjects1']=='A')
{
	
	$i=$subjects3[0]['subject'];
	array_push($selected, $i);
	$count=$count+1;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects3[0]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects3[0]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects3[0]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects3[0]['subject'];
	}
	else
	{
		echo "<script type='text/javascript'>alert('Please select more subjects since you have pending unregistered functions!!!')</script>";
	}
}
if($_POST['Subjects2']=='B')
{
	$i=$subjects3[1]['subject'];
	array_push($selected, $i);
	$count=$count+1;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects3[1]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects3[1]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects3[1]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects3[1]['subject'];
	}
	else 
	{
		echo "<script type='text/javascript'>alert('Please select more subjects since you have pending unregistered functions!!!')</script>";
	}
}
if($_POST['Subjects3']=='C')
{
	$i=$subjects3[2]['subject'];
	array_push($selected, $i);
	$count=$count+1;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects3[2]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects3[2]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects3[2]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects3[2]['subject'];
	}
	else
	{
		echo "<script type='text/javascript'>alert('Please select more subjects since you have pending unregistered functions!!!')</script>";
	}
}
if($_POST['Subjects4']=='D')
{
	$i=$subjects3[3]['subject'];
	array_push($selected, $i);
	$count=$count+1;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects3[3]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects3[3]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects3[3]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects3[3]['subject'];
	}
	else
	{
		echo "<script type='text/javascript'>alert('Please select more subjects since you have pending unregistered functions!!!')</script>";
	}
}
if($_POST['Subjects5']=='E')
{
    $i=$subjects3[4]['subject'];
	array_push($selected, $i);
	$count=$count+1;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects3[4]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects3[4]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects3[4]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects3[4]['subject'];
	}
	else
	{
		echo "<script type='text/javascript'>alert('Please select more subjects since you have pending unregistered functions!!!')</script>";
	}
}

if ($backlog1!="")
{
if($_POST['backlog1']=='F')
{
	$i=$backlog1;
	array_push($selected, $i);
	$count=$count+1;
	$backlog1="";
}

}
if ($backlog2!=""){
if($_POST['backlog2']=='G')
{
	$i=$backlog2;
	array_push($selected, $i);
	$count=$count+1;
	$backlog2="";
}

}
if ($backlog3!=""){
if($_POST['backlog3']=='H')
{
	$i=$backlog3;
	array_push($selected, $i);
	$count=$count+1;
	$backlog3="";
}

}
if ($backlog4!=""){
if($_POST['backlog4']=='I')
{
	$i=$backlog4;
	array_push($selected, $i);
	$count=$count+1;
	$backlog4="";
}

}
$selected0=$selected[0];
$selected1=$selected[1];
$selected2=$selected[2];
$selected3=$selected[3];
$selected4=$selected[4];
$selected5=$selected[5];
$selected6=$selected[6];
echo $selected[0];
$sqla="UPDATE student_subjects SET Subject1='$selected0',Subject2='$selected1',Subject3='$selected2',Subject4='$selected3',Subject5='$selected4',Subject6='$selected5' ,Subject7='$selected6' ,backlog1='$backlog1' ,backlog2='$backlog2' ,backlog3='$backlog3' ,backlog4='$backlog4' WHERE SAPID='".$sapid."'";

if(mysqli_query($con, $sqla)){
	$sqlb="UPDATE student_registration SET semester=3 WHERE sap_id='".$sapid."'";
	if(mysqli_query($con, $sqlb)){
		$sqlc="UPDATE student_subjects SET nextregister='$month' WHERE SAPID='".$sapid."'";
		if(mysqli_query($con, $sqlc)){
			$sqld="UPDATE student_subjects SET nr1='$nr1' ,nr2='$nr2', nr3='$nr3', nr4='$nr4' WHERE SAPID='".$sapid."'";
			  if(mysqli_query($con, $sqld)){
	echo "<script type='text/javascript'>alert('You have registered Successfully!!!')</script>";
}}}}

else
{
	echo "<script type='text/javascript'>alert('Registration failure!!!')</script>";
	 echo("Error description: " . mysqli_error($con));
}
 }

}
	
else if($stubacklog==0)
{
echo '<h4><center>';
echo '<form method="post">';

echo 'Select the subjects:-<br />';

if($subjects3[0]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects1" value="A" />';
echo $subjects3[0]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects3[1]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects2" value="B" />';
echo $subjects3[1]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects3[2]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects3" value="C" />';
echo $subjects3[2]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects3[3]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects4" value="D" />';
echo $subjects3[3]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects3[4]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects5" value="E" />';
echo $subjects3[4]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects3[5]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects6" value="X" />';
echo $subjects3[5]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects3[6]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects7" value="Y" />';
echo $subjects3[6]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

echo '<input type="submit" name="button1" value="Submit">';
echo '</form>';
echo '</center></h4>'; 

if(isset($_POST['button1']))
 {  
  
if($_POST['Subjects1']=='A')
{
	
	$i=$subjects3[0]['subject'];
	$selected0=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects3[0]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects3[0]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects3[0]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects3[0]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($_POST['Subjects2']=='B')
{
	$i=$subjects3[1]['subject'];
	$selected1=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects3[1]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects3[1]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects3[1]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects3[1]['subject'];
	}
	else 
	{
		$f=1;
	}
}
if($_POST['Subjects3']=='C')
{
	$i=$subjects3[2]['subject'];
	$selected2=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects3[2]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects3[2]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects3[2]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects3[2]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($_POST['Subjects4']=='D')
{
	$i=$subjects3[3]['subject'];
	$selected3=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects3[3]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects3[3]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects3[3]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects3[3]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($_POST['Subjects5']=='E')
{
    $i=$subjects3[4]['subject'];
	$selected4=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects3[4]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects3[4]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects3[4]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects3[4]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($_POST['Subjects6']=='X')
{
	$i=$subjects3[5]['subject'];
	$selected5=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects3[5]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects3[5]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects3[5]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects3[5]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($f==0)
{
$sqla="UPDATE student_subjects SET Subject1='$selected0',Subject2='$selected1',Subject3='$selected2',Subject4='$selected3',Subject5='$selected4',Subject6='$selected5' WHERE SAPID='".$sapid."'";

if(mysqli_query($con, $sqla)){
	$sqlb="UPDATE student_registration SET semester=3 WHERE sap_id='".$sapid."'";
	if(mysqli_query($con, $sqlb)){
		$sqlc="UPDATE student_subjects SET nextregister='$month' WHERE SAPID='".$sapid."'";
		if(mysqli_query($con, $sqlc)){
			$sqld="UPDATE student_subjects SET nr1='$nr1' ,nr2='$nr2', nr3='$nr3', nr4='$nr4' WHERE SAPID='".$sapid."'";
			  if(mysqli_query($con, $sqld)){
	echo "<script type='text/javascript'>alert('You have registered Successfully!!!')</script>";
}}}}

else
{
	echo "<script type='text/javascript'>alert('Registration failure!!!')</script>";
}
}
else
{
	$f=0;
	echo "<script type='text/javascript'>alert('Registration failure since the number of pending subjects or subjects registered has reached limit!!!')</script>";
}
} 
}
}

if($stusemester==3)
{
	if($stubacklog==1)
	{

echo '<h4><center>';
echo '<form method="post">';

echo 'Select the subjects:-<br />';
echo '<br /><br />&nbsp;&nbsp;';

if($subjects4[0]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects1" value="A" />';
echo $subjects4[0]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects4[1]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects2" value="B" />';
echo $subjects3[1]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects4[2]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects3" value="C" />';
echo $subjects4[2]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects4[3]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects4" value="D" />';
echo $subjects4[3]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects4[4]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects5" value="E" />';
echo $subjects4[4]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects4[5]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects6" value="X" />';
echo $subjects4[5]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}
	
if ($backlog1!="")
{
echo '6';
echo '<input type="checkbox" name="backlog1" value="F" checked>';
echo $backlog1;
echo '<br /><br /><br />&nbsp;&nbsp';
}
	
if ($backlog2!="")
{
echo '7';
echo '<input type="checkbox" name="backlog2" value="G" checked>';
echo $backlog2;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($backlog3!="")
{
echo '8';
echo '<input type="checkbox" name="backlog3" value="H" checked />';
echo $backlog3;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($backlog4!="")
{
echo '9';
echo '<input type="checkbox" name="backlog4" value="I" checked />';
echo $backlog4;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($nr1!="")
{
echo '10';
echo '<input type="checkbox" name="nr1" value="J" checked />';
echo $nr1;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($nr2!="")
{
echo '11';
echo '<input type="checkbox" name="nr2" value="K" checked />';
echo $nr2;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($nr3!="")
{
echo '12';
echo '<input type="checkbox" name="nr3" value="L" checked />';
echo $nr3;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($nr4!="")
{
echo '13';
echo '<input type="checkbox" name="nr4" value="M" checked />';
echo $nr4;
echo '<br /><br /><br />&nbsp;&nbsp';
}

echo '<input type="submit" name="button1" value="Submit">';
echo '</form>';
echo '</center></h4>';

if(isset($_POST['button1']))
 {  
  
if($_POST['Subjects1']=='A')
{
	$count=$count+1;
	$i=$subjects4[0]['subject'];
	array_push($selected, $i);
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects4[0]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects4[0]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects4[0]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects4[0]['subject'];
	}
	else
	{
		$f=1;	      
	}
}
if($_POST['Subjects2']=='B')
{
	$count=$count+1;
	$i=$subjects4[1]['subject'];
	array_push($selected, $i);
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects4[1]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects4[1]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects4[1]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects4[1]['subject'];
	}
	else 
	{
		 $f=1;
	}
}
if($_POST['Subjects3']=='C')
{
	$count=$count+1;
	$i=$subjects4[2]['subject'];
	array_push($selected, $i);
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects4[2]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects4[2]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects4[2]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects4[2]['subject'];
	}
	else
	{
		$f=1;	
	}
}
if($_POST['Subjects4']=='D')
{
	$count=$count+1;
	$i=$subjects4[3]['subject'];
	array_push($selected, $i);
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects4[3]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects4[3]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects4[3]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects4[3]['subject'];
	}
	else
	{
		$f=1;	
	}
}
if($_POST['Subjects5']=='E')
{
	$count=$count+1;
    $i=$subjects4[4]['subject'];
	array_push($selected, $i);
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects4[4]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects4[4]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects4[4]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects4[4]['subject'];
	}
	else
	{
		$f=1;    	
	}
}

if ($backlog1!="")
{
if($_POST['backlog1']=='F')
{
	$count=$count+1;
	$i=$backlog1;
	array_push($selected, $i);
	$backlog1="";
}

}
if ($backlog2!=""){
if($_POST['backlog2']=='G')
{
	$count=$count+1;
	$i=$backlog2;
	array_push($selected, $i);
	$backlog2="";
}

}
if ($backlog3!=""){
if($_POST['backlog3']=='H')
{
	$count=$count+1;
	$i=$backlog3;
	array_push($selected, $i);
	$backlog3="";
}

}
if ($backlog4!=""){
if($_POST['backlog4']=='I')
{
	$count=$count+1;
	$i=$backlog4;
	array_push($selected, $i);
	$backlog4="";
}}
if ($nr1!=""){
if($_POST['nr1']=='J')
{
	$count=$count+1;
	$i=$nr1;
	array_push($selected, $i);
	$nr1="";
}}
if ($nr2!=""){
if($_POST['nr2']=='K')
{
	$count=$count+1;
	$i=$nr2;
	array_push($selected, $i);
	$nr1="";
}}
if ($nr3!=""){
if($_POST['nr3']=='L')
{
	$count=$count+1;
	$i=$nr3;
	array_push($selected, $i);
	$nr3="";
}}
if ($nr4!=""){
if($_POST['nr4']=='M')
{
	$count=$count+1;
	$i=$nr4;
	array_push($selected, $i);
	$nr4="";
}}


if($f==0 && $count<9)
{
$selected0=$selected[0];
$selected1=$selected[1];
$selected2=$selected[2];
$selected3=$selected[3];
$selected4=$selected[4];
$selected5=$selected[5];
$selected6=$selected[6];

$sqla="UPDATE student_subjects SET Subject1='$selected0',Subject2='$selected1',Subject3='$selected2',Subject4='$selected3',Subject5='$selected4',Subject6='$selected5' ,Subject7='$selected6' ,backlog1='$backlog1' ,backlog2='$backlog2' ,backlog3='$backlog3' ,backlog4='$backlog4' WHERE SAPID='".$sapid."'";

if(mysqli_query($con, $sqla)){
	$sqlb="UPDATE student_registration SET semester=4 WHERE sap_id='".$sapid."'";
	if(mysqli_query($con, $sqlb)){
		$sqlc="UPDATE student_subjects SET nextregister='$month' WHERE SAPID='".$sapid."'";
		if(mysqli_query($con, $sqlc)){
			$sqld="UPDATE student_subjects SET nr1='$nr1' ,nr2='$nr2', nr3='$nr3', nr4='$nr4' WHERE SAPID='".$sapid."'";
			  if(mysqli_query($con, $sqld)){
	echo "<script type='text/javascript'>alert('You have registered Successfully!!!')</script>";
}}}}

else
{
	echo "<script type='text/javascript'>alert('Registration failure!!!')</script>";
	 echo("Error description: " . mysqli_error($con));
}}
else
{
	$f=0;
	echo "<script type='text/javascript'>alert('Registration failure since the number of pending subjects or subjects registered has reached limit!!!')</script>";
}


 }
}
	
else if($stubacklog==0)
{
echo '<h4><center>';
echo '<form method="post">';

echo 'Select the subjects:-<br />';

if($subjects4[0]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects1" value="A" />';
echo $subjects4[0]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects4[1]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects2" value="B" />';
echo $subjects4[1]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects4[2]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects3" value="C" />';
echo $subjects4[2]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects4[3]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects4" value="D" />';
echo $subjects4[3]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects4[4]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects5" value="E" />';
echo $subjects4[4]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects4[5]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects6" value="X" />';
echo $subjects4[5]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects4[6]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects7" value="Y" />';
echo $subjects4[6]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

echo '<input type="submit" name="button1" value="Submit">';
echo '</form>';
echo '</center></h4>'; 
if(isset($_POST['button1']))
 {  
  
if($_POST['Subjects1']=='A')
{
	
	$i=$subjects4[0]['subject'];
	$selected0=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects4[0]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects4[0]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects4[0]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects4[0]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($_POST['Subjects2']=='B')
{
	$i=$subjects4[1]['subject'];
	$selected1=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects4[1]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects4[1]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects4[1]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects4[1]['subject'];
	}
	else 
	{
		$f=1;
	}
}
if($_POST['Subjects3']=='C')
{
	$i=$subjects4[2]['subject'];
	$selected2=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects4[2]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects4[2]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects4[2]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects4[2]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($_POST['Subjects4']=='D')
{
	$i=$subjects4[3]['subject'];
	$selected3=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects4[3]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects5[3]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects5[3]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects5[3]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($_POST['Subjects5']=='E')
{
    $i=$subjects5[4]['subject'];
	$selected4=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects5[4]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects5[4]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects5[4]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects5[4]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($_POST['Subjects6']=='X')
{
	$i=$subjects5[5]['subject'];
	$selected5=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects5[5]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects5[5]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects5[5]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects5[5]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($f==0)
{
$sqla="UPDATE student_subjects SET Subject1='$selected0',Subject2='$selected1',Subject3='$selected2',Subject4='$selected3',Subject5='$selected4',Subject6='$selected5' WHERE SAPID='".$sapid."'";

if(mysqli_query($con, $sqla)){
	$sqlb="UPDATE student_registration SET semester=4 WHERE sap_id='".$sapid."'";
	if(mysqli_query($con, $sqlb)){
		$sqlc="UPDATE student_subjects SET nextregister='$month' WHERE SAPID='".$sapid."'";
		if(mysqli_query($con, $sqlc)){
			$sqld="UPDATE student_subjects SET nr1='$nr1' ,nr2='$nr2', nr3='$nr3', nr4='$nr4' WHERE SAPID='".$sapid."'";
			  if(mysqli_query($con, $sqld)){
	echo "<script type='text/javascript'>alert('You have registered Successfully!!!')</script>";
}}}}

else
{
	echo "<script type='text/javascript'>alert('Registration failure!!!')</script>";
}
}
else
{
	$f=0;
	echo "<script type='text/javascript'>alert('Registration failure since the number of pending subjects or subjects registered has reached limit!!!')</script>";
}
} 
}
}


if($stusemester==4)
{
	if($stuyear>=2012 &&  $stuyear<=2015)
	{
	if($stubacklog==1)
	{
		
if($s6validate1<=2)
{
	$s6validate1=0;
  	echo "<script type='text/javascript'>alert('Sorry you cannot register!!! Clear the first year subjects please!!!')</script>";
	echo "<center><b><h4><a href ='studentprofile.php'>EXIT</a></h4></b></center>";
}

else if($s6validate2<=2)
{
	$s6validate2=0;
  	echo "<script type='text/javascript'>alert('Sorry you cannot register!!! Clear the first year subjects please!!!')</script>";
	echo "<center><b><h4><a href ='studentprofile.php'>EXIT</a></h4></b></center>";
}

else if($s6validate3<=2)
{
	$s6validate3=0;
  	echo "<script type='text/javascript'>alert('Sorry you cannot register!!! Clear the first year subjects please!!!')</script>";
    echo "<center><b><h4><a href ='studentprofile.php'>EXIT</a></h4></b></center>";
}

else if($s6validate4<=2)
{
	$s6validate4=0;
  	echo "<script type='text/javascript'>alert('Sorry you cannot register!!! Clear the first year subjects please!!!')</script>";
	echo "<center><b><h4><a href ='studentprofile.php'>EXIT</a></h4></b></center>";
}

else
{

echo '<h4><center>';
echo '<form method="post">';

echo 'Select the subjects:-<br />';
echo '<br /><br />&nbsp;&nbsp;';

if($subjects5[0]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects1" value="A" />';
echo $subjects5[0]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects5[1]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects2" value="B" />';
echo $subjects5[1]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects5[2]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects3" value="C" />';
echo $subjects5[2]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects5[3]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects4" value="D" />';
echo $subjects5[3]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects5[4]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects5" value="E" />';
echo $subjects5[4]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects5[5]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects6" value="X" />';
echo $subjects5[5]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects5[6]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects7" value="Y" />';
echo $subjects5[6]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}
	
if ($backlog1!="")
{
echo '6';
echo '<input type="checkbox" name="backlog1" value="F" checked>';
echo $backlog1;
echo '<br /><br /><br />&nbsp;&nbsp';
}
	
if ($backlog2!="")
{
echo '7';
echo '<input type="checkbox" name="backlog2" value="G" checked>';
echo $backlog2;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($backlog3!="")
{
echo '8';
echo '<input type="checkbox" name="backlog3" value="H" checked />';
echo $backlog3;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($backlog4!="")
{
echo '9';
echo '<input type="checkbox" name="backlog4" value="I" checked />';
echo $backlog4;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($nr1!="")
{
echo '10';
echo '<input type="checkbox" name="nr1" value="J" checked />';
echo $nr1;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($nr2!="")
{
echo '11';
echo '<input type="checkbox" name="nr2" value="K" checked />';
echo $nr2;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($nr3!="")
{
echo '12';
echo '<input type="checkbox" name="nr3" value="L" checked />';
echo $nr3;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($nr4!="")
{
echo '13';
echo '<input type="checkbox" name="nr4" value="M" checked />';
echo $nr4;
echo '<br /><br /><br />&nbsp;&nbsp';
}

echo '<input type="submit" name="button1" value="Submit">';
echo '</form>';
echo '</center></h4>';
if(isset($_POST['button1']))
 {  
  
if($_POST['Subjects1']=='A')
{
	$count=$count+1;
	$i=$subjects5[0]['subject'];
	array_push($selected, $i);
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects5[0]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects5[0]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects5[0]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects5[0]['subject'];
	}
	else
	{
		$f=1;	      
	}
}
if($_POST['Subjects2']=='B')
{
	$count=$count+1;
	$i=$subjects5[1]['subject'];
	array_push($selected, $i);
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects5[1]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects5[1]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects5[1]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects5[1]['subject'];
	}
	else 
	{
		 $f=1;
	}
}
if($_POST['Subjects3']=='C')
{
	$count=$count+1;
	$i=$subjects5[2]['subject'];
	array_push($selected, $i);
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects5[2]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects5[2]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects5[2]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects5[2]['subject'];
	}
	else
	{
		$f=1;	
	}
}
if($_POST['Subjects4']=='D')
{
	$count=$count+1;
	$i=$subjects5[3]['subject'];
	array_push($selected, $i);
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects5[3]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects5[3]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects5[3]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects5[3]['subject'];
	}
	else
	{
		$f=1;	
	}
}
if($_POST['Subjects5']=='E')
{
	$count=$count+1;
    $i=$subjects5[4]['subject'];
	array_push($selected, $i);
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects5[4]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects5[4]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects5[4]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects5[4]['subject'];
	}
	else
	{
		$f=1;    	
	}
}

if ($backlog1!="")
{
if($_POST['backlog1']=='F')
{
	$count=$count+1;
	$i=$backlog1;
	array_push($selected, $i);
	$backlog1="";
}

}
if ($backlog2!=""){
if($_POST['backlog2']=='G')
{
	$count=$count+1;
	$i=$backlog2;
	array_push($selected, $i);
	$backlog2="";
}

}
if ($backlog3!=""){
if($_POST['backlog3']=='H')
{
	$count=$count+1;
	$i=$backlog3;
	array_push($selected, $i);
	$backlog3="";
}

}
if ($backlog4!=""){
if($_POST['backlog4']=='I')
{
	$count=$count+1;
	$i=$backlog4;
	array_push($selected, $i);
	$backlog4="";
}}
if ($nr1!=""){
if($_POST['nr1']=='J')
{
	$count=$count+1;
	$i=$nr1;
	array_push($selected, $i);
	$nr1="";
}}
if ($nr2!=""){
if($_POST['nr2']=='K')
{
	$count=$count+1;
	$i=$nr2;
	array_push($selected, $i);
	$nr1="";
}}
if ($nr3!=""){
if($_POST['nr3']=='L')
{
	$count=$count+1;
	$i=$nr3;
	array_push($selected, $i);
	$nr3="";
}}
if ($nr4!=""){
if($_POST['nr4']=='M')
{
	$count=$count+1;
	$i=$nr4;
	array_push($selected, $i);
	$nr4="";
}}


if($f==0 && $count<9)
{
$selected0=$selected[0];
$selected1=$selected[1];
$selected2=$selected[2];
$selected3=$selected[3];
$selected4=$selected[4];
$selected5=$selected[5];
$selected6=$selected[6];

$sqla="UPDATE student_subjects SET Subject1='$selected0',Subject2='$selected1',Subject3='$selected2',Subject4='$selected3',Subject5='$selected4',Subject6='$selected5' ,Subject7='$selected6' ,backlog1='$backlog1' ,backlog2='$backlog2' ,backlog3='$backlog3' ,backlog4='$backlog4' WHERE SAPID='".$sapid."'";

if(mysqli_query($con, $sqla)){
	$sqlb="UPDATE student_registration SET semester=4 WHERE sap_id='".$sapid."'";
	if(mysqli_query($con, $sqlb)){
		$sqlc="UPDATE student_subjects SET nextregister='$month' WHERE SAPID='".$sapid."'";
		if(mysqli_query($con, $sqlc)){
			$sqld="UPDATE student_subjects SET nr1='$nr1' ,nr2='$nr2', nr3='$nr3', nr4='$nr4' WHERE SAPID='".$sapid."'";
			  if(mysqli_query($con, $sqld)){
	echo "<script type='text/javascript'>alert('You have registered Successfully!!!')</script>";
}}}}

else
{
	echo "<script type='text/javascript'>alert('Registration failure!!!')</script>";
	 echo("Error description: " . mysqli_error($con));
}}
else
{
	$f=0;
	echo "<script type='text/javascript'>alert('Registration failure since the number of pending subjects or subjects registered has reached limit!!!')</script>";
}


 }
	}
	}
	
else if($stubacklog==0)
{
echo '<h4><center>';
echo '<form method="post">';

echo 'Select the subjects:-<br />';

if($subjects5[0]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects1" value="A" />';
echo $subjects5[0]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects5[1]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects2" value="B" />';
echo $subjects5[1]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects5[2]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects3" value="C" />';
echo $subjects5[2]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects5[3]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects4" value="D" />';
echo $subjects5[3]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects5[4]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects5" value="E" />';
echo $subjects5[4]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects5[5]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects6" value="X" />';
echo $subjects5[5]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects5[6]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects7" value="Z" />';
echo $subjects5[6]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

echo '<input type="submit" name="button1" value="Submit">';	
echo '</form>';
echo '</center></h4>'; 

if(isset($_POST['button1']))
 {  
  
if($_POST['Subjects1']=='A')
{
	
	$i=$subjects5[0]['subject'];
	$selected0=$i;
}
else if($_POST['Subjects1']!='A' && $_POST['Subjects5']=='E')
{
}
else	
{
	if($nr1=="")
	{
		$nr1=$subjects5[0]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects5[0]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects5[0]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects5[0]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($_POST['Subjects2']=='B')
{
	$i=$subjects5[1]['subject'];
	$selected1=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects5[1]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects5[1]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects5[1]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects5[1]['subject'];
	}
	else 
	{
		$f=1;
	}
}
if($_POST['Subjects3']=='C')
{
	$i=$subjects5[2]['subject'];
	$selected2=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects5[2]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects5[2]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects5[2]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects5[2]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($_POST['Subjects4']=='D')
{
	$i=$subjects5[3]['subject'];
	$selected3=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects5[3]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects5[3]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects5[3]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects5[3]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($_POST['Subjects5']=='E')
{
    $i=$subjects5[4]['subject'];
	$selected4=$i;
}
else if($_POST['Subjects1']=='A' && $_POST['Subjects5']!='E')
{
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects5[4]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects5[4]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects5[4]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects5[4]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($_POST['Subjects6']=='X')
{
	$i=$subjects5[5]['subject'];
	$selected5=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects5[5]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects5[5]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects5[5]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects5[5]['subject'];
	}
	else
	{
		$f=1;
	}
}

if($selected0!="" && $selected4!="")
{
   echo "<script type='text/javascript'>alert('Please select any one of the elective subjects!!!')</script>";
}   
else
{
if($f==0)
{
$sqla="UPDATE student_subjects SET Subject1='$selected0',Subject2='$selected1',Subject3='$selected2',Subject4='$selected3',Subject5='$selected4',Subject6='$selected5' WHERE SAPID='".$sapid."'";

if(mysqli_query($con, $sqla)){
	$sqlb="UPDATE student_registration SET semester=5 WHERE sap_id='".$sapid."'";
	if(mysqli_query($con, $sqlb)){
		$sqlc="UPDATE student_subjects SET nextregister='$month' WHERE SAPID='".$sapid."'";
		if(mysqli_query($con, $sqlc)){
			$sqld="UPDATE student_subjects SET nr1='$nr1' ,nr2='$nr2', nr3='$nr3', nr4='$nr4' WHERE SAPID='".$sapid."'";
			  if(mysqli_query($con, $sqld)){
	echo "<script type='text/javascript'>alert('You have registered Successfully!!!')</script>";
}}}}

else
{
	echo "<script type='text/javascript'>alert('Registration failure!!!')</script>";
}
}
else
{
	$f=0;
	echo "<script type='text/javascript'>alert('Registration failure since the number of pending subjects or subjects registered has reached limit!!!')</script>";
}
}
 }
}
}

else if($stuyear>=2016 && $stuyear<=2019)
{
	{
	if($stubacklog==1)
	{
		
if($s6validate1<=2)
{
	$s6validate1=0;
  	echo "<script type='text/javascript'>alert('Sorry you cannot register!!! Clear the first year subjects please!!!')</script>";
	echo "<center><b><h4><a href ='studentprofile.php'>EXIT</a></h4></b></center>";
}

else if($s6validate2<=2)
{
	$s6validate2=0;
  	echo "<script type='text/javascript'>alert('Sorry you cannot register!!! Clear the first year subjects please!!!')</script>";
	echo "<center><b><h4><a href ='studentprofile.php'>EXIT</a></h4></b></center>";
}

else if($s6validate3<=2)
{
	$s6validate3=0;
  	echo "<script type='text/javascript'>alert('Sorry you cannot register!!! Clear the first year subjects please!!!')</script>";
    echo "<center><b><h4><a href ='studentprofile.php'>EXIT</a></h4></b></center>";
}

else if($s6validate4<=2)
{
	$s6validate4=0;
  	echo "<script type='text/javascript'>alert('Sorry you cannot register!!! Clear the first year subjects please!!!')</script>";
	echo "<center><b><h4><a href ='studentprofile.php'>EXIT</a></h4></b></center>";
}

else
{

echo '<h4><center>';
echo '<form method="post">';

echo 'Select the subjects:-<br />';
echo '<br /><br />&nbsp;&nbsp;';

if($subjects5[0]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects1" value="A" />';
echo $subjects5[0]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects5[1]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects2" value="B" />';
echo $subjects5[1]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects5[2]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects3" value="C" />';
echo $subjects5[2]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects5[3]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects4" value="D" />';
echo $subjects5[3]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects5[4]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects5" value="E" />';
echo $subjects5[4]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects5[5]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects6" value="X" />';
echo $subjects5[5]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects5[6]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects7" value="Y" />';
echo $subjects5[6]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}
	
if ($backlog1!="")
{
echo '6';
echo '<input type="checkbox" name="backlog1" value="F" checked>';
echo $backlog1;
echo '<br /><br /><br />&nbsp;&nbsp';
}
	
if ($backlog2!="")
{
echo '7';
echo '<input type="checkbox" name="backlog2" value="G" checked>';
echo $backlog2;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($backlog3!="")
{
echo '8';
echo '<input type="checkbox" name="backlog3" value="H" checked />';
echo $backlog3;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($backlog4!="")
{
echo '9';
echo '<input type="checkbox" name="backlog4" value="I" checked />';
echo $backlog4;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($nr1!="")
{
echo '10';
echo '<input type="checkbox" name="nr1" value="J" checked />';
echo $nr1;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($nr2!="")
{
echo '11';
echo '<input type="checkbox" name="nr2" value="K" checked />';
echo $nr2;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($nr3!="")
{
echo '12';
echo '<input type="checkbox" name="nr3" value="L" checked />';
echo $nr3;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($nr4!="")
{
echo '13';
echo '<input type="checkbox" name="nr4" value="M" checked />';
echo $nr4;
echo '<br /><br /><br />&nbsp;&nbsp';
}

echo '<input type="submit" name="button1" value="Submit">';
echo '</form>';
echo '</center></h4>';
if(isset($_POST['button1']))
 {  
  
if($_POST['Subjects1']=='A')
{
	$count=$count+1;
	$i=$subjects5[0]['subject'];
	array_push($selected, $i);
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects5[0]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects5[0]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects5[0]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects5[0]['subject'];
	}
	else
	{
		$f=1;	      
	}
}
if($_POST['Subjects2']=='B')
{
	$count=$count+1;
	$i=$subjects5[1]['subject'];
	array_push($selected, $i);
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects5[1]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects5[1]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects5[1]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects5[1]['subject'];
	}
	else 
	{
		 $f=1;
	}
}
if($_POST['Subjects3']=='C')
{
	$count=$count+1;
	$i=$subjects5[2]['subject'];
	array_push($selected, $i);
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects5[2]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects5[2]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects5[2]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects5[2]['subject'];
	}
	else
	{
		$f=1;	
	}
}
if($_POST['Subjects4']=='D')
{
	$count=$count+1;
	$i=$subjects5[3]['subject'];
	array_push($selected, $i);
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects5[3]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects5[3]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects5[3]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects5[3]['subject'];
	}
	else
	{
		$f=1;	
	}
}
if($_POST['Subjects5']=='E')
{
	$count=$count+1;
    $i=$subjects5[4]['subject'];
	array_push($selected, $i);
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects5[4]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects5[4]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects5[4]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects5[4]['subject'];
	}
	else
	{
		$f=1;    	
	}
}

if ($backlog1!="")
{
if($_POST['backlog1']=='F')
{
	$count=$count+1;
	$i=$backlog1;
	array_push($selected, $i);
	$backlog1="";
}

}
if ($backlog2!=""){
if($_POST['backlog2']=='G')
{
	$count=$count+1;
	$i=$backlog2;
	array_push($selected, $i);
	$backlog2="";
}

}
if ($backlog3!=""){
if($_POST['backlog3']=='H')
{
	$count=$count+1;
	$i=$backlog3;
	array_push($selected, $i);
	$backlog3="";
}

}
if ($backlog4!=""){
if($_POST['backlog4']=='I')
{
	$count=$count+1;
	$i=$backlog4;
	array_push($selected, $i);
	$backlog4="";
}}
if ($nr1!=""){
if($_POST['nr1']=='J')
{
	$count=$count+1;
	$i=$nr1;
	array_push($selected, $i);
	$nr1="";
}}
if ($nr2!=""){
if($_POST['nr2']=='K')
{
	$count=$count+1;
	$i=$nr2;
	array_push($selected, $i);
	$nr1="";
}}
if ($nr3!=""){
if($_POST['nr3']=='L')
{
	$count=$count+1;
	$i=$nr3;
	array_push($selected, $i);
	$nr3="";
}}
if ($nr4!=""){
if($_POST['nr4']=='M')
{
	$count=$count+1;
	$i=$nr4;
	array_push($selected, $i);
	$nr4="";
}}


if($f==0 && $count<9)
{
$selected0=$selected[0];
$selected1=$selected[1];
$selected2=$selected[2];
$selected3=$selected[3];
$selected4=$selected[4];
$selected5=$selected[5];
$selected6=$selected[6];

$sqla="UPDATE student_subjects SET Subject1='$selected0',Subject2='$selected1',Subject3='$selected2',Subject4='$selected3',Subject5='$selected4',Subject6='$selected5' ,Subject7='$selected6' ,backlog1='$backlog1' ,backlog2='$backlog2' ,backlog3='$backlog3' ,backlog4='$backlog4' WHERE SAPID='".$sapid."'";

if(mysqli_query($con, $sqla)){
	$sqlb="UPDATE student_registration SET semester=4 WHERE sap_id='".$sapid."'";
	if(mysqli_query($con, $sqlb)){
		$sqlc="UPDATE student_subjects SET nextregister='$month' WHERE SAPID='".$sapid."'";
		if(mysqli_query($con, $sqlc)){
			$sqld="UPDATE student_subjects SET nr1='$nr1' ,nr2='$nr2', nr3='$nr3', nr4='$nr4' WHERE SAPID='".$sapid."'";
			  if(mysqli_query($con, $sqld)){
	echo "<script type='text/javascript'>alert('You have registered Successfully!!!')</script>";
}}}}

else
{
	echo "<script type='text/javascript'>alert('Registration failure!!!')</script>";
	 echo("Error description: " . mysqli_error($con));
}}
else
{
	$f=0;
	echo "<script type='text/javascript'>alert('Registration failure since the number of pending subjects or subjects registered has reached limit!!!')</script>";
}


 }
	}
	}
	
else if($stubacklog==0)
{
echo '<h4><center>';
echo '<form method="post">';

echo 'Select the subjects:-<br />';

if($subjects5[0]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects1" value="A" />';
echo $subjects5[0]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects5[1]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects2" value="B" />';
echo $subjects5[1]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects5[2]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects3" value="C" />';
echo $subjects5[2]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects5[3]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects4" value="D" />';
echo $subjects5[3]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects5[4]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects5" value="E" />';
echo $subjects5[4]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects5[5]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects6" value="X" />';
echo $subjects5[5]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects5[6]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects7" value="Z" />';
echo $subjects5[6]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

echo '<input type="submit" name="button1" value="Submit">';	
echo '</form>';
echo '</center></h4>'; 

if(isset($_POST['button1']))
 {  
  
if($_POST['Subjects1']=='A')
{
	
	$i=$subjects5[0]['subject'];
	$selected0=$i;
}
else if($_POST['Subjects1']!='A' && $_POST['Subjects5']=='E')
{
}
else	
{
	if($nr1=="")
	{
		$nr1=$subjects5[0]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects5[0]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects5[0]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects5[0]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($_POST['Subjects2']=='B')
{
	$i=$subjects5[1]['subject'];
	$selected1=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects5[1]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects5[1]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects5[1]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects5[1]['subject'];
	}
	else 
	{
		$f=1;
	}
}
if($_POST['Subjects3']=='C')
{
	$i=$subjects5[2]['subject'];
	$selected2=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects5[2]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects5[2]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects5[2]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects5[2]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($_POST['Subjects4']=='D')
{
	$i=$subjects5[3]['subject'];
	$selected3=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects5[3]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects5[3]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects5[3]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects5[3]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($_POST['Subjects5']=='E')
{
    $i=$subjects5[4]['subject'];
	$selected4=$i;
}
else if($_POST['Subjects1']=='A' && $_POST['Subjects5']!='E')
{
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects5[4]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects5[4]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects5[4]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects5[4]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($_POST['Subjects6']=='X')
{
	$i=$subjects5[5]['subject'];
	$selected5=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects5[5]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects5[5]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects5[5]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects5[5]['subject'];
	}
	else
	{
		$f=1;
	}
}

if($selected3!="" && $selected4!="")
{
   echo "<script type='text/javascript'>alert('Please select any one of the elective subjects!!!')</script>";
}   
else
{
if($f==0)
{
$sqla="UPDATE student_subjects SET Subject1='$selected0',Subject2='$selected1',Subject3='$selected2',Subject4='$selected3',Subject5='$selected4',Subject6='$selected5' WHERE SAPID='".$sapid."'";

if(mysqli_query($con, $sqla)){
	$sqlb="UPDATE student_registration SET semester=5 WHERE sap_id='".$sapid."'";
	if(mysqli_query($con, $sqlb)){
		$sqlc="UPDATE student_subjects SET nextregister='$month' WHERE SAPID='".$sapid."'";
		if(mysqli_query($con, $sqlc)){
			$sqld="UPDATE student_subjects SET nr1='$nr1' ,nr2='$nr2', nr3='$nr3', nr4='$nr4' WHERE SAPID='".$sapid."'";
			  if(mysqli_query($con, $sqld)){
	echo "<script type='text/javascript'>alert('You have registered Successfully!!!')</script>";
}}}}

else
{
	echo "<script type='text/javascript'>alert('Registration failure!!!')</script>";
}
}
else
{
	$f=0;
	echo "<script type='text/javascript'>alert('Registration failure since the number of pending subjects or subjects registered has reached limit!!!')</script>";
}
}
 }
}
}
}
}
if($stusemester==5)
{
 if($stuyear>=2012 &&  $stuyear<=2015)
	{
	if($stubacklog==1)
	{

echo '<h4><center>';
echo '<form method="post">';

echo 'Select the subjects:-<br />';
echo '<br /><br />&nbsp;&nbsp;';

if($subjects6[0]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects1" value="A" />';
echo $subjects6[0]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects6[1]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects2" value="B" />';
echo $subjects6[1]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects6[2]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects3" value="C" />';
echo $subjects6[2]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects6[3]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects4" value="D" />';
echo $subjects6[3]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects6[4]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects5" value="E" />';
echo $subjects6[4]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects6[5]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects6" value="X" />';
echo $subjects6[5]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects6[6]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects7" value="Y" />';
echo $subjects6[6]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects6[7]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects8" value="Z" />';
echo $subjects6[7]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects6[8]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects9" value="XZ" />';
echo $subjects6[8]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}
	
if ($backlog1!="")
{
echo '6';
echo '<input type="checkbox" name="backlog1" value="F" checked>';
echo $backlog1;
echo '<br /><br /><br />&nbsp;&nbsp';
}
	
if ($backlog2!="")
{
echo '7';
echo '<input type="checkbox" name="backlog2" value="G" checked>';
echo $backlog2;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($backlog3!="")
{
echo '8';
echo '<input type="checkbox" name="backlog3" value="H" checked />';
echo $backlog3;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($backlog4!="")
{
echo '9';
echo '<input type="checkbox" name="backlog4" value="I" checked />';
echo $backlog4;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($nr1!="")
{
echo '10';
echo '<input type="checkbox" name="nr1" value="J" checked />';
echo $nr1;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($nr2!="")
{
echo '11';
echo '<input type="checkbox" name="nr2" value="K" checked />';
echo $nr2;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($nr3!="")
{
echo '12';
echo '<input type="checkbox" name="nr3" value="L" checked />';
echo $nr3;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($nr4!="")
{
echo '13';
echo '<input type="checkbox" name="nr4" value="M" checked />';
echo $nr4;
echo '<br /><br /><br />&nbsp;&nbsp';
}

echo '<input type="submit" name="button1" class="btn btn-success" value="Submit">';
echo '</form>';
echo '</center></h4>';

if(isset($_POST['button1']))
 {  
  
if($_POST['Subjects1']=='A')
{
	$count=$count+1;
	$i=$subjects5[0]['subject'];
	array_push($selected, $i);
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects5[0]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects5[0]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects5[0]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects5[0]['subject'];
	}
	else
	{
		$f=1;	      
	}
}
if($_POST['Subjects2']=='B')
{
	$count=$count+1;
	$i=$subjects5[1]['subject'];
	array_push($selected, $i);
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects5[1]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects5[1]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects5[1]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects5[1]['subject'];
	}
	else 
	{
		 $f=1;
	}
}
if($_POST['Subjects3']=='C')
{
	$count=$count+1;
	$i=$subjects5[2]['subject'];
	array_push($selected, $i);
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects5[2]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects5[2]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects5[2]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects5[2]['subject'];
	}
	else
	{
		$f=1;	
	}
}
if($_POST['Subjects4']=='D')
{
	$count=$count+1;
	$i=$subjects5[3]['subject'];
	array_push($selected, $i);
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects5[3]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects5[3]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects5[3]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects5[3]['subject'];
	}
	else
	{
		$f=1;	
	}
}
if($_POST['Subjects5']=='E')
{
	$count=$count+1;
    $i=$subjects5[4]['subject'];
	array_push($selected, $i);
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects5[4]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects5[4]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects5[4]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects5[4]['subject'];
	}
	else
	{
		$f=1;    	
	}
}

if ($backlog1!="")
{
if($_POST['backlog1']=='F')
{
	$count=$count+1;
	$i=$backlog1;
	array_push($selected, $i);
	$backlog1="";
}

}
if ($backlog2!=""){
if($_POST['backlog2']=='G')
{
	$count=$count+1;
	$i=$backlog2;
	array_push($selected, $i);
	$backlog2="";
}

}
if ($backlog3!=""){
if($_POST['backlog3']=='H')
{
	$count=$count+1;
	$i=$backlog3;
	array_push($selected, $i);
	$backlog3="";
}

}
if ($backlog4!=""){
if($_POST['backlog4']=='I')
{
	$count=$count+1;
	$i=$backlog4;
	array_push($selected, $i);
	$backlog4="";
}}
if ($nr1!=""){
if($_POST['nr1']=='J')
{
	$count=$count+1;
	$i=$nr1;
	array_push($selected, $i);
	$nr1="";
}}
if ($nr2!=""){
if($_POST['nr2']=='K')
{
	$count=$count+1;
	$i=$nr2;
	array_push($selected, $i);
	$nr1="";
}}
if ($nr3!=""){
if($_POST['nr3']=='L')
{
	$count=$count+1;
	$i=$nr3;
	array_push($selected, $i);
	$nr3="";
}}
if ($nr4!=""){
if($_POST['nr4']=='M')
{
	$count=$count+1;
	$i=$nr4;
	array_push($selected, $i);
	$nr4="";
}}


if($f==0 && $count<9)
{
$selected0=$selected[0];
$selected1=$selected[1];
$selected2=$selected[2];
$selected3=$selected[3];
$selected4=$selected[4];
$selected5=$selected[5];
$selected6=$selected[6];

$sqla="UPDATE student_subjects SET Subject1='$selected0',Subject2='$selected1',Subject3='$selected2',Subject4='$selected3',Subject5='$selected4',Subject6='$selected5' ,Subject7='$selected6' ,backlog1='$backlog1' ,backlog2='$backlog2' ,backlog3='$backlog3' ,backlog4='$backlog4' WHERE SAPID='".$sapid."'";

if(mysqli_query($con, $sqla)){
	$sqlb="UPDATE student_registration SET semester=4 WHERE sap_id='".$sapid."'";
	if(mysqli_query($con, $sqlb)){
		$sqlc="UPDATE student_subjects SET nextregister='$month' WHERE SAPID='".$sapid."'";
		if(mysqli_query($con, $sqlc)){
			$sqld="UPDATE student_subjects SET nr1='$nr1' ,nr2='$nr2', nr3='$nr3', nr4='$nr4' WHERE SAPID='".$sapid."'";
			  if(mysqli_query($con, $sqld)){
	echo "<script type='text/javascript'>alert('You have registered Successfully!!!')</script>";
}}}}

else
{
	echo "<script type='text/javascript'>alert('Registration failure!!!')</script>";
	 echo("Error description: " . mysqli_error($con));
}}
else
{
	$f=0;
	echo "<script type='text/javascript'>alert('Registration failure since the number of pending subjects or subjects registered has reached limit!!!')</script>";
}


 }
}
	
else if($stubacklog==0)
{
echo '<h4><center>';
echo '<form method="post">';

echo 'Select the subjects:-<br />';

if($subjects6[0]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects1" value="A" />';
echo $subjects6[0]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects6[1]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects2" value="B" />';
echo $subjects6[1]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects6[2]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects3" value="C" />';
echo $subjects6[2]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects6[3]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects4" value="D" />';
echo $subjects6[3]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects6[4]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects5" value="E" />';
echo $subjects6[4]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects6[5]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects6" value="X" />';
echo $subjects6[5]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects6[6]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects7" value="Y" />';
echo $subjects6[6]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects6[7]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects8" value="Z" />';
echo $subjects6[7]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}


echo '<input type="submit" name="button1" value="Submit">';	
echo '</form>';
echo '</center></h4>'; 

if(isset($_POST['button1']))
 {  
  
if($_POST['Subjects1']=='A')
{
	
	$i=$subjects6[0]['subject'];
	$selected0=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects6[0]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects6[0]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects6[0]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects6[0]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($_POST['Subjects2']=='B')
{
	$i=$subjects6[1]['subject'];
	$selected1=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects6[1]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects6[1]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects6[1]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects6[1]['subject'];
	}
	else 
	{
		$f=1;
	}
}
if($_POST['Subjects3']=='C')
{
	$i=$subjects6[2]['subject'];
	$selected2=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects6[2]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects6[2]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects6[2]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects6[2]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($_POST['Subjects4']=='D')
{
	$i=$subjects6[3]['subject'];
	$selected3=$i;
}
else if($_POST['Subjects4']!='D' && $_POST['Subjects8']=='Z')
{
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects6[3]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects6[3]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects6[3]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects6[3]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($_POST['Subjects5']=='E')
{
    $i=$subjects6[4]['subject'];
	$selected4=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects6[4]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects6[4]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects6[4]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects6[4]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($_POST['Subjects6']=='X')
{
	$i=$subjects6[5]['subject'];
	$selected5=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects6[5]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects6[5]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects6[5]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects6[5]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($_POST['Subjects7']=='Y')
{
	$i=$subjects6[6]['subject'];
	$selected6=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects6[6]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects6[6]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects6[6]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects6[6]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($_POST['Subjects8']=='Z')
{
	$i=$subjects6[7]['subject'];
	$selected7=$i;
}
else if($_POST['Subjects4']=='D' && $_POST['Subjects8']!='Z')
{
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects6[7]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects6[7]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects6[7]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects6[7]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($selected3!="" && $selected7!="")
{
	echo "<script type='text/javascript'>alert('Please select any 1 of the elective subjects!!!')</script>";
}
else
{
if($f==0)
{
$sqla="UPDATE student_subjects SET Subject1='$selected0',Subject2='$selected1',Subject3='$selected2',Subject4='$selected3',Subject5='$selected4',Subject6='$selected5',Subject7='$selected6' ,Subject8='$selected7' WHERE SAPID='".$sapid."'";

if(mysqli_query($con, $sqla)){
	$sqlb="UPDATE student_registration SET semester=6 WHERE sap_id='".$sapid."'";
	if(mysqli_query($con, $sqlb)){
		$sqlc="UPDATE student_subjects SET nextregister='$month' WHERE SAPID='".$sapid."'";
		if(mysqli_query($con, $sqlc)){
			$sqld="UPDATE student_subjects SET nr1='$nr1' ,nr2='$nr2', nr3='$nr3', nr4='$nr4' WHERE SAPID='".$sapid."'";
			  if(mysqli_query($con, $sqld)){
	echo "<script type='text/javascript'>alert('You have registered Successfully!!!')</script>";
}}}}

else
{
	echo "<script type='text/javascript'>alert('Registration failure!!!')</script>";
}
}
else
{
	$f=0;
	echo "<script type='text/javascript'>alert('Registration failure since the number of pending subjects or subjects registered has reached limit!!!')</script>";
}
} 
 }
}
	}
else if($stuyear>=2016 && $stuyear<=2019)
{
	if($stubacklog==1)
	{

echo '<h4><center>';
echo '<form method="post">';

echo 'Select the subjects:-<br />';
echo '<br /><br />&nbsp;&nbsp;';

if($subjects6[0]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects1" value="A" />';
echo $subjects6[0]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects6[1]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects2" value="B" />';
echo $subjects6[1]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects6[2]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects3" value="C" />';
echo $subjects6[2]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects6[3]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects4" value="D" />';
echo $subjects6[3]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects6[4]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects5" value="E" />';
echo $subjects6[4]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects6[5]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects6" value="X" />';
echo $subjects6[5]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects6[6]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects7" value="Y" />';
echo $subjects6[6]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects6[7]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects8" value="Z" />';
echo $subjects6[7]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects6[8]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects9" value="XZ" />';
echo $subjects6[8]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}
	
if ($backlog1!="")
{
echo '6';
echo '<input type="checkbox" name="backlog1" value="F" checked>';
echo $backlog1;
echo '<br /><br /><br />&nbsp;&nbsp';
}
	
if ($backlog2!="")
{
echo '7';
echo '<input type="checkbox" name="backlog2" value="G" checked>';
echo $backlog2;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($backlog3!="")
{
echo '8';
echo '<input type="checkbox" name="backlog3" value="H" checked />';
echo $backlog3;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($backlog4!="")
{
echo '9';
echo '<input type="checkbox" name="backlog4" value="I" checked />';
echo $backlog4;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($nr1!="")
{
echo '10';
echo '<input type="checkbox" name="nr1" value="J" checked />';
echo $nr1;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($nr2!="")
{
echo '11';
echo '<input type="checkbox" name="nr2" value="K" checked />';
echo $nr2;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($nr3!="")
{
echo '12';
echo '<input type="checkbox" name="nr3" value="L" checked />';
echo $nr3;
echo '<br /><br /><br />&nbsp;&nbsp';
}

if ($nr4!="")
{
echo '13';
echo '<input type="checkbox" name="nr4" value="M" checked />';
echo $nr4;
echo '<br /><br /><br />&nbsp;&nbsp';
}

echo '<input type="submit" name="button1" class="btn btn-success" value="Submit">';
echo '</form>';
echo '</center></h4>';

if(isset($_POST['button1']))
 {  
  
if($_POST['Subjects1']=='A')
{
	$count=$count+1;
	$i=$subjects5[0]['subject'];
	array_push($selected, $i);
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects5[0]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects5[0]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects5[0]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects5[0]['subject'];
	}
	else
	{
		$f=1;	      
	}
}
if($_POST['Subjects2']=='B')
{
	$count=$count+1;
	$i=$subjects5[1]['subject'];
	array_push($selected, $i);
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects5[1]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects5[1]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects5[1]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects5[1]['subject'];
	}
	else 
	{
		 $f=1;
	}
}
if($_POST['Subjects3']=='C')
{
	$count=$count+1;
	$i=$subjects5[2]['subject'];
	array_push($selected, $i);
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects5[2]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects5[2]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects5[2]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects5[2]['subject'];
	}
	else
	{
		$f=1;	
	}
}
if($_POST['Subjects4']=='D')
{
	$count=$count+1;
	$i=$subjects5[3]['subject'];
	array_push($selected, $i);
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects5[3]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects5[3]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects5[3]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects5[3]['subject'];
	}
	else
	{
		$f=1;	
	}
}
if($_POST['Subjects5']=='E')
{
	$count=$count+1;
    $i=$subjects5[4]['subject'];
	array_push($selected, $i);
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects5[4]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects5[4]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects5[4]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects5[4]['subject'];
	}
	else
	{
		$f=1;    	
	}
}

if ($backlog1!="")
{
if($_POST['backlog1']=='F')
{
	$count=$count+1;
	$i=$backlog1;
	array_push($selected, $i);
	$backlog1="";
}

}
if ($backlog2!=""){
if($_POST['backlog2']=='G')
{
	$count=$count+1;
	$i=$backlog2;
	array_push($selected, $i);
	$backlog2="";
}

}
if ($backlog3!=""){
if($_POST['backlog3']=='H')
{
	$count=$count+1;
	$i=$backlog3;
	array_push($selected, $i);
	$backlog3="";
}

}
if ($backlog4!=""){
if($_POST['backlog4']=='I')
{
	$count=$count+1;
	$i=$backlog4;
	array_push($selected, $i);
	$backlog4="";
}}
if ($nr1!=""){
if($_POST['nr1']=='J')
{
	$count=$count+1;
	$i=$nr1;
	array_push($selected, $i);
	$nr1="";
}}
if ($nr2!=""){
if($_POST['nr2']=='K')
{
	$count=$count+1;
	$i=$nr2;
	array_push($selected, $i);
	$nr1="";
}}
if ($nr3!=""){
if($_POST['nr3']=='L')
{
	$count=$count+1;
	$i=$nr3;
	array_push($selected, $i);
	$nr3="";
}}
if ($nr4!=""){
if($_POST['nr4']=='M')
{
	$count=$count+1;
	$i=$nr4;
	array_push($selected, $i);
	$nr4="";
}}


if($f==0 && $count<9)
{
$selected0=$selected[0];
$selected1=$selected[1];
$selected2=$selected[2];
$selected3=$selected[3];
$selected4=$selected[4];
$selected5=$selected[5];
$selected6=$selected[6];

$sqla="UPDATE student_subjects SET Subject1='$selected0',Subject2='$selected1',Subject3='$selected2',Subject4='$selected3',Subject5='$selected4',Subject6='$selected5' ,Subject7='$selected6' ,backlog1='$backlog1' ,backlog2='$backlog2' ,backlog3='$backlog3' ,backlog4='$backlog4' WHERE SAPID='".$sapid."'";

if(mysqli_query($con, $sqla)){
	$sqlb="UPDATE student_registration SET semester=4 WHERE sap_id='".$sapid."'";
	if(mysqli_query($con, $sqlb)){
		$sqlc="UPDATE student_subjects SET nextregister='$month' WHERE SAPID='".$sapid."'";
		if(mysqli_query($con, $sqlc)){
			$sqld="UPDATE student_subjects SET nr1='$nr1' ,nr2='$nr2', nr3='$nr3', nr4='$nr4' WHERE SAPID='".$sapid."'";
			  if(mysqli_query($con, $sqld)){
	echo "<script type='text/javascript'>alert('You have registered Successfully!!!')</script>";
}}}}

else
{
	echo "<script type='text/javascript'>alert('Registration failure!!!')</script>";
	 echo("Error description: " . mysqli_error($con));
}}
else
{
	$f=0;
	echo "<script type='text/javascript'>alert('Registration failure since the number of pending subjects or subjects registered has reached limit!!!')</script>";
}


 }
}
	
else if($stubacklog==0)
{
echo '<h4><center>';
echo '<form method="post">';

echo 'Select the subjects:-<br />';

if($subjects6[0]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects1" value="A" />';
echo $subjects6[0]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects6[1]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects2" value="B" />';
echo $subjects6[1]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects6[2]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects3" value="C" />';
echo $subjects6[2]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects6[3]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects4" value="D" />';
echo $subjects6[3]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects6[4]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects5" value="E" />';
echo $subjects6[4]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects6[5]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects6" value="X" />';
echo $subjects6[5]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects6[6]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects7" value="Y" />';
echo $subjects6[6]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}

if($subjects6[7]['subject']!="")
{
echo '<b>--></b>';
echo '<input type="checkbox" name="Subjects8" value="Z" />';
echo $subjects6[7]['subject'];
echo '<br /><br />&nbsp;&nbsp;';
}


echo '<input type="submit" name="button1" value="Submit">';	
echo '</form>';
echo '</center></h4>'; 

if(isset($_POST['button1']))
 {  
  
if($_POST['Subjects1']=='A')
{
	
	$i=$subjects6[0]['subject'];
	$selected0=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects6[0]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects6[0]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects6[0]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects6[0]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($_POST['Subjects2']=='B')
{
	$i=$subjects6[1]['subject'];
	$selected1=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects6[1]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects6[1]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects6[1]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects6[1]['subject'];
	}
	else 
	{
		$f=1;
	}
}
if($_POST['Subjects3']=='C')
{
	$i=$subjects6[2]['subject'];
	$selected2=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects6[2]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects6[2]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects6[2]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects6[2]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($_POST['Subjects4']=='D')
{
	$i=$subjects6[3]['subject'];
	$selected3=$i;
}
else if($_POST['Subjects4']!='D' && $_POST['Subjects8']=='Z')
{
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects6[3]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects6[3]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects6[3]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects6[3]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($_POST['Subjects5']=='E')
{
    $i=$subjects6[4]['subject'];
	$selected4=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects6[4]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects6[4]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects6[4]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects6[4]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($_POST['Subjects6']=='X')
{
	$i=$subjects6[5]['subject'];
	$selected5=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects6[5]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects6[5]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects6[5]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects6[5]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($_POST['Subjects7']=='Y')
{
	$i=$subjects6[6]['subject'];
	$selected6=$i;
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects6[6]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects6[6]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects6[6]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects6[6]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($_POST['Subjects8']=='Z')
{
	$i=$subjects6[7]['subject'];
	$selected7=$i;
}
else if($_POST['Subjects4']=='D' && $_POST['Subjects8']!='Z')
{
}
else
{
	if($nr1=="")
	{
		$nr1=$subjects6[7]['subject'];
	}
	else if($nr2=="")
	{
		$nr2=$subjects6[7]['subject'];
	}
	else if($nr3=="")
	{
		$nr3=$subjects6[7]['subject'];
	}
	else if($nr4=="")
	{
		$nr4=$subjects6[7]['subject'];
	}
	else
	{
		$f=1;
	}
}
if($selected3!="" && $selected4!="")
{
	echo "<script type='text/javascript'>alert('Please select any 1 of the elective subjects!!!')</script>";
}
else
{
if($f==0)
{
$sqla="UPDATE student_subjects SET Subject1='$selected0',Subject2='$selected1',Subject3='$selected2',Subject4='$selected3',Subject5='$selected4',Subject6='$selected5',Subject7='$selected6' ,Subject8='$selected7' WHERE SAPID='".$sapid."'";

if(mysqli_query($con, $sqla)){
	$sqlb="UPDATE student_registration SET semester=6 WHERE sap_id='".$sapid."'";
	if(mysqli_query($con, $sqlb)){
		$sqlc="UPDATE student_subjects SET nextregister='$month' WHERE SAPID='".$sapid."'";
		if(mysqli_query($con, $sqlc)){
			$sqld="UPDATE student_subjects SET nr1='$nr1' ,nr2='$nr2', nr3='$nr3', nr4='$nr4' WHERE SAPID='".$sapid."'";
			  if(mysqli_query($con, $sqld)){
	echo "<script type='text/javascript'>alert('You have registered Successfully!!!')</script>";
}}}}

else
{
	echo "<script type='text/javascript'>alert('Registration failure!!!')</script>";
}
}
else
{
	$f=0;
	echo "<script type='text/javascript'>alert('Registration failure since the number of pending subjects or subjects registered has reached limit!!!')</script>";
}
} 
 }
}
}

}
}
 else
   {   
	   echo "<script type='text/javascript'>alert('Complete the current semester first!!!')</script>";
	   echo "<h1>";
	   echo '<center><a align="right" href="studentprofile.php">Exit</a></center>';
	   echo "</h1>";
	   
   }

	

?>
</body>
</html>
