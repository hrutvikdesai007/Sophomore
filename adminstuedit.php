<!doctype html>  
<html>  
<head>   <link rel="stylesheet" href="registerstyle.css">
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
 
   
<body style="background: linear-gradient(to right, darkslateblue 0%, darkturquoise 96%);">  
    <br>
	<br>
	<br>
	<br>
	<h4><object align="right" width="190"><a href ="adminlogin.php" class="text-dark" onclick="alert('You have logged out successfully!!;') <?php session_destroy(); ?>">Logout</a></object></h4>
	&nbsp;
	&nbsp;
	<center><img src="logo.png"></img></center>
	&nbsp;
	&nbsp;
	<br>
	<br>
	<br>
	<br>
     <center><h1>Edit Information</h1></center>  
 &nbsp;
&nbsp;
<div class="registerBox" href="registerstyle.css">
<form method="POST"> 
<center><p>Backlog(Subject Code):</p>
	<input type="text" name="bl1"><br>
<center><p>Name:</p>
	<input type="text" name="fname"><br>
<center><p>Surname:</p>
 <input type="text" name="lname"><br>
<center><p>Email ID:</p>
 <input type="email" name="emailid"><br>
<center><input type="submit" value="Submit" name="submit"></center>
</h4>
</form>  
</center>
</div>

<?php
    
		
	session_start();
	global $un,$pw,$stuname,$stusurname,$stuemail,$cou,$backlog1,$backlog2,$backlog3,$backlog4,$backlog;
	$sapid=$_SESSION['adminstusapid'];
	$con=mysqli_connect('localhost','root','') or die(mysql_error());  
    mysqli_select_db($con,'sophomore') or die("cannot select DB");
    $query=mysqli_query($con,"SELECT * FROM student_subjects WHERE SAPID='".$sapid."'");
	$query1=mysqli_query($con,"SELECT * FROM student_registration WHERE sap_id='".$sapid."'" );
	$numrows=mysqli_num_rows($query);
	$numrows1=mysqli_num_rows($query1);
	$cou=0;
	
	if(isset($_POST["submit"])){
	while($row = mysqli_fetch_array($query))
    { 
      $backlog1=$row['backlog1'];
	  $backlog2=$row['backlog2'];
	  $backlog3=$row['backlog3'];
	  $backlog4=$row['backlog4'];
	}
	
	$search=$_POST['bl1'];
	$query2=mysqli_query($con,"SELECT * FROM sbmp_subjects WHERE subject_code='".$search."'" );
	$numrows2=mysqli_num_rows($query2);
	while($row2 = mysqli_fetch_array($query2))
    { 
      $backlog=$row2['subject'];
	}
	if($backlog==$backlog1 || $backlog==$backlog2 || $backlog==$backlog3 || $backlog==$backlog4)
	{
	   echo "<script type='text/javascript'>alert('The subject is already in the student backlog!!')</script>";
	}
	else
	{
	if($_POST['fname']!="")
	{
		$stuname=$_POST['fname'];
	}
    if($_POST['lname']!="")
	{
		$stusurname=$_POST['lname'];
	}
	if($_POST['emailid']!="")
	{
		$stuemail=$_POST['emailid'];
	}
	if($backlog1=="")
	{
		$backlog1=$backlog;
	}
	
	else if($backlog2=="")
	{
      $backlog2=$backlog;
	}

	else if($backlog3=="")
	{
      $backlog3=$backlog;
	}
	
	else if($backlog4=="")
	{
      $backlog4=$backlog;
	}
	else
	{
		echo "<script type='text/javascript'>alert('The student backlog has reached limit!!')</script>";
	}
	

echo $backlog;
  $sqla="UPDATE student_subjects SET backlog1='$backlog1',backlog2='$backlog2',backlog3='$backlog3',backlog4='$backlog4' WHERE SAPID='".$sapid."'";
  $sqlb="UPDATE student_registration SET fname='$stuname',lname='$stusurname',email_id='$stuemail' WHERE sap_id='".$sapid."'";
if(mysqli_query($con, $sqlb))
{
	if(mysqli_query($con, $sqla))
	{
		echo "<script type='text/javascript'>alert('You have changed the details successfully!!!')</script>";
		session_destroy();
	}

	else
	{
		echo "<script type='text/javascript'>alert('Changing Details Unsucessfull!!!')</script>";
	}
	}
	}

	}
	
?>

</body>
</html>