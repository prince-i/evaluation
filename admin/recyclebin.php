<?php include("../session.php");  
include('../connection.php');
$table='student';
$table1='year';
$table2='course';
$result=mysqli_query($con,"select * from $table inner join $table1 on $table.year_id=$table1.year_id inner join $table2 on $table.course_id=$table2.course_id WHERE $table.deleted_at='CLOSE'")or die('Error In Session');
$count=mysqli_num_rows($result);
$i=1;

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
                    <h1 class="h2 mb-2 text-gray-800">RECYCLE BIN</h1>
                    

                    <!-- STUDENT TABLE -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">STUDENTS</h6>
                        </div>

                        <div class="card-body">
					
                            <div class="table-responsive">
							
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                        <tr>
                                            <th>ID Number</th>
											<th>Student Name</th>
                                            <th>Year</th>
											<th>Course</th>
                                          <th>Action</th>
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                        

                                      
                                            <?php
if ($count!=0){
while($row=mysqli_fetch_array($result)):
?>
<tr>
<td><?php echo $row['stud_id'];?>   </td> 
<td><?php echo $row['stud_lname'];?>, <?php echo $row['stud_fname'];?> <?php echo $row['stud_mname'];?>     </td>        
<td><?php echo $row['year'];?></td>
<td><?php echo $row['course_code'];?></td>
<td> <a href="up_rb_student.php?id=<?php echo $row['stud_id']; ?>"> <button class="btn btn-success"><i class="fas fa-redo-alt"></i></button></a> 
  <a href="#deletestudent<?php echo $row['stud_id']; ?>" data-toggle="modal"><button class="btn btn-danger"> <i class="fa fa-trash"></i></button></a>

<?php include('editstudent.php'); ?></td>


</tr>
<?php $i++;
endwhile;}
else{ ?>
<?php } ?>
                                       
                                        </tr>
                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
<!--close -->


  <!-- SUBJECT TABLE -->
  <?php 
$table='subject';
$table1='course';
$table2='department';
$table3='year';
$result12=mysqli_query($con,"select * from $table inner join $table1 on $table1.course_id=$table.course_id inner join $table2 on $table2.dept_id=$table.dept_id inner join $table3 on $table3.year_id=$table.year_id WHERE $table.deleted_at='CLOSE'")or die('Error In Session');
$count12=mysqli_num_rows($result12);
$i=1;

?> 

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">SUBJECT</h6>
                        </div>

                        <div class="card-body">
					
                            <div class="table-responsive">
							
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>Year Level</th>
                                        <th>Department</th>
                                        <th>Course</th>
                                        <th>Subject Code</th>
                                        <th>Subject Name</th>
                                            <th>ACTION</th>         
                                       
                                          
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                        

                                      
                                            <?php
if ($count12!=0){
while($row12=mysqli_fetch_array($result12)):
?>
<tr>
<td><?php echo $row12['year'];?></td>
<td><?php echo $row12['dept_code'];?></td>
<td><?php echo $row12['course_code'];?></td>
<td><?php echo $row12['subj_code'];?></td>
<td><?php echo $row12['subj_name'];?></td>
<td>
<a href="up_rb_subject.php?id=<?php echo $row12['subj_id']; ?>"> <button class="btn btn-success"><i class="fas fa-redo-alt"></i></button></a>
<a href="#delete_subject<?php echo $row12['subj_id']; ?>" data-toggle="modal" ><button class="btn btn-danger"> <i class="fa fa-trash"></i></button></a>
<?php include('editsubject.php'); ?></td>

  


</tr>
<?php $i++;
endwhile;}
else{ ?>
<td> no available data</td><td> </td><td> </td><td> </td><td> </td><td> </td>
<?php } ?>
                                       
                                        </tr>
                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
<!--close -->

  <!-- PROFANITY TABLE -->
  <?php 
$table='profanities';


$result7=mysqli_query($con,"select * from $table WHERE deleted_at='CLOSE'")or die('Error In Session');
$count7=mysqli_num_rows($result7);
$i=1;

