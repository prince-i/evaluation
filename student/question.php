<?php
include("session.php"); 
include("connection.php");
$user_id=$_SESSION['user_id'];

if(isset($_POST['submit']))
{
    
    header("location: index.php");

  	$stud_id = $_POST['stud_id'];
	$prof_id = $_POST['prof_id'];
	$subj_id = $_POST['subj_id'];
    $sec_id = $_POST['sec_id'];
    $comment = $_POST['comment'];

    $createCommentQuery = "INSERT INTO 
                                `comments` (subj_id, prof_id, sec_id, com_ans) 
                            VALUES 
                                ($subj_id, $prof_id, $sec_id, '$comment')";
 

    $isCommentCreated = mysqli_query($connection, $createCommentQuery) or die (mysqli_error($connection));

	$conn = mysqli_query($connection,"select * from ques_stud")or die ("query 2 incorrect.......");

	while(list($question_id,$ques_eval,$questionnaire) = mysqli_fetch_array($conn))
	{
		$evl_val=$_POST["radio$question_id"];
		mysqli_query($connection,"INSERT INTO `evaluation_stud`(`stud_id`,`prof_id`,`subj_id`,`sec_id`,`ques_id`, `ques_ans`) VALUES ('$stud_id','$prof_id','$subj_id','$sec_id','$question_id','$evl_val')") or die (mysqli_error($connection));

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


<h1 class="h2 mb-2 text-gray-800">FACE TO FACE EVALUATION</h1>
                    

                    <!-- STUDENT TABLE -->
                    <div class="card shadow mb-4">
                        

                        <div class="card-body">
					
                            <div class="table-responsive">
								<!--ADD-->
<h5 class="m-0 font-weight-bold text-dark">Dear Students:</h5><br>

<?php 
$conn=mysqli_query($connection,"select id,module, survey, deleted_at from survey where module='FACE TO FACE' AND deleted_at='OPEN'")or die ("query 2 incorrect.......");

while(list($id,$module,$survey,$deleted_at)=mysqli_fetch_array($conn))
	 
{ ?>


<p><?php echo $survey; ?>	</p>


<?php } ?>


<b> 
<h5>Direction: Please click the circle of your choice. Refer for the following scale.
<br></b></h5>
<p>1 - poor&emsp;
2 - Unsatisfactory&emsp;
3 - Satisfactory&emsp;
4 - Very Satisfactory&emsp;
5- Excellent
</p>
<?php 

$table='evaluation_cate';
$result=mysqli_query($connection,"select * from $table")or die('Error In Session');
$count=mysqli_num_rows($result);
$i=1;

?> 





<hr style="width: 100%; border: 2px solid #696969;">



<div class="row">
<div class="col-sm-12">
 <div class="table-responsive">
  <h4><b>Criteria</h4></b>                              <?php
if ($count!=0){
while($row=mysqli_fetch_array($result)):
?>

<p><b><?php echo $row['eval_cat'];?></b> - <?php echo $row['definition'];?>  </p>

<?php $i++;
endwhile;}
else{ ?>
<p> no available data</p>
<?php } ?> 
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
$conn=mysqli_query($connection,"select * from ques_stud inner join evaluation_cate on ques_stud.eval_cat=evaluation_cate.eval_cat WHERE deleted_at='OPEN'")or die ("query 2 incorrect.......");

while(list($question_id,$ques_eval,$questionnaire)=mysqli_fetch_array($conn))
	
{ ?>
<tr>

<td align="center"><?php echo $ques_eval; ?></td>
<td><b><?php echo $questionnaire; ?></b></td>

<td align="center"><input type="radio" name="radio<?php echo $question_id;?>" value="1" required></td>
<td align="center"><input type="radio" name="radio<?php echo $question_id;?>" value="2" required></td>
<td align="center"><input type="radio" name="radio<?php echo $question_id;?>" value="3" required></td>
<td align="center"><input type="radio" name="radio<?php echo $question_id;?>" value="4" required></td>
<td align="center"><input type="radio" name="radio<?php echo $question_id;?>" value="5" required></td>
</tr>



<?php } ?>


</table><br>
<p><b>Please write your personal comments for your teacher. You may write your comments either in English and in Filipino. The 
    teacher will not have access to this actual assessment form. Only a numerical summary of the evaluation and list of comments
    will be provided to your teacher.</b><p>

<textarea class="form-control" name ="comment" style=" height:100px ;" placeholder="MY COMMENT"></textarea>
 
<hr style="width: 80%; border: 2px solid #696969;">

<input type="hidden" name="stud_id" value="<?php echo $_REQUEST['stud_id']?>">
<input type="hidden" name="prof_id" value="<?php echo $_REQUEST['prof_id']?>">
<input type="hidden" name="subj_id" value="<?php echo $_REQUEST['subj_id']?>">
<input type="hidden" name="sec_id" value="<?php echo $_REQUEST['sec_id']?>">

<div class="clearfix"></div>


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