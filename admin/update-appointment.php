<?php

require_once "config.php";

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

$id = $_POST["id"];

if(empty($errorMSG)){
    $query = "UPDATE appointments SET name='$name',email ='$email', mobile='$mobile', appointment_date='$appointdate', appointment_time='$appointtime' WHERE id=$id ";        
    $updateAppointment = mysqli_query($link, $query);
    if($updateAppointment) {
        $message = 'Appointment Rescheduled Successfully';
        $link = 'appointments.php';
        echo json_encode(['code'=>200, 'message'=>$message, 'link'=>$link]);
        exit();
    } else {
        $link = 'appointments.php';
        $error = 'Something went wrong';
        echo json_encode(['code'=>400, 'message'=>$error, 'link'=>$link]);
        exit();
    }
}

echo json_encode(['code'=>404, 'msg'=>$errorMSG]);
?>