<?php session_start();
	include_once('connection.php');
	
	$message=$_POST["message"];
	$languages=$_POST["languages"];
	
	//$res=mysql_query("insert into category (caregory_name,lang_status) values ('$name','$lang')");
	$sql = "insert into notifications (messages,language) values ('$message','$languages')";
	//$aff=mysql_affected_rows();
	$result = mysqli_query($con, $sql);
	$pushStatus = '';
	if($sql)
   {
	  $query = "SELECT gcm_reg_id FROM users WHERE lang_status=1";
    if($query_run = mysqli_query($con,$query)) {

        $gcmRegIds = array();
        while($query_row = mysqli_fetch_assoc($query_run)) {

            array_push($gcmRegIds, $query_row['gcm_reg_id']);

        }

    }
    $pushMessage = $_POST['message'];
    if(isset($gcmRegIds) && isset($pushMessage)) {

        $message = array('message' => $pushMessage);
        $pushStatus = sendPushNotification($gcmRegIds, $message);
		echo $pushStatus;

		exit;
		$_SESSION["MSG"]="Success";
			header("Location: notifications.php");

    }   
//	}
			
   }
   else
   {

			$_SESSION["MSG"]="Category not added, Try Again";
			header("Location: notifications.php");
   		
   }
  
   
   function sendPushNotification($registatoin_ids, $message) {
		//Google cloud messaging GCM-API url
        $url = 'https://android.googleapis.com/gcm/send';
        $fields = array(
            'registration_ids' => $registatoin_ids,
            'data' => $message,
        );
		// Update your Google Cloud Messaging API Key
		define("GOOGLE_API_KEY", "AIzaSyDqa_hGc5tMKTVSmrZhwO2lmiGYZCUyNtc"); 		
        $headers = array(
            'Authorization: key=' . GOOGLE_API_KEY,
            'Content-Type: application/json'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		//curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);	
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);				
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        curl_close($ch);
        return $result;
    }
?>