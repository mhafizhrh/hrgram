<div class="col-md-4 col-md-offset-4">
	<center><h2>Ubah Password</h2></center>
	<?php
		if (isset($_POST['ubah'])) {
			$newpass = $_POST['newpass'];
			$konfirmasi = $_POST['konfirmasi'];
			if (!$newpass || !$newpass || !$_POST['password']) {
				echo "<div class='alert alert-danger'>Mohon lengkapi data.</div>";
			} else {
				if ($_POST['password'] <> $password) {
					echo "<div class='alert alert-danger'>Password Sekarang tidak sesuai.</div>";
				} else if ($newpass <> $konfirmasi) {
					echo "<div class='alert alert-danger'>Konfirmasi Password berbeda.</div>";
				} else {
					mysql_query("UPDATE users SET password = '$konfirmasi' WHERE username = '$username'");
					echo "<div class='alert alert-success'>Password berhasil diubah.</div>";
				}
			}
		}
	?>
	<form method="post">
		<div class="panel panel-primary">
			<div class="panel-body">
				<div class="form-group">
					<label>Password Sekarang :</label>
					<input type="password" name="password" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Password Baru :</label>
					<input type="password" name="newpass" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Konfirmasi Password Baru :</label>
					<input type="password" name="konfirmasi" class="form-control" required>
				</div>
				<div class="form-group">
					<button type="submit" name="ubah" class="btn btn-primary pull-right">Ubah</button>
				</div>
			</div>
		</div>
	</form>
</div>