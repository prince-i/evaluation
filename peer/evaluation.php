<?php
    include("session.php");
    include("connection.php");

    $user_id = $_SESSION['user_id'];

    $department_query = "SELECT 
                            prof_stud.prof_fname,
                            prof_stud.prof_lname,
                            prof_stud.picture,
                            prof_stud.prof_id 
                        AS
                            techId
                        FROM 
                            prof_stud 
                        INNER JOIN 
                            assign_direc 
                        ON
                            prof_stud.prof_id=assign_direc.dept_id 
                        WHERE 
                            assign_direc.prof_id ='$user_id' ";

    $department = mysqli_query($connection, $department_query);
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
                    /**
                     * Check if evaluation is enabled
                     */
                    $main_query = "SELECT 
                            peer 
                        FROM 
                            maintenance 
                        WHERE 
                            main_id = 1";

                    $main = mysqli_query($connection, $main_query) or die (mysqli_error($connection));

                    list($peer) = mysqli_fetch_array($main);
                ?> 
                <?php  if ( $peer == 'ON' ) { ?>		
                 <!-- Page Heading -->
                    
                    <h1 class="h2 mb-2 text-gray-800">PEER TO PEER EVALUATION</h1>
                    
                    <!-- STUDENT TABLE -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            
                        </div>

                        <div class="card-body">
                        			
                        <div class="container">
                                <div class="row mt-2 pb-3">
                                    

            <?php while ($row_subject1 = mysqli_fetch_array($department)) { ?>

                
                    <?php
                         $tech_id = $row_subject1['techId'];

                        $question_query  = "SELECT 
                        eval_id,
                        questionnaire,
                        ques_ans,
                        evaluation_peer.ques_id
                    FROM 
                        ques_direc
                    INNER JOIN 
                        evaluation_peer 
                    ON 
                        evaluation_peer.ques_id = ques_direc.ques_id 
                    WHERE
                        prof_id = $user_id
                    AND
                        prof_id2 = $tech_id ";

                        $question = mysqli_query($connection, $question_query) or die (mysqli_error($connection));  
                        $num_rows = mysqli_num_rows($question);

                        if( $num_rows > 0 )
                        { ?>
                                        <div class="col-sm-6 col-md-4 col-lg-3 mb-2 mr-5">
                                            <div class="card" style="width: 18rem;">
                                                <img src="<?= $row_subject1['picture'] ?> "width="100px"class="card-img-top"/>
                                                    <div class="card-body">
                                                        <h5 class="card-title"style="color: black; text-transform: uppercase; font-weight: bold;"><?php echo $row_subject1['prof_fname'];?> <?php echo $row_subject1['prof_lname'];?> </h5>
                                                        <p class="card-text" style="color: black;font-weight: bold;">Faculty Member</p>
                                                        <button class="btn btn-primary" disabled><i class="fas fa-check-circle"></i> EVALUATED</button>
                                                    </div>
                                            </div>
                                        </div>
                        <?php
                        } 
                        else 
                        { ?>
                                    <div class="col-sm-6 col-md-4 col-lg-3 mb-2 mr-5">
                                        <div class="card" style="width: 18rem;">
                                            <img  src="<?= $row_subject1['picture'] ?>"width="100px" class="card-img-top"/>
                                                <div class="card-body">
                                                    <h5 class="card-title" style="color: black; text-transform: uppercase; font-weight: bold;"><?php echo $row_subject1['prof_fname'];?> <?php echo $row_subject1['prof_lname'];?></a></h5>
                                                    <p class="card-text" style="color: black;font-weight: bold;" >Faculty Member</p>
                                                    <button class="btn btn-danger"><a style="color:white;" href="question.php?prof_id=<?php echo $user_id; ?>&prof_id=<?php echo $row_subject1['techId'] ?>"><i class="fas fa-times-circle"></i> EVALUATE</a></button>
                                               
                                                </div>
                                        </div>
                                    </div>
                       <?php } ?>
                 
            
            <?php } ?>
        <input  type="hidden" name="teacher"  value="student">
                                          
                                  
                            </div>  <?php 
                                    } // END OF IF
                                    else 
                                    { 
                                        echo "<h2 align='center'><br> EVALUATION HAS BEEN CLOSED. PLEASE WAIT FOR FUTHER ANNOUNCEMENT </h2>";
                                    }?> 
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