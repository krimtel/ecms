$(document).ready(function(){
	var baseUrl = $('#base_url').val();
	
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
	
	
});


