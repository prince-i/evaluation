<?php
	include('../connection.php');

	$id=$_GET['dept'];

	$dept_code=$_POST['dept_code'];
	$dept_name=$_POST['dept_name'];

	$sql="select * from department where dept_id='$id'";
	$query=$con->query($sql);
	$row=$query->fetch_array();



	$sql="update department set dept_code='$dept_code', dept_name='$dept_name' where dept_id='$id'";
	$con->query($sql);

	header('location:department.php');
?>