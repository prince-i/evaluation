<?php
	include('../connection.php');

	$id = $_GET['id'];

	$sql="UPDATE ques_peer SET deleted_at ='OPEN' WHERE ques_id='$id'";
	$con->query($sql);

	header('location:recyclebin.php'); 
?>