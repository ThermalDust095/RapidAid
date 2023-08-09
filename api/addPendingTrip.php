<?php
	include 'db.php';

	$response = array();

	$data = json_decode(file_get_contents("php://input"), true);

	$name = $data['name'];
	$source = $data['source'];
	$destination = $data['destination'];

	$time = date('h:i:s d-m-Y');
	$sql = "INSERT INTO `_pending_trips` (`trip_by`,`source`, `destination`, `timestamp`) VALUES(
			'$name',
			'$source',
			'$destination',
			'$time'
		)";
	$res = $db->exec($sql);
	if ($res) {
		$response['status'] = true;
		$response['data'] = "Trip scheduled";
		
	}
	else{
		$response['status'] = false;
		$response['data'] = "Trip not booked";
	}
	echo json_encode($response);
?>