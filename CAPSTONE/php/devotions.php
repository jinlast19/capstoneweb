<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Content-Type:application/json");

$conn= mysqli_connect("localhost","root","","wesleychurch");

	

$link = explode("/",$_SERVER['PATH_INFO']);
$action = $link[1];
$size= sizeof($link)-1;
	date_default_timezone_set('Asia/Manila');
	$date = date("F j, Y / h:i A"); 
	$time = date("H:i:s"); 
	$month = date("F");
	$year = date("Y");
	$user = $link[2];
	$data = $link[3];



	$dateadded= date("F j, Y");
	
	


	mysqli_query($conn,"INSERT INTO devotions (postedby,dateposted,msg)VALUES('$user','$dateadded','$data')");
	
	$info= array("status" =>"Devotion Created.");
	echo json_encode($info);	


?>