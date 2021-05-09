<?php

require_once "admin/config.php";

$errorMSG = "";


/* NAME */
if (empty($_POST["name"])) {
    $errorMSG = "<li>Name is required</<li>";
} else {
    $name = $_POST["name"];
}

if (empty($_POST["mobile"])) {
    $errorMSG = "<li>Mobile Number is required</<li>";
} else {
    $mobile = $_POST["mobile"];
}

/* EMAIL */
if (empty($_POST["email"])) {
    $errorMSG .= "<li>Email is required</li>";
} else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $errorMSG .= "<li>Invalid email format</li>";
}else {
    $email = $_POST["email"];
}


/* MSG SUBJECT */
if (empty($_POST["doctor"])) {
    $errorMSG .= "<li>Doctor is required</li>";
} else {
    $doctor = $_POST["doctor"];
}


/* MESSAGE */
if (empty($_POST["appointdate"])) {
    $errorMSG .= "<li>Appointment Date is required</li>";
} else {
    $appointdate = $_POST["appointdate"];
}

if (empty($_POST["appointtime"])) {
    $errorMSG .= "<li>Appointment time is required</li>";
} else {
    $appointtime = $_POST["appointtime"];
}


$fee = $_POST["fee"];


if (empty($_POST["symptoms"])) {
    $errorMSG .= "<li>Symptoms is required</li>";
} else {
    $symptoms = $_POST["symptoms"];
}


if(empty($errorMSG)){
    $query = "SELECT * FROM appointments WHERE mobile='$mobile'";
    $checkMob = mysqli_query($link, $query);
    while($row = mysqli_fetch_assoc($checkMob)){
        $docId = $row['userDocId'];
        $appointment_date = $row['appointment_date'];
        if(mysqli_num_rows($checkMob) > 0){

            $date1 = date_create($appointdate);
            $date2 = date_create($appointment_date);

            //difference between two dates
            $diff = date_diff($date1,$date2);

            $count = $diff->format("%a");
            if($count < 14 && $userDocId === $docId) {
                $query = "INSERT INTO `appointments` (name, email, mobile, appointment_date, symptoms, userDocId, appointment_time) VALUES ('$name', '$email', '$mobile', '$appointdate', '$symptoms', '$userDocId', '$appointtime')";
                $add_appointment = mysqli_query($link, $query);
                if($add_appointment) {
                 
                    $message = "Appointment Created Successfully!";
                    echo json_encode(['code'=>200, 'msg'=>$message]);
                    exit();
                } else {
                    $error = "Something went wrong";
                    echo json_encode(['code'=>400, 'msg'=>$error]);
                    exit();
                }
                
            } else {
                // echo "You are else case";
                $data = "name=".$name."&Mobile=".$mobile."&Email=".$email."&Fee=".$fee;

                $link = 'pay.php?'.$data.'';
                echo json_encode(['code'=>201, 'link'=>$link]);
                exit();
                // echo "<script type='text/javascript'>window.location.href='pay.php';</script>"; 
            }
        } else {
            $msg = "Name:".$name.",Mobile:".$mobile.",Email:".$email.", Doctor: ".$doctor.", Appointment Date:".$appointdate.", Fee:".$fee.", Symptoms: ".$symptoms;
            echo json_encode(['code'=>200, 'msg'=>$msg]);
            exit();
        }
    }
    $link = 'pay.php';
    echo json_encode(['code'=>201, 'link'=>$link]);
}


echo json_encode(['code'=>404, 'msg'=>$errorMSG]);


?>