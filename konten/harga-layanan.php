<center>
	<h2>Harga Layanan</h2>
</center>
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
		</tr>
		<?php
			}
		?>
	</tbody>
</table>