<?php 
include('../connection.php');
if($_REQUEST['dept_id']!=''){
	//echo $_REQUEST['center_id'];exit;
		$sql_program = mysqli_query($con,"select * from `course` WHERE dept_id ='".$_REQUEST['dept_id']."'");

		//echo $sql_program;exit;
		//console.log($sql_program);exit;
				
		$total_num= mysqli_num_rows($sql_program);

		if($total_num>0){ ?>

		<option>Select Course</option>
		<?php while($row=mysqli_fetch_array($sql_program)){ ?>
		<option value="<?php echo $row['course_id'];  ?>"><?php echo $row['course_name'];  ?></option>	
		<?php
		}
		}
		}

?>