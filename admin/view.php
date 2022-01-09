<?php
	include('../connection.php');

	$id=$_GET['student'];

	$sql="select * from verify_stud where stud_id='$id'";
	$query=$con->query($sql);
	$row=$query->fetch_array();



    $sql="select * from verify_stud where stud_id='$id'";
	$con->query($sql);

	header('location:verify_stud.php');
?>