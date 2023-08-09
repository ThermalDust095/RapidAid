<?php
	if (isset($_GET['delUser'])) {
		$id = $_GET['userID'];

		$sql = "DELETE FROM `_customers` WHERE `customer_id` = $id";
		$res = mysqli_query($conn, $sql);
		if ($res) {
			alertRedirect("dashboard.php", "User Deleted!");			
		}		
	}	
?>
<h1>Orders</h1>

<div class="mt-5"> 
	<table class="table table-striped" id="orders-table">
		<thead class="table-dark text-white">
			<tr>
				<tr>
					<th>Order ID</th>
					<th>Product ID</th>
					<th>User ID</th>
					<th>TimeStamp</th>
					<th colspan="">Action</th>
				</tr>
			</tr>
		</thead>
		<tbody>
			<?php
				$sql = "SELECT * FROM `_orders`";
				$res = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_array($res)) {
				?>
					<tr class="order-row">
						<td><?php echo $row['order_id'] ?></td>
						<td><?php echo $row['product_id'] ?></td>
						<td><?php echo $row['user_id'] ?></td>
						<td><?php echo $row['timestamp'] ?></td>
							<td>
								<form method="POST" action="?" class="form d-flex">
									<input hidden type="text" name="orderID" value="<?php echo $row['order_id'] ?>">
									<select class="form-control" name="orderStatus">
										<option value="<?php echo $row['product_id'] ?>"><?php echo $row['status'] ?></option>
										<option value="Ordered">Ordered</option>
										<option value="Out For Delivery">Out For Delivery</option>
										<option value="Delivered">Delivered</option>
									</select>
									<button type="submit" class="btn btn-primary ml-2" name="updateProductStatus">Update</button>
								</form>
								<?php
									if (isset($_POST['updateProductStatus'])) {
										$status = $_POST['orderStatus'];

										$sql = "UPDATE `_orders` SET `status` = '$status'";
										$res = mysqli_query($conn, $sql);
										if ($res) {
											alertRedirect("dashboard.php", "Status Updated!");
										}
										else {
											alertRedirect("dashboard.php", "Status Not Updated!");
										}
									}
								?>
							</td>
						</form>
					</tr>
				<?php
				}
			?>
		</tbody>
	</table>
</div>