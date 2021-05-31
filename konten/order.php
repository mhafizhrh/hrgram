<div class="col-md-6 col-md-offset-3">
	<center><h2>Order Baru</h2></center>
	<?php
		if (isset($_POST['order'])) {
			$layanan = $_POST['layanan'];
			$target = $_POST['userlink'];
			$jumlah = $_POST['jumlah'];
			$harga = $_POST['harga'];

######

$pilih = mysql_query("SELECT * FROM layanan WHERE id = '$layanan'");
$data = mysql_fetch_array($pilih);
$service = $data['layanan'];
$min = $data['min'];
$maks = $data['maks'];

######


			require_once 'require/api.php';
			$api = new Api();
			if (!$layanan || !$target || !$jumlah || !$harga) {
		        echo "<div class='alert alert-danger'>Masih ada yang kosong.</div>";
		    } else if ($saldo < $harga) {
		        echo "<div class='alert alert-danger'>Maaf, saldo anda kurang untuk membeli layanan.</div>";
		    } else if ($jumlah < $min) {
		    	echo "<div class='alert alert-danger'>Minimal ".$min." untuk membeli.</div>";
		    } else if ($jumlah > $maks) {
		    	echo "<div class='alert alert-danger'>Maksimal ".$maks." untuk membeli.</div>";
		    } else {
		        $order = $api->order($target,$layanan,$jumlah);
		        $order_id = $order->data->order_id;
		        $gagal = $order->data->message;
		        $created = date("d-m-Y H:i:s");
		        if ($order->data->order_id) {
		    ?>
			<div class="alert alert-success">
				<b><i class="fa fa-check-square"></i> Orderan telah diterima.</b>
				<p><b>Layanan :</b> <?=$service?></p>
				<p><b>Link :</b> <?=$target?></p>
				<p><b>Jumlah :</b> <?=$jumlah?></p>
				<p><b>Total Harga :</b> Rp. <?=number_format($harga)?></p>
			</div>
		    <?php
		    		mysql_query("INSERT INTO riwayat_order (order_id,layanan,username,created,link,jumlah,harga) VALUES ('$order_id','$service','$username','$created','$target','$jumlah','$harga')");
		            mysql_query("UPDATE users SET saldo = saldo-$harga WHERE username = '$username'");
		        } else if ($gagal == "Incorrect request") {
		            echo "<div class='alert alert-danger'>Masih ada yang kosong.</div>";
		        } else if ($gagal == "Service not found") {
		            echo "<div class='alert alert-danger'>Layanan tidak ada, mohon hubungi admin.</div>";
		        } else {
		            echo "<div class='alert alert-danger'>Pembelian gagal, mohon hubungi admin.</div>";
		        }
		    }
		}
	?>
	<form method="post">
		<div class="panel panel-primary">
			<div class="panel-body">
				<div class="form-group">
					<label>Layanan :</label>
					<select class="form-control" name="layanan" id="layanan" onchange="layanan();" required>
						<option selected disabled>Pilih salah satu...</option>
						<?php
							$select = mysql_query("SELECT * FROM layanan ORDER BY id");
							while ($data = mysql_fetch_array($select)) {
								echo "<option value='".$data['id']."'>".$data['layanan']."</option>";
							}
						?>
					</select>
				</div>
				<div class="form-group">
					<label>Username/Link :</label>
					<input type="text" name="userlink" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Jumlah :</label>
					<input type="number" name="jumlah" id="jumlah" class="form-control" onkeyup="rate();" required>
				</div>
				<div class="form-group">
					<label>Total Harga :</label>
					<textarea rows="1" id="harga" name="harga" class="form-control" readonly required></textarea>
				</div>
				<div class="form-group">
					<button type="submit" name="order" class="btn btn-primary pull-right">Order</button>
				</div>
			</div>
		</div>
	</form>
</div>