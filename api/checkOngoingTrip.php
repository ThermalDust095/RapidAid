<?php
	include 'db.php';

	$response = array();

	$data = json_decode(file_get_contents("php://input"), true);

	$name = $data['name'];

	$sql = "SELECT * FROM `_ongoing_trips` WHERE `client` = '$name'";
	$res = $db->query($sql);
	if ($row = $res->fetchArray(SQLITE3_ASSOC)) {
		if ($row['client'] == $name) {
			$response['status'] = true;
			$response['data'] = $row;
		}
	}
	else{
		$response['status'] = false;
		$response['data'] = "Trip not booked";
	}
	echo json_encode($response);
?>