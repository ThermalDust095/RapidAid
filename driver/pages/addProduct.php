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
	<main class="mt-5 d-flex justify-content-center row">

		<div class="col col-lg-5">
			<h2 class="alert alert-info">Add Product</h2>
			<form action="?" method="POST" enctype="multipart/form-data">
				<fieldset class="form-group">
					<label>Product Title</label>
					<input type="text" name="title" class="form-control">
				</fieldset>
				<fieldset class="form-group">
					<label>Product Description</label>
					<input type="text" name="description" class="form-control">
				</fieldset>
				<fieldset class="form-group">
					<label>Product Price</label>
					<input type="number" name="price" class="form-control">
				</fieldset>
				<fieldset class="form-group">
					<label>Product Image</label>
					<input type="file" name="img" class="form-control">
				</fieldset>
				<fieldset class="form-group">
					<label>Product Catagory</label>
					<select class="form-control" name="catagory">
						<option value="Oil">Oil</option>
						<option value="Water">Water</option>
						<option value="Arcylic">Arcylic</option>
						<option value="Abstract">Abstract</option>
					</select>
				</fieldset>
				<fieldset class="form-group">
					<button class="btn btn-success form-control" name="addProduct">Submit</button>
				</fieldset>
			</form>
			<?php
				if (isset($_POST['addProduct'])) {

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
						$sql = "INSERT INTO `_products` (`name`, `details`, `catagory`, `price`, `img`) VALUES(
								'$title',
								'$description',
								'$catagory',
								'$price',
								'$img_name'
							)";
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