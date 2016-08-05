<div class="col-lg-12 normal_padding" style="background:#f6f6f6;">
	<div class="container">
		<div class="col-lg-12 normal_padding" style="padding:5%;">
			<div class="col-lg-12 link_normal" style="text-align:center;">
				<a class="putjay_logo" href="#" style="color:Skyblue;">Putra Jaya Electronic</a>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade myModal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
		<div class="container-fulid mdl_content">
			
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary ok"></button>
      </div>
    </div>
  </div>
</div>
<script>
$(".cartme").click(function(){
	window.location="<?php echo site_url('cart');?>";
});
$(".btn_modal").click(function(){
	title = $(this).attr("data-title");
	btn_title = $(this).attr("data-btn-title");
	data_mycart = $(this).attr("data-mycart");
	$(".modal-title").html(title);
	$(".ok").html(btn_title);
	
	$.ajaxSettings.cache=false;
	$.ajax({
			url			: site_url + 'ajax/modal',
			type		: 'post',
			data		: {type:title},
			success		: function(data){
			//	alert();
			//	$("#modal_content").html(data);
			//	$("#modal").hide();
			if(data){
				$(".mdl_content").html(data);
				$('.myModal').modal('toggle');
			} else {
				$(".mdl_content").html('');
			}
	

		}
	});
	return false;
});

$(".buy").click(function(){
	title = $(this).attr("data-title");
	btn_title = $(this).attr("data-btn-title");
	$(".modal-title").html(title);
	$(".ok").html(btn_title);
	
	data_btn	=	$(this).attr("data-me");
	$.ajaxSettings.cache=false;
	$.ajax({
			url			: site_url + 'ajax/buy',
			type		: 'post',
			data		: {id:data_btn},
			success		: function(data){
			//	alert();
			//	$("#modal_content").html(data);
			//	$("#modal").hide();
			if(data){
				$(".mdl_content").html(data);
				$('.myModal').modal('toggle');
			} else {
				$(".mdl_content").html('');
			}
	

		}
	});
	return false;
});
</script>