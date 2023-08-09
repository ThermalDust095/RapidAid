<?php
	include 'db.php';

	$response = array();

	$data = json_decode(file_get_contents("php://input"), true);

	if (!empty($data)) {

		if ($data['email'] != "" || $data['password'] != "") {
			$email = $data['email'];
			$password = md5($data['password']);

			$sql = "SELECT * FROM `_users` WHERE `email` = '$email' AND `password` = '$password'";
			$res = $db->query($sql);
			if ($user = $res->fetchArray(SQLITE3_ASSOC)) {
				if ($user['email'] == $email && $user['password'] == $password){

					$response['status'] = true;
				}
				else{
					$response['status'] = false;
					$response['data'] = "user not found";
				}
			}
			else{
				$response['status'] = false;
				$response['data'] = "user not found";
			}
		}
		else {
			$response['status'] = false;
			$response['data'] = "Input not given";
		}
	}
	else{
		$response['status'] = false;
		$response['data'] = "Input not given";
	}				
	echo json_encode($response);
?>