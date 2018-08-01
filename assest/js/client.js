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
		var x = '<iframe width="229px" height="125px" src="'+v_url+'?autoplay=1" frameborder="0" allowfullscreen></iframe>';
		  var id = $(this).data('v_id');
		  $(this).hide();
		  $('#'+iframe_id).html(x).show();
});

	$(document).on('click','.rahul_youtube',function(){
		var v_url = $(this).data('v_url');
		var iframe_id = $(this).data('v_id');
		var x = '<iframe width="229px" height="125px" src="'+v_url+'?autoplay=1" frameborder="0" allowfullscreen></iframe>';
		  var id = $(this).data('v_id');
		  $(this).hide();
		  $('#'+iframe_id).html(x).show();
	});
	
	$(document).on('change','#elearing_cat_selector',function(){
		var cat = $(this).val();
		window.location.replace(baseUrl+'elearning/'+cat);
	});
	
	$(document).on('keyup','#video_search_learing',function(){
		var cat = $('#elearing_cat_selector').val();
		var text = $(this).val();
		$.ajax({
			type: 'POST',
			url: baseUrl+'Elearning_ctrl/video_search_list',
			dataType: "json",
			data: {
				'cat' : cat,
				'text': text
			},
			beforeSend: function(){
				$('#loader').modal({'show':true});
			},
			complete: function(){},
			success:function (response){
				if(response.status == 200){
					$('#loader').modal('toggle');
					var x = '';
					$.each(response.data,function(key,value){
						var fields = value['v_url'].split('/embed/');
						var street = fields[1];
				x = x + '<div class="col-md-3">' +
						'<div class="row elearn-v-box">' +
							'<div class="col-md-12">'+
								'<div class="thum">'+
									'<div style="background:url(http://img.youtube.com/vi/'+ street +'/0.jpg) center no-repeat;cursor:pointer;height:172px;width:280px;background-size:cover;"></div>'+
									'<img alt="" style="width:64px;" data-pid="'+ value['vid'] +'" class="play-img-gallery" src="'+baseUrl+'assest/images/new-theme/icon/play-ico.png"/>'+
								'</div>'+
							'</div>'+
							'<div class="col-md-12 video-g-details">'+
								'<h5><b>'+ value['v_title'] +'</b></h5>'+
								'<p>1025 Views - '+value['created_at']+'</p>'+
							'</div>'+
						'</div>'+
					'</div>';
					});		
					$('#video_lists').html(x);
				}
				else{		
					
				}
			}
		});
	});
	
	$('#myCarousel').carousel({
		interval: 3000,
		cycle: true
	});
	
	$(document).on('change','#event_category_selector',function(){
		var cat = $(this).val();
		window.location.replace(baseUrl+'events/'+cat);
	});
	
	$(document).on('keyup','#event_search_gallery',function(){
		var cat = $('#event_category_selector').val();
		var text = $(this).val();
		$.ajax({
			type: 'POST',
			url: baseUrl+'Event_ctrl/event_search_list',
			dataType: "json",
			data: {
				'cat' : cat,
				'text': text
			},
			beforeSend: function(){
				$('#loader').modal({'show':true});
			},
			complete: function(){},
			success:function (response){
				if(response.status == 200){
					$('#loader').modal('toggle');
					var x = '';
					$.each(response.data,function(key,value){
						var fields = value['v_url'].split('/embed/');
						var street = fields[1];
				x = x + '<div class="col-md-3">' +
						'<div class="row elearn-v-box">' +
							'<div class="col-md-12">'+
								'<div class="thum">'+
									'<div style="background:url(http://img.youtube.com/vi/'+ street +'/0.jpg) center no-repeat;cursor:pointer;height:172px;width:280px;background-size:cover;"></div>'+
									'<img alt="" style="width:64px;" data-pid="'+ value['vid'] +'" class="play-img-gallery" src="'+baseUrl+'assest/images/new-theme/icon/play-ico.png"/>'+
								'</div>'+
							'</div>'+
							'<div class="col-md-12 video-g-details">'+
								'<h5><b>'+ value['v_title'] +'</b></h5>'+
								'<p>1025 Views - '+value['created_at']+'</p>'+
							'</div>'+
						'</div>'+
					'</div>';
					});		
					$('#video_lists').html(x);
				}
				else{		
					
				}
			}
		});
	});
	
	
	 $(document).on('click','.event_inst',function(){
						
						var e_id = $(this).data('id');
						var e_sort = $(this).data('e_sort');
						var e_cat = $("#event_category_selector").val();
							$.ajax({
								type: 'post',
								url: baseUrl+'Event_ctrl/event_gallery_data',
								dataType: "json",
								data:{
									'e_id'  :  e_id,
									'e_sort' : e_sort,
									'e_cat' :    e_cat
								},
								beforeSend: function(){
									$('#loader').modal({'show': true});
								},
								complete: function(){},
								success: function (response){
									console.log(response);
									$('#loader').modal('toggle');
									if(response.status == 200){
										
										
										// $('#eve_id').val(response.data[0].event_id);
										// $('#modal_image').val(response.data[0].event_image);
										// $('#modal_content').val(response.data[0].event_content);
										// $('#eve_category').val(response.data[0].event_content);
										$('#event_instance').modal({'show':true,'backdrop':false});
									}
									else{
										
									}
								}
							});
						// $('#modal_title').html(e_title);
						// $('#modal_content').html(e_content);
						// $('#modal_image').html('<img style="width:100%;" src="'+baseUrl+'/Event_gallary/'+e_image+'">');
						// $('#event_instance').modal({'show':true,'backdrop':false});
					 });
});
