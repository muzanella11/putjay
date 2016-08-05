<h1>
	Input Promo
</h1>
<div class="col-lg-12 normal_padding" style="margin-bottom:15px;">
	Name Items <br>
	<input class="nama_items" type="text" name="nama" placeholder="Enter name items" style="padding:5px; width:250px;" />
	<div class="col-lg-12 normal_padding box_error error_nama" style="color:red;"></div>
</div>

<div class="col-lg-12 normal_padding box_result" style="margin-bottom:15px;">

</div>

<script>
$(".nama_items").keyup(function(){
	//alert();
	name = $(this).val();
	$.ajaxSettings.cache=false;
	$.ajax({
			url			: site_url + 'ajax/search_items_add_promo',
			type		: 'post',
			data		: {nama:name},
			success		: function(data){
			//	alert();
			//	$("#modal_content").html(data);
			//	$("#modal").hide();
			if(data){
				$(".box_result").html(data);
			} else {
				$(".box_result").html('');
			}
	

		}
	});
	return false;
});
</script>