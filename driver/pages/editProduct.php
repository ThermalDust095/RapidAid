<?php include '../php/db.php'; ?>
<?php include '../php/utils.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Product Admin</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.css">
	<style type="text/css">
		body, html {
			overflow-x: hidden;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Artify</a>
</nav>
<?php
		$title = "";
		$description = "";
		$price = "";
		$catagory = "";
		$img_name = "";


	if (isset($_GET['productID'])) {
		$id = $_GET['productID'];

		$sql = "SELECT * FROM `_products` WHERE `product_id` = $id";
		$res = mysqli_query($conn, $sql);
	if ($res) {
		$row = mysqli_fetch_array($res);
		}
	}
?>
	<main class="mt-5 d-flex justify-content-center row">

		<div class="col col-lg-5">
			<h2 class="alert alert-info">Edit Product</h2>
			<form action="?" method="POST" enctype="multipart/form-data">
				<fieldset class="form-group">
					<label>Product Title</label>
					<input type="text" name="title" class="form-control" value="<?php echo $row['name']; ?>">
				</fieldset>
				<fieldset class="form-group">
					<label>Product Description</label>
					<input type="text" name="description" class="form-control"value="<?php echo $row['details']; ?>">
				</fieldset>
				<fieldset class="form-group">
					<label>Product Price</label>
					<input type="number" name="price" class="form-control"value="<?php echo $row['price']; ?>">
				</fieldset>
				<fieldset class="form-group">
					<label>Product Image</label>
					<input type="file" name="img" class="form-control" value="value="<?php echo $row['img']; ?>"">
				</fieldset>
				<fieldset class="form-group">
					<label>Product Catagory</label>
					<select class="form-control" name="catagory" value="<?php echo $row['name']; ?>">
						<option value="Oil">Oil</option>
						<option value="Water">Water</option>
						<option value="Arcylic">Arcylic</option>
						<option value="Abstract">Abstract</option>
					</select>
				</fieldset>
				<fieldset class="form-group">
					<button class="btn btn-warning form-control" name="updateProduct">Update</button>
				</fieldset>
			</form>
			<?php
				if (isset($_POST['updateProduct'])) {

					$title = $_POST['title'];
					$description = $_POST['description'];
					$price = $_POST['price'];
					$catagory = $_POST['catagory'];

					$img_name = $_FILES['img']['name']; 
					$img_type = $_FILES['img']['type']; 
					$ext = explode('.',$img_name)[1];
					$rand=rand(10000,99999);
					$path="../products/".$rand.".jpg";
					$r = move_uploaded_file($_FILES["img"]["tmp_name"],$path);

					if ($r) {
						$sql = "UPDATE `_products` SET 
							`name`= '$title',
							`details`='description',
							`catagory`='catagory',
							`price`='$price',
							`img`='$img_name' WHERE `product_id` = $id";
						$res = mysqli_query($conn, $sql);
						if ($res) {
							alertRedirect("../dashboard.php", "Added!");
						}
						else {
							?>
								<script>
									alert("Uploaded!")
								</script>
							<?php
						}
					}
				}
			?>
		</div>
	</main>
	<script src="../../assets/js/jquery.js"></script>
	<script src="../../assets/js/popper.js"></script>
	<script src="../../assets/js/bootstrap.js"></script>
</body>
</html>