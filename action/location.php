<?php 
	include("connection.php");
	$user=$_SESSION['uid'];
	$query = "SELECT * FROM users WHERE user_id = '$user'"; 
	$result = mysqli_query($conn, $query); 
	$row = mysqli_fetch_array($result); 
	$from = $row['address'];

	$to = "Twin Cities, Minneapolis - St Paul, Minnesota";
	$from = urlencode($from);
	$to = urlencode($to);
	$data = file_get_contents("http://maps.googleapis.com/maps/api/distancematrix/json?origins=$from&destinations=$to&language=en-EN&sensor=false");
	$data = json_decode($data);
	$time = 0;
	$rawdistance = 0;
	foreach($data->rows[0]->elements as $road) {
	    $rawdistance += $road->distance->value;	
	}
	$distance=$rawdistance * 0.000621371;

	$_SESSION['distance']=$distance;
?>