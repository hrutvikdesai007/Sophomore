<!DOCTYPE html>
<html> 
<head>
<link rel="stylesheet" href="registerstyle.css">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        
    </head>
<body style="background: linear-gradient(to right, darkslateblue 0%, darkturquoise 96%);">  
<br>
	<h4><object align="right" width="190"><a href ="studentlogin.php"  class="text-dark" onclick="alert('You have logged out successfully!!;') <?php session_destroy(); ?>">Logout</a></object></h4>
	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="subjectregistration.php">Subject Registration</a>
  <a href="studentstuedit.php">Edit Profile</a>
  <a href="studentprofilesembacklog.php">Subjects Pending</a>
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
	<br>
	<br>
	<center><img src="logo.png" height="65" width="120"></img></center>
    <br>
    <br>
	&nbsp;
	<br>
     <center><h1>Student Information</h1></center> 
	 &nbsp;
     &nbsp;

<?php $u=$_POST['user']; $p=$_POST['pass']; ?>

<?php
    
	session_start();
	$_SESSION['user']=$u;
	$_SESSION['pass']=$p;
	
	global $backlog1,$backlog;
	global $backlog2,$stustatus;
	global $backlog3;
	global $backlog4;
	global $unchecked1;
	global $unchecked2;
	global $unchecked3;
	global $unchecked4;
	global $elect1;
	global $elect2;
	global $i;
	$sem1 = array();
	$count=0;
	$backlog=0;
	$con=mysqli_connect('localhost','root','') or die(mysql_error());  
    mysqli_select_db($con,'sophomore') or die("cannot select DB");
	
	$query=mysqli_query($con,"SELECT * FROM student_registration WHERE username='".$u."' AND password='".$p."'"); 
    $numrows=mysqli_num_rows($query);
	$query1=mysqli_query($con,"SELECT * FROM sbmp_subjects WHERE semester='1'");
	$numrows1=mysqli_num_rows($query1);
    $_SESSION['sessionrows']=$numrows;
	
	   while($row=mysqli_fetch_assoc($query))
    {  
    echo "<script type='text/javascript'>alert('You have logged in Successfully!!!')</script>";
	$stuname=$row['fname'];
	$stusurname=$row['lname'];
	$stusapid=$row['sap_id'];
	$studob=$row['dob'];
	$stuage=$row['age'];
	$stucourse=$row['course'];
	$stusemester=$row['semester'];
	$stustatus=$row['status'];
	$_SESSION['sapid']=$stusapid;
	}

	if($numrows==0)
	{
		$numrows=1;
		header("Location: studentlogin.php");
	}
	
	while($row=mysqli_fetch_assoc($query))
    {  
      $stustatus=$row['status'];
	}
	$_SESSION['sessionstatus']=$stustatus;

	if($stustatus==1)
	{
		$stustatus=0;
		header("Location: studentlogin.php");
	}


	while($row1 = mysqli_fetch_array($query1))
    { 
      $sem1[]=$row1;
	}
	
	
	$query2=mysqli_query($con,"SELECT * FROM student_subjects WHERE SAPID='".$stusapid."'");
	$numrows2=mysqli_num_rows($query2);
	
	 while($row2=mysqli_fetch_assoc($query2))
    {  
	 $backlog1=$row2['backlog1'];
	 $backlog2=$row2['backlog2'];
	 $backlog3=$row2['backlog3'];
	 $backlog4=$row2['backlog4'];
	 $unchecked1=$row2['nr1'];
	 $unchecked2=$row2['nr2'];
	 $unchecked3=$row2['nr3'];
	 $unchecked4=$row2['nr4'];
	 $elect1=$row2['elective1'];
	 $elect2=$row2['elective2'];
	 
	}
	

?>

<h4><table align="center" width="">
<tr>
  <td>Name&nbsp;</td>
  <td><?php echo $stuname; ?></td>
</tr>

<tr>
  <td>Surname&nbsp;</td>
  <td><?php echo $stusurname; ?></td>
</tr>

<tr>
  <td>SAP ID&nbsp;</td>
  <td><?php echo $stusapid; ?></td>
</tr>

<tr>
  <td>Date Of Birth&nbsp;</td>
  <td><?php echo $studob; ?></td>
</tr>

<tr>
  <td>Age&nbsp;</td>
  <td><?php echo $stuage; ?></td>
</tr>

<tr>
  <td>Course&nbsp;</td>
  <td><?php echo $stucourse; ?></td>
</tr>

<tr>
  <td>Semester&nbsp;</td>
  <td><?php echo $stusemester; ?></td>
</tr>
</table></h4>
<br>
<?php
$count=1;
if($backlog1!="" || $backlog2!="" || $backlog3!="" || $backlog4!="" || $unchecked1!="" || $unchecked2!="" || $unchecked3!="" || $unchecked4!="")
{
	$backlog=1;
}
else
{
	$backlog=0;
}
$sqlb="UPDATE student_subjects SET backlog='$backlog' WHERE SAPID='".$stusapid."'";
if(mysqli_query($con, $sqlb))
{

echo '<center><h3><b>Subjects Cleared<b></h3></center>';
echo '<div align="center">';
echo '<a href="http://localhost:81/SOPHOMORE/studentprofilesem1.php">';
echo '<button type="submit" class="btn btn-success">VIEW</button>';
echo '</a>';
echo '</div>';
}	
	
?>



</body>
</html>  