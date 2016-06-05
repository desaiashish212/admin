<?php
error_reporting(-1);
ini_set('display_errors', 'On');

include './include/DbHandler.php';
$db = new DbHandler();


$response = array();

// echo $_POST['mobile'];

if (isset($_POST['mobile']) && $_POST['mobile'] != '' && isset($_POST['feedback']) && $_POST['feedback'] != '' && isset($_POST['name']) && $_POST['name'] != '') {

    $name = $_POST['name'];
    $feedback = $_POST['feedback'];
    $mobile = $_POST['mobile'];

    $res = $db->createFeedback($name, $mobile,$feedback);

    if ($res == USER_CREATED_SUCCESSFULLY) {
        $response["error"] = false;
        $response["message"] = "Success";
    } else if ($res == USER_CREATE_FAILED) {
        $response["error"] = true;
        $response["message"] = "Sorry! Error occurred in feedback,Try later";
    }
} else {
    $response["error"] = true;
    $response["message"] = "Sorry! requred fields are missing.";
}


echo json_encode($response);
?>