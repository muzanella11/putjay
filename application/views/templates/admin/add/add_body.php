<div class="container-fluid">
  <div class="row">
	<div class="col-sm-3 col-md-2 sidebar">
	  <ul class="nav nav-sidebar">
		<li><a href="<?php echo site_url('apps/add');?>">Add</a></li>
		<li><a href="<?php echo site_url('apps/report');?>">Reports</a></li>
		<li><a href="#">Messages</a></li>
		<li><a href="#">Title here</a></li>
	  </ul>
	</div>
	
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<div class="separator_top"></div>
	  <h1 class="page-header">Dashboard</h1>

	  <div class="row normal_margin">
		<div class="col-lg-3 add" style="margin-bottom:15px; cursor:pointer;">
			<div class="col-lg-12 normal_padding" style="background:skyblue; margin-bottom:15px; height:200px; width:200px; border-radius:50%; text-align:center; font-size:125px; font-family:putjaybold;">A</div>
			<div class="col-lg-12 normal_padding" style="width:200px; text-align:center; font-size:18px; font-family:arial;"><strong>Add</strong></div>
			<div class="col-lg-12 normal_padding" style="width:200px; text-align:center; font-size:18px; font-family:arial; color:#777;">Add something</div>
		</div>
		<div class="col-lg-3 report" style="margin-bottom:15px; cursor:pointer;">
			<div class="col-lg-12 normal_padding" style="background:skyblue; margin-bottom:15px; height:200px; width:200px; border-radius:50%; text-align:center; font-size:125px; font-family:putjaybold;">R</div>
			<div class="col-lg-12 normal_padding" style="width:200px; text-align:center; font-size:18px; font-family:arial;"><strong>Reports</strong></div>
			<div class="col-lg-12 normal_padding" style="width:200px; text-align:center; font-size:18px; font-family:arial; color:#777;">Data Report all</div>
		</div>
		<div class="col-lg-3" style="margin-bottom:15px; cursor:pointer;">
			<div class="col-lg-12 normal_padding" style="background:skyblue; margin-bottom:15px; height:200px; width:200px; border-radius:50%; text-align:center; font-size:125px; font-family:putjaybold;">M</div>
			<div class="col-lg-12 normal_padding" style="width:200px; text-align:center; font-size:18px; font-family:arial;"><strong>Messages</strong></div>
			<div class="col-lg-12 normal_padding" style="width:200px; text-align:center; font-size:18px; font-family:arial; color:#777;">Box Messages</div>
		</div>
		<div class="col-lg-3" style="margin-bottom:15px; cursor:pointer;">
			<div class="col-lg-12 normal_padding" style="background:skyblue; margin-bottom:15px; height:200px; width:200px; border-radius:50%; text-align:center; font-size:125px; font-family:putjaybold;">A</div>
			<div class="col-lg-12 normal_padding" style="width:200px; text-align:center; font-size:18px; font-family:arial;"><strong>Add</strong></div>
			<div class="col-lg-12 normal_padding" style="width:200px; text-align:center; font-size:18px; font-family:arial; color:#777;">Add something</div>
		</div>
		
	  </div>
	  
	  
<script>
$(".add").click(function(){
	window.location="<?php echo site_url('apps/add');?>"
});
$(".report").click(function(){
	window.location="<?php echo site_url('apps/report');?>"
});
</script>
	  
	  <h2 class="sub-header">Add Data</h2>
	  <ul class="nav nav-tabs add_tabs" role="tablist">
        <li role="presentation" data-type="2" class="active"><a href="javascript:;">Category</a></li>
        <li role="presentation" data-type="3"><a href="javascript:;">Items</a></li>
		<li role="presentation" data-type="4"><a href="javascript:;">Promo</a></li>
      </ul>
	  
      <div class="col-lg-12 normal_padding box_data_add" style="border-right:1px solid #ddd; border-left:1px solid #ddd; border-bottom:1px solid #ddd; padding:15px;">
		<?php echo $this->load->view('templates/admin/add/add_category_body');?>
	  </div>
	  
	</div>
  </div>
</div>
<script>
	$(".add_tabs li").click(function(){
	 $(".add_tabs li").removeClass("active");
	 $(this).addClass("active");
	 type = $(this).attr("data-type");
	 $.ajax({
			url			: site_url + 'ajax/check_menu_add',
			type		: 'post',
			data		: {add_type:type},
			success		: function(data){
			
			$(".box_data_add").html(data);


		}
	});
	return false;
	});
</script>