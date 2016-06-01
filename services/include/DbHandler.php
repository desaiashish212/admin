<?php

/**
 * Class to handle all db operations
 * This class will have CRUD methods for database tables
 *
 * @author Ravi Tamada
 * @link URL Tutorial link
 */
class DbHandler {

    private $conn;

    function __construct() {
        require_once dirname(__FILE__) . '/DbConnect.php';
        // opening db connection
        $db = new DbConnect();
        $this->conn = $db->connect();
    }

    /* ------------- `users` table method ------------------ */

    /**
     * Creating new user
     * @param String $name User full name
     * @param String $email User login email id
     * @param String $mobile User mobile number
     * @param String $otp user verificaiton code
     */
    public function createUser($name, $mobile, $state,$district,$regid, $otp) {
        $response = array();

        // First check if user already existed in db
        if (!$this->isUserExists($mobile)) {

            // Generating API key
            $api_key = $this->generateApiKey();

            // insert query
            $stmt = $this->conn->prepare("INSERT INTO users(name,mobile_no, state,district,gcm_reg_id,status) values(?, ?, ?, ?, ?,0)");
            $stmt->bind_param("sssss", $name,$mobile, $state,$district,$regid);

            $result = $stmt->execute();

            $new_user_id = $stmt->insert_id;

            $stmt->close();

            // Check for successful insertion
            if ($result) {

                $otp_result = $this->createOtp($new_user_id, $otp);

                // User successfully inserted
                return USER_CREATED_SUCCESSFULLY;
            } else {
                // Failed to create user
                return USER_CREATE_FAILED;
            }
        } else {
            // User with same email already existed in the db
            return USER_ALREADY_EXISTED;
        }

        return $response;
    }

    public function createOtp($user_id, $otp) {

        // delete the old otp if exists
        $stmt = $this->conn->prepare("DELETE FROM sms_codes where user_id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();


        $stmt = $this->conn->prepare("INSERT INTO sms_codes(user_id, code, status) values(?, ?, 0)");
        $stmt->bind_param("is", $user_id, $otp);

        $result = $stmt->execute();

        $stmt->close();

        return $result;
    }
    
    /**
     * Checking for duplicate user by mobile number
     * @param String $email email to check in db
     * @return boolean
     */
    private function isUserExists($mobile) {
	
        $stmt = $this->conn->prepare("SELECT id from users WHERE mobile_no = ? and status = 1");
        $stmt->bind_param("s", $mobile);
        $stmt->execute();
        $stmt->store_result();
        $num_rows = $stmt->num_rows;
        $stmt->close();
        return $num_rows > 0;
    }

    public function activateUser($otp) {
        $stmt = $this->conn->prepare("SELECT u.id, u.name,u.mobile_no,state,district,gcm_reg_id,email,birth,city,pincode,occupation FROM users u, sms_codes WHERE sms_codes.code = ? AND sms_codes.user_id = u.id");
        $stmt->bind_param("s", $otp);

         if ($stmt->execute()) {
            // $user = $stmt->get_result()->fetch_assoc();
            $stmt->bind_result($id, $name, $mobile_no, $state, $district, $gcm_reg_id,$email,$birth,$city,$pincode,$occupation);
            
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                
                $stmt->fetch();
                
                // activate the user
                $this->activateUserStatus($id);
                
                $user = array();
                $user["name"] = $name;
                $user["mobile_no"] = $mobile_no;
                $user["state"] = $state;
                $user["district"] = $district;
                $user["gcm_reg_id"] = $gcm_reg_id;
				$user["email"] = $email;
				$user["birth"] = $birth;
				$user["city"] = $city;
				$user["pincode"] = $pincode;
				$user["occupation"] = $occupation;
             //   $user["created_at"] = $created_at;
                
                $stmt->close();
                
                return $user;
            } else {
                return NULL;
            }
        } else {
            return NULL;
        }

        return $result;
    }
    
    public function activateUserStatus($user_id){
        $stmt = $this->conn->prepare("UPDATE users set status = 1 where id = ?");
        $stmt->bind_param("i", $user_id);
        
        $stmt->execute();
        
        $stmt = $this->conn->prepare("UPDATE sms_codes set status = 1 where user_id = ?");
        $stmt->bind_param("i", $user_id);
        
        $stmt->execute();
    }
	
	public function updateUser($name,$mobile, $email,$dob,$city,$pincode,$occupation){
        $stmt = $this->conn->prepare("UPDATE users set name=?,email=?,birth=?,city=?,pincode=?,occupation=? where mobile_no = ?");
        $stmt->bind_param("sssssss", $name,$email,$dob,$city,$pincode,$occupation,$mobile);
        
        $stmt->execute();
        
        $stmt = $this->conn->prepare("UPDATE sms_codes set status = 1 where user_id = ?");
        $stmt->bind_param("i", $user_id);
        
		$result = $stmt->execute();
		if ($result) {
				// User successfully inserted
                return USER_CREATED_SUCCESSFULLY;
            } else {
                // Failed to create user
                return USER_CREATE_FAILED;
            }
    }
	
	public function updateStatus($staus,$mobile){
        $stmt = $this->conn->prepare("UPDATE users set lang_status=? where mobile_no = ?");
        $stmt->bind_param("ss", $staus,$mobile);
        
        $stmt->execute();
                
		$result = $stmt->execute();
		if ($result) {
				// User successfully inserted
                return USER_CREATED_SUCCESSFULLY;
            } else {
                // Failed to create user
                return USER_CREATE_FAILED;
            }
    }
	
	public function updateRegId($name,$mobile_no, $state,$district,$gcm_reg_id){
        $stmt = $this->conn->prepare("UPDATE users set name=?,state=?,district=?,gcm_reg_id=? where mobile_no = ?");
        $stmt->bind_param("sssss", $name,$state,$district,$gcm_reg_id,$mobile_no);
        
        $stmt->execute();
              
		$result = $stmt->execute();
		if ($result) {
				// User successfully inserted
                return USER_CREATED_SUCCESSFULLY;
            } else {
                // Failed to create user
                return USER_CREATE_FAILED;
            }
    }

	public function updateUserOTP($mobilenumber,$otp)
{
  	$stmt = $this->conn->prepare("SELECT id from users WHERE mobile_no = ?");
        $stmt->bind_param("s", $mobilenumber);
        $stmt->execute();
	$stmt->bind_result($id);       
 	$stmt->store_result();

	if ($stmt->num_rows > 0) {
		$stmt->fetch();
		$stmt = $this->conn->prepare("UPDATE sms_codes set code = ? where user_id = ?");
        	$stmt->bind_param("si", $otp,$id);
        
        	if(!$stmt->execute())
		{
			return 1;
		}
		else
		{
			return 0;
		}
      }
}
    /**
     * Generating random Unique MD5 String for user Api key
     */
    private function generateApiKey() {
        return md5(uniqid(rand(), true));
    }
}
?>