?> 

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">PROFANITY</h6>
                        </div>

                        <div class="card-body">
					
                            <div class="table-responsive">
							
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>FILTER WORDS</th>
                                            <th>ACTION</th>         
                                       
                                          
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                        

                                      
                                            <?php
if ($count7!=0){
while($row7=mysqli_fetch_array($result7)):
?>
<tr>

<td><?php echo $row7['word'];?></td>
<td>
<a href="up_rb_profanity.php?id=<?php echo $row7['id']; ?>"> <button class="btn btn-success"><i class="fas fa-redo-alt"></i></button></a>
<a href="#deleteprofan<?php echo $row7['id']; ?>" data-toggle="modal" ><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
<?php include('editprofanity.php'); ?></td>

  


</tr>
<?php $i++;
endwhile;}
else{ ?>
<td> no available data</td><td> </td>
<?php } ?>
                                       
                                        </tr>
                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
<!--close -->

 <!-- INSTRUCTION TABLE -->
 <?php 
$table='survey';


$result14=mysqli_query($con,"select * from $table WHERE deleted_at='CLOSE'")or die('Error In Session');
$count14=mysqli_num_rows($result14);
$i=1;

?> 

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">INSTRUCTION</h6>
                        </div>

                        <div class="card-body">
					
                            <div class="table-responsive">
							
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>MODULE</th>
                                        <th>ISNTRUCTION</th>
                                            <th>ACTION</th>         
                                       
                                          
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                        

                                      
                                            <?php
if ($count14!=0){
while($row14=mysqli_fetch_array($result14)):
?>
<tr>
<td><?php echo $row14['module'];?></td>

<td><?php echo $row14['survey'];?></td>
<td>
<a href="up_rb_instruction.php?id=<?php echo $row14['id']; ?>"> <button class="btn btn-success"><i class="fas fa-redo-alt"></i></button></a>
<a href="#deleteinstra<?php echo $row14['id']; ?>" data-toggle="modal" ><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>

<?php include('editmod_survey.php'); ?></td>

  


</tr>
<?php $i++;
endwhile;}
else{ ?>
<td> no available data</td><td> </td>
<?php } ?>
                                       
                                        </tr>
                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
<!--close -->
<!-- QUESTIONNAIRE FOR FACE TO FACE CLASS TABLE -->
<?php 
$table='ques_stud';


$result5=mysqli_query($con,"select * from $table WHERE deleted_at='CLOSE'")or die('Error In Session');
$count5=mysqli_num_rows($result5);
$i=1;

?> 

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">QUESTIONNAIRE FOR FACE TO FACE CLASSES</h6>
                        </div>

                        <div class="card-body">
					
                            <div class="table-responsive">
							
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>QUESTIONNAIRE</th>
                                            <th>ACTION</th>         
                                       
                                          
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                        

                                      
                                            <?php
if ($count5!=0){
while($row5=mysqli_fetch_array($result5)):
?>
<tr>

<td><?php echo $row5['questionnaire'];?></td>
<td>
<a href="up_rb_ques_ftof.php?id=<?php echo $row5['ques_id']; ?>"> <button class="btn btn-success"><i class="fas fa-redo-alt"></i></button></a>
<a href="#deleteques<?php echo $row5['ques_id']; ?>" data-toggle="modal" ><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
<?php include('editques_stud.php'); ?></td>

  


</tr>
<?php $i++;
endwhile;}
else{ ?>
<td> no available data</td><td> </td>
<?php } ?>
                                       
                                        </tr>
                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
<!--close -->

<!-- QUESTIONNAIRE FOR PANDEMIC CLASS TABLE -->
<?php 
$table='pandemic_stud';


$result6=mysqli_query($con,"select * from $table WHERE deleted_at='CLOSE'")or die('Error In Session');
$count6=mysqli_num_rows($result6);
$i=1;

