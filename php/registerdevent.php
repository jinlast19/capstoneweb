<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Content-Type:application/json");
?>

<?php
include 'connection.php';
include 'query.php';
$user = $_GET['user'];





$res = mysqli_query($conn,"SELECT * FROM events,eventregister where eventregister.name ='$user' and eventregister.eventname = events.title ");
while($data=mysqli_fetch_assoc($res)){
	  $date3=strtotime($data['dateofevents']);


	$info[]=array('title'=> $data['title']);

}
echo json_encode($info);
?>