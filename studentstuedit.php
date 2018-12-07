<!doctype html>  
<html>  
<head>   <link rel="stylesheet" href="registerstyle.css">
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
   
<body style="background: linear-gradient(to right, darkslateblue 0%, darkturquoise 96%);">  
    <br>
	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="subjectregistration.php">Subject Registration</a>
  <a href="#">About</a>
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
<h4><object align="right" width="190"><a href ="studentlogin.php" class="text-dark"  onclick="alert('You have logged out successfully!!;') <?php session_destroy(); ?>">Logout</a></object></h4>
	&nbsp;
	&nbsp;
	<center><img src="logo.png"></img></center>
	&nbsp;
	&nbsp;
	<br>
     <center><h1>Edit Information</h1></center>  
 &nbsp;
&nbsp;
<div class="registerBox" href="registerstyle.css">
<form method="POST">  
<center><p>Old Password:</p>
	<input type="password" name="opassword"><br>
<center><p>New Password:</p>
 <input type="password" name="npassword"><br>
<center><p>First Name:</p>
 <input type="text" name="fname"><br>
<center><p>Last Name:</p>
	<input type ="text" name="lname"><br>
<center><p>Email ID:</p>
	<input type="email" name="emailid"><br>
<center><input type="submit" value="Submit" name="submit"></center>

</form>  
</div>

<?php
    
		
	session_start();
	global $un,$pw,$stuname,$stusurname,$stuemail;
	$u=$_SESSION['user'];
	$p=$_SESSION['pass'];
	$con=mysqli_connect('localhost','root','') or die(mysql_error());  
    mysqli_select_db($con,'sophomore') or die("cannot select DB");
    $query=mysqli_query($con,"SELECT * FROM student_registration WHERE username='".$u."' AND password='".$p."'");
	$numrows=mysqli_num_rows($query);
	$pw=0;
	
	if(isset($_POST["submit"])){
	while($row = mysqli_fetch_array($query))
    { 
      $stuname=$row['fname'];
	  $stusurname=$row['lname'];
	  $stuemail=$row['email_id'];
	}
	
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
	
	if($_POST['opassword']!="" && $_POST['npassword']!="" && $_POST['opassword']!=$p)
	{
		echo "<script type='text/javascript'>alert('You have entered a wrong password!!!')</script>";
	}
	
	
	
	$sqla="UPDATE student_registration SET fname='$stuname',lname='$stusurname',email_id='$stuemail',password='$p' WHERE username='".$u."'";
	$sqlb="UPDATE student_login SET Password='$p' WHERE Username='".$u."'";
	
	if($_POST['opassword']!="" && $_POST['npassword']!="" && $_POST['opassword']==$p)
	{
		$p=$_POST['npassword'];
	
	if(mysqli_query($con, $sqla) && mysqli_query($con, $sqlb))
	{
		echo "<script type='text/javascript'>alert('You have changed your details successfully!!!')</script>";
		session_destroy();
	}

	}
	else
	{
	}
	}
	
?>

</body>
</html>