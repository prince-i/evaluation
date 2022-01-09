<?php include("../session.php");  
include('../connection.php');
$table='department';


$result=mysqli_query($con,"select * from $table WHERE deleted_at='OPEN'")or die('Error In Session');
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
                    <h1 class="h2 mb-2 text-gray-800">DEPARTMENT</h1>
                    

                    <!-- DEPARTMENT TABLE -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Department Table</h6>
                        </div>

                        <div class="card-body">
					
                            <div class="table-responsive">
								<!--ADD-->
							<a class="btn btn-primary" href="adddepartment.php">
                   <i class="fas fa-plus"></i>
                    <span>ADD</span></a><br><br>
					<!--END OF ADD-->
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
if ($count!=0){
while($row=mysqli_fetch_array($result)):
?>
<tr>

<td><?php echo $row['dept_code'];?>   </td>                
<td><?php echo $row['dept_name'];?></td>
<td>
  <a href="#editdept<?php echo $row['dept_id']; ?>" data-toggle="modal"> <button class="btn btn-success"><i class="fas fa-edit"></i></button></a> 
  <a href="rb_department.php?id=<?php echo $row['dept_id']; ?>"><button class="btn btn-danger"> <i class="fa fa-trash"></i></button></a>
<?php include('editdepartment.php'); ?></td>

  


</tr>
<?php $i++;
endwhile;}
else{ ?>
<td> no available data</td>
<?php } ?>
                                       
                                        </tr>
                                     
                                    </tbody>
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