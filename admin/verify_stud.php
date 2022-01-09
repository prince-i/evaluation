<?php 
    include("../session.php");  
    include('../connection.php');

    $connection = $con;

    $table='verify_stud';
    $table1='year';
    $table2='course';
    $result=mysqli_query($con,"select * from $table inner join $table1 on $table.year_id=$table1.year_id inner join $table2 on $table.course_id=$table2.course_id")or die('Error In Session');
    $count=mysqli_num_rows($result);
    $i=1;

    function fetchAllData($con)
    {
        $table='verify_stud';
        $table1='year';
        $table2='course';
        $result=mysqli_query($con,"select * from $table inner join $table1 on $table.year_id=$table1.year_id inner join $table2 on $table.course_id=$table2.course_id")or die('Error In Session');
        $count=mysqli_num_rows($result);
        $i=1;
    }

    fetchAllData($connection);

?> 
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

 <title>CCC Evaluation System</title>

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
                        <?php 

                            if ($_SERVER['REQUEST_METHOD'] === 'POST') 
                            {
                                $studentID = $_POST['verify_action'];
                                

                                $findVerifiedStudentByID = "SELECT 
                                                                *
                                                            FROM 
                                                                verify_stud
                                                            WHERE 
                                                                stud_id = '" . $studentID . "'
                                                            ";

                                $verifiedStudent = mysqli_fetch_assoc(mysqli_query($con, $findVerifiedStudentByID));
                                    
                                if ($verifiedStudent) 
                                {
                                    $insertStudentValues = "(
                                        '" . $verifiedStudent['stud_id'] . "',
                                        '" . $verifiedStudent['dept_id'] . "',
                                        '" . $verifiedStudent['course_id'] . "',
                                        '" . $verifiedStudent['stud_fname'] . "',
                                        '" . $verifiedStudent['stud_mname'] . "',
                                        '" . $verifiedStudent['stud_lname'] . "',
                                        '" . $verifiedStudent['email'] . "',
                                        '" . $verifiedStudent['number'] . "',
                                        '" . $verifiedStudent['username'] . "',
                                        '" . $verifiedStudent['password'] . "',
                                        '" . $verifiedStudent['year_id'] . "',
                                        '" . $verifiedStudent['section'] . "',
                                        '" . $verifiedStudent['deleted_at'] . "'
                                       
                                    )";
    
                                    $insertStudentQuery = "INSERT INTO 
                                                                student(
                                                                    stud_id,
                                                                    dept_id,
                                                                    course_id,
                                                                    stud_fname,
                                                                    stud_mname,
                                                                    stud_lname,
                                                                    email,
                                                                    number,
                                                                    username,
                                                                    password,
                                                                    year_id,
                                                                    sec,
                                                                    deleted_at
                                                                ) 
                                                            VALUES$insertStudentValues
                                                            ";

                                    $isStudentCreated = mysqli_query($con, $insertStudentQuery);

                                    if ($isStudentCreated) 
                                    {
                                        $deleteStudentByID = "DELETE 
                                                                FROM 
                                                                    verify_stud
                                                                WHERE 
                                                                    stud_id = '" . $studentID . "'
                                                            ";

                                        $isDeleted = mysqli_query($con, $deleteStudentByID);

                                        if ($isDeleted) {
                                            fetchAllData($connection);
                                        }
                                    }
                                }
                                else {
                                    print_r($verifiedStudent);
                                }

                            }
                        ?>
                    <!-- Page Heading -->
                    <h1 class="h2 mb-2 text-gray-800">VERIFY STUDENT WHO REGISTER ONLINE</h1>
                    

                    <!-- STUDENT TABLE -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Student Table</h6>
                        </div>

                        <div class="card-body">
					
                            <div class="table-responsive">
									<!--ADD-->
							<a class="btn btn-primary" href="student.php">
                            <i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
                    <span>BACK</span></a>
					<!--END OF ADD-->
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID Number</th>
											<th>Student Name</th>
                                            <th>Year</th>
											<th>Course</th>
                                            <th>Section</th>
                                            <th>Action</th>
                                            <th>Verify Student</th>
                                        </tr>
                                    </thead>
                                                 
                                        <?php if ($count!=0) { ?> 
                                            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST"> 
                                                <tbody>
                                                    <?php 
                                                        while($row = mysqli_fetch_array($result)) { ?>
                                                            <tr>
                                                                <td><?php echo $row['stud_id'];?>   </td> 
                                                                <td>
                                                                    <?php 
                                                                        echo $row['stud_lname'] . ", " . $row['stud_fname'] . " " . $row['stud_mname']
                                                                    ?> 
                                                                </td>     
                                                                <td><?php echo $row['year'] ?></td>
                                                                <td><?php echo $row['course_code'] ?></td>
                                                                <td><?php echo $row['section'] ?></td>
                                                                    <td>
                                                                        <button
                                                                            type="submit"
                                                                            class="btn btn-warning btn-block" 
                                                                            name="verify_action" 
                                                                            value="<?php echo $row['stud_id'] ?>"
                                                                        >
                                                                            Verify
                                                                        </button>
                                                                    </td>
                                                                  
                                                                <td> <a href="#viewstudent<?php echo $row['stud_id']; ?>" data-toggle="modal"> <button class="btn btn-primary btn-block"><i class="fas fa-eye"></i> VIEW</button></a> 
<?php include('viewstudent.php'); ?></td><td></td>
                                                            
                                                            </tr>
                                                    
                                                    <?php $i++; } ?>
                                                </tbody>
                                            </form> 
                                        <?php } else { ?> No Available Data <?php } ?>
                                </table>
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
                        <span aria-hidden="true">×</span>
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