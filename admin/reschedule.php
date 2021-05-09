
<?php 
    require_once "header.php";

    require_once "config.php";
    // Check existence of id parameter before processing further
	if(isset($_GET['id'])){
	    $id = $_GET['id'];
	    $query = "SELECT * FROM appointments WHERE id = $id";
	    
	    $result = mysqli_query($link, $query);

	    while($row = mysqli_fetch_assoc($result)){
	    	$name = $row['name'];
	    	$email = $row['email'];
	    	$mobile = $row['mobile'];
	    	$appointment_date = $row['appointment_date'];
	    	$appointment_time = $row['appointment_time'];
	    	$userDocId = $row['userDocId'];
	    	$docId = $row['userDocId'];
	  		$query1 = "SELECT * FROM users WHERE id = $docId";
	  		$getDrName = mysqli_query($link, $query1);
	  		while($row1 = mysqli_fetch_assoc($getDrName)) {
	  			$docName = $row1['name'];
	  		}
	    }
	}
 ?>

 	<!-- Title -->
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		  <h5 class="txt-dark">Reschedule Appointment</h5>
		</div>
		<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		  <ol class="breadcrumb">
			<li><a href="welcome.php">Dashboard</a></li>
			<li><a href="appointments.php">Appointments List</a></li>
			<li class="active"><span>Reschedule Appointment</span></li>
		  </ol>
		</div>
		<!-- /Breadcrumb -->
	</div>
<!-- /Title -->

	<div class="row">
		<div class="panel panel-default card-view">
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<div class="col-md-12 border-right">
						<div class="title mb-10">
							<h4 class="text-center mb-20">Patient Name: <?php echo $name ?></h4>
							<hr />
						</div>
						<div class="details">
							<form class="form-horizontal" action="update-timeslote.php" method="POST" id="contactForm" enctype="multipart/form-data">
								<div class="alert alert-danger display-error" style="display: none">
          						</div>
          						<input type="hidden" class="form-control" id="appointId" name="id" value="<?php echo $id; ?>">
								<div class="form-group">
							      <label class="control-label col-sm-4" for="name">Name:</label>
							      <div class="col-sm-8">
							        <input type="text" class="form-control" id="fullName" name="name" value="<?php echo $name; ?>">
							        
							      </div>
							    </div>
							    <div class="form-group">
							      <label class="control-label col-sm-4" for="email">Email ID:</label>
							      <div class="col-sm-8">
							        <input type="text" class="form-control" id="emailID" name="email" value="<?php echo $email; ?>">
							      
							      </div>
							    </div>
							    <div class="form-group">
							      <label class="control-label col-sm-4" for="mobile">Mobile Number:</label>
							      <div class="col-sm-8">
							        <input type="text" class="form-control" id="MobileNo" name="mobile" value="<?php echo $mobile; ?>">
							       
							      </div>
							    </div>
							    <div class="form-group">
							      <label class="control-label col-sm-4" for="doctor">Doctor:</label>
							      <div class="col-sm-8">
							        <input type="text" class="form-control" id="doctor" name="doctor" value="<?php echo $docName; ?>" readonly>
							        <input type="hidden" class="form-control" id="selectDoctor" name="doctorId" value="<?php echo $userDocId ?>">
							      </div>
							    </div>
							    <div class="form-group">
							      <label class="control-label col-sm-4" for="appointmentDate">Appointment Date:</label>
							      <div class="col-sm-8">
							        <input type="date" class="form-control" id="appointDate" name="appointment_date" value="<?php echo $appointment_date; ?>">
							      </div>
							    </div>
							    <div class="form-group">
							      <label class="control-label col-sm-4" for="time">Appointment Time:</label>
							      <div class="col-sm-8">
							        <input type="text" class="form-control" id="time" name="appointment_time" value="<?php echo $appointment_time; ?>" readonly="">
							      </div>
							    </div>

							    <div class="form-group">
							      	<label class="control-label col-sm-4" for="time">Select Appointment Time:</label>
							      	<div class="col-sm-8">
							            <!-- <div class="appointmentSlots slots"> -->
							                <div id="availableDate"></div>
							            <!-- </div> -->
							      	</div>
							    </div>

							    <div class="form-group">        
							      <div class="col-sm-offset-4 col-sm-8">
							        <button type="submit" id="updateAppointment" name="updateAppointment" class="btn btn-primary">Update Appointment</button>
							      </div>
							    </div>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>

	
<?php 
    require_once "footer.php";
?>