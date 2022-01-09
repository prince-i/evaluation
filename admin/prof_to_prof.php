<?php include("../session.php");  
include('../connection.php');
$prof_stud=mysqli_query($con,"select * from `prof_stud` where prof_id = '".$_REQUEST['prof_id']."' ");
$row_teacher=mysqli_fetch_array($prof_stud);





if(isset($_POST['add_professor_to_prof']))
{
$prof_id = $_POST['prof_id'];
foreach($_POST["professor"] as $resv)
    {

mysqli_query($con,"insert into assign_direc(prof_id,dept_id) values('".$prof_id."','".$resv."')") or die (mysqli_error($con));
}

header("location: facultymem.php");
mysqli_close($con);
}


if(isset($_POST['unset_prof_professor']))
{
$prof_id = $_POST['prof_id'];
foreach($_POST["professor_unset"] as $resv)
    {
$remove_professor_from_teacher = "Delete from assign_direc where prof_id ='".$prof_id."' AND dept_id = '".$resv."'";


mysqli_query($con,$remove_professor_from_teacher) or die (mysqli_error($con));
}

header("location: prof_to_prof.php?prof_id=".$prof_id."");
mysqli_close($con);
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
<script language="javascript">
function CheckAll(form)
{
form= document.getElementById(form);
    for (var i = 0; i < form.elements.length; i++)
    {    
        eval("form.elements[" + i + "].checked = true ");  
    } 
}  
function unCheckAll(form)
{
    form= document.getElementById(form);
    for (var i = 0; i < form.elements.length; i++)
    {    
        eval("form.elements[" + i + "].checked = false ");  
    } 
}
</script>
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
                    

                    <!-- COURSE TABLE -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Assign Faculty Member Table</h6>
                        </div>

                        <div class="card-body">
					
                            <div class="table-responsive">
								<!--ADD-->
							<form action="proftoprof.php" name="form" id="form_teach" method="post" class="form-horizontal" style="margin-left:100px">
<!-- select Department from department table -->
<div class="form-group">
<br>

<a href="javascript:CheckAll('form_teach')" class="btn btn-outline-primary" style="margin-left:10px">Check All</a> <a href="javascript:unCheckAll('form_teach')" class="btn btn-outline-danger">Uncheck All</a><br><br>

<?php                  
$qry=mysqli_query($con,"select * from `prof_stud` WHERE prof_id!='".$_REQUEST['prof_id']."'");
while($row=mysqli_fetch_array($qry))
{
    $qry_checking=mysqli_query($con,"select * from `assign_direc` where prof_id='".$_REQUEST['prof_id']."' AND dept_id='".$row['prof_id']."'");
$num_checking = mysqli_num_rows($qry_checking);
    if($num_checking == 0){
?>
 <tbody>
<td><input style="margin-left:10px" type="checkbox" name="professor[]" value="<?php echo $row['prof_id'];?>" /></td>
 
  
   
   <td> <?php echo $row['prof_lname'];?>, <?php echo $row['prof_fname'];?></td><br>

<?php } }?>

</div>
<input type="hidden" name="prof_id" value="<?php echo $_REQUEST['prof_id']; ?>">
</div>
<div class="form-group1">

<div style="margin-left:100px" class="col-md-4">

<input type="submit" class="btn btn-secondary btn-sm" name="add_professor_to_prof" value="Assign Faculty Member" id="submit">
<a class="btn btn-secondary btn-sm" href="facultymem.php" style="color: white">Cancel</a> 
    </div>
</div>
</form>
<form action="" method="post" class="form-horizontal" id="form_unset_teacher" style="margin-left:100px">
<div class="form-group">

<div class="col-md-9"> 
  
  <hr style="width:100%; border: 2px solid; color:gray;">
    <b style="font-size:20px;">Assigned Faculty Member To <?php echo $row_teacher['prof_lname']; ?>, <?php echo $row_teacher['prof_fname']; ?></b>
   <hr style="width:100%; border: 2px solid; color:gray;">
    <a href="javascript:CheckAll('form_unset_teacher')" class="btn btn-outline-primary">Check All</a> <a href="javascript:unCheckAll('form_unset_teacher')" class="btn btn-outline-danger">Uncheck All</a><br><br>
    <?php 
    $prof_id=$_REQUEST['prof_id'];
$qry2=mysqli_query($con,"select * from assign_direc
INNER JOIN prof_stud ON prof_stud.prof_id = assign_direc.dept_id where assign_direc.prof_id='$prof_id'");
while($row2=mysqli_fetch_array($qry2))
{ 
?>
<input type="checkbox" name="professor_unset[]" value="<?php echo $row2['prof_id'];?>" />

 <?php echo $row2['prof_lname'];?>, <?php echo $row2['prof_fname'];?> <br />


<?php }?>

<input type="hidden" name="prof_id" value="<?php echo $_REQUEST['prof_id']; ?>">
       </div>       </div>
<div class="form-group">

<div class="col-md-5">

<input type="submit" class="btn btn-secondary btn-sm" name="unset_prof_professor" value="Remove Faculty Member" id="submit">

<a class="btn btn-secondary btn-sm" href="facultymem.php" style="color: white">Cancel</a> 
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

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>
</body>

</html>