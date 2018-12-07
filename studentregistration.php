<!doctype html>  
<html>    
<title>Student Registration </title>  
<link rel="stylesheet" href="registerstyle.css">


 <body style="background: linear-gradient(to right, darkslateblue 0%, deepskyblue 96%);">
<center><img src="logo.png" height="65" width="120"></img></center>

<br>
<br>
<div class="registerBox" href="registerstyle.css">
<form method="POST">
    <center>
            <h2>Register here</h2><br>
            <h3>
                First Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="fname" required><br>
                Last Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type ="text" name="lname" required><br>
                SAP ID: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="double" name="sapid"><br>
                ROLL NO: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="number" name="roll_no" required><br>
                Course: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="course" required><br>
                Semester: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="semester" required><br>
                DOB: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="dob"><br>
                Age: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="age"><br>
                Email ID: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="email" name="emailid"><br>
                Username: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="username" required><br>
                Password: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="password" name="password" required><br><br>
            </h3>
			<center><input type="submit" name="submit" value="Submit"></center>
    </center>

</div>

<?php 
    
    if(isset($_POST["submit"])){
 
	$con=mysqli_connect('localhost','root','') or die(mysql_error());  
    mysqli_select_db($con,'sophomore') or die("cannot select DB");

	$fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $sapid = $_POST['sapid'];
	$rollno = $_POST['roll_no'];
	$course = $_POST['course'];
	$semester = 0;
	$dob = $_POST['dob'];
	$age = $_POST['age'];
	$emailid = $_POST['emailid'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$stuyear=date("Y");
	$nextregister=date("m");
	$backlog=0;
	
	$querya=mysqli_query($con,"SELECT * FROM student_registration WHERE sap_id='".$sapid."'"); 
    $numrowsa=mysqli_num_rows($querya);
	$queryb=mysqli_query($con,"SELECT * FROM student_registration WHERE roll_no='".$rollno."'"); 
    $numrowsb=mysqli_num_rows($queryb);
	if($numrowsa>0 || $numrowsb>0)
	{
		echo "<script type='text/javascript'>alert('Account already registered!!!')</script>";
	}
	else
	{
	$sql1="INSERT INTO student_registration (fname, lname, sap_id, roll_no, course, semester, dob, age, email_id, username, password, stuyear) VALUES ('$fname', '$lname', '$sapid', '$rollno', '$course', '$semester', '$dob', '$age', '$emailid', '$username', '$password', '$stuyear')";
	$sql2="INSERT INTO student_login (Username, Password) VALUES ('$username', '$password')";
	$sql3="INSERT INTO student_subjects (backlog, SAPID, nextregister) VALUES ('$backlog', '$sapid', '$nextregister')";
	}
	
if(mysqli_query($con, $sql1) && mysqli_query($con, $sql2) && mysqli_query($con, $sql3)){
    echo "<script type='text/javascript'>alert('You have registered Successfully!!!')</script>";
	}
	}

?>
</body>  
</html>   