<?php
	include('../connection.php');

	$id=$_GET['questionnaire'];

	
	$questionnaire=$_POST['questionnaire'];

	$sql="select * from pandemic_stud where ques_id='$id'";
	$query=$con->query($sql);
	$row=$query->fetch_array();



	$sql="update pandemic_stud set questionnaire='$questionnaire' where ques_id='$id'";
	$con->query($sql);

	header('location:ques_pandemic.php');
?>