<?php
	include('../connection.php');

	$id=$_GET['super'];

	$email=$_POST['email'];
	$number=$_POST['number'];
    $prefix=$_POST['prefix'];
	


	$sql="select * from superior where super_id='$id'";
	$query=$con->query($sql);
	$row=$query->fetch_array();



	$sql="update superior set email='$email', number='$number', prefix='$prefix' where super_id='$id'";
	$con->query($sql);

	header('location:director.php');
?> 