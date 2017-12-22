<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Content-Type:application/json");
?>

<?php
include 'connection.php';

date_default_timezone_set('Asia/Manila');	
$date = date("F j, Y / h:i A"); 
$date2 = strtotime(date("F j, Y")); 
$time = date("H:i:s"); 
$month = date("F");
$year = date("Y");
$present = array();
$user = $_GET['user'];


$res = mysqli_query($conn,"SELECT * FROM events Order by dateofevents DESC");
while($data=mysqli_fetch_assoc($res)){
	  $date3=strtotime($data['dateofevents']);
	  $title = $data['title'];

	if($date2 <  $date3 ){
		$res2 = mysqli_query($conn,"SELECT * FROM eventregister where name = '$user' and eventname ='$title'");
		if(mysqli_num_rows($res2) > 0 ){
		while($data2 = mysqli_fetch_assoc($res2)){
				$status = array('status' => 'Registered');
				$info['event']=array('data' =>$data, 'status' => $status);
		}}else{
				$status = array('status' => 'Not Registered');
				$info['event']=array('data' =>$data, 'status' => $status);
				
		}
		}
}
echo json_encode($info);

?>