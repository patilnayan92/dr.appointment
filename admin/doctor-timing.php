
<?php 
    require_once "header.php";

    require_once "config.php";
    // Check existence of id parameter before processing further
	if(isset($_GET['id'])){
	    $id = $_GET['id'];
	    $query = "SELECT * FROM users WHERE id = $id";
	    
	    $result = mysqli_query($link, $query);

	    while($row = mysqli_fetch_assoc($result)){
	    	$name = $row['name'];
	    }
	}
 ?>

 	<!-- Title -->
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		  <h5 class="txt-dark">Edit Time Slots</h5>
		</div>
		<!-- Breadcrumb -->
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		  <ol class="breadcrumb">
			<li><a href="welcome.php">Dashboard</a></li>
			<li><a href="doctors.php">Doctor List</a></li>
			<li class="active"><span>Edit Time Slots </span></li>
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
							<h4 class="text-center mb-20">Doctor Name: <?php echo $name ?></h4>
							<hr />
						</div>
						<div class="details">
							<form action="update-timeslot.php" method="post" class="form-horizontal">
								<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id; ?>">
								<div class="form-group">
									<div class="col-md-6">
							      		<label class="control-label" for="degree">Select Doctor:</label>
							      		<input type="text" class="form-control" id="doctorName" name="doctor" value="<?php echo $name; ?>" readonly="">
							      	</div>
							    <!-- </div>
							    <div class="form-group"> -->
							    	<div class="col-md-6">
										<label class="control-label" for="formrow-firstname-input">Select Day</label>
										<select class="form-control" name="day" id="duration_0_0" >
											<option selected="" disabled="" value="">-- Select Day --</option>
											<option value='Monday'>Monday</option>
											<option value='Tuesday'>Tuesday</option>
											<option value='Wednesday'>Wednesday</option>
											<option value='Thursday'>Thursday</option>
											<option value='Friday'>Friday</option>
											<option value='Saturday'>Saturday</option>
											<option value='Sunday'>Sunday</option>
										</select>
									</div>
							    </div>
							    <div class="row" style="margin-top: 28px;">	</div>
							    <div class="form-group mt-3">
									<div class="col-md-3">
										<label for="formrow-firstname-input">Start Time</label>
										<input type="time" class="form-control" id="start_time_0_0" name="starttime" value="09:00">
									</div>
									<div class="col-md-3">
										<label for="formrow-firstname-input">End Time</label>
										<input type="time" class="form-control" id="end_time_0_0" name="endtime" value="12:30">
									</div>
									<div class="col-md-3">
										<label for="formrow-firstname-input">Duration</label>
										<select class="form-control" name="duration" id="duration_0_0" >
											<option selected="" disabled="" value="">Select Duration</option>
											<option value='15'>15 Minutes</option>
											<option value='30'>30 Minutes</option>
										</select>
									</div>
									<div class="col-md-3" style="margin-top: 28px;">
									</div>
							    </div>
							    <div class="form-group">
							    	<div class="col-sm-8">
							    		<button type="submit" name="updateTimeslot" class="btn btn-primary">Update TimeSlot</button>
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