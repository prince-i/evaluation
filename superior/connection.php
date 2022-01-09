<?php
$connection=mysqli_connect("localhost","root","","evaluation");
/*check connection*/
date_default_timezone_set('Asia/Manila');
$server_date = date('Y-m-d');
if(mysqli_connect_errno())
{
echo "Connection Faiil..." . mysqli_connect_error();
}
?>
