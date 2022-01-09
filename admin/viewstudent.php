

<div class="modal fade" id="viewstudent<?php echo $row['stud_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"><br>
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel"  >Verify Student</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
               
                    <form method="POST" action="view.php?student=<?= $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
                 
                   <h5>
                    Course: <?php echo $row['course_code']; ?> &nbsp;&nbsp;|&nbsp;&nbsp;
                   Year: <?php echo $row['year_id']; ?>  &nbsp;&nbsp;|&nbsp;&nbsp;
                   Section: <?php echo $row['section']; ?><br><hr>
                       
                   ID Number: <?php echo $row['stud_id']; ?><br><hr>
                   Name: <?php echo $row['stud_lname']; ?>, <?php echo $row['stud_fname']; ?> <?php echo $row['stud_mname']; ?><br>
                 
                </h5>
               
               
                </div>
			</div>
            <div class="modal-footer">

            <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['reg_form'] ).'" width="900px" class="img-thumbnail"/>';?> 
            <hr>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancel</button>
                
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>