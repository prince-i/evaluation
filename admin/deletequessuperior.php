<?php
	include('../connection.php');

	$id = $_GET['questionnaire'];

	$sql="delete from ques_direc where ques_id='$id'";
	$con->query($sql);

	header('location:ques_superior.php');
?>