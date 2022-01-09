<?php include("../session.php");  
include('../connection.php');
$table='admin';
$admin_id = $_SESSION['admin_id'];


## CHECK IF HAS EXISTING OTP REQUEST
$getadmin = mysqli_query($con,"SELECT admin_id,username,email FROM admin WHERE admin_id = '$admin_id'") or die ("ERROR");
list($admin_id,$username,$email) = mysqli_fetch_array($getadmin);

?> 
<?php
$getOTPReq = "SELECT id FROM otp WHERE email = '$email' AND purpose LIKE 'LOGIN%' ORDER BY id DESC LIMIT 1";
$res = mysqli_query($con,$getOTPReq);
if(mysqli_num_rows($res) > 0){
    header('location:../otp/verify.php?email='.bin2hex($email).'&&type=admin&&purpose=LOGIN');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

 <title>CCC Faculty System</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
	<?php include('sidebar.php'); ?>
	
	<!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
			<?php include('header.php'); ?>
	      <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h2 mb-0 text-gray-800">DASHBOARD</h1>
                       
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- total -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-sm font-weight-bold text-success text-uppercase mb-1">
                                                STUDENT IN CCC</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
											
											                                    
								<?php
								$sql="select count(stud_id) as total from student";
								$result=mysqli_query($con,$sql);
								$values=mysqli_fetch_assoc($result);
								$num_rows=$values['total'];
								echo $num_rows;
									?>		
											
									</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-alt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TOTAL -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-sm font-weight-bold text-warning text-uppercase mb-1">
                                               FACULTY IN CCC</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
											
											<?php
								$sql="select count(prof_id) as total from prof_stud";
								$result=mysqli_query($con,$sql);
								$values=mysqli_fetch_assoc($result);
								$num_rows=$values['total'];
								echo $num_rows;
									?>	
											
											
											
								</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TOTAL -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">DIRECTOR IN CCC
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
											
											<?php
								$sql="select count(super_id) as total from superior";
								$result=mysqli_query($con,$sql);
								$values=mysqli_fetch_assoc($result);
								$num_rows=$values['total'];
								echo $num_rows;
									?>	
											
											
											
								</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- PART -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-sm font-weight-bold text-info text-uppercase mb-1">
                                                SUBJECTS</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
											
											<?php
								$sql="select count(subj_id) as total from subject";
								$result=mysqli_query($con,$sql);
								$values=mysqli_fetch_assoc($result);
								$num_rows=$values['total'];
								echo $num_rows;
									?>	
											
											
											
								</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-book fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


   <?php

$main=mysqli_query($con,"select * from maintenance where main_id=1")or die ("query 1 incorrect.......");

list($main_id,$action,$student,$peer,$obs)=mysqli_fetch_array($main);

if(isset($_POST['save']) && isset($_POST['action']) && isset($_POST['student']) && isset($_POST['peer']) && isset($_POST['obs'])) 
{

    $action=$_POST['action'];
    $student=$_POST['student'];
    $peer=$_POST['peer'];
    $obs=$_POST['obs'];

    mysqli_query($con,"update maintenance set action='$action', student='$student', peer='$peer', obs='$obs'where main_id=1")or die("Query 2 is inncorrect..........");


    mysqli_close($con);
}
?>  
<form action="" name="form" method="post" class="form-horizontal" style="margin-left:10px">

<h6 class="col col-lg-4">EVALUATION STATUS FOR SUPERIOR</h6>
        <div class="col col-lg-4">
        <select name="action" class="form-control">
            <option value="ON" <?php echo $action === 'ON' ? 'selected' : '' ?> >ON</option>
            <option value="OFF" <?php echo $action === 'OFF' ? 'selected' : '' ?> >OFF</option>
        </select>
        </div>
<br>
<h6 class="col col-lg-4">EVALUATION STATUS FOR PEER TO PEER</h6>
        <div class="col col-lg-4">
        <select name="peer" class="form-control">
            <option value="ON" <?php echo $peer === 'ON' ? 'selected' : '' ?> >ON</option>
            <option value="OFF" <?php echo $peer === 'OFF' ? 'selected' : '' ?> >OFF</option>
        </select>
        </div>
<br>

<h6 class="col col-lg-4">EVALUATION STATUS FOR CLASSROOM OBSERVATION</h6>
        <div class="col col-lg-4">
        <select name="obs" class="form-control">
            <option value="ON" <?php echo $obs === 'ON' ? 'selected' : '' ?> >ON</option>
            <option value="OFF" <?php echo $obs === 'OFF' ? 'selected' : '' ?> >OFF</option>
        </select>
        </div>
<br>
<h6 class="col col-lg-4">EVALUATION STATUS FOR STUDENT</h6>
        <div class="col col-lg-4">
        <select name="student" class="form-control">
            <option value="FACE" <?php echo $student === 'FACE' ? 'selected' : '' ?> >FACE TO FACE</option>
            <option value="PANDEMIC" <?php echo $student === 'PANDEMIC' ? 'selected' : '' ?> >PANDEMIC</option>
            <option value="OFF" <?php echo $student === 'OFF' ? 'selected' : '' ?> >OFF</option>
        </select>
        </div>
<br>


<div class="col col-lg-4">  
      <input type="submit"class="btn btn-secondary btn-sm" name="save" id="save" style="margin-left:90px">
		    <a class="btn btn-secondary btn-sm" href="index.php">Cancel</a>
              </div>
</form>               

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            
         <?php include('footer.php'); ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
	
    <!-- End of Page Wrapper -->

    

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>