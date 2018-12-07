<!doctype html>  
<html>  
<head>   <link rel="stylesheet" href="registerstyle.css">
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head> 
   
<body  style="background: linear-gradient(to right, darkslateblue 0%, darkturquoise 96%);">   <br>
	<br>
	<br>
	<br>
	<h4><object align="right" width="190"><a href ="adminlogin.php" class="text-dark" onclick="alert('You have logged out successfully!!;') <?php session_destroy(); ?>">Logout</a></object></h4>
	&nbsp;
	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="coursereginfo.php">Course Details</a>
  <a href="adminprofileedit.php">Edit Self information</a>
  <a href="adminstuedit.php">Edit Student Info </a>
  <a href="about.php">About Us</a>
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
	<center><img src="logo.png"></img></center>
	<br>
	&nbsp;
	&nbsp;
	&nbsp;
	&nbsp;
     <center><h1></h1></center>  
 &nbsp;
&nbsp;

<form method="POST">
<center><h4><b>Student Edit & Account Management</b></h4></center> <br> 
<center><h4>SAP ID: <input type="text" name="search"><br /></h4>  </center> 
&nbsp;
&nbsp;
<center><input type="submit" value="Search" name="submit" class="btn btn-success" > </center><br>
</form>  
<br>
<?php  
  session_start();
  
  global $x,$search,$y,$sturollno;
  $con=mysqli_connect('localhost','root','') or die(mysql_error());  
  mysqli_select_db($con,'sophomore') or die("cannot select DB");

  if(isset($_POST["submit"]))
 {   
  $search=$_POST['search'];
  $query=mysqli_query($con,"SELECT * FROM student_registration WHERE sap_id='".$search."'"); 
  $numrows=mysqli_num_rows($query);
  $x=0;
  $y=1;
 
  if($numrows>0)
  {
   if(!empty($_POST['search'])) 
	{   
while($row=mysqli_fetch_assoc($query))
{	
	 $stuname=$row['fname'];
	 $stusurname=$row['lname'];
	 $stusapid=$row['sap_id'];
	 $studob=$row['dob'];
	 $stuage=$row['age'];
	 $stucourse=$row['course'];
	 $stusemester=$row['semester'];
	 $stustatus=$row['status'];
	 $sturollno=$row['roll_no'];
	 $_SESSION['adminstusapid']=$stusapid;
	}
	}
 

echo '<h4><table align="center" width="">';
echo '<tr>';
echo '<td>';
echo "Name: ";    
echo '&nbsp';
echo '</td>';
echo '<td>';
echo $stuname;
echo '</td>';
echo '</tr>';

echo '<h4><table align="center" width="">';
echo '<tr>';
echo '<td>';
echo "Surname: ";    
echo '&nbsp';
echo '</td>';
echo '<td>';
echo $stusurname;
echo '</td>';
echo '</tr>';

echo '<h4><table align="center" width="">';
echo '<tr>';
echo '<td>';
echo "SAP ID: ";    
echo '&nbsp';
echo '</td>';
echo '<td>';
echo $stusapid;
echo '</td>';
echo '</tr>';

echo '<h4><table align="center" width="">';
echo '<tr>';
echo '<td>';
echo "DOB: ";    
echo '&nbsp';
echo '</td>';
echo '<td>';
echo $studob;
echo '</td>';
echo '</tr>';

echo '<h4><table align="center" width="">';
echo '<tr>';
echo '<td>';
echo "Age: ";    
echo '&nbsp';
echo '</td>';
echo '<td>';
echo $stuage;
echo '</td>';
echo '</tr>';

echo '<h4><table align="center" width="">';
echo '<tr>';
echo '<td>';
echo "Course: ";    
echo '&nbsp';
echo '</td>';
echo '<td>';
echo $stucourse;
echo '</td>';
echo '</tr>';

echo '<h4><table align="center" width="">';
echo '<tr>';
echo '<td>';
echo "Semester: ";    
echo '&nbsp';
echo '</td>';
echo '<td>';
echo $stusemester;
echo '</td>';
echo '</tr>';

echo '</table>';
echo '</h4>';
echo '<br>';
echo '<div align="center">';
echo '<a href="http://localhost/sop/SOPHOMORE/adminstuedit.php">';
echo '<button type="submit" class="btn btn-success">Edit</button>';
echo '</a>';
echo '&nbsp';
echo '&nbsp';
echo '<form method="post">';
echo '<center>';
echo '<input type="submit" value="Enable" name="enabled" class="btn btn-success">'; 
echo '&nbsp';
echo '&nbsp';
echo '<input type="submit" value="Disable" name="disabled" class="btn btn-success">'; 
echo '</center>';
echo '<a href="http://localhost/sop/SOPHOMORE/adminhomepage.php">';
echo '<br>';
echo '<button type="submit" class="btn btn-success">Back to Homepage</button>';
echo '</a>';
echo '</form>';
echo '</div>';
  }

 else
 {
	 echo "<script type='text/javascript'>alert('No results found!!')</script>";
 }
 }
?>

<?php

$abc=$_SESSION['adminstusapid'];

if(isset($_POST["enabled"])){
	$sqla="UPDATE student_registration SET status=0 WHERE sap_id='".$abc."'";
	if(mysqli_query($con, $sqla)){
		echo "<script type='text/javascript'>alert('The account has been enabled!!')</script>";
}
}

if(isset($_POST["disabled"])){
	$sqlb="UPDATE student_registration SET status=1 WHERE sap_id='".$abc."'";
	if(mysqli_query($con, $sqlb)){
		echo "<script type='text/javascript'>alert('The account has been disabled!!')</script>";
}
}


?>

 </body>
 </html>