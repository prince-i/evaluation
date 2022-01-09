<?php
	include('../connection.php');

	$id=$_GET['survey'];

	
	$survey=$_POST['survey'];

	$sql="select * from peer_survey where id='$id'";
	$query=$con->query($sql);
	$row=$query->fetch_array();



	$sql="update peer_survey set survey='$survey' where id='$id'";
	$con->query($sql);

	header('location:peer_survey.php');
?>