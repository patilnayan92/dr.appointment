<?php 

	require_once "config.php";

	if(isset($_POST['updateAppointment'])) {
    	$id = $_POST['id'];

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

		$checkAvailable = "SELECT * FROM dravailable_date_time WHERE docId='$id' AND available_day='$available_day'";
		// echo $checkAvailable;
		// exit();
		
	   	$isAvailable = mysqli_query($link, $checkAvailable);

	   	$rows = mysqli_num_rows($isAvailable);
	   	// while($row = mysqli_fetch_assoc($isAvailable)){
	   		if($rows > 0) {
				

		        $updatedQuery = "UPDATE dravailable_date_time SET docId='$id', available_day='$available_day', available_time='$available_time' WHERE docId=$id";
      			// echo $updatedQuery;
      			// exit();

		        $update_timeslot = mysqli_query($link, $updatedQuery);
		        if($update_timeslot) {
		            $message = "Timeslot Updated Successfully!";
		            echo "<script type='text/javascript'>alert('$message');
		                window.location.href='doctors.php';</script>";
		        } else {
		            $error = "Something went wrong";
		            echo "<script type='text/javascript'>alert('$error');
		                window.location.href='doctors.php';</script>";
		        }


	   		} else {
				$addquery = "INSERT INTO `dravailable_date_time` (docId, available_day, available_time) VALUES ('$id', '$available_day', '$available_time')";
				// echo $addquery;
				// exit();
		    	$create_timeslot = mysqli_query($link,$addquery);
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
		// }
	}
?>