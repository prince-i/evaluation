<?php
include("session.php");
include("connection.php");
$user_id=$_SESSION['user_id'];
?>
<?php
    $query=mysqli_query($connection,"SELECT dept_name, prefix, fname, mname, lname, email, username, password, dept_code, number FROM superior INNER JOIN
    department on department.dept_id=superior.dept_id where super_id
    ='$user_id' ")or die ("query 1 incorrect...");

    list($dept_name,$prefix,$fname,$mname,$lname,$email,$username,$password, $dept_code, $number)=mysqli_fetch_array($query);
?> 

<?php
## CHECK IF HAS EXISTING OTP REQUEST
$getOTPReq = "SELECT id FROM otp WHERE email = '$email' AND purpose LIKE 'LOGIN%' AND expiration > '$server_date' ORDER BY id DESC LIMIT 1";
$res = mysqli_query($connection,$getOTPReq);
if(mysqli_num_rows($res) > 0){
    header('location:../otp/verify.php?email='.bin2hex($email).'&&type=superior&&purpose=LOGIN');
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
	<link href="../css/styles.css" rel="stylesheet" />
  <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                    <h1 class="h2 mb-2 text-gray-800"><?php echo $fname;?> <?php echo $mname;?> <?php echo $lname;?>, <?php echo $prefix;?> </h1>
                    <h6>Department : <?php echo $dept_name;?> (<?php echo $dept_code;?>) </h6><br>
					<h6><b> <tt style="color: green; font-size:17px;">&emsp;&emsp; <i class="fas fa-building"></i> Status  </b>  </tt>&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp; Director</h6>
                    <h6><b> <tt style="color: green; font-size:17px;">&emsp;&emsp; <i class="fas fa-envelope"></i> Email Address </b></tt>&nbsp;&nbsp;<?php echo $email;?></h6>
                   <!-- SUBJECT TABLE -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">About Me</h6>
                        </div>
						
  
                        <div class="card-body">
					
                            <div class="table-responsive">
							<a class="btn btn-success" href="editpass.php">
                <i class="fas fa-edit"></i>
                    <span>Change Password</span></a><br><br>
								<form method="post" action="">
  <div class="form-group">
    <div class="col-xs-4">
	 <label >Last Name</label>
    <input class="form-control" placeholder="<?php echo $lname;?>" disabled>
	</div><br>
	<div class="col-xs-4">
	 <label >First Name</label>
    <input class="form-control" placeholder="<?php echo $fname;?>" disabled>
	</div><br>
	<div class="col-xs-4">
	 <label >Middle Name</label>
    <input class="form-control" placeholder="<?php echo $mname;?>" disabled>
	</div><br>
	<div class="col-xs-4">
	 <label >Phone Number</label>
    <input class="form-control" placeholder="<?php echo $number;?>" disabled>
	</div><br>
  </div>
  
</form>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            
         <?php include('footer.php'); ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
	
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

     <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>
</body>

</html>