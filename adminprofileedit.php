<!doctype html>  
<html>  
   <head>
<link rel="stylesheet" href="registerstyle.css">
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
	<center><img src="logo.png" height="65" width="120"></img></center>
    <br>
	&nbsp;
	&nbsp;
	<br>
     <center><h1>Edit Information</h1></center>  
<center>
<div class="registerBox" href="registerstyle.css">
<form method="POST">  
<center><p>Old Password:</p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="opassword"><br>
<center><p>New Password:</p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="password" name="npassword"><br>
<center><p>First Name:</p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="fname"><br>
<center><p>Last Name:</p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type ="text" name="lname"><br><br>
<center><input type="submit" value="Submit" name="submit" /> </center>

</form>  
</div>
</center>
<?php
    
		
	session_start();
	global $un,$pw,$aname,$asurname;
	$u=$_SESSION['adminuser'];
	$p=$_SESSION['adminpass'];
	$con=mysqli_connect('localhost','root','') or die(mysql_error());  
    mysqli_select_db($con,'sophomore') or die("cannot select DB");
    $query=mysqli_query($con,"SELECT * FROM admin_profile WHERE Username='".$u."' AND Password='".$p."'");
	$numrows=mysqli_num_rows($query);
	$pw=0;
	
	if(isset($_POST["submit"])){
	while($row = mysqli_fetch_array($query))
    { 
      $aname=$row['fname'];
	  $asurname=$row['lname'];
	}
	
	if($_POST['fname']!="")
	{
		$aname=$_POST['fname'];
	}
    if($_POST['lname']!="")
	{
		$asurname=$_POST['lname'];
	}
	if($_POST['opassword']!="" && $_POST['npassword']!="" && $_POST['opassword']!=$p)
	{
		echo "<script type='text/javascript'>alert('You have entered a wrong password!!!')</script>";
	}
	
    else if($_POST['opassword']!="" && $_POST['npassword']!="" && $_POST['opassword']==$p)
	{
		$p=$_POST['npassword'];
		$sqla="UPDATE admin_profile SET fname='$aname',lname='$asurname',Password='$p' WHERE Username='".$u."'";
	    $sqlb="UPDATE admin_login SET Password='$p' WHERE Username='".$u."'";
	
	if(mysqli_query($con, $sqla) && mysqli_query($con, $sqlb))
	{
		echo $p;
		echo "<script type='text/javascript'>alert('You have changed your details successfully!!!')</script>";
	}

	}
	else
	{
	}
	}
	
?>