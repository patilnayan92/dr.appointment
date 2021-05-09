<?php 
 	require_once "header.php";
    require_once "config.php";

     if(isset($_POST['addtimeslot'])) {
    
	    $docId = $_POST["doctor"];
	    $available_day = $_POST['day'];

 		$starttime = $_POST['starttime'];
 		$endtime = $_POST['endtime'];
 		$duration = $_POST['duration'];

 		function prepare_time_slots($starttime, $endtime, $duration){
	 
			$time_slots = array();
			$start_time    = strtotime($starttime); //change to strtotime
			$end_time      = strtotime($endtime); //change to strtotime
			 
			$add_mins  = $duration * 60;
			 
			while ($start_time <= $end_time) // loop between time
			{
			   $time_slots[] = date("H:i", $start_time);
			   $start_time += $add_mins; // to check endtime
			}
			return $time_slots;
		}

		$time_slots = prepare_time_slots($starttime, $endtime, $duration);

		$available_time = implode(" , ",$time_slots);

		$query = "INSERT INTO `dravailable_date_time` (docId, available_day, available_time) VALUES ('$docId', '$available_day', '$available_time')";
		// echo $query;
		// exit();

    	$create_timeslot = mysqli_query($link,$query);
		if($create_timeslot) {
		// confirm_query($create_doctor);
	        $message = "TimeSlot Created Successfully!";
	        echo "<script type='text/javascript'>alert('$message');
	        window.location.href='manage-timeslot.php';</script>";
	    } else {
	    	$error = "Something went wrong";
	    	echo "<script type='text/javascript'>alert('$error');</script>"; 
	    }
	}
?>
<div class="container">
	<!-- Title -->
		<div class="row heading-bg">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			  <h5 class="txt-dark">Manage Timeslot</h5>
			</div>
			<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			  <ol class="breadcrumb">
				<li><a href="welcome.php">Dashboard</a></li>
				<li class="active"><span>Manage Timeslot </span></li>
			  </ol>
			</div>
			<!-- /Breadcrumb -->
		</div>
	<!-- /Title -->
	<div class="row">
		<div class="panel panel-default card-view">
			<div class="panel-wrapper collapse in">
				<div class="panel-body">
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form-horizontal">
						<div class="form-group">
							<div class="col-md-6">
					      		<label class="control-label" for="degree">Select Doctor:</label>
					      	
					        	<select class="form-control" id="selectDoctor" name="doctor" placeholder="Select Doctor Name">
					                <option disabled="" selected="">-- Select Doctor --</option>
					                <?php
					                  $query = "SELECT * FROM users WHERE role = 'Doctor' ORDER BY id DESC";
					                  $get_docName = mysqli_query($link, $query);
					                  while($row = mysqli_fetch_assoc($get_docName)){
					                ?>
					                  <option value="<?php echo $row['id'] ?>" ><?php echo $row['name'] ?></option>
					                <?php } ?>
				              	</select>
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
					    		<button type="submit" name="addtimeslot" class="btn btn-primary">Add TimeSlot</button>
					    	</div>
					    </div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="row heading-bg">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		  		<h5 class="txt-dark">View Doctors Avaiblility</h5>
			</div>
		</div>
		<div class="panel panel-default card-view">
			<div class="panel-wrapper collapse in">
				
				<div class="panel-body">
					<table id="example" class="table table-hover display pb-30">
						<thead>
							<tr>
								<th>Doctor Name</th>
								<th>Day</th>
								<th>Available Times</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$query = "SELECT * FROM dravailable_date_time ORDER BY id DESC";
		                      	$get_lead = mysqli_query($link, $query);
		                      	while($row = mysqli_fetch_assoc($get_lead)){
		                      		$docId = $row['docId'];
		                      		$query1 = "SELECT * FROM users WHERE id = $docId";
		                      		$getDrName = mysqli_query($link, $query1);
		                      		while($row1 = mysqli_fetch_assoc($getDrName)) {
								
		                          	echo "<tr>";
		                  	?>
								<td><?php echo $row1['name'] ?></td>
								<td><?php echo $row['available_day'] ?></td>
								<td><?php echo $row['available_time'] ?></td>
							</tr>
							<?php
		                    	}
		                    }
		                    ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


<?php 
    require_once "footer.php";
?>