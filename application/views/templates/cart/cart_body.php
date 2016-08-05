<div class="separator_top"></div>
<div class="container-fluid" style="background:#FFFF66; height:300px; margin-bottom:3%;">
	<div class="col-lg-12 normal_padding box_title_page">Cart</div>
</div>

<div class="container">
	<div class="col-lg-12 normal_padding" style="padding:5%; padding-top:0;">
		<div class="col-lg-12" style="text-align:center; margin-bottom:1%;">
			<h1 style="border-bottom:3px solid skyblue; font-family:PutjayBold; margin-left:auto; margin-right:auto; padding:1%; color:skyblue;">
				Your Cart
			</h1>
		</div>
		
		<?php
		if($cart){
			foreach($cart as $key => $value){
		?>

		<div class="col-lg-12 normal_padding">
			<div class="col-lg-3" style="margin-bottom:3%;">
				<div class="col-lg-12 normal_padding" style="background:skyblue; height:250px;">
					<img src="<?php echo $no_image;?>" style="width:100%; height:100%;" />
				</div>
				<div class="col-lg-12 normal_padding" style="text-align:center; font-family:putjaybold; font-size:25px;">Price Total Rp.<?php echo $value->total;?></div>
				<?php
					if($this->session->userdata('user_id')){
				?>
				<div class="col-lg-12 normal_padding">
					<button class="btn btn-danger" onclick="window.location='<?php echo site_url();?>cart/delete/q/<?php echo $value->id_cart;?>'" style="width:100%; font-family:arial,sans-serif; font-size:20px;" data-btn="delete" data-me="<?php echo $value->id_items;?>">Delete</button>
				</div>
				<?php } ?>
			</div>
			<div class="col-lg-9" style="margin-bottom:3%;">
				<div class="col-lg-12 normal_padding" style="font-family:putjaybold; font-size:17px;">
					<h1>
						<?php echo $value->nama;?>
					</h1>
					<h3>
						<?php echo $value->deskripsi;?>
					</h3>
				</div>
			</div>
		</div>
		
		
		<?php 
			}	
		} else { 
		
		?>
		Tidak ada barang di keranjang
		<?php } ?>
		
		<div class="col-lg-12 normal_padding">
			<div class="col-lg-12">
				<div style="border-top:2px solid skyblue;" class="col-lg-12 normal_padding">
					<h2>
						Total : <?php echo "semuanya di jumlah";?>
					</h2>
					<button class="btn btn-primary">Bayar</button>
				</div>
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