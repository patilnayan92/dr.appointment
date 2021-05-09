<?php
	require_once "admin/config.php";

	if(isset($_POST['addAppointment'])) {
		$name = $_POST["name"];
	    $email = $_POST["email"];
	    $mobile = $_POST["mobile"];
	    $userDocId = $_POST["docorname"];
	    $appointmentDate = $_POST["appointmentDate"];
	    $symptoms = $_POST["symptoms"];
	    $appointment_time = $_POST['appointment_time'];
	    // $fee = 1;
		$fee = $_POST['fee'];

		echo $name;
		echo "<br />";
		echo $email;
		echo "<br />";
		echo $mobile;
		echo "<br />";
		echo $appointmentDate;
		echo "<br />";
		echo $appointment_time;
		echo "<br />";
		echo $fee;
		echo "<br />";

		exit();
		
	    $checkMob = "SELECT * FROM appointments WHERE mobile='$mobile'";
	   	$isMobile = mysqli_query($link, $checkMob);
	    
	    while($row = mysqli_fetch_assoc($isMobile)){
    		$appointment_date = $row['appointment_date'];
    		$docId = $row['userDocId'];
    	
	   	if(mysqli_num_rows($isMobile) > 0){

			$date1 = date_create($appointmentDate);
			$date2 = date_create($appointment_date);

			//difference between two dates
			$diff = date_diff($date1,$date2);

			$count = $diff->format("%a");
			// echo $count;
			// echo "<br />";
			// echo $userDocId;
			// echo "<br />";
			// echo $docId;
			// echo "<br />";
			if($count < 14 && $userDocId === $docId) {
				// echo "You are here";
				
				// echo "Doc is same";
				$query = "INSERT INTO `appointments` (name, email, mobile, appointment_date, symptoms, userDocId, appointment_time) VALUES ('$name', '$email', '$mobile', '$appointmentDate', '$symptoms', '$userDocId', '$appointment_time')";


			    $add_appointment = mysqli_query($link, $query);
			    if($add_appointment) {

			    	
			    	

		    		$message = "Appointment Created Successfully!";
			        echo "<script type='text/javascript'>alert('$message');
			        window.location.href='index.php';</script>";
			    } else {
			    	$error = "Something went wrong";
			    	echo "<script type='text/javascript'>alert('$error');
			    	window.location.href='index.php';</script>"; 
			    }
				
			} else {
				echo "You are else case";
				$message = "Mobile Exists!";
	        	echo "<script type='text/javascript'>alert('$message');
	        	</script>";
	        	
				echo "<script type='text/javascript'>window.location.href='pay.php';</script>"; 
			}
	   	} else {
	   		echo $userDocId;
			echo "<br />";
			echo $docId;
			echo "<br />";
	   		header("Location: payment.php");
	   	}
}
	    // $query = "INSERT INTO `appointments` (name, email, mobile, appointment_date, symptoms, userDocId, time) VALUES ('$name', '$email', '$mobile', '$appointmentDate', '$symptoms', '$userDocId', '$time')";
	   

	    // $add_appointment = mysqli_query($link, $query);
	    // if($add_appointment) {
    	// 	$message = "Appointment Created Successfully!";
	    //     echo "<script type='text/javascript'>alert('$message');
	    //     window.location.href='index.php';</script>";
	    // } else {
	    // 	$error = "Something went wrong";
	    // 	echo "<script type='text/javascript'>alert('$error');
	    // 	window.location.href='index.php';</script>"; 
	    // }

	}

?>
