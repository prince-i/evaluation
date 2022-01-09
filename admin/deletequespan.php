<?php
	include('../connection.php');

	$id = $_GET['id'];

	$sql="delete from pandemic_stud where ques_id='$id'";
	$con->query($sql);

	header('location:ques_pandemic.php');
?>