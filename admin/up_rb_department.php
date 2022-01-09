<?php
	include('../connection.php');

	$id = $_GET['id'];

	$sql="UPDATE department SET deleted_at ='OPEN' WHERE dept_id='$id'";
	$con->query($sql);

	header('location:recyclebin.php'); 
?>