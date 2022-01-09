<div class="modal fade" id="editprof<?php echo $row['prof_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"><br>
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel"  >Edit Professor</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="editprof.php?professor=<?php echo $row['prof_id']; ?>" enctype="multipart/form-data">
                 
                    <div class="form-group">
                        <div class="row">
<div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Phone:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="<?php echo $row['number']; ?>" name="number" placeholder="Phone Number">
                                <br></div>
							<div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Status:</label>
                            </div>

							<div class="col-md-9">
                                <input type="text" class="form-control" value="<?php echo $row['status']; ?>" name="status" placeholder="Status">
                                <br></div>
                           
                

                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Email:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="<?php echo $row['email']; ?>" name="email" placeholder="Email">
                                <br></div>


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


<div class="modal fade" id="deleteprof<?php echo $row['prof_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"><br>
        <div class="modal-content">
            <div class="modal-header">
               
                <center><h5 class="modal-title" style="font-size:22px;"id="myModalLabel">Are you sure you want to delete "<?php echo $row['prof_lname']; ?>, <?php echo $row['prof_fname']; ?>"? </h5></center>
				
            </div>
          
            <div class="modal-footer">
			
                <a href="deleteprof.php?professor=<?php echo $row['prof_id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancel</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>