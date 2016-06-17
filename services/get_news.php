<?php

$response = array();

include_once ('connection.php');
//require_once dirname(__FILE__) . '/DbConnect.php';
//$db = new DB_CONNECT();
if (isset($_POST['id'])) {
	 $id =$_POST['id'];
	 $status =$_POST['status'];
	 $language =$_POST['language'];
	if($language==1){
		$result = mysqli_query($con,"SELECT * FROM marathi where id='$id' AND status='$status' ORDER BY id DESC LIMIT 1") or die(mysql_error());
	}else if($language==2){
		$result = mysqli_query($con,"SELECT * FROM hindi where id='$id' ORDER BY id DESC LIMIT 1") or die(mysql_error($con));
	}else if($language==3){
		$result = mysqli_query($con,"SELECT * FROM eng where id='$id' ORDER BY id DESC LIMIT 1") or die(mysql_error($con));
	}
	
	if($result){
		$response["news"] = array();
    
    while ($row = mysqli_fetch_array($result)) {
        $news = array();
        $news["id"] = $row["id"];
        $news["title"] = $row["title"];
        $news["news"] = $row["news"];
        $news["time"] = $row["time"];
		$news["date"] = $row["date"];
		$news["path"] = $row["path"];

		array_push($response["news"], $news);
    }
    $response["error"] = false;
	$response["message"] = "Success";
    echo json_encode($response);
	}else {

    $response["error"] = true;
    $response["message"] = "No news found";
}
    echo json_encode($response);

	
} else {
    $response["error"] = true;
    $response["message"] = "Required field(s) is missing";

    echo json_encode($response);
}
	
?>
