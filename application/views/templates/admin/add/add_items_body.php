<h1>
	Input new Items
</h1>
<form class="form_items">
<div class="col-lg-12 normal_padding" style="margin-bottom:15px;">
	Name <br>
	<input type="text" name="nama" placeholder="Name items" style="padding:5px; width:250px;" />
	<div class="col-lg-12 normal_padding box_error error_nama" style="color:red;"></div>
</div>
<div class="col-lg-12 normal_padding" style="margin-bottom:15px;">
	Category <br>
	<select name="category" style="padding:5px; width:250px;">
		<option value="">-- SELECT CATEGORY --</option>
		<option value="1">Accessories</option>
		<option value="2">Camera</option>
		<option value="3">Computer</option>
		<option value="4">Furniture</option>
		<option value="5">Laptop</option>
		<option value="6">Printer</option>
		<option value="7">Smartphone</option>
		<option value="8">Smartwatch</option>
		<option value="9">Tablet</option>
		<option value="10">Tv</option>
	</select>
	<div class="col-lg-12 normal_padding box_error error_category" style="color:red;"></div>

</div>
<div class="col-lg-12 normal_padding" style="margin-bottom:15px;">
	Price <br>
	<input type="text" name="price" placeholder="Price" style="padding:5px; width:250px;" />
	<div class="col-lg-12 normal_padding box_error error_harga" style="color:red;"></div>
</div>
<div class="col-lg-12 normal_padding" style="margin-bottom:15px;">
	Picture <br>
	<div style="width:200px; height:200px; background:skyblue;"></div>
	<input type="file" name="picture" />
</div>
<div class="col-lg-12 normal_padding" style="margin-bottom:15px;">
	Description <br>
	<textarea style="width:500px; height:200px; resize:none;" name="description"></textarea>
	<div class="col-lg-12 normal_padding box_error error_desc" style="color:red;"></div>
</div>
<div class="col-lg-12 normal_padding" style="margin-bottom:15px;">
	<input class="btn btn-primary" type="submit" name="save" value="Save" />
</div>

</form>

<script>
$(".form_items").submit(function(){
	$.ajaxSettings.cache=false;
	$.ajax({
			url			: site_url + 'ajax/submit_items',
			type		: 'post',
			dataType	: "JSON",
			data		: $(this).serialize(),
			success		: function(data){
			//	alert();
			//	$("#modal_content").html(data);
			//	$("#modal").hide();
			if(data.t == 0){
				$(".box_error").html('');
				if(data.id == 'name'){
					$('.error_nama').html(data.message);
				}
				if(data.id == 'category'){
					$('.error_category').html(data.message);
				}
				if(data.id == 'price'){
					$('.error_harga').html(data.message);
				}
				if(data.id == 'description'){
					$('.error_desc').html(data.message);
				}
			}
			else if(data.t == 1){
				//alert('berhasil');
				setTimeout(function(){window.location='<?php echo site_url('apps');?>';},500);
			}
	

		}
	});
	return false;
});
</script>