<?php
	include('../connection.php');

	$id = $_GET['id'];

	$sql="delete from course where course_id='$id'";
	$con->query($sql);

	header('location:course.php');
?>