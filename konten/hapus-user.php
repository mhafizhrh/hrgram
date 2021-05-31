<div class="col-md-4 col-md-offset-4">
	<center><h2>Hapus User</h2></center>
	<?php
		if (isset($_POST['hapus'])) {
			$user_del = $_POST['user_del'];
			mysql_query("DELETE FROM users WHERE username = '$user_del'");
			echo "<div class='alert alert-success'>Suskes Hapus User : @".$user_del."</div>";
		}
	?>
	<form method="post">
		<div class="panel panel-primary">
			<div class="panel-body">
				<div class="form-group">
					<label>Username :</label>
					<select name="user_del" class="form-control" required>
						<?php
							$select = mysql_query("SELECT * FROM users");
							while ($data = mysql_fetch_array($select)) {
								echo "<option value=".$data['username'].">".$data['username']."</option>";
							}
						?>
					</select>
				</div>
				<div class="form-group">
					<button type="submit" name="hapus" class="btn btn-primary pull-right">Hapus</button>
				</div>
			</div>
		</div>
	</form>
</div>