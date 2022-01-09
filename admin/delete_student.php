<?php
	include('../connection.php');

	$id = $_GET['id'];

	$sql="delete from student where stud_id='$id'";
	$con->query($sql);

	header('location:recyclebin.php');
?>