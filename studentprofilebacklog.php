<!DOCTYPE html>
<html> 
<?php
include'abcadmin.css';
?>
<body>  
<br>
	<br>
	<br>
	<br>
	<h4><object align="right" width="190"><a href ="studentlogin.php" onclick="alert('You have logged out successfully!!;') <?php session_destroy(); ?>">Logout</a></object></h4>
	<h4><object align="right" width="190"><a href ="studentstuedit.php">Edit Profile</a></object></h4>
	<h4><object align="right" width="190"><a href ="subjectregistration.php">Subject Registration</a></object></h4>
	&nbsp;
	&nbsp;
	&nbsp;
	&nbsp;
	<br>
	<br>
	<br>
	<br>
     <center><h1>Student Information</h1></center> 
	 &nbsp;
     &nbsp;

<?php
    
	session_start();
	$u=$_SESSION['user'];
	$p=$_SESSION['pass'];
	global $backlog1;
	global $backlog2;
	global $backlog3;
	global $backlog4;
	global $unchecked1;
	global $unchecked2;
	global $unchecked3;
	global $unchecked4;
	global $elect1;
	global $elect2;
	global $i;
	$count=0;
	$con=mysqli_connect('localhost','root','') or die(mysql_error());  
    mysqli_select_db($con,'sophomore') or die("cannot select DB");
	
	$query=mysqli_query($con,"SELECT * FROM student_registration WHERE username='".$u."' AND password='".$p."'"); 
    $numrows=mysqli_num_rows($query);
	$query1=mysqli_query($con,"SELECT * FROM sbmp_subjects WHERE semester='6'");
	$numrows1=mysqli_num_rows($query1);
    $_SESSION['sessionrows']=$numrows;
	 
    while($row=mysqli_fetch_assoc($query))
    {  
	$stuname=$row['fname'];
	$stusurname=$row['lname'];
	$stusapid=$row['sap_id'];
	$studob=$row['dob'];
	$stuage=$row['age'];
	$stucourse=$row['course'];
	$stusemester=$row['semester'];
	$_SESSION['sapid']=$stusapid;
	}
	
	while($row1 = mysqli_fetch_array($query1))
    { 
      $backlog1=$row1['backlog1'];
	  $backlog2=$row1['backlog2'];
	  $backlog3=$row1['backlog3'];
	  $backlog4=$row1['backlog4'];
	  $nr1=$row1['nr1'];
	  $nr2=$row1['nr2'];
	  $nr3=$row1['nr3'];
	  $nr4=$row1['nr4'];
	}
	
	
	$query2=mysqli_query($con,"SELECT * FROM student_subjects WHERE SAPID='".$stusapid."'");
	$numrows2=mysqli_num_rows($query1);
	
	 while($row2=mysqli_fetch_assoc($query1))
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
  <td>Name    </td>
  <td><?php echo $stuname; ?></td>
</tr>

<tr>
  <td>Surname    </td>
  <td><?php echo $stusurname; ?></td>
</tr>

<tr>
  <td>SAP ID    </td>
  <td><?php echo $stusapid; ?></td>
</tr>

<tr>
  <td>Date Of Birth    </td>
  <td><?php echo $studob; ?></td>
</tr>

<tr>
  <td>Age    </td>
  <td><?php echo $stuage; ?></td>
</tr>

<tr>
  <td>Course    </td>
  <td><?php echo $stucourse; ?></td>
</tr>

<tr>
  <td>Semester    </td>
  <td><?php echo $stusemester; ?></td>
</tr>
</table></h4>
<br>
<?php
$count=1;

echo '<center><h4><b>Subjects Pending<b></h4></center>';
echo '<div align="center">';
echo '<a href="http://localhost:81/SOPHOMORE/studentprofilesem5.php">';
echo '<button type="submit">Previous</button>';
echo '</a>';
echo '</div>';
echo '<table class="a" align="center" border="1">';
echo '<tr>';
	echo '<td>';
	echo '<h4>';
    echo "Subject";
	echo '</h4>';
	echo '</td>';
	echo '<td>';
	echo '<h4>';
    echo "Subject Code";
	echo '</h4>';
	echo '</td>';
	echo '<td>';
	echo '<h4>';
    echo "Semester";
	echo '</h4>';
	echo '</td>';
	echo '<td>';
	echo '<h4>';
    echo "Credits";
	echo '</h4>';
	echo '</td>';
	echo '</tr>';
    echo "<br>";

if($backlog1==1)
{

    echo '<table class="j" align="center" border="1">';
	echo '<tr>';
	echo '<td>';
	echo '<h4>';
    echo $sem6[$x]['subject'];
	echo '</h4>';
	echo '</td>';
	echo '<td>';
	echo '<h4>';
    echo $sem6[$x]['subject_code'];
	echo '</h4>';
	echo '</td>';
	echo '<td>';
	echo '<h4>';
    echo $sem6[$x]['semester'];
	echo '</h4>';
	echo '</td>';
	echo '<td>';
	echo '<h4>';
    echo $sem6[$x]['credits'];
	echo '</h4>';
	echo '</td>';
	echo '</tr>';
    echo "<br>";
   
}

else
{
}

?>



</body>
</html>  