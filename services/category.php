<?php

$response = array();

include_once ('connection.php');
//require_once dirname(__FILE__) . '/DbConnect.php';
//$db = new DB_CONNECT();

	
		$result = mysqli_query($con,"SELECT * FROM category") or die(mysql_error());

if (mysqli_num_rows($result) > 0) {

    $response["Category"] = array();
    
    while ($row = mysqli_fetch_array($result)) {
        $category = array();
        $category["id"] = $row["id"];
        $category["name"] = $row["caregory_name"];
        $category["lang"] = $row["lang_status"];

		array_push($response["Category"], $category);
    }
	$response["error"] = false;
    $response["message"] = "All category are geting.";
     echo json_encode($response);
} else {

    $response["error"] = true;
    $response["message"] = "Try again later";

    echo json_encode($response);
}
?>
