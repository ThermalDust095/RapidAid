<?php
	include 'db.php';

	$response = array();
	$users = array();

	$sql = "SELECT * FROM `_users`";
	$res = $db->query($sql);
	while ($row = $res->fetchArray()) {
		array_push($users, $row);
	}
	$response['status'] = true;
	$response['data'] = $users;

	echo json_encode($response);
?>