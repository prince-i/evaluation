<?php
	include('../connection.php');

	$id = $_GET['id'];

	$sql="UPDATE student SET deleted_at ='CLOSE' WHERE stud_id='$id'";
	$con->query($sql);

	header('location:student.php');
?>