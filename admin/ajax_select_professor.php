<?php 
include('../connection.php');
if($_REQUEST['dept_id']!='')
{
	//
		$sql_teach = mysqli_query($con,"SELECT * FROM `prof_stud` WHERE dept_id ='".$_REQUEST['dept_id']."'");
		$row=mysqli_fetch_array($sql_teach);

		$prof_id = $row['prof_id'];

		$sql_teacher = mysqli_query($con,"SELECT * FROM `prof_stud` 
		
		WHERE dept_id ='".$_REQUEST['dept_id']."'  
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