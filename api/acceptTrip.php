<?php
	include 'db.php';

	$response = array();

	$data = json_decode(file_get_contents("php://input"), true);

	$client = $data['name'];
	$driver = $data['driver'];
	$src = $data['src'];
	$dest = $data['dest'];
	$time = $data['time'];

	$sql = "INSERT INTO `_ongoing_trips` (`client`,`driver`, `source`, `destination`, `timestamp`) VALUES(
			'$client',
			'$driver',
			'$src',
			'$dest',
			'$time'
				)";
	$res = $db->exec($sql);
	if ($res) {
		$response['status'] = true;
		$response['data'] = "Trip Started";
		
		$sql2 = "DELETE FROM `_pending_trips` WHERE `trip_by` = '$client'";
		$res2 = $db->exec($sql2);
	}
	else{
		$response['status'] = false;
		$response['data'] = "Trip not Started";
	}

	echo json_encode($response);
?>