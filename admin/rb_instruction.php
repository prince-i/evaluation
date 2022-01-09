<?php
	include('../connection.php');

	$id = $_GET['id'];

	$sql="UPDATE survey SET deleted_at ='CLOSE' WHERE id='$id'";
	$con->query($sql);

	header('location:instruction.php');
?>