?> 

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">QUESTIONNAIRE FOR MODULAR CLASSES</h6>
                        </div>

                        <div class="card-body">
					
                            <div class="table-responsive">
							
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>QUESTIONNAIRE</th>
                                            <th>ACTION</th>         
                                       
                                          
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                        

                                      
                                            <?php
if ($count6!=0){
while($row6=mysqli_fetch_array($result6)):
?>
<tr>

<td><?php echo $row6['questionnaire'];?></td>
<td>
<a href="up_rb_ques_pandemic.php?id=<?php echo $row6['ques_id']; ?>"> <button class="btn btn-success"><i class="fas fa-redo-alt"></i></button></a>
<a href="#deletequespan<?php echo $row6['ques_id']; ?>" data-toggle="modal" ><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
<?php include('editques_pandemic.php'); ?></td>

  


</tr>
<?php $i++;
endwhile;}
else{ ?>
<td> no available data</td><td> </td>
<?php } ?>
                                       
                                        </tr>
                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
<!--close -->

<!-- QUESTIONNAIRE FOR PEER TO PEER TABLE -->
<?php 
$table='ques_peer';


$result8=mysqli_query($con,"select * from $table WHERE deleted_at='CLOSE'")or die('Error In Session');
$count8=mysqli_num_rows($result8);
$i=1;

?> 

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">QUESTIONNAIRE FOR PEER TO PEER</h6>
                        </div>

                        <div class="card-body">
					
                            <div class="table-responsive">
							
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>QUESTIONNAIRE</th>
                                            <th>ACTION</th>         
                                       
                                          
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                        

                                      
                                            <?php
if ($count8!=0){
while($row8=mysqli_fetch_array($result8)):
?>
<tr>

<td><?php echo $row8['questionnaire'];?></td>
<td>
<a href="up_rb_peer.php?id=<?php echo $row8['ques_id']; ?>"> <button class="btn btn-success"><i class="fas fa-redo-alt"></i></button></a>
<a href="#deletequespeer<?php echo $row8['ques_id']; ?>" data-toggle="modal" ><button class="btn btn-danger"><i class="fas fa-trash"></i></button></a>
<?php include('editques_peer.php'); ?></td>

  


</tr>
<?php $i++;
endwhile;}
else{ ?>
<td> no available data</td><td> </td>
<?php } ?>
                                       
                                        </tr>
                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
<!--close -->


<!-- QUESTIONNAIRE FOR SUPERIOR -->
<?php 
$table='ques_direc';


$result10=mysqli_query($con,"select * from $table WHERE deleted_at='CLOSE'")or die('Error In Session');
$count10=mysqli_num_rows($result10);
$i=1;

?> 

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">QUESTIONNAIRE FOR SUPERIOR</h6>
                        </div>

                        <div class="card-body">
					
                            <div class="table-responsive">
							
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>QUESTIONNAIRE</th>
                                            <th>ACTION</th>         
                                       
                                          
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                        

                                      
                                            <?php
if ($count10!=0){
while($row10=mysqli_fetch_array($result10)):
?>
<tr>

<td><?php echo $row10['questionnaire'];?></td>
<td>
<a href="up_rb_ques_pandemic.php?id=<?php echo $row10['ques_id']; ?>"> <button class="btn btn-success"><i class="fas fa-redo-alt"></i></button></a>
<a href="#deletequespan<?php echo $row10['ques_id']; ?>" data-toggle="modal" ><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
<?php include('editques_pandemic.php'); ?></td>

  


</tr>
<?php $i++;
endwhile;}
else{ ?>
<td> no available data</td><td> </td>
<?php } ?>
                                       
                                        </tr>
                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
<!--close -->

<!-- QUESTIONNAIRE FOR CLASSROOM OBSERVATION -->
<?php 
$table='ques_obs';


$result11=mysqli_query($con,"select * from $table WHERE deleted_at='CLOSE'")or die('Error In Session');
$count11=mysqli_num_rows($result11);
$i=1;

