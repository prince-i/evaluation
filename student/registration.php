<?php 
include('../connection.php');
$table = 'verify_stud';

$id = isset($_GET['id']) ? $_GET['id'] : '';
$stud_id = isset($_POST['stud_id']) ? mysqli_real_escape_string($con, $_POST['stud_id']) : '';
$dept_id = isset($_POST['dept_id']) ? mysqli_real_escape_string($con, $_POST['dept_id']) : '';
$course_id = isset($_POST['course_id']) ? mysqli_real_escape_string($con, $_POST['course_id']) : '';
$stud_fname = isset($_POST['stud_fname']) ? mysqli_real_escape_string($con, $_POST['stud_fname']) : '';
$stud_mname = isset($_POST['stud_mname']) ? mysqli_real_escape_string($con, $_POST['stud_mname']) : '';
$stud_lname = isset($_POST['stud_lname']) ? mysqli_real_escape_string($con, $_POST['stud_lname']) : '';
$email = isset($_POST['email']) ? mysqli_real_escape_string($con, $_POST['email']) : '';
$number = isset($_POST['number']) ? mysqli_real_escape_string($con, $_POST['number']) : '';
$year_id = isset($_POST['year_id']) ? mysqli_real_escape_string($con, $_POST['year_id']) : '';
$section = isset($_POST['section']) ? mysqli_real_escape_string($con, $_POST['section']) : '';
$username = isset($_POST['username']) ? mysqli_real_escape_string($con, $_POST['username']) : '';
$password = isset($_POST['password']) ? mysqli_real_escape_string($con, $_POST['password']) : '';
$deleted_at = isset($_POST['deleted_at']) ? mysqli_real_escape_string($con, $_POST['deleted_at']) : '';
if (isset($_POST['save'])) {
    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $result = mysqli_query($con,"INSERT INTO $table (stud_id,dept_id,course_id,stud_fname,stud_mname,stud_lname, email,year_id, number, username,password,reg_form,section, deleted_at)
	VALUES ('$stud_id','$dept_id','$course_id','$stud_fname','$stud_mname','$stud_lname','$email','$year_id','$number','$username','$password','$file','$section','OPEN')") or die('Error In Session');
    
    echo '<meta http-equiv="refresh" content="1;url=login.php">';
}
isset($result) ? $message = '<p class="message">Save success</p>' : $message = '';
?> 
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<br>
<div class="container">
            <form class="form-horizontal" method="post" action=""role="form" id="image_form"  enctype="multipart/form-data">
                <h2>Registration</h2>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Student ID</label>
                    <div class="col-sm-9">
                        <input type="text" name="stud_id" placeholder="Student ID" class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-3 control-label">Department</label>
                    <div class="col-sm-9">
                        <select class="form-control" style=" height:35px;" id="dept_id" name="dept_id" onchange="select_course(this.value)" required>
                            <option value="">Select Department</option>
                                <?php 
                                    $qry=mysqli_query($con,"select * from `department`");
                                    while($row=mysqli_fetch_array($qry))
                                    {
                                ?>
                            <option value="<?php echo $row['dept_id'];?>"><?php echo $row['dept_name'];?></option>
                                <?php }?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Course</label>
                    <div class="col-sm-9">
                        <select class="form-control" style=" height:35px;" id="courseid" name="course_id" required>
                        <!--  <?php 
                                    $qry2=mysqli_query($con,"select * from `course`");
                                    while($row2=mysqli_fetch_array($qry2))
                                    {
                        ?>
                        
                    <option value="<?php echo $row2['course_id'];?>"><?php echo $row2['course_name'];?></option>
                    <?php }?> -->
                            </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="year_id" class="col-sm-3 control-label">Year</label>
                    <div class="col-sm-9">
                        <select class="form-control" style=" height:35px;" id="year_id" name="year_id" required>
                            <option value="">Select Year Level</option>
                                <?php 
                                    $qry=mysqli_query($con,"select * from `year`");
                                    while($row=mysqli_fetch_array($qry))
                                    {
                                ?>
                            <option value="<?php echo $row['year_id'];?>"><?php echo $row['year'];?></option>
                                <?php }?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-3 control-label">Section</label>
                    <div class="col-sm-9">
                    <select name="section" id="section" style=" height:35px;" class="form-control" required>
            <option value="1" id="1">Section 1</option>
            <option value="2" id="2">Section 2</option>
            <option value="3" id="3">Section 3</option>
            <option value="4" id="4">Section 4</option>
            <option value="5" id="5">Section 5</option>
            <option value="6" id="6">Section 6</option>
            </select>
                    </div>
                </div>

                <div class="form-group">
                    <label  class="col-sm-3 control-label">First Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="stud_fname" placeholder="First Name" class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="stud_mname" class="col-sm-3 control-label">MIddle Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="stud_mname" placeholder="Middle Name" class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-3 control-label">Last Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="stud_lname" placeholder="Last Name" class="form-control" autofocus>
                    </div>
                </div>
                
                <div class="form-group">
                    <label  class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" name="email" placeholder="Email" class="form-control" name= "email">
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-3 control-label">Number </label>
                    <div class="col-sm-9">
                        <input type="text" name="number" placeholder="Phone Number" class="form-control" name= "number">
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-3 control-label">Username</label>
                    <div class="col-sm-9">
                        <input type="text" name="username" placeholder="Username" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" name="password" placeholder="Password" class="form-control">
                    </div>
                </div>
                <input type="file" name="image" id="image" /></p><br />
			 <input type="hidden" name="image_id" id="image_id" />
              
                <button type="submit" name="save" class="btn btn-primary btn-block">Register</button><br>
                <div style="color: black;font-size: 16px; letter-spacing: 1px;font-family: 'Open Sans', sans-serif;">Already have an account? <a href="login.php" style="text-weight:bold; font-size: 18px; letter-spacing: 2px; color:black; text-transform: uppercase;text-decoration: underline;">Sign in</a></div>
            </form> <!-- /form -->
           
        </div> <!-- ./container -->

        <style>
            body {
     background: #8a8a8a;
    background-size: contain;
}

*[role="form"] {
    max-width: 530px;
    padding: 15px;
    margin: 0 auto;
    border-radius: 0.3em;
    background-color: #f2f2f2;
}

*[role="form"] h2 { 
    font-family: 'Open Sans' , sans-serif;
    font-size: 40px;
    font-weight: 600;
    color: #000000;
    margin-top: 5%;
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 4px;
}

        </style>
        
<script type="text/javascript">
 
 function select_course(dept_id){
     //alert(dept_id);exit;
     $.ajax({

         url: 'select_course_ajax.php',
         data: "dept_id="+dept_id,
         success:function(msg){

             //alert(msg);exit;
             $("#courseid").html(msg);

         }
     });
 }
</script>