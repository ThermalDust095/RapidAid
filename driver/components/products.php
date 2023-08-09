<?php
	if (isset($_GET['delProduct'])) {
		$id = $_GET['productID'];
		echo $_GET['productID'];
		print_r($_GET);
		$vsql = "DELETE FROM `_products` WHERE product_id = $id";
		echo $id;
		$res = mysqli_query($conn, $vsql);
		if ($res) {
			alertRedirect("dashboard.php");
		}
		else {
			
		}
	}
?>

<h1>Products</h1>
<div class="block">
	<a href="pages/addProduct.php">
		<button class="btn btn-primary m-3 ml-0"><i class="fas fa-plus"></i> Add Product</button>
	</a>
</div>
<div>
	<table class="table table-striped" id="products-table">
		<thead class="table-dark text-white">
			<tr>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Catagory</th>
					<th>Price</th>
					<th>Action</th>
				</tr>
			</tr>
		</thead>
		<tbody>
			<?php
				$sql = "SELECT * FROM `_products`";
				$res = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_array($res)) {
				?>
					<tr>
						<td><?php echo $row['product_id'] ?></td>
						<td><?php echo $row['name'] ?></td>
						<td><?php echo $row['catagory'] ?></td>
						<td><?php echo $row['price'] ?></td>
						<td>
							<a href="./pages/editProduct.php?productID=<?php echo $row['product_id'] ?>">
								<button class="btn btn-primary p-1"><i class="fas fa-edit"></i></button>
							</a>
							<a href="?delProduct&productID=<?php echo $row['product_id'] ?>">
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