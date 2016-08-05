<h2 class="sub-header">Report Promo</h2>
<div class="table-responsive">
<?php 
if($allpromo){	
?>
<table class="table table-striped">
  <thead>
	<tr>
	  <th>Nama Items</th>
	  <th>Kategori</th>
	  <th>Harga</th>
	  <th>Deskripsi</th>
	  <th>Tanggal</th>
	  <th>Actions</th>
	</tr>
  </thead>
  <tbody>
  <?php 
	foreach($allpromo as $key => $value){
  ?>
	<tr>
	  <td><?php echo $value->nama;?></td>
	  <td>
		<?php
			if($value->kategori == 1){
				echo "Accessories";
			}
			elseif($value->kategori == 2){
				echo "Camera";
			}
			elseif($value->kategori == 3){
				echo "Computer";
			}
			elseif($value->kategori == 4){
				echo "Furniture";
			}
			elseif($value->kategori == 5){
				echo "Laptop";
			}
			elseif($value->kategori == 6){
				echo "Printer";
			}
			elseif($value->kategori == 7){
				echo "Smartphone";
			}
			elseif($value->kategori == 8){
				echo "Smartwatch";
			}
			elseif($value->kategori == 9){
				echo "Tablet";
			}
			elseif($value->kategori == 10){
				echo "Tv";
			}
		?>
	  </td>
	  <td><?php echo "Rp.".$value->harga;?></td>
	  <td><?php echo $value->deskripsi;?></td>
	  <td><?php echo $value->date_create;?></td>
	  <td>
		<button data-button="<?php echo $value->id_items;?>" class="btn btn-danger btn_promo">Delete</button>
	  </td>
	</tr>
  <?php } ?>
	
  </tbody>
</table>
<?php } else { ?>
Tidak ada data
<?php } ?>

</div>


<script>
$(".btn_promo").click(function(){
	data_btn = $(this).attr("data-button");
	$.ajaxSettings.cache=false;
	$.ajax({
			url			: site_url + '/ajax/unset_promo_items',
			type		: 'post',
			dataType	: "JSON",
			data		: {q:data_btn},
			success		: function(data){
			//	alert();
			//	$("#modal_content").html(data);
			//	$("#modal").hide();
			if(data.t == 0){
				setTimeout(function(){window.location='<?php echo site_url('apps/add');?>';},500);
			}
			else if(data.t == 1){
				//alert('berhasil');
				setTimeout(function(){window.location='<?php echo site_url('apps');?>';},500);
			}
	

		}
	});
	return false;
})
</script>