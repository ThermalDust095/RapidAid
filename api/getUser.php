<?php
	include 'db.php';

	$response = array();

	$data = json_decode(file_get_contents("php://input"), true);

	if (!empty($data)) {

		if ($data['id'] != null) {
			$id = $data['id'];

			$sql = "SELECT * FROM `_users` WHERE `id` = $id";
			$res = $db->query($sql);
			if ($user = $res->fetchArray(SQLITE3_ASSOC)) {
				$response['status'] = true;
				$response['data'] = $user;
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