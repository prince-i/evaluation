<?php
session_start();
include("connection.php");
$check=0;
if(isset($_POST['submit']))
{
 $username = $_POST['tbx_username'];
 $userpassword = $_POST['tbx_password'];
 $query=mysqli_query($connection,"select prof_id from prof_stud where username='$username' and password='$userpassword'")or die ("query 1 incorrect.......");


list($user_id)=mysqli_fetch_array($query);

$_SESSION['user_id']=$user_id;
header("location: index.php");

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
    <meta name="keywords" content="Allied Login Form Responsive Widget, Audio and Video players, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design"
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