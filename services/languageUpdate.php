<?php

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