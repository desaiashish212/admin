<?php
include_once ('connection.php');

if (isset($_GET['state'])) {
	
	$state = $_GET["state"];
	
	$result = mysqli_query($con,"SELECT dist.distname FROM dist WHERE dist.stateid = '$state' ") or die(mysql_error());
	
	if($result){
		$dist = array();
		while ($row = mysqli_fetch_array($result)) {
			array_push($dist, $row["distname"]);
		}
		
		$distJSON = json_encode($dist);
		echo "{Cities=".$distJSON."}";
		
	}else{
		$response["message"] = "No District found";
	}

} else {
    
    $response["message"] = "Required field(s) is missing";

    echo json_encode($response);
}
?>