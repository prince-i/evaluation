<?php 
session_start();
if(isset($_SESSION['user_id'])&& $_SESSION['user_id']!="")
{
	// echo 'logged';
}
else
{
   header("location: login.php");
}

$inactive=10000000000;
if(isset($_SESSION['timeout']))
{
	$sessionttl=time()- $_SESSION['timeout'];
	if($sessionttl > $inactive)
	{
	session_destroy();
	header("location:logout.php");	
	}	
}
$_SESSION['timeout']=time();
?>