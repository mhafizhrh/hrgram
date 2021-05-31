$(document).ready(function(){
	$("#kategori").change(function(){
		var kategori = $("#kategori").val();
		$.ajax({
			url: "require/kategori.php",
			data: "kategori="+kategori,
			type: "POST",
			dataType: "html",
			success: function(result) {
				$("#layanan").html(result);
			}
		});
	});

	$("#layanan").change(function(){
		var layanan = $("#layanan").val();
		$.ajax({
			url: "require/layanan.php",
			data: "layanan="+layanan,
			type: "POST",
			dataType: "html",
			success: function(result) {
				$("#hidden").html(result);
			}
		});
	});
});