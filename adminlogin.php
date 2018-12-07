<!doctype html>  
<html>  
<head>   <link rel="stylesheet" href="registerstyle.css">
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet"></head>
<body style="background: linear-gradient(to right, darkslateblue 0%, darkturquoise 96%);">  
    
	&nbsp;
    &nbsp; 
	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="studentregistration.php">Student Registration</a>
  <a href="studentlogin.php">Student Login</a>
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
<center><img src="logo.png" height="65" width="120"></img></center>
<div class="loginBox" href="registerstyle.css">
 <h2>Sophomore Admin Login</h2>
<form action="adminhomepage.php" method="POST">  
<p>Username : </p>
<input type="text" name="user" placeholder="Enter Email" required>
  <p>Password : </p>
                <input type="password" name="pass" placeholder="Enter your password" required>
                <input type="submit" name="submit" value="Sign In">
            </form>
</div> 
</center> 
<?php
session_start();
$_SESSION['sessionrowsa'];
if($_SESSION['sessionrowsa']==0)
{
	echo "<script type='text/javascript'>alert('You have entered wrong username and password!!!')</script>";
	$_SESSION['sessionrowsa']=1;
}
?>
&nbsp;
&nbsp;
<?php  
if(isset($_POST["submit"]))
 {  
  
    if(!empty($_POST['user']) && !empty($_POST['pass'])) 
	{  
     $user=$_POST['user'];  
     $pass=$_POST['pass']; 
  
    $con=mysqli_connect('localhost','root','') or die(mysql_error());  
    mysqli_select_db($con,'sophomore') or die("cannot select DB");  
  
    $query=mysqli_query($con,"SELECT * FROM admin_login WHERE Username='".$user."' AND Password='".$pass."'");  
    $numrows=mysqli_num_rows($query);  
    if($numrows!=0)  
    {  
    while($row=mysqli_fetch_assoc($query))  
    {  
    $adminusername=$row['Username'];  
    $adminpassword=$row['Password'];  
    }  
  
    if($user == $adminusername && $pass == $adminpassword)  
    {  
    $_SESSION['adminuser']=$user; 
	$_SESSION['adminpass']=$pass;
  
    /* Redirect browser */  
    header("Location: adminhomepage.php");  
    }  
    } else {  
    echo "Invalid username or password! Please try again!!";  
    }  
  
} else {  
    echo "All fields are required!";  
}  
}  
?>  
</body>  
</html>   