<?php
	include 'db.php';

	$response = array();
	$list = array();

	$sql = "SELECT * FROM `_hospitals`";
	$res = $db->query($sql);
	while ($row = $res->fetchArray()) {
		array_push($list, $row);
	}
	$response['status'] = true;
	$response['data'] = $list;

	echo json_encode($response);
?>