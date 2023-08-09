<style>
	.img-container {
		width: 5rem;
		height: auto;
	}
	.img-container img {
		width: 100%;
	}
	.card {
		margin: 2rem;
		display: flex;
		flex-direction: row;
		padding: 1rem;
		border-radius: 20px;
		background: #e0e0e0;
		box-shadow:  20px 20px 60px #bebebe,
             -20px -20px 60px #ffffff;
	}
	.card-content {
		margin-left: 1rem;
	}
</style>
<h1>Dashboard</h1>

<div class="w-100 cards-container row d-flex justify-content-center">
	<div class="col col-lg-5">
		<div class="card">
			<div class="img-container">
				<img src="assets/imgs/customers.png">
			</div>
			<div class="card-content">
				<h3 class="card-title">Customers</h3>
				<p>
					<?php 
						$sql = "SELECT * FROM `_customers`";
						$res = mysqli_query($conn, $sql);
						if ($res) {
							echo mysqli_num_rows($res);
						}
						else {
							echo 0;
						}
					?>
				</p>
			</div>
		</div>
		<div class="card ">
			<div class="img-container">
				<img src="assets/imgs/products.png">
			</div>
			<div class="card-content">
				<h3 class="card-title">Products</h3>
				<p>
					<?php 
						$sql = "SELECT * FROM `_products`";
						$res = mysqli_query($conn, $sql);
						if ($res) {
							echo mysqli_num_rows($res);
						}
						else {
							echo 0;
						}
					?>
				</p>
			</div>
		</div>
	</div>
	<div class="col col-lg-5">
		<div class="card">
			<div class="img-container">
				<img src="assets/imgs/transactions.png">
			</div>
			<div class="card-content">
				<h3 class="card-title">Transactions</h3>
				<p>
					<?php 
						$sql = "SELECT * FROM `_transactions`";
						$res = mysqli_query($conn, $sql);
						if ($res) {
							echo mysqli_num_rows($res);
						}
						else {
							echo 0;
						}
					?>
				</p>
			</div>
		</div>
		<div class="card">
			<div class="img-container">
				<img src="assets/imgs/count.png">
			</div>
			<div class="card-content">
				<h3 class="card-title">Page Visits</h3>
				<p>
					<?php 
						// $sql = "SELECT * FROM `_site_info`";
						// $res = mysqli_query($conn, $sql);
						// if ($res) {
						// 	echo mysqli_num_rows($res);
						// }
						// else {
						// 	echo 0;
						// }
					echo 0;
					?>
				</p>
			</div>
		</div>
	</div>
</div>