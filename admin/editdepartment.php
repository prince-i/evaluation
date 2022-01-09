<div class="modal fade" id="editdept<?php echo $row['dept_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"><br>
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel"  >Edit Department</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="editdept.php?dept=<?php echo $row['dept_id']; ?>" enctype="multipart/form-data">
                 
                    <div class="form-group">
                        <div class="row">
<div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Department Code:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="<?php echo $row['dept_code']; ?>" name="dept_code" placeholder="Department Code">
                            </div>
							<div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Department Name:</label>
                            </div>
							<div class="col-md-9">
                                <input type="text" class="form-control" value="<?php echo $row['dept_name']; ?>" name="dept_name" placeholder="Department Name">
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


<div class="modal fade" id="deletedepartment<?php echo $row3['dept_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"><br><br><br><br>
        <div class="modal-content"><br>
            <div class="modal-header">
               
                <center><h5 class="modal-title" style="font-size:22px;"id="myModalLabel">Are you sure you want to delete "<b><?php echo $row3['dept_code']; ?></b>" file? </h5></center>
				
            </div>
          
            <div class="modal-footer">
			
                <a href="delete_department.php?dept=<?php echo $row3['dept_id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancel</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>