<?php
	include 'db.php';

	$response = array();
	$list = array();

	$sql = "SELECT * FROM `_ongoing_trips`";
	$res = $db->query($sql);
	while ($row = $res->fetchArray(SQLITE3_ASSOC)) {
		array_push($list, $row);
	}
	$response['status'] = true;
	$response['data'] = $list;

	echo json_encode($response);
?>