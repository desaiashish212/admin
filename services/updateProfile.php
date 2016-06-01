<?php

include './include/DbHandler.php';
$db = new DbHandler();


$response = array();

// echo $_POST['mobile'];

if (isset($_POST['mobile']) && $_POST['mobile'] != '') {

    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$dob = $_POST['dob'];
	$city = $_POST['city'];
	$pincode = $_POST['pincode'];
	$occupation = $_POST['occupation'];
	


    $res = $db->updateUser($name,$mobile, $email,$dob,$city,$pincode,$occupation);

    if ($res == USER_CREATED_SUCCESSFULLY) {
        
        // send sms
   //     sendSms($mobile, $otp);
        
        $response["error"] = false;
        $response["message"] = "User update successfully.";
    } else if ($res == USER_CREATE_FAILED) {
        $response["error"] = true;
        $response["message"] = "User Profile update fail.";
    } 
} else {
    $response["error"] = true;
    $response["message"] = "Sorry! mobile number is not valid or missing.";
}

echo json_encode($response);

?>