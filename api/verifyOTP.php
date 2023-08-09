<?php
include 'db.php';
	$response = array('status' => false);

	$data = json_decode(file_get_contents("php://input"), true);

	$enteredOTP = $data['enteredOTP'];
	$sessionOTP= base64_decode($data['sessionOTP']);

	if ($enteredOTP == $sessionOTP) {
		$response['status'] = true;
	}
	echo json_encode($response);
?>

