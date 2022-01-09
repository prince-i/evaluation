<div class="modal fade" id="editsuperior<?php echo $row['super_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"><br>
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel"  >Update Director</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="editsuper.php?super=<?php echo $row['super_id']; ?>" enctype="multipart/form-data">
                 
                    <div class="form-group">
                        <div class="row">
<div class="row">

                             <div class="col-md-3" style="margin-top:20px;">
                                <label class="control-label">Number:</label>
                            </div>
							<div class="col-md-9"style="margin-top:15px;">
                                <input type="text" class="form-control" value="<?php echo $row['number']; ?>" name="number" placeholder="Phone Number">
                            </div>
                          
							
							<div class="col-md-3" style="margin-top:20px;">
                                <label class="control-label">Prefix:</label>
                            </div>
							<div class="col-md-9"style="margin-top:15px;">
                                <input type="text" class="form-control" value="<?php echo $row['prefix']; ?>" name="prefix" placeholder="Password">
                            </div>
                            <div class="col-md-3" style="margin-top:20px;">
                                <label class="control-label">Email:</label>
                            </div>
							<div class="col-md-9"style="margin-top:15px;">
                                <input type="text" class="form-control" value="<?php echo $row['email']; ?>" name="email" placeholder="Email">
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


<div class="modal fade" id="deletestudent<?php echo $row['stud_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"><br><br><br><br>
        <div class="modal-content"><br>
            <div class="modal-header">
               
                <center><h5 class="modal-title" style="font-size:22px;"id="myModalLabel">Are you sure you want to permanently delete "<b><?php echo $row['stud_lname']; ?>, <?php echo $row['stud_fname']; ?> <?php echo $row['stud_mname']; ?></b>"? </h5></center>
				
            </div>
          
            <div class="modal-footer">
			
                <a href="delete_student.php?id=<?php echo $row1['stud_id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancel</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>