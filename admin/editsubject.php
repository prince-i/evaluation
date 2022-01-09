<div class="modal fade" id="editsubject<?php echo $row['subj_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"><br>
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel"  >Edit Subject</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="editsubj.php?subject=<?php echo $row['subj_id']; ?>" enctype="multipart/form-data">
                 
                    <div class="form-group">
                        <div class="row">
<div class="row">

                            <div class="col-md-6" style="margin-top:7px;">
                                <label class="control-label">Subject Code:</label>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" value="<?php echo $row['subj_code']; ?>" name="subj_code" placeholder="Subject Code">
                            </div>
							<div class="col-md-6" style="margin-top:7px;">
                                <label class="control-label">Subject Name:</label>
                            </div>
							 <div class="col-md-12">
                                <input type="text" class="form-control" value="<?php echo $row['subj_name']; ?>" name="subj_name" placeholder="Subject Name">
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


<div class="modal fade" id="delete_subject<?php echo $row12['subj_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"><br>
        <div class="modal-content">
            <div class="modal-header">
               
                <center><h5 class="modal-title" style="font-size:22px;"id="myModalLabel">Are you sure you want to delete "<?php echo $row12['subj_code']; ?>"? </h5></center>
				
            </div>
          
            <div class="modal-footer">
			
                <a href="delete_subject.php?subject=<?php echo $row12['subj_id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancel</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>