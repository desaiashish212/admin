<?php
include_once ('connection.php');

if (isset($_GET['district'])) {
	
	$district = $_GET["district"];
	$districtid;
	
	$res = mysqli_query($con,"SELECT dist.distid FROM dist WHERE dist.distname = '$district'") or die(mysql_error());
	if($res){
		while ($row = mysqli_fetch_array($res)) {
			$districtid = $row['distid'];
		}
		
	
		$result = mysqli_query($con,"SELECT city.cityname FROM city WHERE city.distid = '$districtid' ") or die(mysql_error());
	
	if($result){
		$city = array();
		while ($row = mysqli_fetch_array($result)) {
			array_push($city, $row["cityname"]);
		}
		
		$cityJSON = json_encode($city);
		echo "{Cities=".$cityJSON."}";
		
	}else{
		$response["message"] = "No City found";
	}
	}else{
		$response["message"] = "No City found";
	}	
} else {
    
    $response["message"] = "Required field(s) is missing";

    echo json_encode($response);
}
?>