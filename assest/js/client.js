$(document).ready(function(){
	var baseUrl = $('#base_url').val();
	
	$(document).on('change','#language_selector',function(){
		var l_id = $(this).val();
		
		$.ajax({
	        type: 'POST',
	        url: baseUrl+'Ajax_ctrl/language_select',
	        dataType: "json",
	        data: {
	        	'l_id'	: l_id
	        },
	        beforeSend: function(){
	        	$('#loader').modal({'show':true});	
	        },
	        complete: function(){},
	        success:function (response) {
	        	$('#loader').modal('toggle');
	        	location.reload();
	        }
		});
	});
	
$(document).on('click','.play-img',function(){
		var v_url = $(this).data('v_url');
                var id = $(this).data('pid');
                $('#iframe1_v_'+id).hide();

		var iframe_id = $(this).data('v_id');
		var x = '<iframe width="294px" height="155px" src="'+v_url+'?autoplay=1" frameborder="0" allowfullscreen></iframe>';
		  var id = $(this).data('v_id');
		  $(this).hide();
		  $('#'+iframe_id).html(x).show();
});

	$(document).on('click','.rahul_youtube',function(){
		var v_url = $(this).data('v_url');
		var iframe_id = $(this).data('v_id');
		var x = '<iframe width="294px" height="155px" src="'+v_url+'?autoplay=1" frameborder="0" allowfullscreen></iframe>';
		  var id = $(this).data('v_id');
		  $(this).hide();
		  $('#'+iframe_id).html(x).show();
	});
});
s