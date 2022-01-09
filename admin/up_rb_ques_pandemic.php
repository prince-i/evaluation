<?php
	include('../connection.php');

	$id = $_GET['id'];

	$sql="UPDATE pandemic_stud SET deleted_at ='OPEN' WHERE ques_id='$id'";
	$con->query($sql);

	header('location:recyclebin.php'); 
?>