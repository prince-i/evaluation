<?php
	include('../connection.php');

	$id = $_GET['id'];

	$sql="UPDATE profanities SET deleted_at ='CLOSE' WHERE id='$id'";
	$con->query($sql);

	header('location:profanity.php');
?>