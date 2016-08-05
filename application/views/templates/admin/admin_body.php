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
	  <!--<div class="row placeholders">
		<div class="col-xs-6 col-sm-3 placeholder">
		  <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
		  <h4>Label</h4>
		  <span class="text-muted">Something else</span>
		</div>
		<div class="col-xs-6 col-sm-3 placeholder">
		  <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
		  <h4>Label</h4>
		  <span class="text-muted">Something else</span>
		</div>
		<div class="col-xs-6 col-sm-3 placeholder">
		  <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
		  <h4>Label</h4>
		  <span class="text-muted">Something else</span>
		</div>
		<div class="col-xs-6 col-sm-3 placeholder">
		  <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
		  <h4>Label</h4>
		  <span class="text-muted">Something else</span>
		</div>
	  </div>-->
	  
	  <h2 class="sub-header">Data User</h2>
<div class="table-responsive">
<?php 
if($alluser){	
?>
<table class="table table-striped">
  <thead>
	<tr>
	  <th>Nama</th>
	  <th>Email</th>
	  <th>Username</th>
	  <th>Password</th>
	  <th>Tanggal Bergabung</th>
	</tr>
  </thead>
  <tbody>
  <?php 
	foreach($alluser as $key => $value){
  ?>
	<tr>
	  <td><?php echo $value->nama;?></td>
	  <td>
		<?php
			echo $value->email;
		?>
	  </td>
	  <td><?php echo $value->username;?></td>
	  <td><?php echo $value->password;?></td>
	  <td><?php echo $value->date_join;?></td>
	</tr>
  <?php } ?>
	
  </tbody>
</table>
<?php } else { ?>
Tidak ada data
<?php } ?>

</div>
	  
	</div>
  </div>
</div>