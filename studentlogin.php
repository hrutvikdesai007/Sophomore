<!doctype html>  
<html>  
<head>
<link rel="stylesheet" href="registerstyle.css">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet"></head>
   
   
<body style="background: linear-gradient(to right, darkslateblue 0%, darkturquoise 96%);">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">  
    
	<!-- Sidebar -->
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="studentregistration.php">Student Registration</a>
  <a href="adminlogin.php">Administrator Login</a>
  <a href="about.php">About</a>
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
    <center><img src="logo.png" height="65" width="120"></img></center>
    <br>
    <br>
    
   <div class="loginBox" href="registerstyle.css">
    <h2>Sophomore Login</h2>
<form action="studentprofile.php" method="POST">  
<p>Username : </p>
<input type="text" name="user" placeholder="Enter Email" required>
<p>Password : </p>
<input type="password" name="pass" placeholder="Enter your password" required>
<input type="submit" name="submit" value="Sign In">
            
</form>  
</div>
	<br>
	<br>
	<br>  

<?php
session_start();
$_SESSION['sessionstatus'];
$_SESSION['sessionrows'];
if($_SESSION['sessionrows']==0)
{
	echo "<script type='text/javascript'>alert('You have entered wrong username and password!!!')</script>";
	$_SESSION['sessionrows']=1;
}

if($_SESSION['sessionstatus']==1)
{
	echo "<script type='text/javascript'>alert('Your account has been disabled!!!')</script>";
	$_SESSION['sessionstatus']=0;
}

?>

&nbsp;
&nbsp;

<?php  
global $stustatus;
if(isset($_POST["submit"])){  
  
if(!empty($_POST['user']) && !empty($_POST['pass'])) {  
    $user=$_POST['user'];  
    $pass=$_POST['pass'];  
  
    $con=mysqli_connect('localhost','root','') or die(mysql_error());  
    mysqli_select_db($con,'sophomore') or die("cannot select DB");  
  
    $query=mysqli_query($con,"SELECT * FROM student_login WHERE Username='".$user."' AND Password='".$pass."'");  
    $numrows=mysqli_num_rows($query);  
	$query1=mysqli_query($con,"SELECT * FROM student_registration WHERE Username='".$user."' AND Password='".$pass."'");  
    $numrows1=mysqli_num_rows($query1);  
	

    if($numrows!=0)  
    {  
    while($row=mysqli_fetch_assoc($query))  
    {  
    $stuusername=$row['Username'];  
    $stupassword=$row['Password'];  
    }  
	while($row1=mysqli_fetch_assoc($query1))  
    {  
     $stustatus=$row1['status'];  
    }  
   
    if($user == $stuusername && $pass == $stupassword)  
    {  
    $_SESSION['sess_user']=$user;
	 
    header("Location: studentprofile.php");  
    }  
     else {  
    echo "Invalid username or password!";  
    }  
  
	 }else {  
    echo "All fields are required!";  

}
}

}
  
?>  
</body>  
</html>   