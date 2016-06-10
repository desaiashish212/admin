<?php

$response = array();

include_once ('connection.php');
//require_once dirname(__FILE__) . '/DbConnect.php';
//$db = new DB_CONNECT();
if (isset($_POST['lang'])) {
	$language =$_POST['lang'];
		$result = mysqli_query($con,"SELECT * FROM category") or die(mysql_error());

if (mysqli_num_rows($result) > 0) {

    $response["Category"] = array();
    
    while ($row = mysqli_fetch_array($result)) {
        $category = array();
        $category["id"] = $row["id"];
        $category["name"] = $row["caregory_name"];
        $category["lang"] = $row["lang_status"];
		$category["priority"] = $row["priority"];

		array_push($response["Category"], $category);
    }
	if(strcmp($language,"ma")==0){
		$result = mysqli_query($con,"SELECT flashMarathi FROM flash") or die(mysql_error());
	}else if(strcmp($language,"hi")==0){
		$result = mysqli_query($con,"SELECT flashMarathi FROM flash") or die(mysql_error());
	}else if(strcmp($language,"en")==0){
		$result = mysqli_query($con,"SELECT flashMarathi FROM flash") or die(mysql_error());
	}
	$result = mysqli_query($con,"SELECT flashMarathi FROM flash") or die(mysql_error());
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_array($result)) {
        $response["flash"] = $row['flashMarathi'];
		}
		
	}else{
		$response["flash"] = "This is best news application";
	}
	$response["error"] = false;
    $response["message"] = "All category are geting.";
     echo json_encode($response);
} else {

    $response["error"] = true;
    $response["message"] = "Try again later";

    echo json_encode($response);
}

} else {
    $response["error"] = true;
    $response["message"] = "Required field(s) is missing";

    echo json_encode($response);
}
?>
