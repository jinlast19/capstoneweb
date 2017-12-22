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



$res = mysqli_query($conn,"SELECT * FROM events Order by dateofevents DESC");
while($data=mysqli_fetch_assoc($res)){
	  $date3=strtotime($data['dateofevents']);
	  $title = $data['title'];

	if($date2 <  $date3 ){
		
				$info['event']=$data;
				
		
		}
}
echo json_encode($info);

?>