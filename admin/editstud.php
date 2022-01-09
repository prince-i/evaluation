<?php
	include('../connection.php');

	$id=$_GET['stud'];

	$year_id=$_POST['year_id'];
	$sec=$_POST['sec'];
    

	$sql="select * from student where stud_id='$id'";
	$query=$con->query($sql);
	$row=$query->fetch_array();



	$sql="update student set year_id='$year_id', sec='$sec' where stud_id='$id'";
	$con->query($sql);

	header('location:student.php');
?> 