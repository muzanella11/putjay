<?php

/**
 * @author LENOVO
 * @copyright 2015
 */



?>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand putjay_logo" href="<?php echo site_url();?>" style="color:Skyblue;">Putra Jaya Electronic</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li <?php if($this->uri->segment(1) == ''){?> class="home_active" <?php } else { ?> class="home" <?php } ?> ><a href="<?php echo site_url();?>">Home</a></li>
        <li <?php if($this->uri->segment(1) == 'category'){?> class="category_active" <?php } else { ?> class="category" <?php } ?> ><a href="<?php echo site_url('category');?>">Kategori</a></li>
        <li <?php if($this->uri->segment(1) == 'about'){?> class="about_active" <?php } else { ?> class="about" <?php } ?> ><a href="<?php echo site_url('about');?>">About</a></li>
		<li <?php if($this->uri->segment(1) == 'contact'){?> class="contact_active" <?php } else { ?> class="contact" <?php } ?>><a href="<?php echo site_url('contact');?>">Contact</a></li>
        <li>
			<div class="col-lg-12 normal_padding box_search" style="padding-top:3%;">
				<input type="text" class="input_search" style="padding:5px;" placeholder="Search" />
        <div class="box_result_search">
        </div>
				<!--<button></button>-->
			</div>
        </li>
      </ul>
      <!--<style>
      .for_nav_right{
        width: 260px;
      }
      .for_nav_right li {
        padding: 3%;
      }
      </style>
      <ul class="nav for_nav_right navbar-nav navbar-right">
        <li>
            <button class="btn btn-default btn-primary">Masuk</button>
        </li>
        <li>
            <button class="btn btn-default btn-primary">Masuk</button>
        </li>
        <li>
            <button class="btn btn-default btn-primary">Setting</button>
        </li>
        
      </ul>-->
      <?php if($this->session->userdata('user_id')){?>
		<ul class="nav navbar-nav navbar-right">
			<li>
				<div class="col-lg-12 normal_padding" style="padding: 15px; border-right: 2px solid grey;"><strong>Hi, <?php echo $this->session->userdata('nama');?></strong></div>
			</li>
			<li>
				<div class="col-lg-12 normal_padding cartme <?php if($this->uri->segment(1) == 'cart'){?> cart_active <?php } else { ?> cart <?php } ?>" style="padding: 15px;">Cart</div>
			</li>
			<li>
				<li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Setting <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Account</a></li>
                    <li><a href="#">Top up balance</a></li>
                    <li><a href="<?php echo site_url('logout');?>">Logout</a></li>
                  </ul>
                </li>
			</li>
			
		  </ul>
	  <?php } else { ?>
		<ul class="nav navbar-nav navbar-right">
			<li>
				<div class="col-lg-12 normal_padding" style="padding: 15px;"><strong class="link_normal">
					<a href="javascript:;" data-btn-title="Signin" data-title="Signin" data-toggle="modal" data-target=".myModal" class="link_signin btn_modal">Signin</a></strong> 
					or 
					<strong class="link_normal"><a href="javascript:;" data-btn-title="Signup" data-title="Signup" data-toggle="modal" data-target=".myModal" class="link_signup btn_modal">Signup</a></strong>
				</div>
			</li>	
		  </ul>
	  <?php } ?>
    </div><!--/.nav-collapse -->
  </div>
</nav>
<script type="text/javascript">
  $('.input_search').keyup(function(){
    en = $(this).val();
    $.ajaxSettings.cache=false;
    $.ajax({
        url     : site_url + 'ajax/search_items',
        type    : 'post',
        data    : {q:en},
        success   : function(data){
        //  alert();
        //  $("#modal_content").html(data);
        //  $("#modal").hide();
        if(data){
          $('.box_result_search').html(data);
        } else {
          $('.box_result_search').html('');
        }
      }
    });
    return false;
  });
</script>


