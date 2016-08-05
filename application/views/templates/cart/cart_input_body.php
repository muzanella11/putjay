<?php 
if($data_items){
	foreach($data_items as $key => $value){
?>
<form class="form_cart">
  <div class="form-group">
	<label for="recipient-name" class="control-label">Nama Barang</label>
	<input type="hidden" name="id_items" value="<?php echo $value->id_items;?>" />
	<input type="hidden" name="nama_barang" value="<?php echo $value->nama;?>" />
	<input type="hidden" name="deskripsi" value="<?php echo $value->deskripsi;?>" />
	<input type="text" name="nama" value="<?php echo $value->nama;?>" class="form-control nama" disabled="disabled">
  </div>
  <div class="form-group">
	<label for="recipient-name" class="control-label">Harga Barang</label>
	<input type="text" value="Rp.<?php echo $value->harga;?>" class="form-control hargabrg" disabled="disabled">
	<input type="hidden" name="harga" value="<?php echo $value->harga;?>" class="form-control harga">
  </div>
  <div class="form-group">
	<label for="recipient-name" class="control-label">Jumlah</label>
	<input type="text" name="jumlah" placeholder="Masukan jumlah" class="form-control jumlah">
  </div>
  <div class="form-group">
	<label for="recipient-name" class="control-label">Harga Total</label>
	<input type="text" name="total" class="form-control total" disabled="disabled">
  </div>
</form>
<div class="row">
	<div class="container-fluid" style="text-align:center;">
		<div class="col-lg-12 normal_padding box_berhasil">
		</div>
	</div>
</div>
<?php
	} 
}
?>
<script>
$(".jumlah").keyup(function(){
	//alert();
	harga = $(".harga").val();
	jumlah	=	$(".jumlah").val();
	total	=	harga*jumlah;
	$(".total").val(total);
	
	if($(".total").val() == 0){
		//alert();
		$(".ok").attr("disabled","disabled");
	} else {
		$(".ok").removeAttr("disabled","disabled");
	}
});
$(document).ready(function(){
	//alert();
	if($(".ok").hide()){
		$(".ok").show();
	}
	$(".ok").attr("disabled","disabled");
	$(".box_berhasil").html('');
});
$(".ok").click(function(){
	//alert();
	$.ajaxSettings.cache=false;
	$.ajax({
			url			: site_url + 'ajax/add_to_cart',
			type		: 'post',
			dataType	: "JSON",
			data		: $(".form_cart").serialize(),
			success		: function(data){
			//	alert();
			//	$("#modal_content").html(data);
			//	$("#modal").hide();
			if(data.t == 0){
				$(".box_berhasil").html('Maaf gagal');
			}
			else if(data.t == 1){
				//alert('berhasil');
				$(".ok").hide();
				$(".form_cart").hide();
				$(".box_berhasil").html("Berhasil add to cart");
				setTimeout(function(){
					$('.myModal').modal('toggle');
				},2222);
			}
	

		}
	});
	return false;
});
</script>