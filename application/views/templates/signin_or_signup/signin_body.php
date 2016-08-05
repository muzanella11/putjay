<form class="form_signin">
  <div class="form-group">
	<label for="recipient-name" class="control-label">Email or Username</label>
	<input type="text" name="variabel" class="form-control" placeholder="Email or Username">
	<div class="col-lg-12 normal_padding box_error error_variabel" style="color:red;"></div>
  </div>
  <div class="form-group">
	<label for="recipient-name" class="control-label">Password</label>
	<input type="password" name="password" class="form-control" placeholder="Password">
	<div class="col-lg-12 normal_padding box_error error_password" style="color:red;"></div>
  </div>
</form>
<div style="text-align:center;" class="box_berhasil">
</div>
<script>
$(document).ready(function(){
	//alert();
	if($(".ok").hide()){
		$(".ok").show();
	}
});
$(".ok").click(function(){
	//alert();
	$.ajaxSettings.cache=false;
	$.ajax({
			url			: site_url + 'ajax/login',
			type		: 'post',
			dataType	: "JSON",
			data		: $(".form_signin").serialize(),
			success		: function(data){
			//	alert();
			//	$("#modal_content").html(data);
			//	$("#modal").hide();
			if(data.t == 0){
				$(".box_error").html('');
				if(data.id == 'variabel'){
					$('.error_variabel').html(data.message);
				}
				if(data.id == 'password'){
					$('.error_password').html(data.message);
				}
			}
			else if(data.t == 1){
				//alert('berhasil');
				$(".ok").hide();
				$(".form_signin").hide();
				$(".box_berhasil").html("Loading...");
				setTimeout(function(){
					$('.myModal').modal('toggle');
				},2222);
				setTimeout(function(){
					window.location="<?php echo site_url('');?>";
				},3000);
			}
	

		}
	});
	return false;
});
</script>