?> 

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">QUESTIONNAIRE FOR CLASSROOM OBSERVATION</h6>
                        </div>

                        <div class="card-body">
					
                            <div class="table-responsive">
							
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>QUESTIONNAIRE</th>
                                            <th>ACTION</th>         
                                       
                                          
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                        

                                      
                                            <?php
if ($count11!=0){
while($row11=mysqli_fetch_array($result11)):
?>
<tr>

<td><?php echo $row11['questionnaire'];?></td>
<td>
<a href="up_rb_ques_pandemic.php?id=<?php echo $row11['ques_id']; ?>"> <button class="btn btn-success"><i class="fas fa-redo-alt"></i></button></a>
<a href="#deletequespan<?php echo $row11['ques_id']; ?>" data-toggle="modal" ><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
<?php include('editques_pandemic.php'); ?></td>

  


</tr>
<?php $i++;
endwhile;}
else{ ?>
<td> no available data</td><td> </td>
<?php } ?>
                                       
                                        </tr>
                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
<!--close -->
<!-- DEPARTMENT TABLE -->
<?php 
$table='department';


$result3=mysqli_query($con,"select * from $table WHERE deleted_at='CLOSE'")or die('Error In Session');
$count3=mysqli_num_rows($result3);
$i=1;

?> 

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DEPARTMENT</h6>
                        </div>

                        <div class="card-body">
					
                            <div class="table-responsive">
							
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>DEPARTMENT CODE</th>
                                            <th>DEPARTMENT NAME</th>
                                            
                                            <th>ACTION</th>
                                          
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                        

                                      
                                            <?php
if ($count3!=0){
while($row3=mysqli_fetch_array($result3)):
?>
<tr>

<td><?php echo $row3['dept_code'];?>   </td>                
<td><?php echo $row3['dept_name'];?></td>
<td>
<a href="up_rb_department.php?id=<?php echo $row3['dept_id']; ?>"> <button class="btn btn-success"><i class="fas fa-redo-alt"></i></button></a>
<a href="#deletedepartment<?php echo $row3['dept_id']; ?>" data-toggle="modal"><button class="btn btn-danger"> <i class="fa fa-trash"></i></button></a>
<?php include('editdepartment.php'); ?></td>

  


</tr>
<?php $i++;
endwhile;}
else{ ?>
<td> no available data</td><td> </td><td> </td>
<?php } ?>
                                       
                                        </tr>
                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
 <!-- close -->
 <!-- COURSE TABLE -->
 <?php 
$table='department';
$table1='course';
$result1=mysqli_query($con,"select * from $table join $table1 on $table.dept_id=$table1.dept_id where $table1.deleted_at='CLOSE'")or die('Error In Session');
$count1=mysqli_num_rows($result1);
$i=1;

?> 
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">COURSE</h6>
                        </div>

                        <div class="card-body">
					
                            <div class="table-responsive">
							
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>

                                            <th>DEPARTMENT CODE</th>
											<th>COURSE CODE</th>
                                            <th>COURSE NAME</th>
                                            <th>ACTION</th>
                                          
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                        

                                      
                                            <?php
if ($count1!=0){
while($row1=mysqli_fetch_array($result1)):
?>
<tr>
<td><?php echo $row1['dept_code'];?>   </td> 
<td><?php echo $row1['course_code'];?>   </td>        
<td><?php echo $row1['course_name'];?></td>
<td> <a href="up_rb_course.php?id=<?php echo $row1['course_id']; ?>"> <button class="btn btn-success"><i class="fas fa-redo-alt"></i></button></a> 
  <a href="#deletecourse<?php echo $row1['course_id']; ?>" data-toggle="modal"><button class="btn btn-danger"> <i class="fa fa-trash"></i></button></a>

<?php include('editcourse.php'); ?></td>


</tr>
<?php $i++;
endwhile;}
else{ ?>
<td> no available data</td><td> </td><td> </td><td> </td>
<?php } ?>
                                       
                                        </tr>
                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
 <!-- close -->



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