<?php
	include('../connection.php');

	$id = $_GET['id'];

	$sql="UPDATE survey SET deleted_at ='OPEN' WHERE id='$id'";
	$con->query($sql);

	header('location:recyclebin.php');
?>