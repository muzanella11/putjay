<div class="separator_top"></div>
<div class="container-fluid" style="background:#FFFF66; height:300px; margin-bottom:3%;">
	<div class="col-lg-12 normal_padding box_title_page">Kategori</div>
</div>

<div class="container">
	<div class="col-lg-12 normal_padding" style="padding:5%; padding-top:0;">
		<div class="col-lg-12" style="text-align:center; margin-bottom:1%;">
			<h1 style="border-bottom:3px solid skyblue; font-family:PutjayBold; text-transform:capitalize; margin-left:auto; margin-right:auto; padding:1%; color:skyblue;">
				<?php echo $this->uri->segment(2);?>
			</h1>
		</div>
		
		<?php
		if($kategori){
			foreach($kategori as $key => $value){
		?>
		
		<div class="col-lg-3" style="margin-bottom:3%;">
			<div class="col-lg-12 normal_padding box_category" style="background:skyblue; height:250px; cursor:pointer;" data-me="<?php echo $value->id_items;?>">
				<img src="<?php echo $no_image;?>" style="width:100%; height:100%;" />
				<div style="position:absolute; bottom:5px; font-family:putjaybold; font-size:20px; padding-left:5px; padding-right:5px; width:100%;">Price Rp.<?php echo $value->harga;?></div>
			</div>
			<div class="col-lg-12 normal_padding" style="text-align:center; font-family:putjaybold; font-size:25px;"><?php echo $value->nama;?></div>
		</div>
		
		<?php 
		
			}	
		} else { 
		
		?>
		Tidak ada data
		<?php } ?>
		
	</div>
	
</div>
<script>
$(".box_category").click(function(){
	mydatacat = $(this).attr("data-me");
	window.location="<?php echo site_url('category').'/'.$this->uri->segment(2).'/id';?>/" + mydatacat;
});
</script>