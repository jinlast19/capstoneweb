<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Content-Type:application/json");
?>

<?php
include 'connection.php';
include 'query.php';




date_default_timezone_set('Asia/Manila');	
$date = date("F j, Y / h:i A"); 
$date2 = strtotime(date("F j, Y")); 
$time = date("H:i:s"); 

$month = date("F");
$year = date("Y");
$present = array();
// $past= array();
// $today= array();
// $events= array();

// echo $jin =date($date3);

$res = mysqli_query($conn,"SELECT * FROM events Order by dateofevents ASC");
while($data=mysqli_fetch_assoc($res)){
	  $date3=strtotime($data['dateofevents']);
	  $title = $data['title'];

if($date2 <  $date3 ){
	// echo "present";
	$res2 = mysqli_query($conn,"SELECT count(eventname) as num, eventname FROM eventregister where eventname='$title'");
	while($data2 = mysqli_fetch_assoc($res2)){


	$num= $data2['num'];
}

	$info[]=array("data"=>$data, "num" => $num);
}
	
// if($date2 ==  $date3){
// 	echo "today";

// 	$info2['today'] =array("eventid"=> $data['eventid'] , "title"=>$data['title'],
// 					"description" => $data['description'] , "dateadded" => $data['dateadded'],
// 					"dateofevents" => $data['dateofevents'] , "venue" =>$data['venue'],
// 					"timeofevent" => $data['timeofevent'] , "image" => $data['image']);
// 	array_push($today, $info2);
// }
// if($date2 >  $date3){
// 	echo "past";

// 	$info3['past'] =array("eventid"=> $data['eventid'] , "title"=>$data['title'],
// 					"description" => $data['description'] , "dateadded" => $data['dateadded'],
// 					"dateofevents" => $data['dateofevents'] , "venue" =>$data['venue'],
// 					"timeofevent" => $data['timeofevent'] , "image" => $data['image']);
// 	array_push($past, $info3);
// }

	
// }
// array_push($events,$today);
// array_push($events,$present);
// array_push($events,$past);


// echo json_encode($present);
// echo date_format($date,"F j, Y");


}
echo json_encode($info);
?>