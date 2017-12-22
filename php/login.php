<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Content-Type:application/json");
?>
<?php
include 'connection.php';
$link = explode("/",$_SERVER['PATH_INFO']);
$action = $link[1];
$size= sizeof($link)-1;


$user = mysqli_real_escape_string($conn,$link[2]);
$pass = mysqli_real_escape_string($conn,$link[3]);
$res = mysqli_query($conn,"SELECT * FROM profiles WHERE username = '$user' and password= '$pass'");
if($data= mysqli_fetch_assoc($res)){
	$info [] = $data;
	$status['status'] = array("result"  =>  "Log in successfuly" ,"data"=> $data );
	

}
else {
$status['status'] = array("result"  =>  "Log in Error");

}
echo json_encode($status);
?>