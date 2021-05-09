<?php 
    require_once "header.php";
    // Include config file
		require_once "config.php";
?>
	<!--main content start-->

	<!-- Row -->
	<div class="row">
		<?php if($_SESSION['role'] == 'Admin'){ ?>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<div class="panel panel-default card-view pa-0">
					<div class="panel-wrapper collapse in">
						<div class="panel-body pa-0">
							<div class="sm-data-box">
								<div class="container-fluid">
									<div class="row">
										<a href="doctors.php">
											<div class="col-xs-8 text-center pl-0 pr-0 data-wrap-left">
												<span class="txt-dark block counter"><span class="counter-anim">
													<?php
                            $query = "SELECT * FROM users WHERE role = 'Doctor'";
                            $get_doctor = mysqli_query($link, $query);
                            $count_doctor = mysqli_num_rows($get_doctor);
                            echo $count_doctor;
                        	 ?>
												</span></span>
												<span class="weight-500 uppercase-font block font-13">Doctors</span>
											</div>
											<div class="col-xs-4 text-center  pl-0 pr-0 data-wrap-right">
												<i class="icon-user-following data-right-rep-icon txt-light-grey"></i>
											</div>
										</a>
									</div>	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<div class="panel panel-default card-view pa-0">
					<div class="panel-wrapper collapse in">
						<div class="panel-body pa-0">
							<div class="sm-data-box">
								<div class="container-fluid">
									<div class="row">
										<a href="capture-lead-list.php">
											<div class="col-xs-8 text-center pl-0 pr-0 data-wrap-left">
												<span class="txt-dark block counter"><span class="counter-anim">
													<?php
	                          $query = "SELECT * FROM appointments";
	                          $get_appointment = mysqli_query($link, $query);
	                          $count_appointment = mysqli_num_rows($get_appointment);
	                          echo $count_appointment;
	                      	?>
												</span></span>
												<span class="weight-500 uppercase-font block">Appointments</span>
											</div>
											<div class="col-xs-4 text-center  pl-0 pr-0 data-wrap-right">
												<i class="icon-user-following data-right-rep-icon txt-light-grey"></i>
											</div>
										</a>
									</div>	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<div class="panel panel-default card-view pa-0">
					<div class="panel-wrapper collapse in">
						<div class="panel-body pa-0">
							<div class="sm-data-box">
								<div class="container-fluid">
									<div class="row">
										<a href="reject-capture-lead-list.php">
											<div class="col-xs-8 text-center pl-0 pr-0 data-wrap-left">
												<span class="txt-dark block counter"><span class="counter-anim">
													<?php
	                          $query = "SELECT * FROM appointments";
	                          $get_patients = mysqli_query($link, $query);
	                          $count_patients = mysqli_num_rows($get_patients);
	                          echo $count_patients;
	                        ?>
												</span></span>
												<span class="weight-500 uppercase-font block">Patients</span>
											</div>
											<div class="col-xs-4 text-center  pl-0 pr-0 data-wrap-right">
												<i class="icon-user-following data-right-rep-icon txt-light-grey"></i>
											</div>
										</a>
									</div>	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if($_SESSION['role'] == 'Doctor'){ ?>
			<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
				<div class="panel panel-default card-view pa-0">
					<div class="panel-wrapper collapse in">
						<div class="panel-body pa-0">
							<div class="sm-data-box">
								<div class="container-fluid">
									<div class="row">
										<a href="delete-capture-lead-list.php">
											<div class="col-xs-8 text-center pl-0 pr-0 data-wrap-left">
												<span class="txt-dark block counter"><span class="counter-anim">
													<?php
														$docId = $_SESSION["id"];
	                          $query = "SELECT * FROM appointments WHERE userDocId = $docId";
	                          $get_docAppointment = mysqli_query($link, $query);
	                          $count_docAppointment = mysqli_num_rows($get_docAppointment);
	                          echo $count_docAppointment;
	                      	?>
												</span></span>
												<span class="weight-500 uppercase-font block">Appointments</span>
											</div>
											<div class="col-xs-4 text-center  pl-0 pr-0 data-wrap-right">
												<i class="icon-user-following data-right-rep-icon txt-light-grey"></i>
											</div>
										</a>
									</div>	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
	<!-- /Row -->

<?php 
    require_once "footer.php";
?>