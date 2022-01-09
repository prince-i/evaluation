<?php
	include('../connection.php');

	$id = $_GET['id'];

	$sql="delete from survey where id='$id'";
	$con->query($sql);

	header('location:profanity.php');
?>