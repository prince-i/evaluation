<?php include("../session.php");  
include('../connection.php');
$table = 'student';

$id = isset($_GET['id']) ? $_GET['id'] : '';
$stud_id = isset($_POST['stud_id']) ? mysqli_real_escape_string($con, $_POST['stud_id']) : '';
$dept_id = isset($_POST['dept_id']) ? mysqli_real_escape_string($con, $_POST['dept_id']) : '';
$course_id = isset($_POST['course_id']) ? mysqli_real_escape_string($con, $_POST['course_id']) : '';
$stud_fname = isset($_POST['stud_fname']) ? mysqli_real_escape_string($con, $_POST['stud_fname']) : '';
$stud_mname = isset($_POST['stud_mname']) ? mysqli_real_escape_string($con, $_POST['stud_mname']) : '';
$stud_lname = isset($_POST['stud_lname']) ? mysqli_real_escape_string($con, $_POST['stud_lname']) : '';
$email = isset($_POST['email']) ? mysqli_real_escape_string($con, $_POST['email']) : '';
$number = isset($_POST['number']) ? mysqli_real_escape_string($con, $_POST['number']) : '';
$year_id = isset($_POST['year_id']) ? mysqli_real_escape_string($con, $_POST['year_id']) : '';
$sec = isset($_POST['sec']) ? mysqli_real_escape_string($con, $_POST['sec']) : '';
$username = isset($_POST['username']) ? mysqli_real_escape_string($con, $_POST['username']) : '';
$password = isset($_POST['password']) ? mysqli_real_escape_string($con, $_POST['password']) : '';
if (isset($_POST['save'])) {
 
    $result = mysqli_query($con,"INSERT INTO $table (stud_id,dept_id,course_id,stud_fname,stud_mname,stud_lname, email,year_id, number,sec, username,password, deleted_at)
	VALUES ('$stud_id','$dept_id','$course_id','$stud_fname','$stud_mname','$stud_lname','$email','$year_id','$number','$sec','$username','$password','OPEN')") or die('Error In Session');
    
    echo '<meta http-equiv="refresh" content="1;url=student.php">';
}
isset($result) ? $message = '<p class="message">Save success</p>' : $message = '';
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
                    <h1 class="h2 mb-2 text-gray-800">STUDENT</h1>
                    

                    <!-- STUDENT TABLE -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add new student</h6>
                        </div>

                        <div class="card-body">
					
                            <div class="table-responsive">
								<!--form-->
			<form method="post" action="">
			 
      <!-- Select Department from Department Table -->
            <div class="form-group1">
        <div class="col-md-61">
            <!-- Select Department from Department Table -->
            <select class="form-control" id="dept_id" name="dept_id" onchange="select_course(this.value)" required>
            <option value="">Select Department</option>
                <?php 
                        $qry=mysqli_query($con,"select * from `department`");
                        while($row=mysqli_fetch_array($qry))
                        {
            ?>
            
	      <option value="<?php echo $row['dept_id'];?>"><?php echo $row['dept_name'];?></option>
	       <?php }?>
                </select>
				
				<div class="form-group1">
                <div class="col-md-61">
                <!-- Select Course from Course Table -->
				 <br>
                    <p>Select Course</p>
            <select class="form-control" id="courseid" name="course_id" required>
               <!--  <?php 
                        $qry2=mysqli_query($con,"select * from `course`");
                        while($row2=mysqli_fetch_array($qry2))
                        {
            ?>
            
	      <option value="<?php echo $row2['course_id'];?>"><?php echo $row2['course_name'];?></option>
	       <?php }?> -->
                </select>
                </div> </div>
            </div>
        </div><br>
		<input type="text" name="stud_id"  class="form-control" placeholder="Student ID" required><br>
		<input type="text" name="stud_fname"  class="form-control" placeholder="First Name" required><br>
		<input type="text" name="stud_mname"  class="form-control" placeholder="Middle Name" required><br>
		<input type="text" name="stud_lname"  class="form-control" placeholder="Last Name" required><br>
			  <select class="form-control" id="year_id" name="year_id"  required>
			  
            <option value="">Select Year</option>
                <?php 
                        $qry=mysqli_query($con,"select * from `year`");
                        while($row=mysqli_fetch_array($qry))
                        {
            ?>
            
	      <option value="<?php echo $row['year_id'];?>"><?php echo $row['year'];?></option>
	       <?php }?>

                </select><br>
                <div class="form-group">
               
                   
                    <select name="sec" id="sec" class="form-control" required>
          
            <option value="1" id="1">Section 1</option>
            <option value="2" id="2">Section 2</option>
            <option value="3" id="3">Section 3</option>
            <option value="4" id="4">Section 4</option>
            <option value="5" id="5">Section 5</option>
            <option value="6" id="6">Section 6</option>
            </select>
                
                </div>
		<input type="email" name="email"  class="form-control" placeholder="Email Address" required><br>

		<input type="text" name="number"  class="form-control" placeholder="Mobile Number" required><br>
		<input type="username" name="username"  class="form-control" placeholder="Username" required><br>

		<input type="password" name="password"  class="form-control" placeholder="Password" required>
	

			
           <div class="text-center mb-6">
		   <br>
			   <input type="submit" name="save" value="Confirm" class="btn btn-secondary btn-sm" align="center">
			  <a class="btn btn-secondary btn-sm" href="student.php">Cancel</a>
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
	<script type="text/javascript">
 
    function select_course(dept_id){
        //alert(dept_id);exit;
        $.ajax({

            url: 'select_course_ajax.php',
            data: "dept_id="+dept_id,
            success:function(msg){

                //alert(msg);exit;
                $("#courseid").html(msg);

            }
        });
    }
</script>
</body>

</html>