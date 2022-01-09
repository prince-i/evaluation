<?php
	include('../connection.php');

	$id = $_GET['professor'];

	$sql="delete from prof_stud where prof_id='$id'";
	$con->query($sql);

	header('location:professor.php');
?>