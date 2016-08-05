<div class="col-lg-12 normal_padding" style="background:skyblue; position:fixed; height:100%; width:100%;">
	<div class="col-lg-12 normal_padding">
		<div class="col-lg-3 normal_padding box_form" style="background:#f6f6f6; position:absoute; border-radius:6px; padding:5% 3%; float:none; height:555px; top:55px; margin:auto;">
			<div class="col-lg-12 normal_padding" style="margin-bottom:15%;">
				<div style="background:#99FF66; width:200px; height:200px; text-align:center; font-family:putjaybold; margin:auto; font-size:140px; border-radius:50%;">P</div>
			</div>
			<form id="mylog">
				<div class="col-lg-12 normal_padding" style="margin-bottom:8%;">
					<input type="text" placeholder="Email or Username" name="variabel_login" style="padding:3%; width:100%; border:2px solid #99FF66;" />
					<div class="col-lg-12 normal_padding error_email" style="color:red;"></div>
				</div>
				<div class="col-lg-12 normal_padding" style="margin-bottom:8%;">
					<input type="password" name="password" placeholder="Password" style="padding:3%; width:100%; border:2px solid #99FF66;" />
					<div class="col-lg-12 normal_padding error_password" style="color:red;"></div>
				</div>
				<div class="col-lg-12 normal_padding" style="margin-bottom:8%;">
					<!--<input type="submit" class="btn btn-primary btn_login" style="width:100%;" value="Login" />-->
					<input type="submit" class="btn btn-primary btn_login" style="width:100%;" value="Login" />
				</div>
			</form>
						
		</div>
	</div>
</div>
<script>
$('#mylog').submit(function(e) {
		$.ajaxSettings.cache=false;
		$.ajax({
				url			: site_url + 'ajax/logadmin',
				type		: 'post',
				dataType	: "JSON",
				data		: $(this).serialize(),
				success		: function(data){
				//	alert();
				//	$("#modal_content").html(data);
				//	$("#modal").hide();
				if(data.t == 0){
					if(data.id == 'email' || data.id == 'username'){
						$('.error_password').html('');
					   $('.error_email').html(data.message);
					}
                    if(data.id == 'password'){
						$('.error_email').html('');
                        $('.error_password').html(data.message);
					}
				}
				else if(data.t == 1){
					//alert('berhasil');
					$('.box_form').animate({
						"top": "-=850px"
					},1111);
                    setTimeout(function(){window.location='<?php echo site_url('apps');?>';},2000);
				}
		
	
			}
		});
		return false;
});
</script>