<?php
	include 'db.php';

	$response = array();

	$data = json_decode(file_get_contents("php://input"), true);

	$id = $data['trip-id'];

	$sql = "DELETE FROM `_ongoing_trips` WHERE `id` = $id";
	$res = $db->exec($sql);
	if ($res) {
	$response['status'] = true;
	$response['data'] = "Deleted!";
	}
	$response['status'] = false;

	$response['data'] = "failed to delete";

	echo json_encode($response);
?>