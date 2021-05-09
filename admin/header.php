<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Admin panel </title>
	<meta name="description" content="Naraci Admin Panel" />
	<meta name="keywords" content="Interior, Designers" />
	<meta name="author" content="Naraci"/>
	<link rel="icon" href="img/favicon.ico" type="image/x-icon">
	<!-- Favicon -->
	<!-- <link rel="shortcut icon" href="favicon.ico"> -->
	<!-- <link rel="icon" href="favicon.ico" type="image/x-icon"> -->
	<link href="vendors/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

	<!-- vector map CSS -->
	<link href="vendors/bower_components/jquery-wizard.js/css/wizard.css" rel="stylesheet" type="text/css"/>
		
	<!-- jquery-steps css -->
	<link rel="stylesheet" href="vendors/bower_components/jquery.steps/demo/css/jquery.steps.css">
	<!-- Summernote css -->
	<link rel="stylesheet" href="vendors/bower_components/summernote/dist/summernote.css" />
	<!-- Bootstrap Wysihtml5 css -->
	<!-- <link rel="stylesheet" href="vendors/bower_components/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.css" /> -->
	<!-- select2 CSS -->
	<link href="vendors/bower_components/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css"/>
	
	<!-- Data table CSS -->
	<link href="vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	
	<link href="vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
	
	<!-- select2 CSS -->
	<!-- <link href="vendors/bower_components/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css"/> -->
		
	<!-- bootstrap-select CSS -->
	<link href="vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>
		
	<!-- multi-select CSS -->
	<link href="vendors/bower_components/multiselect/css/multi-select.css" rel="stylesheet" type="text/css"/>
	<!-- <link rel="stylesheet" href="vendors/bower_components/summernote/dist/summernote.css" /> -->
	<!-- Custom CSS -->
	<link href="dist/css/style.css" rel="stylesheet" type="text/css">
	
	<link rel="stylesheet" href="dist/css/calendar.css">

</head>
<body>
	<!-- Preloader -->
	<!--<div class="preloader-it">-->
	<!--	<div class="la-anim-1"></div>-->
	<!--</div>-->
	<!-- /Preloader -->
    <div class="wrapper theme-1-active pimary-color-green">
		<!-- Top Menu Items -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="mobile-only-brand pull-left">
				<div class="nav-header pull-left">
					<div class="logo-wrap">
						<a href="welcome.php">
							<!-- <img class="brand-img " src="img/naraci-updated.png" alt="brand"/> -->
							<span class="brand-text">Admin</span>
						</a>
					</div>
				</div>	
				<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
				<!-- <a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a> -->
				<a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
			</div>
			<div id="mobile_only_nav" class="mobile-only-nav pull-right">
				<ul class="nav navbar-right top-nav pull-right">
					<li class="dropdown auth-drp">
						<a href="#" class="dropdown-toggle pr-10" data-toggle="dropdown"><?php echo htmlspecialchars($_SESSION["username"]); ?> <i class="zmdi zmdi-chevron-down"></i></a>
						<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
							<li>
								<?php
									require_once "config.php";
									$id=$_SESSION['id'];
									$query = "SELECT * FROM users WHERE id='$id'";
	                                $get_lead = mysqli_query($link, $query);
	                                
	                                while($row = mysqli_fetch_assoc($get_lead)){ 
	                                	$id = $row['id'];                          
	                              
	                            ?>
								<a href="profileinfo.php?id=<?php echo $id ?>"> 

									<i class="zmdi zmdi-account"></i><span>Profile</span>
								</a>
								<?php
                                	}
                                ?>
							</li>
							<li>
								<a href="logout.php"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
							</li>
						</ul>
					</li>
				</ul>
			</div>	
		</nav>
		<!-- /Top Menu Items -->
		
		<!-- Left Sidebar Menu -->
		<div class="fixed-sidebar-left">
			<ul class="nav navbar-nav side-nav nicescroll-bar">
				<li class="navigation-header">
					<span>Main</span> 
					<i class="zmdi zmdi-more"></i>
				</li>

				<?php if($_SESSION['role'] == 'Admin'){ ?>
				
				<li>
					<a href="welcome.php"><div class="pull-left"><i class="zmdi zmdi-palette mr-20"></i><span class="right-nav-text">Dashboard</span></div><div class="clearfix"></div></a>
				</li>
				
				<li><hr class="light-grey-hr mb-10"/></li>
				
				<li>
					<a href="doctors.php"><div class="pull-left"><i class="zmdi zmdi-face mr-20"></i><span class="right-nav-text">Manage Doctor </span></div><div class="clearfix"></div></a>
				</li>
				<li><hr class="light-grey-hr mb-10"/></li>

				<li>
					<a href="appointments.php"><div class="pull-left"><i class="zmdi zmdi-apps mr-20"></i><span class="right-nav-text">Manage Appointment </span></div><div class="clearfix"></div></a>
				</li>

				<li><hr class="light-grey-hr mb-10"/></li>

				<li>
					<a href="manage-timeslot.php"><div class="pull-left"><i class="zmdi zmdi-apps mr-20"></i><span class="right-nav-text">Manage TimeSlot </span></div><div class="clearfix"></div></a>
				</li>

				<li><hr class="light-grey-hr mb-10"/></li>

				<li>
					<a href="manage-calendar.php"><div class="pull-left"><i class="zmdi zmdi-calendar-alt mr-20"></i><span class="right-nav-text">Manage Calendar </span></div><div class="clearfix"></div></a>
				</li>
				<li><hr class="light-grey-hr mb-10"/></li>

				<li>
					<a href="patients.php"><div class="pull-left"><i class="zmdi zmdi-face mr-20"></i><span class="right-nav-text">Manage Patient</span></div><div class="clearfix"></div></a>
					
				</li>
				<li><hr class="light-grey-hr mb-10"/></li>
				<?php } ?>

				<?php if($_SESSION['role'] == 'Doctor'){ ?>
					<li>
						<a href="welcome.php"><div class="pull-left"><i class="zmdi zmdi-palette mr-20"></i><span class="right-nav-text">Dashboard</span></div><div class="clearfix"></div></a>
					</li>
					<li><hr class="light-grey-hr mb-10"/></li>
					<li>
						<a href="appointments.php"><div class="pull-left"><i class="zmdi zmdi-apps mr-20"></i><span class="right-nav-text">View Appointment</span></div><div class="clearfix"></div></a>
					</li>
					<li><hr class="light-grey-hr mb-10"/></li>
					<!-- <li>
						<a href="capture-lead-list.php"><div class="pull-left"><i class="zmdi zmdi-calendar-alt mr-20"></i><span class="right-nav-text">View Calender</span></div><div class="clearfix"></div></a>
					</li>
					<li><hr class="light-grey-hr mb-10"/></li> -->
				<?php } ?>
			</ul>
		</div>
		<!-- /Left Sidebar Menu -->
		<!-- Right Sidebar Backdrop -->
		<div class="right-sidebar-backdrop"></div>
		<!-- /Right Sidebar Backdrop -->
		<div class="page-wrapper">
    <div class="container-fluid pt-25">