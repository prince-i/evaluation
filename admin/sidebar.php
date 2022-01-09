<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

  <title>CCC Faculty System</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>
<!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                
                <div class="sidebar-brand-text mx-3">CCC EVALUATION SYSTEM</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
   <img src="../img/ccc.jpg" class="rounded mx-auto d-block" width="90%" alt="..." >
   <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>DASHBOARD</span></a>
            </li>
            

            <!-- Divider -->
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="recyclebin.php">
                <i class="fa fa-trash" aria-hidden="true"></i>
                    <span>RECYCLE BIN</span></a>
            </li>
            

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
           
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-info-circle"></i>
                    <span>INFORMATION</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h4 class="collapse-header">INFORMATION MANAGEMENT</h4>
                        <a class="collapse-item" href="department.php"><b>DEPARTMENT</a>
                        <a class="collapse-item" href="course.php">COURSE</a>
                        <a class="collapse-item" href="instruction.php">INSTRUCTIONS</a>
                        <a class="collapse-item" href="profanity.php">PROFANITY</a>
                        <a class="collapse-item" href="director.php">DIRECTOR</a>
						<a class="collapse-item" href="professor.php">FACULTY MEMBER</a>
                        <a class="collapse-item" href="student.php">STUDENTS</a>
                        <a class="collapse-item" href="subject.php">SUBJECTS</a></b>
                       
                    </div>
                </div>
            </li>
             <!-- Nav Item - Pages Collapse Menu -->
         

            <!-- Nav Item - QUESTIONNAIRE Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                   <i class="fas fa-question-circle"></i>
                    <span>QUESTIONNAIRE</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h4 class="collapse-header">QUESTIONNAIRE MANAGEMENT:</h4>
                        <a class="collapse-item" href="ques_ftof.php"><b>FACE TO FACE</b></a>
                        <a class="collapse-item" href="ques_pandemic.php"><b>MODULAR</b></a>
                        <a class="collapse-item" href="ques_peer.php"><b>PEER TO PEER</b></a>
                        <a class="collapse-item" href="ques_obs.php"><b>CLASSROOM OBS</b></a>
                        <a class="collapse-item" href="ques_superior.php"><b>SUPERIOR</b></a>
                    </div>
                </div>
            </li>

         

            <!-- Nav Item - student faculty Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1"
                    aria-expanded="true" aria-controls="collapsePages1">
                    <i class="fas fa-user-friends"></i>
                    <span>STUDENT-FACULTY</span>
                </a>
                <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Student Faculty <br>Evaluation Management</h6>
                      
                        <a class="collapse-item" href="assignsubject.php"><b>ASSIGN SUBJECT</b></a>
                       
                    </div>
                </div>
            </li>
			            <!-- Nav Item - peer to peer Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-people-arrows"></i>
                    <span>PEER-TO-PEER</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Peer-to-peer<br>Evaluation Management</h6>
                   
                        <a class="collapse-item" href="facultymem.php"><b>FACULTY MEMBER</a></b>
                       
                    </div>
                </div>
            </li>
	<!-- Nav Item - CLASSROOM OBSERVATION Collapse Menu -->
    <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages5"
                    aria-expanded="true" aria-controls="collapsePages5">
                    <i class="fas fa-users-class"></i>
                    <span>CLASSROOM OBS</span>
                </a>
                <div id="collapsePages5" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Classroom Observation<br>Evaluation Management</h6>
                   
                        <a class="collapse-item" href="classroomobs.php"><b>COORDINATOR</a></b>
                       
                    </div>
                </div>
            </li>
	
<!-- Divider -->
            <hr class="sidebar-divider">
			
            <!-- Nav Item - evaluation -->
			  <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages4"
                    aria-expanded="true" aria-controls="collapsePages3">
                  <i class="fas fa-poll"></i>
                    <span>FACULTY <br> &nbsp; &nbsp;&nbsp;&nbsp;MEMBER RESULT</span>
                </a>
                <div id="collapsePages4" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">STUDENT RESULT<br>Evaluation Management</h6>
                        <a class="collapse-item" href="student_evalresult.php"><b>FACE TO FACE</a>
                        <a class="collapse-item" href="student_evalresult1.php">MODULAR</a></b>
                       
                    </div>
                </div>
            </li>
			
            <li class="nav-item">
                <a class="nav-link" href="peer_evalresult.php">
                   <i class="fas fa-poll"></i>
                    <span>PEER TO PEER RESULT</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="classroomobs_evalresult.php">
                     <i class="fas fa-poll"></i>
                    <span>CLASSROOM OBSERVATION EVALUATION</span></a>
            </li>
			
			 <li class="nav-item">
                <a class="nav-link" href="superior_evalresult.php">
                     <i class="fas fa-poll"></i>
                    <span>SUPERIOR EVALUATION</span></a>
            </li>


            <!-- Nav Item - Tables -->
          

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            

        </ul>
        <!-- End of Sidebar -->
		



</html>