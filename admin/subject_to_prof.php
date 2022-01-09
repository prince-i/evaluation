<?php include("../session.php");  
include('../connection.php');

$prof_stud = mysqli_query($con,"select * from `prof_stud` where prof_id = '".$_REQUEST['prof_id']."' ");
$row_teacher = mysqli_fetch_array($prof_stud);


if(isset($_POST['add_subject_to_prof']))
{

    $sec_ids = $_POST['sec_id'];
    $prof_id = $_POST['prof_id'];
    $subjects = $_POST["subject"];


    $assignSubjectValues = '';

    foreach($subjects as $subjectKey => $subjectID) 
    {
        foreach ($sec_ids as $secKey => $secID) 
        {
            if ((count($sec_ids) - 1) === $secKey && (count($subjects) - 1) === $subjectKey) {
                $assignSubjectValues .= "(" . $prof_id . ", " . $subjectID . ", " . $secID . ")";
            }
            else {
                $assignSubjectValues .= "(" . $prof_id . ", " . $subjectID . ", " . $secID . "), ";
            }
        }
    }

    mysqli_query($con, "INSERT INTO assign_subj(prof_id, subj_id, sec_id) VALUES $assignSubjectValues") or die (mysqli_error($con));
    header("location: assignsubject.php");
    mysqli_close($con);
}


if(isset($_POST['unset_prof_subject']))
{
    $prof_id = $_POST['prof_id'];
    foreach($_POST["subject_unset"] as $resv)
    {
        $remove_subject_from_teacher = "Delete from assign_subj where prof_id ='".$prof_id."' AND subj_id = '".$resv."'";
        mysqli_query($con,$remove_subject_from_teacher) or die (mysqli_error($con));
    }

    mysqli_close($con);
    header("location: subject_to_prof.php?prof_id=".$prof_id."");
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
                    <h1 class="h2 mb-2 text-gray-800">ASSIGN SUBJECT</h1>
                    

                    <!-- COURSE TABLE -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Assign Subject Table</h6>
                        </div>

                        <div class="card-body">
					
                            <div class="table-responsive">
								<!--ADD-->
							<form action="subjecttoprof.php" name="form" id="form_teach" method="post" class="form-horizontal" style="margin-left:100px">
<!-- select Department from department table -->
<div class="form-group">
    <br>
    <a href="javascript:CheckAll('form_teach')" class="btn btn-outline-primary" style="margin-left:10px">Check All</a> <a href="javascript:unCheckAll('form_teach')" class="btn btn-outline-danger">Uncheck All</a><br><br>

    <?php                  
        $qry = mysqli_query(
            $con,
            "SELECT
                *
            FROM
                `subject` 
            INNER JOIN 
                `year`
            ON 
                `year`.year_id = `subject`.year_id 
            INNER JOIN 
                `course` 
            ON 
                course.course_id = `subject`.course_id
            "
        );

        $profId = $_REQUEST['prof_id'];

        while($row = mysqli_fetch_array($qry))
        {
            $subjId = $row['subj_id'];

            $queryChecking = "SELECT 
                * 
                FROM 
                    `assign_subj` 
                WHERE 
                    prof_id = $profId 
                AND 
                    subj_id = $subjId";

            $qry_checking=mysqli_query($con, $queryChecking);
            $num_checking = mysqli_num_rows($qry_checking);

            if($num_checking == 0) { ?>

                <tbody>
                    <td>
                        <input style="margin-left:10px" type="checkbox" name="subject[]" value="<?php echo $row['subj_id'];?>" />
                    </td>
                    
                    <td><i><?php echo $row['year'];?></i> </td>
                    <td> <b><?php echo $row['course_code'];?></td></b>
                    
                    <td> <?php echo $row['subj_name'];?></td><br>
                </tbody>

    <?php }} ?>

    <hr>

    <h6 class="col col-lg-4">SECTION</h6>

    <form action="subjecttoprof.php" name="assign_subject" method="post">
        <div class="col col-lg-4">
            <select name="sec_id[]" class="form-control" multiple>
                <option value="1">  Section 1</option>
                <option value="2">  Section 2</option>
                <option value="3">  Section 3</option>
                <option value="4">  Section 4</option>
            </select>
        </div>
        <br>
        <input type="hidden" name="prof_id" value="<?php echo $_REQUEST['prof_id']; ?>">
        <div class="form-group1">
            <div class="col-md-4">
                <button class="btn btn-secondary btn-sm" name="add_subject_to_prof" id="submit">Assign Subject</button>
                <a class="btn btn-secondary btn-sm" href="assignsubject.php" style="color: white">Cancel</a> 
            </div>
        </div>
    </form>
</div>

</div>


<!-- Subjet Assigned To Page -->
<form action="" method="post" class="form-horizontal" id="form_unset_teacher" style="margin-left:100px">
    <div class="form-group">
        <div class="col-md-9">
            
            <hr style="width:100%; border: 2px solid; color:gray;">
            <b style="font-size:20px;">Subject Assigned To <?php echo $row_teacher['prof_lname']; ?>, <?php echo $row_teacher['prof_fname']; ?></b>
            <hr style="width:100%; border: 2px solid; color:gray;">
                <a href="javascript:CheckAll('form_unset_teacher')" class="btn btn-outline-primary">Check All</a> <a href="javascript:unCheckAll('form_unset_teacher')" class="btn btn-outline-danger">Uncheck All</a><br><br>
                <?php 
                $prof_id=$_REQUEST['prof_id'];

            $qry2 = mysqli_query($con,"select * from assign_subj
            INNER JOIN subject ON subject.subj_id = assign_subj.subj_id INNER JOIN year ON year.year_id = subject.year_id INNER JOIN course ON course.course_id = subject.course_id
            where prof_id='$prof_id'");

            while($row2=mysqli_fetch_array($qry2))
            { ?>
                <input type="checkbox" name="subject_unset[]" value="<?php echo $row2['subj_id'] ?>" />
                <i><?php echo $row2['year']?> </i>
                section:
                <i><?php echo $row2['sec_id'] ?> </i>
                <b><?php echo $row2['course_code'] ?> </b>
                <?php echo $row2['subj_name'] ?> <br />


            <?php 
            }?>

            <input type="hidden" name="prof_id" value="<?php echo $_REQUEST['prof_id']; ?>">
        </div>       
    </div>
    <div class="form-group">

    <div class="col-md-5">

    <input type="submit" class="btn btn-secondary btn-sm" name="unset_prof_subject" value="Remove Subject" id="submit">

    <a class="btn btn-secondary btn-sm" href="assignsubject.php" style="color: white">Cancel</a> 
        </div></div>
</form>
                            
                        
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
    <script src="../js/admin/subjecttoprof.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>
</body>

</html>