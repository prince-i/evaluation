<?php
session_start();
include("../connection.php");
$check=0;
if(isset($_POST['submit']))
{
 $username = $_POST['tbx_username'];
 $userpassword = $_POST['tbx_password'];
 $query=mysqli_query($con,"select stud_id from student where username='$username' and password='$userpassword' and deleted_at='OPEN'")or die ("query 1 incorrect.......");


list($user_id)=mysqli_fetch_array($query);
$_SESSION['user_id']=$user_id;

##GENERATE OTP
$OTP = mt_rand(10000,99999);

//GET EMAIL
$getMail = "SELECT email,stud_fname,stud_mname,stud_lname FROM student WHERE stud_id = '$user_id'";
$res = mysqli_query($con,$getMail);
while($row = mysqli_fetch_assoc($res)){
    $email = $row['email'];
    $fullname = $row['stud_fname']." ".$row['stud_mname']." ".$row['stud_lname'];
}

##EXPIRATION
$expr = new DateTime($server_date);
$expr->modify('+1 day');
$expr = $expr->format('Y-m-d');

##SAVE OTP
if(!empty($email)){
    $saveOTP = "INSERT INTO otp (`otp_code`,`email`,`expiration`,`purpose`) VALUES ('$OTP','$email','$expr','LOGIN')";
    if(mysqli_query($con,$saveOTP)){
        ## SEND EMAIL
        ## CONVERT OTP TO HEXADECIMAL FOR SECURITY
        header('location: ../otp/mailer/index.php?email_add='.$email.'&&name='.$fullname.'&&otp='.bin2hex($OTP).'&&type=student');
    }
}




// header("location: account.php");

$check=1;

if($check==0)
{
$check=2;
}

mysqli_close($connection);

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- Meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content=""
    />
    <script>
        addEventListener("load", function () { setTimeout(hideURLbar, 0); }, false); function hideURLbar() { window.scrollTo(0, 1); }
    </script>
    <!-- Meta tags -->
    <!-- font-awesome icons -->
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!--stylesheets-->
    <link href="../css/style.css" rel='stylesheet' type='text/css' media="all">
    <!--//style sheet end here-->
    <link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
</head>
<body>
    <h1 class="error">CCC Evaluation System</h1>
    <div class="w3layouts-two-grids">
        <div class="mid-class">
		
		<div class="img-right-side">
                <h3>Welcome To City College of Calamba</h3>
                
                <img src="../img/ccc.jpg" class="img-fluid" width="600" height="300" alt="">
            </div>
			
			
            <div class="txt-left-side">
                <h2> Login Here </h2>
                <p>This system automatically compute the performance ratings came from the students</p>
                <form method="post">
                    <div class="form-left-to-w3l">
                        <span class="fa fa-envelope-o" aria-hidden="true"></span>
                        <input type="username" placeholder="Username" name="tbx_username" id="tbx_username" required>

                       
                    </div>
                    <div class="form-left-to-w3l ">

                        <span class="fa fa-lock" aria-hidden="true"></span>
                        <input type="password" placeholder="Password" name="tbx_password" id="tbx_password"required>
                       
                    </div>
                    <div class="main-two-w3ls">
                        <div class="left-side-forget">
                            <input type="checkbox" class="checked">
                            <span class="remenber-me">Remember me </span>
                        </div>
                        
                    </div>
                   
                    <div class="btnn">
                        <button type="submit" id="submit" name="submit" value="Login" >Login </button>
                    </div>
                    <div style="color: white;font-size: 16px; letter-spacing: 1px;font-family: 'Open Sans', sans-serif;">Don't have an account? <a href="registration.php" style="font-weight:bold; font-size: 18px; letter-spacing: 2px; color:white; text-transform: uppercase;text-decoration: underline;">Sign up here</a></div>
					
                </form>
                
   </div>
    </div>
           
            

     
    <footer class="copyrigh-wthree">
        <p>
            © 2021 City College of Calamba Evaluation System. All Rights Reserved
        </p>
    </footer>
</body>

</html>