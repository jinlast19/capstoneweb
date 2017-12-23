<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Content-Type:application/json");

$conn= mysqli_connect("localhost","root","","wesleychurch");

	$postdata = file_get_contents("php://input");
	$a = json_decode($postdata);





	$name = $a->name;
	$des = $a->des;
	$img = $a->img;
	$lead = $a->lead;

	mysqli_query($conn,"INSERT INTO ministries(ministryname,ministryimage,ministrydescription,ministryleader)VALUES('$name','$img','$des' ,'$lead')");
	header('HTTP/1.0 201 Created');
	$info= array("status" =>"Ministry Created.");
	echo json_encode($info);	
	

?>