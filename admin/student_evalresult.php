<?php include("../session.php");  
include('../connection.php');
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$id=$_GET['id'];
/*this is delet quer*/
mysqli_query($con,"delete from department where dept_id='$id'")or die("query is incorrect...");

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
	     <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h2 mb-2 text-gray-800">EVALUATION RESULT FOR FACE TO FACE</h1>
                    

                    <!-- EVALUATION TABLE -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Evaluation Result for the Professor</h6>
                        </div>
<form action="student_result.php" method="post">
                        <div class="card-body">
					
                            <div class="table-responsive">
<!-- Select department-->

<p ><b>Select Department</p></b>
<select class="form-control" name="department" onchange="select_course_ajax(this.value)" required>
<option class="form-control" value="">Select Department</option>
<?php 
$dept=mysqli_query($con,"select * from department")or die ("query 2 incorrect.......");
    while($dept_name=mysqli_fetch_array($dept))
    {
?>
<option value="<?php echo $dept_name['dept_id'] ?>"><?php echo $dept_name['dept_name'] ?></option>
<?php } ?>
</select>

<!-- Select course-->
<br>
<p><b>Select Course</p></b>
<select class="form-control" id="course_id" name="course" onchange="select_subject_ajax(this.value)" required>

</select>


<!-- Select subject-->
<br>
<p ><b>Select Subject </p></b>
<select class="form-control" id="subj_id" name="subject" onchange="select_tech_semester(this.value)" required>

</select>

<br>
<!-- Select teacher-->

<p ><b>Select Faculty Member </p></b>
<select class="form-control" id="prof_id" name="prof_stud" required>

</select>

  
                      <br><div class="text-center mb-6">    
     <input type="submit" class="btn btn-primary"  style="margin-left:70px">
			  <a class="btn btn-danger" href="index.php">Cancel</a>
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
<script type="text/javascript">
    
    function select_course_ajax(dept_id){
        //alert(dept_id);exit;
        $.ajax({

            url: 'ajax_select_course.php',
            data: 'dept_id='+dept_id,
            success:function(res){
                //alert(res);exit;
                $("#course_id").html(res);
            }
        });
    }
    function select_subject_ajax(course_id){


        $.ajax({

            url: 'ajax_select_subject.php',
            data: 'course_id='+course_id,
            success:function(res){
                //alert(res);exit;
                $("#subj_id").html(res);
            }

        });
    }

    function select_tech_semester(subj_id){

        $.ajax({

            url: 'ajax_select_prof.php',
            data: 'subj_id='+subj_id,
            success:function(res){

                $("#prof_id").html(res);
            }
        });

        //$.ajax({

           // url: 'ajax_select_semester.php',
          //  data: 'subjectid='+subjectid,
          //  success:function(res){

              //  $("#sem_id").html(res);
         ///   }
       // });

    }


</script>
<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        data: {
            table: 'datatable'
        },
        chart: {
            type: 'column'
        },
        title: {
            text: 'Professor Evaluation Result'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Units'
            }
        },
        tooltip: {
            formatter: function () {
                return '<b>' + this.series.name + '</b><br/>' +
                    this.point.y + ' ' + this.point.name.toLowerCase();
            }
        }
    });
});
        </script>
</body>

</html>