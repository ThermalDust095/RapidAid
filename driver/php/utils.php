<?php
	include 'db.php';
	function alertRedirect($url, $msg)
	{
		?>
			<script>
				alert("<?php echo $msg?>");
				window.location = "<?php echo $url; ?>";
			</script>
		<?php
	}
?>