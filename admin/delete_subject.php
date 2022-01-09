<?php
	include('../connection.php');

	$id = $_GET['subject'];

	$sql="delete from subject where subj_id='$id'";
	$con->query($sql);

	header('location:subject.php');
?>