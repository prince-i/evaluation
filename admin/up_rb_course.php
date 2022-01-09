<?php
	include('../connection.php');

	$id = $_GET['id'];

	$sql="UPDATE course SET deleted_at ='OPEN' WHERE course_id='$id'";
	$con->query($sql);

	header('location:recyclebin.php');
?>