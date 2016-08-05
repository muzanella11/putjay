<div class="separator_top"></div>
<div class="container-fluid" style="background:#FFFF66; height:300px; margin-bottom:3%;">
	<div class="col-lg-12 normal_padding box_title_page">Kategori</div>
</div>

<div class="container">
	<div class="col-lg-12 normal_padding" style="padding:5%; padding-top:0;">
		<div class="col-lg-12" style="text-align:center; margin-bottom:1%;">
			<h1 style="border-bottom:3px solid skyblue; font-family:PutjayBold; margin-left:auto; margin-right:auto; padding:1%; color:skyblue;">
				Semua Kategori
			</h1>
		</div>
		<div class="col-lg-3 box_category" data-cat="accessories" style="margin-bottom:3%; cursor:pointer;">
			<div class="col-lg-12 normal_padding" style="background:#FFFF66; height:250px; font-family:PutjayBold; font-size:120px; text-align:center;">
				A
				<div class="col-lg-12" style="font-size:30px;">Accessories</div>
			</div>
		</div>
		<div class="col-lg-3 box_category" data-cat="camera" style="margin-bottom:3%; cursor:pointer;">
			<div class="col-lg-12 normal_padding" style="background:#FF66FF; height:250px; font-family:PutjayBold; font-size:120px; text-align:center;">
				C
				<div class="col-lg-12" style="font-size:30px;">Camera</div>
			</div>
		</div>
		<div class="col-lg-3 box_category" data-cat="computer" style="margin-bottom:3%; cursor:pointer;">
			<div class="col-lg-12 normal_padding" style="background:#9999FF; height:250px; font-family:PutjayBold; font-size:120px; text-align:center;">
				C
				<div class="col-lg-12" style="font-size:30px;">Computer</div>
			</div>
		</div>
		<div class="col-lg-3 box_category" data-cat="furniture" style="margin-bottom:3%; cursor:pointer;">
			<div class="col-lg-12 normal_padding" style="background:skyblue; height:250px; font-family:PutjayBold; font-size:120px; text-align:center;">
				F
				<div class="col-lg-12" style="font-size:30px;">Furniture</div>
			</div>
		</div>
		<div class="col-lg-3 box_category" data-cat="laptop" style="margin-bottom:3%; cursor:pointer;">
			<div class="col-lg-12 normal_padding" style="background:#99FF33; height:250px; font-family:PutjayBold; font-size:120px; text-align:center;">
				L
				<div class="col-lg-12" style="font-size:30px;">Laptop</div>
			</div>
		</div>
		<div class="col-lg-3 box_category" data-cat="printer" style="margin-bottom:3%; cursor:pointer;">
			<div class="col-lg-12 normal_padding" style="background:#FF6666; height:250px; font-family:PutjayBold; font-size:120px; text-align:center;">
				P
				<div class="col-lg-12" style="font-size:30px;">Printer</div>
			</div>
		</div>
		<div class="col-lg-3 box_category" data-cat="smartphone" style="margin-bottom:3%; cursor:pointer;">
			<div class="col-lg-12 normal_padding" style="background:#99FF99; height:250px; font-family:PutjayBold; font-size:120px; text-align:center;">
				S
				<div class="col-lg-12" style="font-size:30px;">Smartphone</div>
			</div>
		</div>
		<div class="col-lg-3 box_category" data-cat="smartwatch" style="margin-bottom:3%; cursor:pointer;">
			<div class="col-lg-12 normal_padding" style="background:#66FFFF; height:250px; font-family:PutjayBold; font-size:120px; text-align:center;">
				S
				<div class="col-lg-12" style="font-size:30px;">Smartwatch</div>
			</div>
		</div>
		<div class="col-lg-3 box_category" data-cat="tablet" style="margin-bottom:3%; cursor:pointer;">
			<div class="col-lg-12 normal_padding" style="background:#FFCC00; height:250px; font-family:PutjayBold; font-size:120px; text-align:center;">
				T
				<div class="col-lg-12" style="font-size:30px;">Tablet</div>
			</div>
		</div>
		<div class="col-lg-3 box_category" data-cat="tv" style="margin-bottom:3%; cursor:pointer;">
			<div class="col-lg-12 normal_padding" style="background:#FF9933; height:250px; font-family:PutjayBold; font-size:120px; text-align:center;">
				T
				<div class="col-lg-12" style="font-size:30px;">Tv</div>
			</div>
		</div>
		
	</div>
	
</div>
<script>
$(".box_category").click(function(){
	mydatacat = $(this).attr("data-cat");
	window.location="<?php echo site_url('category')?>/" + mydatacat;
});
</script>