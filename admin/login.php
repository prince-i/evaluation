<?php 
    session_start();
    require_once("../connection.php");
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = mysqli_query($con,"SELECT admin_id, username FROM admin WHERE password = '$password' AND username = '$username'") or die("INVALID");

        list($admin_id,$username) = mysqli_fetch_array($query);
        $_SESSION['admin_id'] = $admin_id;
        $_SESSION['username'] = $username;

        
 ##GENERATE OTP
 $OTP = mt_rand(10000,99999);

 //GET EMAIL
 $getMail = "SELECT email FROM admin WHERE admin_id = '$admin_id'";
 $res = mysqli_query($con,$getMail);
 while($row = mysqli_fetch_assoc($res)){
     $email = $row['email'];
     $fullname = 'SYSTEM ADMIN';
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
         header('location: ../otp/mailer/index.php?email_add='.$email.'&&name='.$fullname.'&&otp='.bin2hex($OTP).'&&type=admin');
     }
 }

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
                                <input type="username" name="username" placeholder="Username" required>

                            
                            </div>
                            <div class="form-left-to-w3l ">

                                <span class="fa fa-lock" aria-hidden="true"></span>
                                <input type="password" name="password" placeholder="Password" required>
                            
                            </div>
                            <div class="main-two-w3ls">
                                <div class="left-side-forget">
                                    <input type="checkbox" name="remember" id="remember" class="checked">
                                    <span class="remenber-me">Remember me </span>
                                </div>
                                
                            </div>
                            
                            <div class="btnn">
                                <button type="submit" id="login" name="login" value="Login" >Login </button>
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
   
