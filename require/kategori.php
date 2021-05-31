<?php
	$kategori = $_POST['kategori'];

	if ($kategori == "1") {
?>
<option value="1">Instagram Followers Server 2</option>
<option value="4">Followers Aktif Indo (Bonus Pasif)</option>
<option value="9">Instagram Followers Server 7 Low</option>
<option value="12">Instagram Followers Server 4</option>
<option value="14">Instagram Followers Server 6</option>
<option value="16">Instagram Followers Server 1 Instant</option>
<option value="19">Instagram Followers Server 3 Instant</option>
<?php
	} else if ($kategori == "2") {
?>
<option value="3">Instagram Likes Server 3</option>
<option value="5">Instagram Live Views Like [USERNAME]</option>
<option value="10">Instagram Likes Server 2</option>
<?php
	} else if ($kategori == "3") {
?>
<option value="2">Instagram Views Server 1</option>
<?php
	} else {
		echo "<option disabled selected>-- Pilih dulu Jenisnya --</option>";
	}
?>