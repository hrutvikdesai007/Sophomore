<!DOCTYPE html>
<html>
<head>   <link rel="stylesheet" href="registerstyle.css">
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body style="background: linear-gradient(to right, darkslateblue 0%, darkturquoise 96%);">
<br>
<br>
	<h5><object align="right" width="190"><a href ="studentlogin.php" class="text-dark" onclick="alert('You have logged out successfully!!;') <?php session_destroy(); ?>">Logout</a></object></h5>
<br>
<br>
	<center><img src="logo.png"></img></center>
    <br>
    <br>
<br>


<?php $u=$_POST['user']; $p=$_POST['pass']; ?>

<?php
	session_start();
	$_SESSION['adminuser']=$u;
	$_SESSION['adminpass']=$p;
	$_SESSION['adminstusapid']=0;
	$con=mysqli_connect('localhost','root','') or die(mysql_error());  
    mysqli_select_db($con,'sophomore') or die("cannot select DB");
	
	$query=mysqli_query($con,"SELECT fname,lname FROM admin_profile WHERE Username='".$u."' AND Password='".$p."'"); 
    $numrows=mysqli_num_rows($query);  
    $_SESSION['sessionrowsa']=$numrows; 	
	if($numrows==0)
	{
		$numrows=1;
		header("Location: adminlogin.php");
		
	}
    else    
    {  
    while($row=mysqli_fetch_assoc($query))
    {  
    echo "<script type='text/javascript'>alert('You have logged in Successfully!!!')</script>";
	$adminfname=$row['fname'];	
	$adminlname=$row['lname'];
	}
	}
?>
	<center><h1>Welcome <?php echo $adminfname; ?> <?php echo $adminlname; ?></h1></center>
	<br> 
	<br>
	<br>
	<br>
	<center><a href="studentsearch.php"><button type="button" class="btn btn-success">Student Search</button></a></center><br>
	<center><a href="adminstucontrol.php"><button type="button" class="btn btn-success">Student Edit & Account Management</button></a></center><br>
	<center><a href="coursereginfo.php"><button type="button" class="btn btn-success">Course Information</button></a></center><br>
	<center><a href="adminprofileedit.php"><button type="button" class="btn btn-success">Editing your profile</button></a></center><br>

</body>
</html>