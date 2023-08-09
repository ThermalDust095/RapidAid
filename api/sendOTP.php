<?php
include 'db.php';
	$number = $_GET['mobile'];
	function sendSMS($num) {
		$otp = rand(1000, 9999);
		?>
			<script>
				sessionStorage.setItem("OTP", '<?php echo base64_encode($otp) ?>' );
			</script>
		<?php
	    $url = "https://www.fast2sms.com/dev/bulkV2?authorization=&route=otp&variables_values=". $otp ."&flash=0&numbers=".$num;

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
