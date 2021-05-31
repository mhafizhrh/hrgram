<div class="col-md-4 col-md-offset-4">
	<center><h2>Tambah Layanan</h2></center>
	<?php
		if (isset($_POST['tambah'])) {
			$layanan = $_POST['layanan'];
			$harga = $_POST['harga'];
			$min = $_POST['min'];
			$maks = $_POST['maks'];
			if (!$layanan || !$harga || !$min || !$maks) {
				echo "<div class='alert alert-danger'>Jangan kosong dong Ganteng... :D :v</div>";
			} else {
				mysql_query("INSERT INTO layanan (layanan,harga,min,maks) VALUES ('$layanan','$harga','$min','$maks')");
				echo "<div class='alert alert-success'>Done ya ganteng...</div>";
			}
		}
	?>
	<form method="post">
		<div class="panel panel-primary">
			<div class="panel-body">
				<div class="form-group">
					<label>Layanan :</label>
					<input type="text" name="layanan" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Harga/1000 :</label>
					<input type="number" name="harga" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Min :</label>
					<input type="text" name="min" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Maks :</label>
					<input type="text" name="maks" class="form-control" required>
				</div>
				<div class="form-group">
					<button type="submit" name="tambah" class="btn btn-primary pull-right">Tambah</button>
				</div>
			</div>
		</div>
	</form>
</div>