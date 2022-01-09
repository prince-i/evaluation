<?php
	include('../connection.php');

	$id=$_GET['profanity'];

	$word=$_POST['word'];

	$sql="select * from badwords where id='$id'";
	$query=$con->query($sql);
	$row=$query->fetch_array();



	$sql="update badwords set word='$word' where id='$id'";
	$con->query($sql);

	header('location:profanity.php');
?>