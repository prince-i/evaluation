<div class="modal fade" id="editquespeer<?php echo $row['ques_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"><br>
        <div class="modal-content">
            <div class="modal-header">
                <center><h4 class="modal-title" id="myModalLabel"  >Edit Questionnaire</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="editques3.php?questionnaire=<?php echo $row['ques_id']; ?>" enctype="multipart/form-data">
                 
                    <div class="form-group">
                        <div class="row">
<div class="row">

                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Questionnaire:</label>
                            </div>
                            </div>
                            <textarea class="form-control"  name="questionnaire" style=" height:200px ;" placeholder="Questionnaire"> <?php echo $row['questionnaire']; ?></textarea>
                        
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


<div class="modal fade" id="deletequespeer<?php echo $row8['ques_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"><br><br><br><br><br><br><br>
        <div class="modal-content">
            <div class="modal-header">
               
                <center><h5 class="modal-title" style="font-size:22px;"id="myModalLabel">Are you sure you want to delete "<b><?php echo $row8['questionnaire']; ?></b>"? </h5></center>
				
            </div>
          
            <div class="modal-footer">
			
                <a href="deletequespeer.php?questionnaire=<?php echo $row8['ques_id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fas fa-window-close"></i> Cancel</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>