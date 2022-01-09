<?php
include("../connection.php");
?>

<?php

$dept_id = $_REQUEST['department'];
$prof_id = $_REQUEST['prof_stud'];

$dept=mysqli_query($con,"select * from department where dept_id = '".$dept_id."' ")or die ("query 2 incorrect.......");
$dept_name=mysqli_fetch_array($dept);



$prof=mysqli_query($con,"select * from prof_stud where prof_id = '".$prof_id."' ")or die ("query 2 incorrect.......");
$teacher_name=mysqli_fetch_array($prof);




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
    <style>

        .comment {
            text-align: left;
        }
        @media print {
            body {
                size:a4;
            }
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
	
	
	<!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
		
	     <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h2 mb-2 text-gray-800">PEER-TO-PEER EVALUATION RESULT </h1>
                    

                    <!-- COURSE TABLE -->
                    <div class="card shadow mb-4">
                    <div class="card-header py-3">
                            <div class="row justify-space-between">
                                <div class="col">
                                    <h6 class="m-0 font-weight-bold text-primary">Evaluation Table</h6>
                                </div>
                                <div class="col text-right">
                                    <!-- <a 
                                        class="btn btn-outline-warning text-right" 
                                        href="./../exports/ExportFaceToFaceEvaluation.php"
                                        target="_blank"
                                    > -->
                                    <a href="javascript:void(0)" id="generatePDF" class="btn btn-outline-warning text-right">
                                        <i class="fas fa-print text-dark"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body" id="forPrint">
					
                            <div class="table-responsive">
							 <!--BACK-->
                             <a class="btn btn-primary" href="peer_evalresult.php" id="backbtn">
                             <i class="fas fa-arrow-circle-left"></i>
                            <span>BACK</span></a>
                            <br><br>
                <!--END OF BACK-->
                                <div class="row">
                                    
                                    <div class="col-sm-6" style="background-color:lightgray;">
                                    <br>
                                        <h5 style="color: black"><b> &nbsp;  FACULTY MEMBER : </b><?php echo $teacher_name['prof_lname'] ?>, <?php echo $teacher_name['prof_fname'] ?></h5>
                                       <br>              
                                    </div>
                                        <div class="col-sm-6" style="background-color:lightgray;"><br>
                                            <h5 style="color: black"><b> DEPARTMENT : </b><?php echo $dept_name['dept_name'] ?></h5>
                                            <br>
                                        </div>
                                </div>  

                                       

<hr>

<?php

  

    $query = "SELECT 
                evaluation_peer.ques_id,
                ques_peer.questionnaire,
                evaluation_peer.eval_id,
                SUM(evaluation_peer.ques_ans) AS total_evaluation_score,
                FORMAT(SUM(evaluation_peer.ques_ans) / COUNT(evaluation_peer.prof_id), 0) AS average,
                COUNT(evaluation_peer.prof_id) AS number_of_students_evaluated
            FROM 
            ques_peer 
            INNER JOIN 
            evaluation_peer 
            ON 
            evaluation_peer.ques_id = ques_peer.ques_id 
            WHERE 
            evaluation_peer.prof_id2 = $prof_id 
            
            GROUP BY
            evaluation_peer.ques_id,	
            evaluation_peer.ques_ans
    ";

    $question = mysqli_query($con, $query) or die(mysqli_error($con));

    $filtered_row_question_list = [];

    while ($row_questions = mysqli_fetch_array($question)) {
        $filtered_row_question_list[$row_questions['ques_id']][] = $row_questions;
    }

    foreach ($filtered_row_question_list as $filtered_row_questions) 
    {
        ?> 
            <p><?php echo $filtered_row_questions[0]['ques_id'] ?> - <?php echo $filtered_row_questions[0]['questionnaire'] ?></p>
        <?php

        $progress_storage = [];
        $sum = 0;
        $number_of_students_evaluated = 0;
        $total_number_of_students = 0;
        $total_evaluation_score = [];
        $average_evaluation_score = 0;

        foreach ($filtered_row_questions as $filtered_row_question)
        {
            $average = $filtered_row_question['average'];
            $total_evaluation = $filtered_row_question['total_evaluation_score'];
            $total_evaluation_score[] = $total_evaluation;
            $number_of_students_evaluated = $filtered_row_question['number_of_students_evaluated'];

            $total_number_of_students += $number_of_students_evaluated;
            
            $progress_storage[$average] =  "<td>
                <div class='container'>
                    <div class='row'>
                        <div class='col-1 col-sm-1 col-md-1 col-lg-1'>$average</div>
                        <div class='col-10 col-sm-10 col-md-10 col-lg-10'>
                            <div class='progress'>
                                <div 
                                    class='progress-bar' 
                                    role='progressbar' 
                                    style='width: $total_evaluation%'
                                    aria-valuenow='$average' 
                                    aria-valuemin='0' 
                                    aria-valuemax='5'
                                >
                                    
                                </div>
                            </div>
                        </div>
                        <div class='col-1 col-sm-1 col-md-1 col-lg-1'>$number_of_students_evaluated</div>
                    </div>
                </div>
            </td>";
        } // END OF INNER LOOP


        foreach ([1, 2, 3, 4, 5] as $max_score) // 2
        {
            if (!isset($progress_storage[$max_score])) 
            {
                echo "<td>
                        <div class='container'>
                            <div class='row'>
                                <div class='col-1 col-sm-1 col-md-1 col-lg-1'>$max_score</div>
                                <div class='col-10 col-sm-10 col-md-10 col-lg-10'>
                                    <div class='progress'>
                                        <div 
                                            class='progress-bar' 
                                            role='progressbar' 
                                            style='width: 0'
                                            aria-valuenow='0' 
                                            aria-valuemin='0' 
                                            aria-valuemax='5'
                                        >
                                            0
                                        </div>
                                    </div>
                                </div>
                                <div class='col-1 col-sm-1 col-md-1 col-lg-1'>0</div>
                            </div>
                        </div>
                    </td>";
            } 
            else 
            {
                echo $progress_storage[$max_score];
            }
        }
        
        $total_evaluation_score = array_sum($total_evaluation_score);

        $average_evaluation_score = number_format($total_evaluation_score / ($total_number_of_students * 5)*100, 1);
        
        echo "<td>
                <div class='container my-4'>
                    <div class='row'>
                        <div class='col-1 col-sm-1 col-md-1 col-lg-1'>Average</div>
                        <div class='col-10 col-sm-10 col-md-10 col-lg-10'>
                            <div class='progress'>
                                <div 
                                    class='progress-bar' 
                                    role='progressbar' 
                                    style='width: $average_evaluation_score%'
                                    aria-valuenow='0' 
                                    aria-valuemin='0' 
                                    aria-valuemax='100'
                                >
                                    
                                </div>
                            </div>
                        </div>
                        <div class='col-1 col-sm-1 col-md-1 col-lg-1'>$average_evaluation_score%</div>
                    </div>
                </div>
            </td>";

    } // END OF OUTER LOOP ?>
     
                    
                   

			
			<!--boxx-->
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <div class="container" id="commentSection">
                <h1>Comments</h1>
                <button type="button" id="btnComment" class="btn btn-primary toggle-comments">
                    Show Comments
                </button>
                <?php 
                    $query = "SELECT 	
                            CASE 
                                WHEN 
                                    STRCMP(LOWER(com_ans), 'tang ina mo') = 0 
                                        OR 
                                    STRCMP(LOWER(com_ans), 'tang ina') = 0
                                THEN 
                                    '* * * * *'
                                ELSE 
                                    com_ans 
                            END as comment 
                            FROM 
                                `peer_com`
                            WHERE 
                                prof_id = $prof_id 
                           
                    ";

                    $fetchCommentsQuery = mysqli_query($con, $query) or die(mysqli_error($con));

                    ?> 
                    <div class="comments-container hide" style="display: none;">
                        <?php 
                            while ($comments = mysqli_fetch_array($fetchCommentsQuery)) 
                        { ?>
                            <div class="input-group mt-2">
                                <textarea class="form-control" aria-label="With textarea" disabled><?php echo $comments['comment'] ?></textarea>
                            </div> 
                        <?php } ?> 
                    </div>
            </div>
            
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
    <!-- <script src="../js/jquery.js"></script> -->
    <script src="../js/jspdf.js"></script>
    <script src="../js/html2canvas.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>
    <script>
        const getToggleCommentBtn = document.querySelector('.toggle-comments');
        const getCommentsContainer = document.querySelector('.comments-container');


        getToggleCommentBtn.addEventListener('click', () => 
        {
            const hasHideClassName = getCommentsContainer.classList.contains('hide');

            if (hasHideClassName) { 
                // SHOW COMMENTS

                getCommentsContainer.classList.remove('hide');
                getCommentsContainer.style.display = 'block';

                getToggleCommentBtn.textContent = 'Hide Comments';
            } else {

                // HIDE COMMENTS
                getCommentsContainer.classList.add('hide');
                getCommentsContainer.style.display = 'none';

                getToggleCommentBtn.textContent = 'Show Comments';
            }
        });

        $('#generatePDF').click(function(){
        $('.table-responsive').css('overflow','hidden');
        $(this).hide();
        $('#backbtn').hide();
        $('#btnComment').hide();
        $('#gotoTopBtn').hide();
        $('body').css('zoom','80%');
        $('#commentSection').prepend('<br><br><br><br>');
        $('body').css('font-size','12px');
        window.print();

        });

        window.onafterprint = function(){
            location.reload();
        }
    </script>
</body>

</html>

