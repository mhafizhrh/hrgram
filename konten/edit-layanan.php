<center>
	<h2>Edit Layanan</h2>
</center>
<?php
	if (isset($_POST['edit'])) {
		$id = $_POST['id'];
		$layanan = $_POST['layanan'];
		$harga = $_POST['harga'];
		$min = $_POST['min'];
		$maks = $_POST['maks'];
		mysql_query("UPDATE layanan SET layanan = '$layanan' WHERE id = '$id'");
		mysql_query("UPDATE layanan SET harga = '$harga' WHERE id = '$id'");
		mysql_query("UPDATE layanan SET harga = '$harga' WHERE id = '$id'");
		mysql_query("UPDATE layanan SET min = '$min' WHERE id = '$id'");
		mysql_query("UPDATE layanan SET maks = '$maks' WHERE id = '$id'");
		echo "<div class='alert alert-success'>Suskes om :D</div>";
	}
?>
<?php
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
		$select2 = mysql_query("SELECT * FROM layanan WHERE id = '$id'");
		$data2 = mysql_fetch_array($select2);
?>
<form method="post">
	<div class="col-md-1">
		<div class="form-group">
		<label>ID :</label>
			<input type="text" name="id" class="form-control" value="<?=$data2['id']?>" readonly>
		</div>
	</div>
	<div class="col-md-5">
		<div class="form-group">
		<label>Layanan :</label>
			<input type="text" name="layanan" class="form-control" value="<?=$data2['layanan']?>">
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group">
		<label>Harga/1000 :</label>
			<input type="text" name="harga" class="form-control" value="<?=$data2['harga']?>">
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group">
		<label>Maks Order :</label>
			<input type="text" name="min" class="form-control" value="<?=$data2['min']?>">
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group">
		<label>Maks Order :</label>
			<input type="text" name="maks" class="form-control" value="<?=$data2['maks']?>">
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<button type="submit" name="edit" class="btn btn-primary btn-block">Edit Layanan</button>
		</div>
	</div>
</form>
<?php
	}
?>
<form method="post">
	<table class="table table-striped table-hover table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Layanan</th>
				<th>Harga/1000</th>
				<th>Min Order</th>
				<th>Maks Order</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$select = mysql_query("SELECT * FROM layanan");
				while ($data = mysql_fetch_array($select)) {
			?>
			<tr>
				<td><?=$data['id']?></td>
				<td><?=$data['layanan']?></td>
				<td>Rp. <?=number_format($data['harga'])?></td>
				<td><?=number_format($data['min'])?></td>
				<td><?=number_format($data['maks'])?></td>
				<td><button type="submit" name="id" value="<?=$data['id']?>" class="btn btn-primary">Edit</button></td>
			</tr>
			<?php
				}
			?>
		</tbody>
	</table>
</form>