<?php
	include 'db.php';

	$response = array();

	$data = json_decode(file_get_contents("php://input"), true);

	if (!empty($data)) {

		$name = $data['name'];
		$email = $data['email'];
		$password = md5($data['password']);
		$coordinates = $data['coordinates'];
		$address = $data['address'];
		$phone = $data['phone'];
		$email = $data['email'];

		$sql = "INSERT INTO '_users' (`name`,`email`,`password`,`coordinates`,`address`, `phone`) VALUES(
				'$name',
				'$email',
				'$password',
				'$coordinates',
				'$address',
				'$phone'
			)";
		$res = $db->exec($sql);
		if ($res) {
				$response['status'] = true;
				$response['data'] = "Account Created!";
		}
		
	}
	else{
		$response['status'] = false;
		$response['data'] = "Input not given";
	}				
	echo json_encode($response);
?>