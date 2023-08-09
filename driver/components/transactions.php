<h1>Products</h1>
<div>
	<table class="table table-striped mt-5">
		<thead class="table-dark text-white">
			<tr>
				<tr>
					<th>Txn ID</th>
					<th>User ID</th>
					<th>Order ID</th>
					<th>Amount</th>
				</tr>
			</tr>
		</thead>
		<tbody>
			<?php
				$sql = "SELECT * FROM `_transactions`";
				$res = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_array($res)) {
				?>
					<tr>
						<td><?php echo $row['txn_id'] ?></td>
						<td><?php echo $row['user_id'] ?></td>
						<td><?php echo $row['order_id'] ?></td>
						<td><?php echo $row['amount'] ?></td>
					</tr>
				<?php
				}
			?>
		</tbody>
	</table>
</div>