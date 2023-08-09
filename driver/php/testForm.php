<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST" action="createCustomer.php">
		<input type="text" name="name" placeholder="name"><br><br>
		<input type="text" name="password" placeholder="password"><br><br>
		<input type="text" name="email" placeholder="email"><br><br>
		<input type="text" id="mobile" name="mobile" placeholder="mobile">
		<button id="sendOTP">Get OTP</button></br><br>
		<input type="number" name="otp" placeholder="otp"><br><br>
		<button type="submit" name="createCustomer">create</button>
	</form>
	<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

	<script type="text/javascript">
		$("#sendOTP").click((e)=>{
			e.preventDefault();
			
			let number = $("#mobile").val();
			console.log(number)
			let url = "http://localhost/hackathon-test/hackathon-test/admin/php/sendOTP.php?mobile="+number;
			console.log(url);
			$.ajax({
				url: url,
				method: "GET",
				dataType: "json",
				success: function (data) {
					console.log(data);
					// if () {}
				},
				error: function (x) {
					console.log(url)
					console.log("req err");
				}
			})
		})
	</script>
</body>
</html>