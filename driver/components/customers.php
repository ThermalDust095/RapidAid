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
<h1>Customers</h1>

<div>
	<table class="table table-striped" id="customer-table">
		<thead class="table-dark text-white">
			<tr>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Mobile</th>
					<th>Created On</th>
					<th>Action</th>
				</tr>
			</tr>
		</thead>
		<tbody>
			<?php
				$sql = "SELECT * FROM `_customers`";
				$res = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_array($res)) {
				?>
					<tr>
						<td><?php echo $row['customer_id'] ?></td>
						<td><?php echo $row['name'] ?></td>
						<td><?php echo $row['mobile'] ?></td>
						<td><?php echo $row['created_on'] ?></td>
						<td>
							<a href="editProduct.php?productID=<?php echo $row['product_id'] ?>">
								<button class="btn btn-primary p-1"><i class="fas fa-edit"></i></button>
							</a>
							<a href="?delUser&userID=<?php echo $row['customer_id'] ?>">
								<button class="btn btn-danger p-1"><i class="fas fa-trash-alt"></i></button>
							</a>
						</td>

					</tr>
				<?php
				}
			?>
		</tbody>
	</table>
</div>