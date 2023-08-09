<?php
include '../php/db.php';
	$tableName = "_".$_GET['table'];
	$sql = "SELECT * FROM $tableName";
	$res = mysqli_query($conn, $sql);
	
		
	if ($tableName == "_products") {
	?>
		<table border=1 id="table">
			<thead>
				<th>Id</th>
				<th>Name</th>
				<th>Catagory</th>
				<th>Price</th>
			</thead>
			<tbody>
			<?php
				while ($row = mysqli_fetch_array($res)) {
					?>
						<tr>
							<td><?php echo $row['product_id']?></td>
							<td><?php echo $row['name']?></td>
							<td><?php echo $row['catagory']?></td>
							<td><?php echo $row['price']?></td>
						</tr>
					<?php
				}
			?>
		</tbody>
		</table>
		
	<?php
	}


?>

<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/jquery.table2excel.min.js"></script>
<script>
	$(document).ready(()=>{
		$("#table").table2excel({
	    exclude:".noExl",
	    name:"name",
	    filename:"name",
	    fileext:".xls" 
	  });
	});
</script>