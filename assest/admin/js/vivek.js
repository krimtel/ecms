$(document).ready(function(){
	var baseUrl = $('#base_url').val();
	var uGroup = $('#u_group').val();
//$.validator.setDefaults({
//	submitHandler: function() {
//		form.submit();
//	}
//});
	

	//$("#login_form").validate({
	$("form[name='login_form']").validate({
		rules: {
			identity: {
				required: true,
				minlength:4
			},
			password: {
				required: true
			}

		},
		messages: {
			username: {
					required: "Please enter your identity",
					minlength: "Your username must consist of at least 4 characters"
			},
			password: {
				required: "Please enter your password",
				minlength: "Your username must consist of at least 4 characters"
			}
		},
		 submitHandler: function(form) {
		      form.submit();
		    }
	});
	

	
	
	$('#news_form').validate({
	ignore:[],
	debug: false,
		 event: 'blur',
	rules: {
		news_desc: {
			required: function(news_desc) {
		          CKEDITOR.instances[news_desc.id].updateElement();
		          var editorcontent = news_desc.value.replace(/<[^>]*>/gi, '');
		          return editorcontent.length === 0;
		          }
		}
	},
	messages: {
		news_desc: {
				required: "Please Fill News Discription"
		}	
	}
});
	
	$('#widget_form').validate({
		ignore:[],
		debug: false,
			 event: 'blur',
		rules: {
			widget_name:{
				required: true
			},
			widget_content: {
				required: function(widget_content) {
			          CKEDITOR.instances[widget_content.id].updateElement();
			          var editorcontent = widget_content.value.replace(/<[^>]*>/gi, '');
			          return editorcontent.length === 0;
			          }
			}
		},
		messages: {
			widget_name:{
				required: "please fill widget name"
			},
			widget_content: {
					required: "Please Fill Widget Content"
			}	
		}
		
	});

	$('#link_form').validate({
		ignore:[],
		debug: false,
			 event: 'blur',
		rules: {
			link_desc: {
				required: function(link_desc) {
			          CKEDITOR.instances[link_desc.id].updateElement();
			          var editorcontent = link_desc.value.replace(/<[^>]*>/gi, '');
			          return editorcontent.length === 0;
			          }
			}
		},
		messages: {
			link_desc: {
					required: "Please Fill Link Description Field"
			}	
		}
		
	});
	
	$('#event_form').validate({
		ignore:[],
		debug: false,
			 event: 'blur',
		rules: {
			link_desc: {
				required: function(link_desc) {
			          CKEDITOR.instances[link_desc.id].updateElement();
			          var editorcontent = link_desc.value.replace(/<[^>]*>/gi, '');
			          return editorcontent.length === 0;
			          }
			}
		},
		messages: {
			link_desc: {
					required: "Please Fill Link Description Field"
			}	
		}
		
	});

//////////////////////////////////////Language///////////////////////////////////////////////////////////// 
	
	$(document).on('keyup','#language_name',function(){
		var language = $("#language_name").val().trim();
		var pattern =  new RegExp("^[a-zA-Z ]*$");
		var that = this;
		if(pattern.test(language)) {
			if(language==''){
				 $("#language_create").attr("disabled", "disabled");
				 
			}
			else if (language != ''){
		         $("#language_response").show();
		         $.ajax({
		            url: baseUrl +'admin/language_ctrl/language_check',
		            type: 'POST',
		            dataType: "json",
		            data: {
		            	'language' : language
		            },
		            success: function(response){
		                if(response.status == 200){
		                	$(that).removeClass('txt_error');
		                	$("#language_create").attr("disabled", false);
		                }else {
		                    $(that).addClass('txt_error');
		                    $("#language_create").attr("disabled", "disabled");
		                }
		                
		             }
		          });
		      }else{
		         $("#language_response").hide();
		      }
		}
		else if(language!=pattern){
			$("#language_response").html("<span class='exists'>only char allowed</span>");
			
			$(that).addClass('txt_error');
			$("#language_create").attr("disabled", "disabled");
		}
	    });
	///////////////////////Users Language////////////////////////////////////////////////
	
	$(document).on('change','#users_list_drop_down',function(){
		if($(this).val() != 0){
			$('#users_language_drop_down_box').show();
		}
		else{
			$('#users_language_drop_down_box').hide();
		}
		
		$(document).on('click','#users_language_drop_down',function(){
			if($(this).val() == 0){
				$("#users_language_update").attr("disabled","disabled");
			}
		});
		
	});
	
//////////////////////////////////////////////////Widget_Update////////////////////////////////////////////////////////////////////////////////
	$(document).on('click','#widget_create,.widget_edit',function(){
		var w_id = $(this).data('widget_id');
		$.ajax({
			type: 'POST',
	        url: baseUrl+'admin/Widget_ctrl/widget_content',
			dataType : 'json',
			data : {
				'widget_id' : w_id,
			},
			beforeSubmit : function(e){
				$('#loader').modal('show');
			} ,
			 success:function(response){
				 console.log(response);
				 $('#loader').modal('toggle');
			  	  if(response.status == 200){
			    	CKEDITOR.instances['widget_content'].setData(response.data[0].content);
			    	$('#widget_id').val(response.data[0].id);
			    	$('#widget_name').val(response.data[0].name);
			    	$('#widget_update').show();
			    	$('#widget_create').hide();
			      }
			      else{
				    //alert(response.msg);
			      }
			    }
		});
	});

	
	
//	$(document).on('click','#widget_create,#widget_update',function(){
//		$('#widget_form').ajaxForm({
//		    dataType : 'json',
//		    data : {
//		    	'widget_content' : CKEDITOR.instances.widget_content.getData()
//		    },
//		    beforeSubmit:function(e){
//				$('#loader').modal('show');
//		    },
//		    success:function(response){
//		    	console.log(response);
//		  	  if(response.status == 200){
//		    	$('#loader').modal('toggle');
//		    	alert(response.msg);
//		    	//location.reload();
//		      }
//		      else{
//			    alert(response.msg);
//		      }
//		    }
//	  }).submit();
//	});
//	
	

	$(document).on('click','.widget_delete',function(){
		var x = confirm('Are you sure.'); 
		if(x){
			var w_id = $(this).data('widget_id');
			$.ajax({
		        type: 'POST',
		        url: baseUrl+'admin/Widget_ctrl/widget_delete',
		        dataType: "json",
		        data: {
		        	'w_id'	: w_id
		        },
		        beforeSend: function(){
		        	$('#loader').modal({'show':true});	
		        },
		        complete: function(){},
		        success:function (response) {
		        	console.log(response);
		        	$('#loader').modal('toggle');
		        	location.reload();
		        }
			});
		}

	});
	
	
	//////////////////////////////// Slider Create //////////////////////////////////////
	
	$(document).on('click','#slider_create',function(){
		 var form_valid = true;
		 var alt_tag=$(this).data('slider_alt');
		 
		 if($('#userFiles').val() == ''){
				$('#userfile_error').html('Please select image for slider.').css('display','block');
				form_valid = false;
			}
		 else{
				$('#userfile_error').css('display','none');
			}
		 
		 if($('#slider_alt').val() == ''){
			 $('#slider_alt_error').html('please Fill Alt Tag').css('display','block');
			 form_valid = false;
		 }
		 else{
			 $('#slider_alt_error').css('display','none');
		 }
		 
		 if($('#slider_order').val()==''){
			 $('#slider_order_error').html("please Fill Slider Sort Order").css('display','block');
			 form_valid = false;
		 }
		 else{
			 $('#slider_order_error').css('display','none');
		 }
		if(form_valid){
			$('#slider_form').ajaxForm({
				dataType : 'json',
				data : 'alt_tag',
				beforeSubmit:function(e){
					$('#loader').modal('show');
			    },
			    success:function(response){
			  	  if(response.status == 200){
			    	$('#loader').modal('toggle');
			    	alert(response.msg);
			    	location.reload();
			      }
			      else{
				    alert(response.msg);
			      }
			    }
			}).submit();
		}
	});
	
	
	$(document).on('click','#slider_update',function(){
		var form_valid = true;
		
		if($('#slider_alt').val() == ''){
			$('#slider_alt_error').html('Please enter Slider Tag.').css('display','block');
			form_valid = false;
		}
		else if($('#slider_alt').val().length < 5){
			$('#slider_alt_error').html('Please enter valid Event tag.').css('display','block');
			form_valid = false;
		}
		else{
			$('#slider_alt_error').css('display','none');
		}

		if(uGroup != 'subadmin'){
			if(!$.isNumeric($('#slider_order').val())){
				$('#slider_order_error').html('Slider Order must be numaric.').css('display','block');
				form_valid = false;
			}
			else if($('slider_order').val() == ''){
				$('#slider_order_error').html('Slider Order is required.').css('display','block');
				form_valid = false;
			}
			else{
				$('#slider_order_error').css('display','none');
			}
			
		}
		alert(form_valid);
   		if(form_valid){
			$('#slider_form').ajaxForm({
			    dataType : 'json',
			    data : {},
			    beforeSubmit:function(e){
					$('#loader').modal('show');
			    },
			    success:function(response){
			  	  if(response.status == 200){
			    	$('#loader').modal('toggle');
			    	alert(response.msg);
			    	location.reload();
			      }
			      else{
				    alert(response.msg);
			      }
			    }
		  }).submit();
   		}
	});
	
	function readURL(input) {

		  if (input.files && input.files[0]) {
		    var reader = new FileReader();

		    reader.onload = function(e) {
		      $('#image_upload_preview').attr('src', e.target.result);
		    }
		    reader.readAsDataURL(input.files[0]);
		  }
		}
	
	$(document).on('change','#userFiles',function(e){
		 readURL(this);
	});
	
	
	$(document).on('click','.slider_edit',function(){
		var s_id = $(this).data('slider_id');
		$.ajax({
			type: 'POST',
			url: baseUrl+'admin/Slider_ctrl/get_slider_content',
			dataType: "json",
			data: {
				's_id'	: s_id
			},
			beforeSend: function(){
				$('#loader').modal({'show':true});	
			},
			complete: function(){},
				success:function (response) {
					console.log(response);
					$('#loader').modal('toggle');
					if(response.status == 200){
						$('#image_upload_preview').attr('src',baseUrl+'Slider_gallary/'+response.data.slider_image);
						
						$('#slider_id').val(response.data.s_id);
						$('#slider_alt').val(response.data.alt_tag);
						$('#slider_order').val(response.data.sort);
						$('#slider_update').show();
						$('#slider_create').hide();
					}
					else{
						
					}
				}
		});
	});
	
	
	$(document).on('click','.slider_published',function(){
		var x = confirm('Are you sure.');
		if(!x){
			if($(this).prop('checked') == true){
				$(this).prop('checked', false);
			}
			else{
				$(this).prop('checked', true);
			}
		}
		else{
			var status = $(this).prop('checked');
			var s_id = $(this).data('slider_id');
			$.ajax({
				type: 'POST',
				url: baseUrl+'admin/Slider_ctrl/slider_publish',
				dataType: "json",
				data: {
					's_id'	: s_id,
					'status' : status
				},
				beforeSend: function(){
					$('#loader').modal({'show':true});	
				},
				complete: function(){},
				success:function (response) {
					console.log(response);
					$('#loader').modal('toggle');
				}
			});
		}
	});
	
	$(document).on('click','.slider_delete',function(){
		var x = confirm('Are you sure.'); 
		if(x){
			var s_id = $(this).data('slider_id');
			$.ajax({
				type: 'POST',
				url: baseUrl+'admin/Slider_ctrl/slider_delete',
				dataType: "json",
				data: {
					's_id'	: s_id
				},
				beforeSend: function(){
					$('#loader').modal({'show':true});	
				},
				complete: function(){},
				success:function (response) {
					console.log(response);
					$('#loader').modal('toggle');
					location.reload();
				}
			});
		}
	});
	
	$(document).on('click','.slider_tranlate',function(){
		$('#loader #myModalLabel').html('vivek');
		$('#loader .modal-footer').html('<input type="button" class="btn btn-primary" id="slider_update" value="update">');
		var x = '<form class="form-horizontal">'+
			  		'<div class="form-group">'+
			  			'<label for="inputEmail3" class="col-sm-2 control-label">Email</label>'+
			  			'<div class="col-sm-10">'+
			  				'<input type="email" class="form-control" id="inputEmail3" placeholder="Email">'+
			  			'</div>'+
			  		'</div>'+
			  		'<div class="form-group">'+
			  			'<label for="inputPassword3" class="col-sm-2 control-label">Password</label>'+
			  			'<div class="col-sm-10">'+
			  				'<input type="password" class="form-control" id="inputPassword3" placeholder="Password">'+
			  			'</div>'+
			  		'</div>'+
			  	'</div>'+
			  '</form>';
		$('#loader .modal-body').html(x);
		$('#loader').modal({
			show : true,
			keyboard : false,
			backdrop : false
		});
	});
	
});


