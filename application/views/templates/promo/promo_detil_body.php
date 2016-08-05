<div class="separator_top"></div>
<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
	<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	<li data-target="#myCarousel" data-slide-to="1"></li>
	<li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
	<div class="item active">
	  <img class="first-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">
	  <div class="container">
		<div class="carousel-caption">
		  <h1>Example headline.</h1>
		  <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
		  <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
		</div>
	  </div>
	</div>
	<div class="item">
	  <img class="second-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
	  <div class="container">
		<div class="carousel-caption">
		  <h1>Another example headline.</h1>
		  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
		  <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
		</div>
	  </div>
	</div>
	<div class="item">
	  <img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
	  <div class="container">
		<div class="carousel-caption">
		  <h1>One more for good measure.</h1>
		  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
		  <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
		</div>
	  </div>
	</div>
  </div>
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
	<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	<span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
	<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	<span class="sr-only">Next</span>
  </a>
</div><!-- /.carousel -->

<div class="container">
	<div class="col-lg-12 normal_padding" style="padding:5%; padding-top:0;">
		<div class="col-lg-12" style="text-align:center; margin-bottom:1%;">
			<h1 style="border-bottom:3px solid skyblue; margin-left:auto; margin-right:auto; padding:1%; color:skyblue;">
				Promo <?php echo $hot_promo[0]->nama;?>
			</h1>
		</div>
		
		<?php
		if($hot_promo){
			foreach($hot_promo as $key => $value){
		?>

		<div class="col-lg-12 normal_padding">
			<div class="col-lg-3" style="margin-bottom:3%;">
				<div class="col-lg-12 normal_padding" style="background:skyblue; height:250px;">
					<img src="<?php echo $no_image;?>" style="width:100%; height:100%;" />
				</div>
				<div class="col-lg-12 normal_padding" style="text-align:center; font-family:putjaybold; font-size:25px;">Price Rp.<?php echo $value->harga;?></div>
				<?php
					if($this->session->userdata('user_id')){
				?>
				<div class="col-lg-12 normal_padding">
					<button class="btn btn-primary buy" style="width:100%; font-family:arial,sans-serif; font-size:20px;" data-title="Cart" data-btn-title="Add To Cart" data-me="<?php echo $value->id_items;?>">Buy</button>
				</div>
				<?php } ?>
			</div>
			<div class="col-lg-9" style="margin-bottom:3%;">
				<div class="col-lg-12 normal_padding" style="font-family:putjaybold; font-size:17px;">
					<?php echo $value->deskripsi;?>
				</div>
			</div>
		</div>
		
		<?php 
		
			}	
		} else { 
		
		?>
		Tidak ada promo
		<?php } ?>
		
		
		
		<div class="col-lg-12" style=" margin-top:3%; margin-bottom:3%;">
			<div class="col-lg-12 normal_padding" style="border-bottom:2px solid skyblue;"></div>
		</div>
		
		<div class="col-lg-12 normal_padding">
			<div class="col-lg-12">
				<strong>Putra Jaya Electronic - Toko Electronic Terbesar Di Dunia dan Teraman</strong> </br>
				<p>
					Putra Jaya Electronic adalah toko electronic online terbesar di dunia dan mempunyai lebih dari 1 triliun user yang tersebar di seluruh dunia.
					Kami akan selalu memberi kepuasan terhadap user kami dan kami akan terus berinovasi untuk perkembangan Putra Jaya Electronic
				</p>
			</div>
		</div>
	</div>
	
</div>
<?php
	if($this->session->userdata('user_id')){
?>
<script>
$(".box_promo").click(function(){
	window.location="<?php echo site_url('promo/id');?>/"+$(this).attr("data-me");
});
</script>
<?php } ?>