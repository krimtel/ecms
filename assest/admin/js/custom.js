$(document).ready(function(){
	var baseUrl = $('#base_url').val();
	//////////////////////////////menu ////////////////////////////////////
	$(document).on('change','#menu_external_link',function(){
		var x = $(this).val(); 
		if(x == 0){
			$('#menu_url_box').hide();
			$('#menu_cms_url_box').show();
		}
		else{
			$('#menu_url_box').show();
			$('#menu_cms_url_box').hide();
		}
	});
	
	$(document).on('click','#menu_create,#menu_update',function(){
		$('#menu_create_form').ajaxForm({
		    dataType : 'json',
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
	});
	
	$(document).on('click','.menu_list_item',function(){
		var m_id = $(this).data('m_id');
		$.ajax({
	        type: 'POST',
	        url: baseUrl+'admin/Menu_ctrl/menu_content',
	        dataType: "json",
	        data: {
	        	'm_id'	: m_id
	        },
	        beforeSend: function(){
	        	$('#loader').modal({'show':true});	
	        },
	        complete: function(){},
	        success:function (response) {
	        	console.log(response);
	        	$('#loader').modal('toggle');
	        	if(response.status == 200){
	        		$.each(response.data,function(key,value){
	        			$('#menu_name').val(value.menu_name);
	        			$('#menu_id').val(value.id);
	        			$('#menu_sort_order').val(value.sort);
	        			$('#menu_parent_dropdown').val(value.p_id);
	        			if(value.p_id == '0'){
	        				$('#menu_url_box').hide();
	        				$('#menu_menu_link_box').hide();
	        				$('#menu_cms_url_box').hide();
	        			}
	        			else{
	        				$('#menu_menu_link_box').show();
	        				$('#menu_cms_url_box').show();
	        				$('#menu_external_link').val(value.external_link);
		        			if(value.external_link == '0'){
		        				$('#menu_cms_url_box').show();
		        			}
		        			else{
		        				$('#menu_url_box').show();
		        				$('#menu_url_text').val(value.cms_url);
		        			}
	        			}
	        		});
	        		$('#menu_create').hide();
	        		$('#menu_update').show();
	        	}
	        	else{
	        		alert(response.msg);
	        	}
	        }
		});
	});
	
	
	$(document).on('change','#menu_parent_dropdown',function(){
		var x = $(this).val();
		if(x != 0){
			$('#menu_menu_link_box').show();
			$('#menu_url_box').show();
			$('menu_cms_url_box').show();
		}
		else{
			$('#menu_menu_link_box').hide();
			$('#menu_url_box').hide();
			$('#menu_cms_url_box').hide();
		}
	});
	
	////////////////////////////  language ////////////////////////////////////
	$(document).on('click','.language_edit',function(){
		$('#language_update').show();
		$('#language_create').hide();
		$('#language_name').val($(this).data('l_name'));
		$('#language_id').val($(this).data('l_id'));
	});
	
	$(document).on('click','#language_reset',function(){
		$('#language_update').hide();
		$('#language_create').show();
		$('#language_name').val('');
		$('#language_id').val('');
	});
	
	$(document).on('click','#language_update',function(){
		$('#language_update').hide();
		$('#language_create').show();
		var l_name = $('#language_name').val();
		var l_id = $('#language_id').val();
		
		$.ajax({
	        type: 'POST',
	        url: baseUrl+'admin/Language_ctrl/language_edit',
	        dataType: "json",
	        data: {
	        	'name'	: l_name,
	        	'id'	: l_id
	        	
	        },
	        beforeSend: function(){
	        	$('#loader').modal({'show':true});	
	        },
	        complete: function(){
				
			},
	        success:function (response) {
	        	$('#loader').modal('toggle');
	        	if(response.status == 200){
	        		alert(response.msg);
	        		location.reload();
	        	}
	        	else{
	        		alert(response.msg);
	        	}
	        }
		});
	});
	///language update close
	$(document).on('click','#language_create',function(){
		var l_name = $('#language_name').val();
		
		$.ajax({
	        type: 'POST',
	        url: baseUrl+'admin/Language_ctrl/language_create',
	        dataType: "json",
	        data: {
	        	'name'	: l_name
	        	
	        },
	        beforeSend: function(){
	        	$('#loader').modal({'show':true});	
	        },
	        complete: function(){
				
			},
	        success:function (response) {
	        	$('#loader').modal('toggle');
	        	if(response.status == 200){
	        		alert(response.msg);
	        		var x = '<tr>'+
            					'<td>--</td>'+
            					'<td>'+ response.data[0].l_name +'</td>'+
            					'<td>'+
            					'<a class="class_edit btn btn-info btn-flat language_edit" data-l_id="'+ response.data[0].l_id +'" data-l_name="'+ response.data[0].l_name +'"><i class="fa fa-pencil"></i></a>'+
            					'<a class="class_delete btn btn-info btn-flat language_delete" data-l_id="'+ response.data[0].l_id +'" data-l_name="'+ response.data[0].l_name +'"><i class="fa fa-trash"></i></a>'+
            					'</td>'+
            				'</tr>';
	        		$('#class_display').append(x);
	        	}
	        	else{
	        		alert(response.msg);
	        	}
	        }
		});
	});
	///language create close
	$(document).on('click','.language_delete',function(){
		
		var l_id = $(this).data('l_id');
		var that = this;
		$.ajax({
	        type: 'POST',
	        url: baseUrl+'admin/Language_ctrl/language_delete',
	        dataType: "json",
	        data: {
	        	'id'	: l_id
	        },
	        beforeSend: function(){
	        	$('#loader').modal({'show':true});	
	        },
	        complete: function(){
				
			},
	        success:function (response) {
	        	$('#loader').modal('toggle');
	        	if(response.status == 200){
	        		$(that).closest('tr').hide('slow');
	        		alert(response.msg);
	        	}
	        	else{
	        		alert(response.msg);
	        	}
	        }
		});
	});
	///language delete close
	
	
	///////////////////////////////////////////////// users ////////////////////////////////////////////////////
	$(document).on('change','#users_list_drop_down',function(){
		var u_id = $(this).val();
		$.ajax({
	        type: 'POST',
	        url: baseUrl+'admin/Users_ctrl/get_user_language',
	        dataType: "json",
	        data: {
	        	'id'	: u_id
	        },
	        beforeSend: function(){
	        	$('#loader').modal({'show':true});	
	        },
	        complete: function(){},
	        success:function (response) {
	        	$('#loader').modal('toggle');
	        	if(response.status == 200){
	        		$('#users_language_update').show();
	        		$('#users_language_create').hide();
	        		$('#users_language_drop_down').val(response.data[0].lang_id);
	        	}
	        	else{
	        		$('#users_language_update').hide();
	        		$('#users_language_create').show();
	        		$('#users_language_drop_down').val(0);
	        	}
	        }
		});
	});
	///users dropdown close
	$(document).on('click','#users_language_update',function(){
		var u_id = $('#users_list_drop_down').val();
		var l_id = $('#users_language_drop_down').val();
		$.ajax({
	        type: 'POST',
	        url: baseUrl+'admin/Users_ctrl/user_language_update',
	        dataType: "json",
	        data: {
	        	'u_id'	: u_id,
	        	'l_id' 	: l_id
	        },
	        beforeSend: function(){
	        	$('#loader').modal({'show':true});	
	        },
	        complete: function(){},
	        success:function (response) {
	        	$('#loader').modal('toggle');
	        	if(response.status == 200){
	        		alert(response.msg);
	        		location.reload();
	        	}
	        	else{
	        	}
	        }
		});
	});
	///users language update close
	$(document).on('click','.user_edit',function(){
		$('#users_list_drop_down').val($(this).data('u_id'));
		$('#users_language_drop_down').val($(this).data('lang_id'));
		$('#users_language_update').show();
		$('#users_language_create').hide();
	});
	
	$(document).on('click','#users_language_reset',function(){
		$('#users_language_update').hide();
		$('#users_language_create').show();
	});
	
	$(document).on('click','.user_delete',function(){
		var u_id = $(this).data('u_id');
		var that = this;
		$.ajax({
	        type: 'POST',
	        url: baseUrl+'admin/Users_ctrl/user_language_delete',
	        dataType: "json",
	        data: {
	        	'u_id'	: u_id
	        },
	        beforeSend: function(){
	        	$('#loader').modal({'show':true});	
	        },
	        complete: function(){},
	        success:function (response) {
	        	$('#loader').modal('toggle');
	        	if(response.status == 200){
	        		$(that).closest('tr').hide('slow');
	        		alert(response.msg);
	        	}
	        	else{
	        		alert(response.msg);
	        	}
	        }
		});
	});
	///user delete close
	$(document).on('click','#users_language_create',function(){
		var u_id = $('#users_list_drop_down').val();
		var l_id = $('#users_language_drop_down').val();
		$.ajax({
	        type: 'POST',
	        url: baseUrl+'admin/Users_ctrl/user_language_create',
	        dataType: "json",
	        data: {
	        	'u_id'	: u_id,
	        	'l_id' 	: l_id
	        },
	        beforeSend: function(){
	        	$('#loader').modal({'show':true});	
	        },
	        complete: function(){},
	        success:function (response) {
	        	console.log(response);
	        	$('#loader').modal('toggle');
	        	if(response.status == 200){
	        		$('#users_list_drop_down').val(0);
	        		$('#users_language_drop_down').val(0);
	        		var x = '';
	        		$.each(response.data,function(key,value){
	        		console.log(value);
	        			x = x+ '<tr>'+
		              				'<td>--</td>'+
		              				'<td>'+ value.username +'</td>'+
		              				'<td>'+ value.l_name +'</td>'+
		              				'<td>'+
		              					'<a class="class_edit btn btn-info btn-flat user_edit" data-u_id="'+ value.id +'" data-lang_id="'+ value.l_id +'"><i class="fa fa-pencil"></i></a>'+
		              					'<a class="class_delete btn btn-info btn-flat user_delete" data-u_id="'+ value.id +'"><i class="fa fa-trash"></i></a>'+
		              				'</td>'+
		              		   '</tr>';	
	        		});
	        		$('#language_users_display').append(x);
	        	}
	        	else{
	        		alert(response.msg);
	        	}
	        }
		});
	});

/////////////////////////////////////////////////////////////News///////////////////////////////////////////////////////////////////////
	$(document).on('click','#news_create,#news_update',function(){
		var form_valid = true;
		var news_desc = CKEDITOR.instances.news_desc.getData();
		if(news_desc == ''){
			$('#news_desc_error').html('news desc. is Required.').css('display','block');
			form_valid = false;
		}
		else if(news_desc.length < 17){
			$('#news_desc_error').html('news desc. atleast 10 charater.').css('display','block');
			form_valid = false;
		}
		else{ 
			$('#news_desc_error').css('display','none');
		}
		if(form_valid){
			$('#news_form').ajaxForm({
			    dataType : 'json',
			    data : {
			    	'news_desc' : CKEDITOR.instances.news_desc.getData()
			    },
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
	
	$(document).on('click','.news_edit,.news_tranlate',function(){
		var n_id = $(this).data('news_id');
		$.ajax({
	        type: 'POST',
	        url: baseUrl+'admin/News_ctrl/get_news_content',
	        dataType: "json",
	        data: {
	        	'n_id'	: n_id
	        },
	        beforeSend: function(){
	        	$('#loader').modal({'show':true});	
	        },
	        complete: function(){},
	        success:function (response) {
	        	console.log(response);
	        	$('#loader').modal('toggle');
	        	if(response.status == 200){
	        		CKEDITOR.instances['news_desc'].setData(response.data[0].news_contect);
	        		$('#news_id').val(response.data[0].id);
	        		$('#news_order').val(response.data[0].sort);
	        		$('#news_update').show();
	        		$('#news_create').hide();
	        	}
	        	else{
	        		
	        	}
	        }
		});
	});

	$(document).on('click','.news_published',function(){
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
			var n_id = $(this).data('news_id');
			$.ajax({
		        type: 'POST',
		        url: baseUrl+'admin/News_ctrl/news_publish',
		        dataType: "json",
		        data: {
		        	'n_id'	: n_id,
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
	
	$(document).on('click','.news_delete',function(){
		var x = confirm('Are you sure.'); 
		if(x){
			var n_id = $(this).data('news_id');
			$.ajax({
		        type: 'POST',
		        url: baseUrl+'admin/News_ctrl/news_delete',
		        dataType: "json",
		        data: {
		        	'n_id'	: n_id
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


/////////////////////////////////////////////////////////////Widget///////////////////////////////////////////////////////////////////////
	$(document).on('click','#widget_create,#widget_update',function(){
		$('#widget_form').ajaxForm({
		    dataType : 'json',
		    data : {
		    	'widget_content' : CKEDITOR.instances.widget_content.getData()
		    },
		    beforeSubmit:function(e){
				$('#loader').modal('show');
		    },
		    success:function(response){
		    	console.log(response);
		  	  if(response.status == 200){
		    	$('#loader').modal('toggle');
		    	alert(response.msg);
		    	//location.reload();
		      }
		      else{
			    alert(response.msg);
		      }
		    }
	  }).submit();
	});

/////////////////////////////////////////////////////////////page///////////////////////////////////////////////////////////////////////
	$(document).on('click','#page_create,#page_update',function(){
		$('#page_add_form').ajaxForm({
		    dataType : 'json',
		    data : {
		    	//'widget_content' : CKEDITOR.instances.widget_content.getData()
		    },
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
	});
	
	$(document).on('change','#page_layout',function(){
		var layout_id = $(this).val();
		if(layout_id == 1){
			$('#1coumn').show();
			$('#2coumn').hide();
			$('#3coumn').hide();
		}
		else if(layout_id == 2){
			$('#1coumn').hide();
			$('#2coumn').show();
			$('#3coumn').hide();
		}
		else if(layout_id == 3){
			$('#1coumn').hide();
			$('#2coumn').hide();
			$('#3coumn').show();
		}
		else{
			$('#1coumn').hide();
			$('#2coumn').hide();
			$('#3coumn').hide();
		}
	});
	
	
	$(document).on('click','#one_col_main_addmore',function(){
		var that = this;
		$.ajax({
	        type: 'POST',
	        url: baseUrl+'admin/Ajax_ctrl/get_all_widgets',
	        dataType: "json",
	        data: {},
	        beforeSend: function(){
	        	$('#loader').modal({'show':true});	
	        },
	        complete: function(){},
	        success:function (response) {
	        	console.log(response);
	        	$('#loader').modal('toggle');
	        	var x = '';
	        	$.each(response.data,function(key,value){
	        		x = x + '<option value="'+ value.w_id +'">'+ value.name +'</option>';
	        	});
	        	var dropdown = '<select class="form-control col-sm-6" name="one_col_maincontent[]" id="">'+
				'<option value="0">select widget</option>'+
				x +
				'</select>';
	        	//$(that).closest('td').append(dropdown);
	        	$('#one_col_maincontent_box').prepend(dropdown);
	        //$(this).closest('.one_col_maincontent').append(dropdown);
	        }
		});
	});
	
	$(document).on('click','#2_col_add',function(){
		$.ajax({
	        type: 'POST',
	        url: baseUrl+'admin/Ajax_ctrl/get_all_widgets',
	        dataType: "json",
	        data: {},
	        beforeSend: function(){
	        	$('#loader').modal({'show':true});	
	        },
	        complete: function(){},
	        success:function (response) {
	        	console.log(response);
	        	$('#loader').modal('toggle');
	        	var x = '';
	        	$.each(response.data,function(key,value){
	        		x = x + '<option value="'+ value.w_id +'">'+ value.name +'</option>';
	        	});
	        	var dropdown = '<select class="form-control col-sm-6" name="two_col_maincontent[]" id="">'+
				'<option value="0">select widget</option>'+
				x +
				'</select>';
	        $('#2coumn').append(dropdown);
	        }
		});
		
	});
	$(document).on('click','#3_col_add',function(){
		var x = '<select class="form-control col-sm-6" name="one_col_maincontent[]" id="">'+
					'<option value="0">select widget</option>'+
				'</select>';
		$('#3coumn').append(x);
	});

///////////////////////////////////////////////////////////// Links ///////////////////////////////////////////////////////////////////////
	$(document).on('click','#link_create,#link_update',function(){
		var form_valid = true;
		var link_desc = CKEDITOR.instances.link_desc.getData();
		if(link_desc == ''){
			$('#link_desc_error').html('Please enter link desc.').css('display','block');
			form_valid = false;
		}
		else if(link_desc.length < 17){
			$('#link_desc_error').html('Link desc atleast 10 charater.').css('display','block');
			form_valid = false;
		}
		else{
			$('#link_desc_error').css('display','none');
		}
		if(form_valid){
			$('#link_form').ajaxForm({
				dataType : 'json',
				data : {
					'link_desc' : CKEDITOR.instances.link_desc.getData()
				},
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

	$(document).on('click','.link_edit,.link_tranlate',function(){
		var l_id = $(this).data('link_id');
		$.ajax({
			type: 'POST',
			url: baseUrl+'admin/Links_ctrl/get_link_content',
			dataType: "json",
			data: {
				'l_id'	: l_id
			},
			beforeSend: function(){
				$('#loader').modal({'show':true});	
			},
			complete: function(){},
				success:function (response) {
					console.log(response);
					$('#loader').modal('toggle');
					if(response.status == 200){
						CKEDITOR.instances['link_desc'].setData(response.data[0].link_contect);
						$('#link_id').val(response.data[0].id);
						$('#link_order').val(response.data[0].sort);
						$('#link_update').show();
						$('#link_create').hide();
					}
					else{
						
					}
				}
		});
	});

	$(document).on('click','.link_published',function(){
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
			var l_id = $(this).data('link_id');
			$.ajax({
				type: 'POST',
				url: baseUrl+'admin/Links_ctrl/link_publish',
				dataType: "json",
				data: {
					'l_id'	: l_id,
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

	$(document).on('click','.link_delete',function(){
		var x = confirm('Are you sure.'); 
		if(x){
			var l_id = $(this).data('link_id');
			$.ajax({
				type: 'POST',
				url: baseUrl+'admin/Links_ctrl/link_delete',
				dataType: "json",
				data: {
					'l_id'	: l_id
				},
				beforeSend: function(){
					$('#loader').modal({'show':true});	
				},
				complete: function(){},
				success:function (response) {
					console.log(response);
					$('#loader').modal('toggle');
					//location.reload();
				}
			});
		}
	});
	
//////////////////////////////////////////////////////event////////////////////////////////////////////
	
	$(document).on('click','#event_create',function(){
		var form_valid = true;
		
		if($('#userFiles').val() == ''){
			$('#userfile_error').html('Please select image for Event.').css('display','block');
			form_valid = false;
		}
		else{
			$('#userfile_error').css('display','none');
		}
		
		if($('#event_title').val() == ''){
			$('#event_title_error').html('Please enter Event Title.').css('display','block');
			form_valid = false;
		}
		else if($('#event_title').val().length < 5){
			$('#event_title_error').html('Please enter valid Event title.').css('display','block');
			form_valid = false;
		}
		else{
			$('#event_title_error').css('display','none');
		}
		
		var event_desc = CKEDITOR.instances.event_desc.getData();
		if(event_desc == ''){
			$('#event_desc_error').html('Please enter event description.').css('display','block');
			form_valid = false;
		}
		else if(event_desc.length < 17){
			$('#event_desc_error').html('Event description atleast 10 character.').css('display','block');
			form_valid = false;
		}
		else{
			$('#event_desc_error').css('display','none');
		}
		
		if(!$.isNumeric($('#event_order').val())){
			$('#event_order_error').html('Event Order must be numaric.').css('display','block');
			form_valid = false;
		}
		else if($('event_order').val() == ''){
			$('#event_order_error').html('Event Order is required.').css('display','block');
			form_valid = false;
		}
		else{
			$('#event_order_error').css('display','none');
		}
   		if(form_valid){
			$('#event_form').ajaxForm({
			    dataType : 'json',
			    data : {
			    	'event_desc': CKEDITOR.instances.event_desc.getData()
			    },
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
});