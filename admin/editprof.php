<?php
	include('../connection.php');

	$id=$_GET['professor'];

	
	$number=$_POST['number'];
	$status=$_POST['status'];

	$email=$_POST['email'];
	

	$sql="select * from prof_stud where prof_id='$id'";
	$query=$con->query($sql);
	$row=$query->fetch_array();

	
	$sql="update prof_stud set number='$number', status='$status', email='$email' where prof_id='$id'";
	$con->query($sql);

	header('location:professor.php');
?>