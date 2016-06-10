<?php
include_once ('connection.php');
include './include/DbHandler.php';
$db = new DbHandler();


$response = array();

// echo $_POST['mobile'];

if (isset($_POST['mobile']) && $_POST['mobile'] != '') {

	$mobile = $_POST['mobile'];
    $staus = $_POST['status'];
	
   
    $res = $db->updateStatus($staus,$mobile);

    if ($res == USER_CREATED_SUCCESSFULLY) {
        
        // send sms
   //     sendSms($mobile, $otp);
        if($staus==1){
		$result = mysqli_query($con,"SELECT flashMarathi FROM flash") or die(mysql_error());
	}else if($staus==2){
		$result = mysqli_query($con,"SELECT flashHindi FROM flash") or die(mysql_error());
	}else if($staus==3){
		$result = mysqli_query($con,"SELECT flashEnglish FROM flash") or die(mysql_error());
	}
	//$result = mysqli_query($con,"SELECT flashMarathi FROM flash") or die(mysql_error());
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_array($result)) {
				if($staus==1){
				$response["flash"] = $row['flashMarathi'];
			}else if($staus==2){
				$response["flash"] = $row['flashHindi'];
			}else if($staus==3){
				$response["flash"] = $row['flashEnglish'];
			}
		}
		
	}else{
		$response["flash"] = "This is best news application";
	}
        $response["error"] = false;
        $response["message"] = "Status update successfully.";
    } else if ($res == USER_CREATE_FAILED) {
        $response["error"] = true;
        $response["message"] = "Staus Profile update fail.";
    } 
} else {
    $response["error"] = true;
    $response["message"] = "Sorry! staus is not valid or missing.";
}

echo json_encode($response);

?>