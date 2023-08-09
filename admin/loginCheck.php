<?php
session_start();
error_reporting(0);
	if (isset($_POST['submit'])) {
		class myDB extends SQLite3
		{
			
			function __construct()
			{
				$this->open("../api/db.sqlite");
			}
		}

		$db = new myDB();

		$name = $_POST['username'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM _admins WHERE `username` = '$name' AND `password` = '$password'";
		$res = $db->query($sql);

		if ($admin = $res->fetchArray(SQLITE3_ASSOC)) {
			if ($admin['username'] == $name && $admin['password']) {
				$_SESSION['adminLogin'] = true;
				$_SESSION['adminName'] = $name;
				header('location: dashboard.php');
 			}
		}
		else{
			header('location: index.php');
		}
	}
?>