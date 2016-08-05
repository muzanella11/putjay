<nav class="navbar navbar-inverse navbar-fixed-top" style="z-index:1111111111111;">
  <div class="container-fluid">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" href="#" style="font-family:putjaybold;">Putra Jaya Electronic</a>
	</div>
	<div id="navbar" class="navbar-collapse collapse">
	  <ul class="nav navbar-nav navbar-right">
		<li><a href="#">Hi, <?php echo $this->session->userdata('name')?></a></li>
		<li><a href="#">Settings</a></li>
		<li><a href="<?php echo site_url('logout_admin');?>">Logout</a></li>
		<li><a href="#">Help</a></li>
	  </ul>
	</div>
  </div>
</nav>
<div class="col-lg-12 col-xs-12 normal_padding" style="top:-100px; z-index:11111111; position:fixed; text-align:center;">
	<div class="alert alert-success box_alert" style="border-radius:0;" role="alert">
		<strong>Well done!</strong> You successfully read this important alert message.
	</div>
</div>