<?php
	include('../connection.php');

	$id = $_GET['dept'];

	$sql="delete from department where dept_id='$id'";
	$con->query($sql);

	header('location:recyclebin.php');
?>