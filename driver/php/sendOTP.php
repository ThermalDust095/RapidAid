<?php
session_start();
	$number = $_GET['mobile'];
	function sendSMS($num) {
		$otp = rand(1000, 9999);
		$_SESSION['customerOTP'] = $otp;
	    $url = "https://www.fast2sms.com/dev/bulkV2?authorization=bZgcqdzfKytpEBT53ulso4iWrY6PM82ULaj1eHh70DwRXxJANQin6uGfx8DEdbmtvCL25aMBAXJW1U4z&route=otp&variables_values=". $otp ."&flash=0&numbers=".$num;

	    $ch = curl_init();
	    $optArray = array(
	            CURLOPT_URL => $url,
	            CURLOPT_RETURNTRANSFER => true
	    );
	    curl_setopt_array($ch, $optArray);
	    $result = curl_exec($ch);
	    curl_close($ch);
	    echo json_encode($result);
	}
	sendSMS($number);
?>