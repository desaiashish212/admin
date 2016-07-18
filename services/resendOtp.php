<?php

include './include/DbHandler.php';
$db = new DbHandler();


$response = array();

// echo $_POST['mobile'];

if (isset($_POST['mobile']) && $_POST['mobile'] != '') {

    $mobile = $_POST['mobile'];

    $otp = $db->resendOtp($mobile);

    if ($otp !=null) {
        
        // send sms
        sendSms($mobile, $otp);
        
        $response["error"] = false;
        $response["message"] = "SMS request is initiated! You will be receiving it shortly.";
		$response["otp"] = $otp;
    } else if ($res == USER_CREATE_FAILED) {
        $response["error"] = true;
        $response["message"] = "Sorry! Error occurred in registration.";
    } 
} else {
    $response["error"] = true;
    $response["message"] = "Sorry! mobile number is not valid or missing.";
}

echo json_encode($response);

function sendSms($mobile, $otp) {
    
    $otp_prefix = ':';

    //Your message to send, Add URL encoding here.
    $message = urlencode("Hello! Welcome to Dhangar Mahasabha. Your OPT is $otp_prefix $otp");

    $response_type = 'json';

    //Define route 
    $route = "4";
    
    //Prepare you post parameters
    $postData = array(
        'authkey' => BULKSMS_AUTH_KEY,
        'mobiles' => $mobile,
        'message' => $message,
        'sender' => BULKSMS_SENDER_ID,
        'route' => $route,
        'response' => $response_type
    );

//API URL
    $url = "http://bulksms.makarandmane.com/api/sendhttp.php";

// init the resource
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $postData
            //,CURLOPT_FOLLOWLOCATION => true
    ));


    //Ignore SSL certificate verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


    //get response
    $output = curl_exec($ch);

    //Print error if any
    if (curl_errno($ch)) {
        echo 'error:' . curl_error($ch);
    }

    curl_close($ch);
}


?>