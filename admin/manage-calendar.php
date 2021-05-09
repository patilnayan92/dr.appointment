<?php 
    require_once "header.php";

    require_once "config.php";
    // <?php
/* Database connection start */
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "eventManager";
// $conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
// if (mysqli_connect_errno()) {
//     printf("Connect failed: %s\n", mysqli_connect_error());
//     exit();
// }
 ?>

	<!-- Title -->
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		  <h5 class="txt-dark">Calendar</h5>
		</div>
		<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		  <ol class="breadcrumb">
				<li><a href="welcome.php">Dashboard</a></li>
				<li class="active"><span>Calendar</span></li>
		  </ol>
		</div>
		<!-- /Breadcrumb -->
	</div>
	<!-- /Title -->
	<div class="row">
		<div class="col-sm-12">
			<!-- <div class="panel panel-default card-view">
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<a href="add-doctor.php" class="btn btn-primary">Add Calendar</a>
					</div>
				</div>
			</div> -->
			<div class="panel panel-default card-view">
				<div class="panel-wrapper collapse in">
					<div class="panel-body">
						<div class="page-header">
							<div class="pull-right form-inline">
								<div class="btn-group">
									<button class="btn btn-primary" data-calendar-nav="prev"><< Prev</button>
									<button class="btn btn-default" data-calendar-nav="today">Today</button>
									<button class="btn btn-primary" data-calendar-nav="next">Next >></button>
								</div>
								<div class="btn-group">
									<button class="btn btn-warning" data-calendar-view="year">Year</button>
									<button class="btn btn-warning active" data-calendar-view="month">Month</button>
									<button class="btn btn-warning" data-calendar-view="week">Week</button>
									<button class="btn btn-warning" data-calendar-view="day">Day</button>
								</div>
							</div>
							<h3></h3>
							<small>To see example with events navigate to Februray 2018</small>
						</div>

						<div class="row">
							<div class="col-md-9">
								<div id="showEventCalendar"></div>
							</div>
							<div class="col-md-3">
								<h4>All Appointment List</h4>
								<ul id="eventlist" class="nav nav-list"></ul>
							</div>
						</div>	
					</div>
				</div>
			</div>	
		</div>
	</div>


<?php 
  require_once "footer.php";
?>