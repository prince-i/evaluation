
<?php include ('../connection.php'); 
include("../session.php");  
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
                    <h1 class="h2 mb-2 text-gray-800">FACULTY MEMBER</h1>
                    

                    <!-- DEPARTMENT TABLE -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add New Faculty Member</h6>
                        </div>

                        <div class="card-body">
					
                            <div class="table-responsive">
								<!--form-->
		
            <form  method="post" action="upload.php"role="form"   enctype="multipart/form-data">
            <input type="file" name="photo" id="image" /></p><br />
			 <input type="hidden" name="image_id" id="image_id" />
          
            <select class="form-control" id="dept_id" name="dept_id" onchange="select_program(this.value)" required>
            <option value="">Select Department</option>
                <?php 
                        $qry=mysqli_query($con,"select * from `department`");
                        while($row=mysqli_fetch_array($qry))
                        {
            ?>
            
	      <option value="<?php echo $row['dept_id'];?>"><?php echo $row['dept_name'];?></option>
	       <?php }?>
                </select>
            <br>
            <input type="text" name="status"  class="form-control" placeholder="Status" required><br>
			 <input type="text" name="prof_fname"  class="form-control" placeholder="First Name" required><br>
			<input type="text" name="prof_lname"  class="form-control" placeholder="Last Name" required><br>
			<input type="text" name="number"  class="form-control" placeholder="Phone Number" required><br>
            <input type="email" name="email"  class="form-control" placeholder="Email Address" required><br>
            <input type="username" name="username"  class="form-control" placeholder="Username" required><br>
            <input type="password" name="password"  class="form-control" placeholder="Password" required>
                
           <div class="text-center mb-6">
		   <br>
			   <input type="submit" name="save" value="Confirm" class="btn btn-secondary btn-sm" align="center">
			  <a class="btn btn-secondary btn-sm" href="professor.php">Cancel</a>
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