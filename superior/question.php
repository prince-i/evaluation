<?php
include("session.php"); 
include("connection.php");
$user_id=$_SESSION['user_id'];

if(isset($_POST['submit']))

{
    
    header("location: index.php");
  	$super_id = $_REQUEST['super_id'];
	$prof_id = $_REQUEST['prof_id'];
	$dept_id = $_REQUEST['dept_id'];
    $comment = $_POST['comment'];
	
    $createCommentQuery = "INSERT INTO 
                                `superior_com` (dept_id, prof_id, com_ans) 
                            VALUES 
                                ($dept_id, $prof_id, '$comment')";


    $isCommentCreated = mysqli_query($connection, $createCommentQuery) or die (mysqli_error($connection));

	$conn = mysqli_query($connection,"select * from ques_direc")or die ("query 2 incorrect.......");

	while(list($question_id,$ques_eval,$questionnaire) = mysqli_fetch_array($conn))
	{
		$evl_val=$_POST["radio$question_id"];
		mysqli_query($connection,"INSERT INTO `evaluation_superior`(`super_id`,`dept_id`,`prof_id`,`ques_id`, `ques_ans`) VALUES ('$super_id','$dept_id','$prof_id','$question_id','$evl_val')") or die (mysqli_error($connection));

	}
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
			
<form action="question.php" name="form" method="post" class="form-horizontal">
	     <!-- Begin Page Content -->
                <div class="container-fluid">


<h1 class="h2 mb-2 text-gray-800">SUPERIOR EVALUATION</h1>
                    

                    <!-- FACULTY TABLE -->
                    <div class="card shadow mb-4">
                        

                        <div class="card-body">
					
                            <div class="table-responsive">
								<!--ADD-->
<h5 class="m-0 font-weight-bold text-dark">Instruction: </h5><br>

<?php 
$conn=mysqli_query($connection,"select id,module, survey, deleted_at from survey where module='SUPERIOR' AND deleted_at='OPEN'")or die ("query 2 incorrect.......");

while(list($id,$module,$survey,$deleted_at)=mysqli_fetch_array($conn))
	 
{ ?>


<p><?php echo $survey; ?>	</p>


<?php } ?>



<p>Please encircle the rating the most objectively represents his/her professional and personal characteristics. Use the rating scale below:</p><b><h5>Direction: Please click the circle of your choice. Refer for the following scale.
<br></b></h5>
<p>1 - poor (P)&emsp;
2 - Unsatisfactory (VS)&emsp;
3 - Satisfactory (S)&emsp;
4 - Very Satisfactory (UnS)&emsp;
5- Excellent (E)
</p>





<hr style="width: 100%; border: 2px solid #696969;">



<div class="row">
<div class="col-sm-12">
 <div class="table-responsive">
 
                                <table class="table table-bordered"  width="100%" cellspacing="0">
                                  
								  <thead class="thead-dark">
                                        <tr>
                                            <th>Criteria</th>
                                            <th>Questions</th>
											<th>1</th>
											<th>2</th>
											<th>3</th>
											<th>4</th>
											<th>5</th>
                                        </tr>
                                    </thead>
                                
                                    <tbody>
<!-- FOR QUESTIONS -->
<?php 
$conn=mysqli_query($connection,"select * from ques_direc")or die ("query 2 incorrect.......");

while(list($question_id,$questionnaire)=mysqli_fetch_array($conn))
	
{ ?>
<tr>

<td align="center"><?php echo $question_id; ?></td>
<td><b><?php echo $questionnaire; ?></b></td>

<td align="center"><input type="radio" name="radio<?php echo $question_id;?>" value="1" required></td>
<td align="center"><input type="radio" name="radio<?php echo $question_id;?>" value="2" required></td>
<td align="center"><input type="radio" name="radio<?php echo $question_id;?>" value="3" required></td>
<td align="center"><input type="radio" name="radio<?php echo $question_id;?>" value="4" required></td>
<td align="center"><input type="radio" name="radio<?php echo $question_id;?>" value="5" required></td>
</tr>



<?php } ?>
</table><br>
<textarea class="form-control" name ="comment" style=" height:100px ;" placeholder="MY COMMENT"></textarea>
 

<hr style="width: 80%; border: 2px solid #696969;">
<div class="clearfix"></div>

<input type="hidden" name="super_id" value="<?php echo $_REQUEST['super_id']?>">
<input type="hidden" name="prof_id" value="<?php echo $_REQUEST['prof_id']?>">
<input type="hidden" name="dept_id" value="<?php echo $_REQUEST['dept_id']?>">




<button class="btn btn-primary" type="submit" name="submit" id="submit"  style="margin-left:500px">SUBMIT
</button>
    
<a class="btn btn-danger" href="index.php">CANCEL</a> 
<hr><hr>

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