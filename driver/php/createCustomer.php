<?php
session_start();
	if (isset($_POST)) {
		include 'db.php';
		include 'utils.php';
		if (!empty($_POST)) {
			$name = $_POST['name'];
			$otp = $_POST['otp'];
			$email = $_POST['email'];
			$mobile = $_POST['mobile'];
			$address = $_POST['address'];
			$zip = $_POST['zip'];
			$password = md5($_POST['password']);
			
			$response = array();			

			if ($name == "" || $email == "" || $mobile == "" || $password == "") {
				$response['status'] = "FALSE";
				$response['msg'] = "All fields are required!";
			}
			else{
				if ($_SESSION['customerOTP'] == $otp) {
					$sql = "INSERT INTO `_customers` (`name`, `email`, `mobile`, `password`, `address`, `zip`) VALUES (
					'$name',
					'$email',
					'$mobile',
					'$password',
					'$address',
					'$zip'
					)";
					$res = mysqli_query($conn, $sql);
					if ($res) {
						$response['status'] = "TRUE";
						$response['msg'] = "Account Created!";
						alertRedirect("../../public/login.php", "Account Created Please Login!");

					}
					else {
						$response['status'] = "False!";
						$response['msg'] = "Failed To Create Account!";
					}
				}
				else {
					$response['status'] = "False!";
					$response['msg'] = "Invalid OTP!";
				}
				
			}
		}
	}
	else {
		$response['status'] = "FALSE";
		$response['msg'] = "You are not supposed to be here!";
	}
	if ($response['status'] != "TRUE") {
		alertRedirect("../../public/login.php", "Failed To Create Account!");
			
	}	
?>