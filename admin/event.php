<?php
// include_once("db_connect.php");
require_once "config.php";
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "eventManager";
// $conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
// if (mysqli_connect_errno()) {
//     printf("Connect failed: %s\n", mysqli_connect_error());
//     exit();
// }

$sqlEvents = "SELECT * FROM appointments";
$resultset = mysqli_query($link, $sqlEvents);
$calendar = array();
while( $rows = mysqli_fetch_assoc($resultset) ) {
    
	// convert  date to milliseconds
	$start = strtotime($rows['appointment_date']) * 1000;
    $end = strtotime($rows['appointment_date']) * 1000;
    $appointDate  = $rows['appointment_date'];
	// $end = strtotime($rows['end_date']) * 1000;
	$calendar[] = array(
        'id' =>$rows['id'],
        'title' => $rows['name'],
        'url' => "#",
		"class" => 'event-important',
        'start' => "$start",
        'end' => "$start",
        'appointDate' => "$appointDate",
        'appointTime' => $rows['appointment_time']
    );
}
$calendarData = array(
	"success" => 1,	
    "result"=>$calendar);
echo json_encode($calendarData);
exit;
?>