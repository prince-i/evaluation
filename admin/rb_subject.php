<?php
	include('../connection.php');

	$id = $_GET['id'];

	$sql="UPDATE subject SET deleted_at ='CLOSE' WHERE subj_id='$id'";
	$con->query($sql);

	header('location:subject.php');
?>