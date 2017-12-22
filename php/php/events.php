<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Content-Type:application/json");

$conn= mysqli_connect("localhost","root","","wesleychurch");

	$postdata = file_get_contents("php://input");
	$a = json_decode($postdata);

	date_default_timezone_set('Asia/Manila');
	$date = date("F j, Y / h:i A"); 
	$time = date("H:i:s"); 
	$month = date("F");
	$year = date("Y");


	$title = $a->title;
	$des = $a->des;
	$img = $a->img;
	$dateofevent = $a->date;
	$timeofeventss = $a->time;
	$venue = $a->venue;
	$dates=date_create($dateofevent);
	$dateadded= date_format($dates,"F j, Y");
	$times=date_create($timeofeventss);
	$timeofevent= date_format($times,"h:i A");


	mysqli_query($conn,"INSERT INTO events (title,description,dateadded,dateofevents,venue,timeofevent,image)VALUES('$title','$des','$date','$dateadded','$venue' , '$timeofevent','$img')");
	header('HTTP/1.0 201 Created');
	$info= array("status" =>"Ministry Created.");
	echo json_encode($info);	


?>