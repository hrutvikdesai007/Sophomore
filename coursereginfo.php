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
<center><img src="logo.png" height="65" width="120"></img></center>
	&nbsp;
	&nbsp;
	&nbsp;
	<br>
	<br>
	<br>
	<br>
     <center><h1>Course Information</h1></center>  
 &nbsp;
&nbsp;

<form method="POST">  
<center><h4>Backlog(Subject Code):</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="bl1"><br><br><br>
<center><input type="submit" value="Submit" name="submit"  class="btn btn-success"/> </center>

</form>  

<?php
    
		
	session_start();
	global $un,$pw,$stuname,$stusurname,$stuemail,$cou,$backlog1,$backlog2,$backlog3,$backlog4,$backlog,$x;
	$sapid=$_SESSION['adminstusapid'];
	$con=mysqli_connect('localhost','root','') or die(mysqli_error());  
    mysqli_select_db($con,'sophomore') or die("cannot select DB");
    $query=mysqli_query($con,"SELECT * FROM student_subjects WHERE SAPID='".$sapid."'");
	$query1=mysqli_query($con,"SELECT * FROM student_registration WHERE sap_id='".$sapid."'" );
	$numrows=mysqli_num_rows($query);
	$numrows1=mysqli_num_rows($query1);
	$sapidinfo=array();
	
	if(isset($_POST["submit"])){
	
	$search=$_POST['bl1'];
	$query2=mysqli_query($con,"SELECT * FROM sbmp_subjects WHERE subject_code='".$search."'" );
	$numrows2=mysqli_num_rows($query2);
	while($row2 = mysqli_fetch_array($query2))
    { 
      $backlog=$row2['subject'];
	  $subsemester=$row2['semester'];
	  $subjectcode=$row2['subject_code'];
	  $credits=$row2['credits'];
	}
	echo "SUBJECT :- ";
	echo $backlog;
	echo "<br>";
	echo "SEMESTER :- ";
	echo $subsemester;
	echo "<br>";
	echo "SUBJECT CODE :- ";
	echo $subjectcode;
	echo "<br>";
	echo "CREDITS :- ";
	echo $credits;
	$query3=mysqli_query($con,"SELECT * FROM student_subjects WHERE Subject1='".$backlog."'");
	$numrows3=mysqli_num_rows($query3);
	while($row3 = mysqli_fetch_array($query3))
    { 
      $sapidinfo[]=$row3;
	}
	$query4=mysqli_query($con,"SELECT * FROM student_subjects WHERE Subject2='".$backlog."'");
	$numrows4=mysqli_num_rows($query4);
	while($row4 = mysqli_fetch_array($query4))
    { 
      $sapidinfo[]=$row4;
	}
	$query5=mysqli_query($con,"SELECT * FROM student_subjects WHERE Subject3='".$backlog."'");
	$numrows5=mysqli_num_rows($query3);
	while($row5 = mysqli_fetch_array($query5))
    { 
      $sapidinfo[]=$row5;
	}
	$query6=mysqli_query($con,"SELECT * FROM student_subjects WHERE Subject4='".$backlog."'");
	$numrows6=mysqli_num_rows($query6);
	while($row6 = mysqli_fetch_array($query6))
    { 
      $sapidinfo[]=$row6;
	}
	$query7=mysqli_query($con,"SELECT * FROM student_subjects WHERE Subject5='".$backlog."'");
	$numrows7=mysqli_num_rows($query7);
	while($row7 = mysqli_fetch_array($query7))
    { 
      $sapidinfo[]=$row3;
	}
	$query8=mysqli_query($con,"SELECT * FROM student_subjects WHERE Subject6='".$backlog."'");
	$numrows8=mysqli_num_rows($query8);
	while($row8 = mysqli_fetch_array($query8))
    { 
      $sapidinfo[]=$row3;
	}
	$query9=mysqli_query($con,"SELECT * FROM student_subjects WHERE Subject7='".$backlog."'");
	$numrows9=mysqli_num_rows($query9);
	while($row9 = mysqli_fetch_array($query9))
    { 
      $sapidinfo[]=$row3;
	}
    $fnumrows=$numrows3+$numrows4+$numrows5+$numrows6+$numrows7+$numrows8+$numrows9;
	echo '<table class="a" align="center" border="1">';
    echo '<tr>';
	echo '<td>';
	echo '<h4>';
    echo "SAP ID";
	echo '</h4>';
	echo '</td>';
    echo '</tr>';
	echo '</table>';
    echo "";

for($x=0; $x<($fnumrows-1); $x++)
{
    echo '<table class="a" align="center" border="1">';
	echo '<tr>';
	echo '<td>';
	echo '<h4>';
    echo $sapidinfo[$x]['SAPID'];
	echo '</h4>';
	echo '</td>';
	echo '</tr>';
    echo "";
   
}
}

?>

</body>
</html>