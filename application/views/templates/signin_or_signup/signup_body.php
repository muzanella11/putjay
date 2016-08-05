<form class="form_signup">
  <div class="form-group">
	<label for="recipient-name" class="control-label">Name</label>
	<input type="text" class="form-control" name="nama" placeholder="Enter your Name">
	<div class="col-lg-12 normal_padding box_error error_nama" style="color:red;"></div>
  </div>
  <div class="form-group">
	<label for="recipient-name" class="control-label">Email</label>
	<input type="text" class="form-control" name="email" placeholder="Enter your email">
	<div class="col-lg-12 normal_padding box_error error_email" style="color:red;"></div>
  </div>
  <div class="form-group">
	<label for="recipient-name" class="control-label">Password</label>
	<input type="password" class="form-control" name="password" placeholder="Enter your Password">
	<div class="col-lg-12 normal_padding box_error error_password" style="color:red;"></div>
  </div>
  <div class="form-group">
	<label for="recipient-name" class="control-label">Password Confirm</label>
	<input type="password" class="form-control" name="passconf" placeholder="Retype your Password">
	<div class="col-lg-12 normal_padding box_error error_passconf" style="color:red;"></div>
  </div>
  <div class="form-group">
	<label for="recipient-name" class="control-label">Username</label>
	<input type="text" class="form-control" name="username" placeholder="Enter your Username">
	<div class="col-lg-12 normal_padding box_error error_username" style="color:red;"></div>
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
			url			: site_url + 'ajax/submit_register',
			type		: 'post',
			dataType	: "JSON",
			data		: $(".form_signup").serialize(),
			success		: function(data){
			//	alert();
			//	$("#modal_content").html(data);
			//	$("#modal").hide();
			if(data.t == 0){
				$(".box_error").html('');
				if(data.id == 'nama'){
					$('.error_nama').html(data.message);
				}
				if(data.id == 'email'){
					$('.error_email').html(data.message);
				}
				if(data.id == 'password'){
					$('.error_password').html(data.message);
				}
				if(data.id == 'passconf'){
					$('.error_passconf').html(data.message);
				}
				if(data.id == 'username'){
					$('.error_username').html(data.message);
				}
			}
			else if(data.t == 1){
				//alert('berhasil');
				$(".ok").hide();
				$(".form_signup").hide();
				$(".box_berhasil").html("Terima kasih telah bergabung");
				setTimeout(function(){
					$('.myModal').modal('toggle');
				},2222);
			}
	

		}
	});
	return false;
});
</script>