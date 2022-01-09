<?php
	include('../connection.php');

	$id = $_GET['id'];

	$sql="UPDATE profanities SET deleted_at ='OPEN' WHERE id='$id'";
	$con->query($sql);

	header('location:recyclebin.php');
?>