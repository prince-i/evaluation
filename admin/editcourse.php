<div class="modal fade" id="editcourse<?php echo $row['course_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"><br>
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel"  >Edit Course</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="editco.php?course=<?php echo $row['course_id']; ?>" enctype="multipart/form-data">
                 
                    <div class="form-group">
                        <div class="row">
<div class="row">

                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Course Code:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="<?php echo $row['course_code']; ?>" name="course_code" placeholder="Department Code">
                            </div>
							<div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Course Name:</label>
                            </div>
							<div class="col-md-9">
                                <input type="text" class="form-control" value="<?php echo $row['course_name']; ?>" name="course_name" placeholder="Department Name">
                            </div>
                        </div>
                        </div>
                    </div>
                  
                </div>
			</div>
            <div class="modal-footer">
			<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancel</button>
                
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="deletecourse<?php echo $row1['course_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"><br><br><br><br>
        <div class="modal-content"><br>
            <div class="modal-header">
               
                <center><h5 class="modal-title" style="font-size:22px;"id="myModalLabel">Are you sure you want to permanently delete "<b><?php echo $row1['course_code']; ?></b>" file? </h5></center>
				
            </div>
          
            <div class="modal-footer">
			
                <a href="delete_course.php?id=<?php echo $row1['course_id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancel</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>