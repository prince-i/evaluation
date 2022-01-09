<?php
	include('../connection.php');

	$id=$_GET['course'];

	$course_code=$_POST['course_code'];
	$course_name=$_POST['course_name'];

	$sql="select * from course where course_id='$id'";
	$query=$con->query($sql);
	$row=$query->fetch_array();



	$sql="update course set course_code='$course_code', course_name='$course_name' where course_id='$id'";
	$con->query($sql);

	header('location:course.php');
?>