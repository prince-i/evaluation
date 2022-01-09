<?php
	include('../connection.php');

	$id=$_GET['subject'];

	
	$subj_code=$_POST['subj_code'];
	$subj_name=$_POST['subj_name'];
	$sql="select * from subject where subj_id='$id'";
	$query=$con->query($sql);
	$row=$query->fetch_array();



	$sql="update subject set subj_code='$subj_code',subj_name='$subj_name' where subj_id='$id'";
	$con->query($sql);

	header('location:subject.php');
?>