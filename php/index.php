<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Content-Type:application/json");
?>

<?php
include 'connection.php';
include 'query.php';
$link = explode("/",$_SERVER['PATH_INFO']);
$action = $link[1];
$size= sizeof($link)-1;
$conn= new conn("localhost","root","","wesleychurch");
date_default_timezone_set('Asia/Manila');	
$date = date("F j, Y / h:i A"); 
$time = date("H:i:s"); 
$month = date("F");
$year = date("Y");
//  $date=date_create("10/31/2017");
// echo date_format($date,"F j, Y");



 switch($action){
 	case 'getallministries':
 		$conn->select("*")->from("ministries")->query();
 		
 		break;
 	case 'getallevents':
 		$conn->select("*")->from("events Order by dateofevents desc")->query();
 		break;

 	default:
 		break;
 	case 'getministry':
 		$conn->select("*")->from("ministries")->where("ministryid=$link[2]")->query();
 		break;
 	case 'getevent':
 		$conn->select("*")->from("events")->where("eventid=$link[2]")->query();
 		break;
 	case 'dailydev':
 		$conn->select("*")->from("dailydevotion")->query();
 		break;
 	case 'latest':
 		$conn->select("*")->from("dailydevotion ORDER by id DESC LIMIT 1")->query();
 		break;
 	case 'recent':
 		$conn->select("*")->from("dailydevotion ORDER by id DESC LIMIT 1000 OFFSET 1")->query();
 		break;
 	case 'random':
 		$conn->select("*")->from("devotions ORDER by id DESC")->query();
 		break;
 	case 'random2':
 		$conn->select("*")->from("devotions")->where("postedby='$link[2]' ORDER by id DESC")->query();
 		break;
 	case 'live_latest':
 		$conn->select("*")->from("service ORDER by id DESC LIMIT 1")->query();
 		break;
	case 'video':
 		$conn->select("*")->from("service ORDER by id DESC")->query();
 		break;
 	case 'videosolo':
 		$conn->select("*")->from("service")->where("id=$link[2]")->query();
 		break;
 	case 'reg':
 		$conn->select("*")->from("eventregister")->where("name='$link[2]'")->query();
 		break;
 	case 'registerevent':
 		$conn->select("*")->from("events")->where("eventid='$link[2]'")->query();
 		break;


 }



?>