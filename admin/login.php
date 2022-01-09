<?php 
    session_start();
    require_once("../connection.php");


    if (isset($_SESSION['is_authenticated']) && $_SESSION['is_authenticated']) {
        header('location: /evaluation/admin/index.php');
    }
    else 
    { ?> 
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
                            <?php
            if (isset($_POST['login']))
                {
                    $username = mysqli_real_escape_string($con, $_POST['username']);
                    $password = mysqli_real_escape_string($con, $_POST['password']);
                    
                    $query 		= mysqli_query($con, "SELECT username, password FROM admin WHERE password='$password' and username='$username'");
                    $row		= mysqli_fetch_array($query);
                    $num_row 	= mysqli_num_rows($query);
                    
                    if ($num_row > 0) 
                    {		
                        $_SESSION['admin_id']=$row['admin_id'];			
                        $_SESSION['username']=$row['username'];		
                        $_SESSION['is_authenticated'] = true;
                        
                    header('location:index.php');
                    }
                else
                    {
                        echo 'Your username and password do not matched';
                    }
                }
        ?>
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
    <?php }

?>
