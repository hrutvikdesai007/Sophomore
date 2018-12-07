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
	<h4><object align="right" width="190"><a href ="adminlogin.php"  class="text-dark" onclick="alert('You have logged out successfully!!;') <?php session_destroy(); ?>">Logout</a></object></h4>
	<br>
	   
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
</script>
	<center><img src="logo.png"></img></center>
    <br>
	<br>
	<br>
	&nbsp;
     <center><h1></h1></center>  
 &nbsp;
&nbsp;

<form action="" method="POST">
<center><h4><b>Student Search</b></h4></center>  
<center><input type="text" name="search"><br />  </center> 
&nbsp;
&nbsp;
<center><input type="submit" value="Search" name="submit" class="btn btn-success"/> </center>
</form>  

<?php  
$result = array();

if(isset($_POST["submit"]))
 {  
  session_start();
  $search=$_POST['search'];
  $con=mysqli_connect('localhost','root','') or die(mysql_error());  
  mysqli_select_db($con,'sophomore') or die("cannot select DB");
  $query=mysqli_query($con,"SELECT * FROM student_registration WHERE fname='".$search."'");  
  $numrows=mysqli_num_rows($query);
   if(!empty($_POST['search'])) 
	{   
    if($numrows!=0)  
    {  
    while($row=mysqli_fetch_assoc($query))  
    { 
	 $result[]=$row;
	}
for($x=0; $x<$numrows; $x++)
{
echo '<h4><table align="center" width="100%">';
echo '<tr>';
echo '<td>Name</td>';
echo '<td>Surname</td>';
echo '<td>SAP ID</td>';
echo '<td>Date Of Birth</td>';
echo '<td>Age</td>';
echo '<td>Course</td>';
echo '<td>Semester</td>';
echo '</tr>';
echo '<tr>';
echo '<td>';
echo $result[$x]['fname'];
echo '</td>';
echo '<td>';
echo $result[$x]['lname'];
echo '</td>';
echo '<td>';
echo $result[$x]['sap_id'];
echo '</td>';
echo '<td>';
echo $result[$x]['dob'];
echo '</td>';
echo '<td>';
echo $result[$x]['age'];
echo '</td>';
echo '<td>';
echo $result[$x]['course'];
echo '</td>';
echo '<td>';
echo $result[$x]['semester'];
echo '</td>';
echo '</tr>';
echo '</table></h4>';
    }  
	}
else
{
	echo "<script type='text/javascript'>alert('Sorry!! No such student found!!')</script>";
}

	}
else
{
	echo "<script type='text/javascript'>alert('Please enter a value in the search field!!')</script>";
}
 }
	?>

</body>
</html>  