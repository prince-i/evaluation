<?php 
include('../connection.php');
if($_REQUEST['subj_id']!='')

{
	//
		$sql_teach = mysqli_query($con,"SELECT * FROM `assign_subj` WHERE subj_id ='".$_REQUEST['subj_id']."'");
		$row=mysqli_fetch_array($sql_teach);

		$prof_id = $row['prof_id'];

		$sql_teacher = mysqli_query($con,"SELECT * FROM `assign_subj` 
		INNER JOIN prof_stud on prof_stud.prof_id=assign_subj.prof_id
		WHERE subj_id ='".$_REQUEST['subj_id']."'  
		GROUP BY
              prof_stud.prof_id	
		");
		
				
		$total_num= mysqli_num_rows($sql_teacher);

		if($total_num>0){ ?>

		<option>Select Professor</option>
		<?php while($row_teacher=mysqli_fetch_array($sql_teacher)){ ?>
		<option value="<?php echo $row_teacher['prof_id'];  ?>"><?php echo $row_teacher['prof_lname'];  ?>, <?php echo $row_teacher['prof_fname'];  ?></option>	
		<?php
		}
		}
		}

?>