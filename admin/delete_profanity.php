<?php
	include('../connection.php');

	$id = $_GET['id'];

	$sql="delete from course where id='$id'";
	$con->query($sql);

	header('location:profanity.php');
?>