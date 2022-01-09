<?php 
include('../connection.php');
if($_REQUEST['course_id']!=''){
	//echo $_REQUEST['center_id'];exit;
		$sql_subject = mysqli_query($con,"SELECT * FROM `subject` WHERE course_id ='".$_REQUEST['course_id']."'");

		//echo $sql_program;exit;
		//console.log($sql_program);exit;
				
		$total_num= mysqli_num_rows($sql_subject);

		if($total_num>0){ ?>

		<option>Select Subject</option>
		<?php while($row=mysqli_fetch_array($sql_subject)){ ?>
		<option value="<?php echo $row['subj_id'];  ?>"><?php echo $row['subj_name'];  ?></option>	
		<?php
		}
		}
		}

?>