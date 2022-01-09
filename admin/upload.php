<?php
	include('../connection.php');
	$prof_fname=$_POST['prof_fname'];
	$prof_lname=$_POST['prof_lname'];
	$status=$_POST['status'];
	$dept_id=$_POST['dept_id'];
	$number=$_POST['number'];
	$email=$_POST['email'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$fileinfo=PATHINFO($_FILES["photo"]["name"]);

	if(empty($fileinfo['filename'])){
		$location="";
	}
	else{
	$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
	move_uploaded_file($_FILES["photo"]["tmp_name"],"../uploads/" . $newFilename);
	$location="../uploads/" . $newFilename;
	}
	
	$sql="insert into prof_stud (dept_id, prof_fname, prof_lname,status, picture, number, username, password, email, deleted_at) values ('$dept_id','$prof_fname','$prof_lname','$status','$location','$number','$username','$password','$email','OPEN')";
	$con->query($sql) or die("<script>alert('SESSION ERROR');</script>" );

	header('location:professor.php');

?>