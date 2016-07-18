<?php

include './include/DbHandler.php';
$db = new DbHandler();


$response = array();

// echo $_POST['mobile'];

if (isset($_POST['mobile']) && $_POST['mobile'] != '') {

    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
	$state = $_POST['state'];
	$district = $_POST['district'];
	$regid = $_POST['regid'];

    $otp = rand(100000, 999999);

    $res = $db->createUser($name,$mobile, $state,$district,$regid, $otp);

    if ($res == USER_CREATED_SUCCESSFULLY) {
        
        // send sms
        sendSms($mobile, $otp);
        
        $response["error"] = false;
        $response["message"] = "SMS request is initiated! You will be receiving it shortly.";
		$response["otp"] = $otp;
    } else if ($res == USER_CREATE_FAILED) {
        $response["error"] = true;
        $response["message"] = "Sorry! Error occurred in registration.";
    } else if ($res == USER_ALREADY_EXISTED) {
       // $response["error"] = false;
       // $response["message"] = "Mobile number already existed!";
		//$response["otp"] = $otp;
		$ad = $db -> updateRegId($name,$mobile, $state,$district,$regid);
		$rescheck=  $db->updateUserOTP($mobile, $otp);
		if($rescheck==0 && $ad==0)
		{
			sendSms($mobile, $otp);
			$response["error"] = false;
			$response["otp"] = $otp;
				$response["message"] = "Mobile number already existed!";
		}
		else
		{
		$response["error"] = true;
				$response["message"] = "Mobile number already existed. OTP not sent.";
		}  
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