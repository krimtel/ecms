baseUrl = $('#base_url').val();
uGroup = $('#u_group').val();


$(document).ready(function(){
	//$('#loader').modal({'show':true});
	var baseUrl = $('#base_url').val();
	var uGroup = $('#u_group').val();

	get_notifictions();
	//////////////////////////////menu ////////////////////////////////////
	$(document).on('change','#menu_external_link',function(){
		var x = $(this).val(); 
		if(x == 0){
			//$('#menu_url_box').hide();
			$('#menu_cms_url_box').show();
		}
		else{
			//$('#menu_url_box').show();
			$('#menu_cms_url_box').hide();
		}
	});
	
	$(document).on('click','#menu_create,#menu_update',function(){
		var form_valid = true;
		if($('#menu_name').val() == ''){
			$('#menu_name_error').html('Please Enter menu name.').css('display','block');
			form_valid = false;
		}
//		else if($('#menu_name').val().length < 4){
//			$('#menu_name_error').html('Menu name should atleast 3 character.').css('display','block');
//			form_valid = false;
//		}
//		else{
//			$('#menu_name_error').css('display','none');
//		}
		
		if($('#menu_sort_order').val() == ''){
			$('#menu_sort_order_error').html('Please Enter Menu Sort Order.').css('display','block');
			form_valid = false;
		}
		else{
			$('#menu_sort_order_error').css('display','none');
		}
		
		if($('#menu_url_text').val() == ''){
			$('#menu_url_text_error').html('Please Enter Menu Url.').css('display','block');
			form_valid = false;
		}
		else{
			$('#menu_sort_order_error').css('display','none');
		}
		
		if($('#menu_external_link').val() == '-1'){
			$('#menu_external_link_error').html('Please Select link Behaviour.').css('display','block');
			form_valid = false;
		}
		else{
			$('#menu_external_link_error').css('display','none');
		}
		
		if(form_valid){
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
		}
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
	        			$('#menu_external_link').val(value.external_link);
	        			$('#menu_url_text').val(value.cms_url);
	        			$('#menu_cems_link_select').val(value.page_id);
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
	
	$(document).on('click','.menu_list_item_delete',function(){
		var m_id = $(this).data('m_id');
		$.ajax({
	        type: 'POST',
	        url: baseUrl+'admin/Menu_ctrl/menu_delete',
	        dataType: "json",
	        data: {
	        	'm_id'	: m_id
	        },
	        beforeSend: function(){
	        	$('#loader').modal({'show':true});	
	        },
	        complete: function(){},
	        success:function (response) {
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
	
	$(document).on('change','#menu_parent_dropdown',function(){
//		var x = $(this).val();
//		if(x != 0){
//			$('#menu_menu_link_box').show();
//			$('#menu_url_box').show();
//			$('menu_cms_url_box').show();
//		}
//		else{
//			$('#menu_menu_link_box').hide();
//			$('#menu_url_box').hide();
//			$('#menu_cms_url_box').hide();
//		}
	});
	
	$(document).on('keyup','#menu_url_text',function(){
		var text = $(this).val();
		if(text == ''){
			return false;
		}
		$.ajax({
			type: 'POST',
			url: baseUrl+'admin/Ajax_ctrl/menu_url_check',
			dataType: "json",
			data: {
				'text'	: text
			},
			beforeSend: function(){
				$('#menu_create').attr("disabled", "disabled");
				$('#menu_update').attr("disabled", "disabled");
			},
			success:function (response) {
				if(response.status == 500){
					$('#menu_url_text_error').html('This url is already exist, try new one.').css('display','block');
				}
				else{
					$('#menu_url_text_error').css('display','none');
					$('#menu_create').removeAttr("disabled");
					$('#menu_update').removeAttr("disabled");
				}
			}
		});
	});
	
	////////////////////////////  language ////////////////////////////////////
	$(document).on('click','.language_edit',function(){
		$('#language_update').show();
		$('#language_create').hide();
		$('#language_name').val($(this).data('l_name'));
		$('#language_name_eng').val($(this).data('l_eng'));
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
		var l_eng = $('#language_name_eng').val();
		
		$.ajax({
	        type: 'POST',
	        url: baseUrl+'admin/Language_ctrl/language_edit',
	        dataType: "json",
	        data: {
	        	'name'	: l_name,
	        	'id'	: l_id,
	        	'l_eng'  : l_eng
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
		var l_eng = $('#language_name_eng').val();
		$.ajax({
	        type: 'POST',
	        url: baseUrl+'admin/Language_ctrl/language_create',
	        dataType: "json",
	        data: {
	        	'name'	: l_name,
	        	'l_eng'  : l_eng
	        	
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
		x = confirm('Sure to poceed with this!');
		if(x){
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
		}
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
		var u_id = $(this).data('u_id');
		$.ajax({
	        type: 'POST',
	        url: baseUrl+'admin/Users_ctrl/user_detail',
	        dataType: "json",
	        data: {
	        	'u_id' : u_id
	        },
	        beforeSend: function(){},
	        complete: function(){},
	        success:function (output) {
	        	if(output.status == 200){
	        		lang = [];
	        		$.ajax({
	        	        type: 'POST',
	        	        url: baseUrl+'admin/Ajax_ctrl/get_all_language',
	        	        dataType: "json",
	        	        data: {},
	        	        beforeSend: function(){},
	        	        complete: function(){},
	        	        success:function (response) {
	        	        	console.log(response);
	        	        	$('#myModalLabel').html('User registration');
	        	    		var x = '<form class="form-horizontal">'+
	        	    					'<div class="form-group">'+
	        	    						'<label for="inputEmail3" class="col-sm-2 control-label">First name</label>'+
	        	    						'<div class="col-sm-10">'+
	        	    							'<input type="email" class="form-control" id="u_reg_fname" value="'+ output.data[0].first_name +'" placeholder="First Name">'+
	        	    							'<input type="hidden" id="u_reg_id" value="'+ output.data[0].id +'"'+
	        	    							'<div id="u_reg_fname_error" class="text-danger" style="display:none;"></div>'+
	        	    						'</div>'+
	        	    					'</div>'+
	        	    					'<div class="form-group">'+
	        	    						'<label for="inputEmail3" class="col-sm-2 control-label">Last name</label>'+
	        	    						'<div class="col-sm-10">'+
	        	    							'<input type="email" class="form-control" id="u_reg_lname" value="'+ output.data[0].last_name +'" placeholder="Last Name">'+
	        	    							'<div id="u_reg_lname_error" class="text-danger" style="display:none;"></div>'+
	        	    						'</div>'+
	        	    					'</div>'+
	        	    		  			'<div class="form-group">'+
	        	    		  				'<label for="inputEmail3" class="col-sm-2 control-label">Email</label>'+
	        	    		  				'<div class="col-sm-10">'+
	        	    		  					'<input type="email" class="form-control" id="u_reg_email" value="'+ output.data[0].email +'" placeholder="Email">'+
	        	    		  					'<div id="u_reg_email_error" class="text-danger" style="display:none;"></div>'+
	        	    		  				'</div>'+
	        	    		  			'</div>'+
	        	    		  			'<div class="form-group">'+
	        	    		  				'<label for="inputPassword3" class="col-sm-2 control-label">Contact no.</label>'+
	        	    		  				'<div class="col-sm-10">'+
	        	    		  					'<input type="text" class="form-control" id="u_reg_contact" value="'+ output.data[0].phone +'" placeholder="Contact no.">'+
	        	    		  					'<div id="u_reg_contact_error" class="text-danger" style="display:none;"></div>'+
	        	    		  				'</div>'+
	        	    	  				'</div>'+
	        	    	  				
	        	    	  				'<div class="form-group">'+
	        	    		  				'<label for="inputPassword3" class="col-sm-2 control-label">Language</label>'+
	        	    		  				'<div class="col-sm-10">'+
	        	    		  				'<select class="form-control" id="u_reg_language">'+
	        	    		  						'<option value="0">select language</option>';
	        	    								$.each(response.data,function(key,value){
	        	    									if(value.l_id == output.data[0].language){
	        	    										x = x +'<option value="'+ value.l_id +'" selected>'+ value.l_name +'</option>';
	        	    									}
	        	    									else{
	        	    										x = x +'<option value="'+ value.l_id +'">'+ value.l_name +'</option>';
	        	    									}
	        	    								});
	        	    		  					x = x +'</select>'+
	        	    		  					'<div id="u_reg_language_error" class="text-danger" style="display:none;"></div>'+
	        	    		  				'</div>'+
	        	    	  				'</div>'+
	        	    	  				
	        	    	  				'<div class="form-group">'+
	        	    		  				'<div class="col-sm-offset-2 col-sm-10">'+
	        	    		  					'<input type="button" class="btn btn-info" id="u_reg_update" value="Update"/>&nbsp;'+
	        	    		  					'<input type="reset" class="btn btn-danger" id="u_reg_reset" value="Cancel"/>'+
	        	    		  				'</div>'+
	            		  				'</div>'+
	        	    			  	'</form>';
	        	    		$('#loader-1 .modal-body').html(x);
	        	    		$('#loader-1 .modal-footer').hide();
	        	    		$('#loader-1').modal({
	        	    			show : true,
	        	    			backdrop : false,
	        	    			keyboard: false
	        	    		});
	        	        }
	        		});
	        	}
	        	else{
	        		alert(output.msg); 
	        	}
	        }
		});
		
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
	
	$(document).on('click','#new_user_register',function(){
		lang = [];
		$.ajax({
	        type: 'POST',
	        url: baseUrl+'admin/Ajax_ctrl/get_all_language',
	        dataType: "json",
	        data: {},
	        beforeSend: function(){},
	        complete: function(){},
	        success:function (response) {
	        	console.log(response);
	        	$('#myModalLabel').html('User registration');
	    		var x = '<form class="form-horizontal">'+
	    					'<div class="form-group">'+
	    						'<label for="inputEmail3" class="col-sm-2 control-label">First name</label>'+
	    						'<div class="col-sm-10">'+
	    							'<input type="email" class="form-control" id="u_reg_fname" placeholder="First Name">'+
	    							'<div id="u_reg_fname_error" class="text-danger" style="display:none;"></div>'+
	    						'</div>'+
	    					'</div>'+
	    					'<div class="form-group">'+
	    						'<label for="inputEmail3" class="col-sm-2 control-label">Last name</label>'+
	    						'<div class="col-sm-10">'+
	    							'<input type="email" class="form-control" id="u_reg_lname" placeholder="Last Name">'+
	    							'<div id="u_reg_lname_error" class="text-danger" style="display:none;"></div>'+
	    						'</div>'+
	    					'</div>'+
	    		  			'<div class="form-group">'+
	    		  				'<label for="inputEmail3" class="col-sm-2 control-label">Email</label>'+
	    		  				'<div class="col-sm-10">'+
	    		  					'<input type="email" class="form-control" id="u_reg_email" placeholder="Email">'+
	    		  					'<div id="u_reg_email_error" class="text-danger" style="display:none;"></div>'+
	    		  				'</div>'+
	    		  			'</div>'+
	    		  			'<div class="form-group">'+
	    		  				'<label for="inputPassword3" class="col-sm-2 control-label">Password</label>'+
	    		  				'<div class="col-sm-10">'+
	    		  					'<input type="password" class="form-control" id="u_reg_password" placeholder="Password">'+
	    		  					'<div id="u_reg_password_error" class="text-danger" style="display:none;"></div>'+
	    		  				'</div>'+
	    		  			'</div>'+
	    		  			'<div class="form-group">'+
	    		  				'<label for="inputPassword3" class="col-sm-2 control-label">Contact no.</label>'+
	    		  				'<div class="col-sm-10">'+
	    		  					'<input type="text" class="form-control" id="u_reg_contact" placeholder="Contact no.">'+
	    		  					'<div id="u_reg_contact_error" class="text-danger" style="display:none;"></div>'+
	    		  				'</div>'+
	    	  				'</div>'+
	    	  				
	    	  				'<div class="form-group">'+
	    		  				'<label for="inputPassword3" class="col-sm-2 control-label">Language</label>'+
	    		  				'<div class="col-sm-10">'+
	    		  				'<select class="form-control" id="u_reg_language">'+
	    		  						'<option value="0">select language</option>';
	    								$.each(response.data,function(key,value){
	    									x = x +'<option value="'+ value.l_id +'">'+ value.l_name +'</option>';
	    								});
	    		  					x = x +'</select>'+
	    		  					'<div id="u_reg_language_error" class="text-danger" style="display:none;"></div>'+
	    		  				'</div>'+
	    	  				'</div>'+
	    	  				
	    	  				'<div class="form-group">'+
	    		  				'<div class="col-sm-offset-2 col-sm-10">'+
	    		  					'<input type="button" class="btn btn-info" id="u_reg_submit" value="Submit"/>&nbsp;'+
	    		  					'<input type="reset" class="btn btn-danger" id="u_reg_reset" value="Cancel"/>'+
	    		  				'</div>'+
    		  				'</div>'+
	    			  	'</form>';
	    		$('#loader-1 .modal-body').html(x);
	    		$('#loader-1 .modal-footer').hide();
	    		$('#loader-1').modal({
	    			show : true,
	    			backdrop : false,
	    			keyboard: false
	    		});
	        }
		});
	});
	
	$(document).on('click','#u_reg_submit',function(){
		var u_fname = $('#u_reg_fname').val();
		var u_lname = $('#u_reg_lname').val();
		var u_email = $('#u_reg_email').val();
		var u_password = $('#u_reg_password').val();
		var u_contact = $('#u_reg_contact').val();
		var form_valid = true;
		if(u_fname == ''){
			$('#u_reg_fname_error').html('First name should not empty.').css('display','block');
			form_valid = false;
		}
		else if(u_fname.length < 4){
			$('#u_reg_fname_error').html('First name should be greater then 3 character.').css('display','block');
			form_valid = false;
		}
		else{
			$('#u_reg_fname_error').css('display','none');
		}
		
		if(u_lname == ''){
			$('#u_reg_lname_error').html('Last name should not empty.').css('display','block');
			form_valid = false;
		}
		else if(u_lname.length < 4){
			$('#u_reg_lname_error').html('Last name should be greater then 3 character.').css('display','block');
			form_valid = false;
		}
		else{
			$('#u_reg_lname_error').css('display','none');
		}
		
		if(u_email == ''){
			$('#u_reg_email_error').html('Email should not empty.').css('display','block');
			form_valid = false;
		}
		else{
			$('#u_reg_email_error').css('display','none');
		}
		
		if(u_password == ''){
			$('#u_reg_password_error').html('Password should not empty.').css('display','block');
			form_valid = false;
		}
		else{
			$('#u_reg_password_error').css('display','none');
		}
		
		if(u_contact == ''){
			$('#u_reg_contact_error').html('Contact no. should not empty.').css('display','block');
			form_valid = false;
		}
		else if(u_contact.length < 4){
			$('#u_reg_contact_error').html('Contact no. should be greater then 3 character.').css('display','block');
			form_valid = false;
		}
		else{
			$('#u_reg_contact_error').css('display','none');
		}
		
		if($('#u_reg_language').val() == 0){
			$('#u_reg_language_error').html('Please select language.').css('display','block');
			form_valid = false;
		}
		else{
			$('#u_reg_language_error').css('display','none');
		}
		
		if(form_valid){
			$.ajax({
		        type: 'POST',
		        url: baseUrl+'admin/Users_ctrl/create_user',
		        dataType: "json",
		        data: {
		        	'fname' : u_fname,
		        	'lname' : u_lname,
		        	'email' : u_email,
		        	'password' : u_password,
		        	'u_contact' : u_contact,
		        	'u_lang' : $('#u_reg_language').val()
		        },
		        beforeSend: function(){
		        	$('#loader').modal({'show':true});	
		        },
		        complete: function(){},
		        success:function (response) {
		        	$('#loader').modal('toggle');
		        	if(response.status == 200){
		        		location.reload();
		        	}
		        	else{
		        		alert(response.msg);	
		        		location.reload();
		        	}
		        }
			});
		}
	});
	
	
	$(document).on('click','#u_reg_update',function(){
		var u_fname = $('#u_reg_fname').val();
		var u_lname = $('#u_reg_lname').val();
		var u_email = $('#u_reg_email').val();
		var u_contact = $('#u_reg_contact').val();
		var form_valid = true;
		if(u_fname == ''){
			$('#u_reg_fname_error').html('First name should not empty.').css('display','block');
			form_valid = false;
		}
		else if(u_fname.length < 4){
			$('#u_reg_fname_error').html('First name should be greater then 3 character.').css('display','block');
			form_valid = false;
		}
		else{
			$('#u_reg_fname_error').css('display','none');
		}
		
		if(u_lname == ''){
			$('#u_reg_lname_error').html('Last name should not empty.').css('display','block');
			form_valid = false;
		}
		else if(u_lname.length < 4){
			$('#u_reg_lname_error').html('Last name should be greater then 3 character.').css('display','block');
			form_valid = false;
		}
		else{
			$('#u_reg_lname_error').css('display','none');
		}
		
		if(u_email == ''){
			$('#u_reg_email_error').html('Email should not empty.').css('display','block');
			form_valid = false;
		}
		else{
			$('#u_reg_email_error').css('display','none');
		}
		
		if(u_contact == ''){
			$('#u_reg_contact_error').html('Contact no. should not empty.').css('display','block');
			form_valid = false;
		}
		else if(u_contact.length < 4){
			$('#u_reg_contact_error').html('Contact no. should be greater then 3 character.').css('display','block');
			form_valid = false;
		}
		else{
			$('#u_reg_contact_error').css('display','none');
		}
		
		if($('#u_reg_language').val() == 0){
			$('#u_reg_language_error').html('Please select language.').css('display','block');
			form_valid = false;
		}
		else{
			$('#u_reg_language_error').css('display','none');
		}
		
		if(form_valid){
			$.ajax({
		        type: 'POST',
		        url: baseUrl+'admin/Users_ctrl/update_user',
		        dataType: "json",
		        data: {
		        	'u_id' : $('#u_reg_id').val(),
		        	'fname' : u_fname,
		        	'lname' : u_lname,
		        	'email' : u_email,
		        	'u_contact' : u_contact,
		        	'u_lang' : $('#u_reg_language').val()
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
		        		alert(response.msg);	
		        		location.reload();
		        	}
		        }
			});
		}
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
		
		if($('#news_order').val() == ''){
			$('#news_order_error').html('News order is required.').css('display','block');
			form_valid = false;
		}
		else{
			$('#news_order_error').css('display','none');
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
		var x = confirm('Sure to poceed with this!');
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
		var x = confirm('Sure to proceed with this?'); 
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
		    	location.reload();
		      }
		      else{
			    alert(response.msg);
		      }
		    }
	  }).submit();
	});

	$(document).on('click','.widget_edit',function(){
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
				 $('#loader').modal('toggle');
			  	  if(response.status == 200){
			    	CKEDITOR.instances['widget_content'].setData(response.data[0].content);
			    	$('#widget_id').val(response.data[0].id);
			    	$('#widget_title').val(response.data[0].w_title);
			    	$('#widget_name').val(response.data[0].name);
			    	$('#widget_update').show();
			    	$('#widget_create').hide();
			      }
			      else{
				    alert(response.msg);
			      }
			    }
		});
	});
	
	$(document).on('click','.widget_delete',function(){
		var x = confirm('Sure to proceed with this?'); 
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
	
	$(document).on('keyup','#widget_name',function(){
		var str = $(this).val();
		$.ajax({
	        type: 'POST',
	        url: baseUrl+'admin/Widget_ctrl/widget_name_check',
	        dataType: "json",
	        data: {
	        	'str' : str
	        },
	        beforeSend: function(){
	        	
	        },
	        complete: function(){},
	        success:function (response) {
	        	console.log(response);
	        	if(response.status == 500){
					$('#widget_create').attr('disabled','disabled');
	        	}
	        	else{
	        		$('#widget_create').removeAttr('disabled','disabled');
	        	}
	        }
		});
	});
/////////////////////////////////////////////////////////////page///////////////////////////////////////////////////////////////////////
	$(document).on('click','#page_create,#page_update',function(){
		var form_valid = true;
		if($('#page_name').val() == ''){
			$('#page_name_error').html('Page name is Required').css('display','block');
			form_valid = false;
		}
		else if($('#page_name').val().length < 3){
			$('#page_name_error').html('Page name Atleast greater then 3 character.').css('display','block');
			form_valid = false;
		}
		else{
			$('#page_name_error').css('display','none');
		}
		
		if($('#page_layout').val() == 0){
			$('#page_layout_error').html('Please Select Page Layout.').css('display','block');
			form_valid = false;
		}
		else{
			$('#page_layout_error').css('display','none');
		}
		
		if($('#meta_tag').val() == ''){
			$('#meta_tag_error').html('Please Enter Page Meta.').css('display','block');
			form_valid = false;
		}
		else{
			$('#meta_tag_error').css('display','none');
		}
		
		if($('#keyword').val() == ''){
			$('#keyword_error').html('Please Enter Page Keyword.').css('display','block');
			form_valid = false;
		}
		else{
			$('#keyword_error').css('display','none');
		}
		
		if(CKEDITOR.instances.page_body.getData() == ''){
			$('#page_body_error').html('Please Enter Page Body.').css('display','block');
			form_valid = false;
		}
		else{
			$('#page_body_error').css('display','none');
		}
		if(form_valid){
			$('#page_add_form').ajaxForm({
			    dataType : 'json',
			    data : { 
			    	'page_body' : CKEDITOR.instances.page_body.getData()
			    },
			    beforeSubmit:function(e){
					$('#loader').modal('show');
			    },
			    success:function(response){
			  	  if(response.status == 200){
			    	$('#loader').modal('toggle');
			    	alert(response.msg);
			    	window.location = baseUrl + 'admin/admin/all_pages';
			      }
			      else{
				    alert(response.msg);
			      }
			    }
		  }).submit();
		}
	});
	
	
	$(document).on('keyup','#page_name',function(){
		var text = $(this).val();
		$.ajax({
	        type: 'POST',
	        url: baseUrl+'admin/Ajax_ctrl/Check_page_name',
	        dataType: "json",
	        data: {
		        'text' : text
		       },
	        beforeSend: function(){},
	        complete: function(){},
	        success:function (response) {
	        	console.log(response);
	        	if(response.status == 500){
	        		$('#page_create').attr('disabled','disabled');
	        	}
	        	else {
	        		$('#page_create').removeAttr('disabled','disabled');
	        	}
	        }
		});
	});
	
	$(document).on('change','#page_layout',function(){
		var layout_id = $(this).val();
		if(layout_id == 1){
			$('#1coumn').hide();
			$('#2coumn').hide();
			$('#3coumn').hide();
			
			var page_id = $('#page_id').val();	
			$.ajax({
		        type: 'POST',
		        url: baseUrl+'admin/Ajax_ctrl/get_all_widgets',
		        dataType: "json",
		        data: {
			        'page_id' : page_id
			       },
		        beforeSend: function(){
		        	$('#loader').modal({'show':true});	
		        },
		        complete: function(){},
		        success:function (response) {
		        	$.each(response.data2,function(k,v){
		        		var x = '';
		        		$.each(response.data,function(key,value){
			        		if(value.w_id == v.widget_id){
			        			x = x + '<option value="'+ value.w_id +'" selected>'+ value.name +'</option>';
			        		}
			        		else{
			        			x = x + '<option value="'+ value.w_id +'">'+ value.name +'</option>';
			        		}
			        	});
						if(v.section == 'main_body'){
							var dropdown = '<select class="form-control col-sm-6" name="one_col_maincontent[]" id="">'+
							'<option value="0">select widget</option>'+
							x +
							'</select>';
							$('#one_col_maincontent_box').prepend(dropdown);
						}
			        });
		        	$('#loader').modal('toggle');
		        }
			});
		}
		else if(layout_id == 2){
			$('#1coumn').hide();
			$('#2coumn').show();
			$('#3coumn').hide();
			
			var page_id = $('#page_id').val();	
			$.ajax({
		        type: 'POST',
		        url: baseUrl+'admin/Ajax_ctrl/get_all_widgets',
		        dataType: "json",
		        data: {
			        'page_id' : page_id
			       },
		        beforeSend: function(){
		        	$('#loader').modal({'show':true});	
		        },
		        complete: function(){},
		        success:function (response) {
		        	$.each(response.data2,function(k,v){
		        		var x = '';
		        		$.each(response.data,function(key,value){
			        		if(value.w_id == v.widget_id){
			        			x = x + '<option value="'+ value.w_id +'" selected>'+ value.name +'</option>';
			        		}
			        		else{
			        			x = x + '<option value="'+ value.w_id +'">'+ value.name +'</option>';
			        		}
			        	});
			        	
						if(v.section == 'left_col'){
							var dropdown = '<select class="form-control col-sm-6" name="two_col_leftcontent[]" id="">'+
							'<option value="0">select widget</option>'+
							x +
							'</select>';
			        		$('#two_col_leftcontent_box').prepend(dropdown);
						}
						else{
							var dropdown = '<select class="form-control col-sm-6" name="two_col_maincontent[]" id="">'+
							'<option value="0">select widget</option>'+
							x +
							'</select>';
							$('#two_col_maincontent_box').prepend(dropdown);
						}
			        });
		        	$('#loader').modal('toggle');
		        }
			});
		}
		else if(layout_id == 3){
			$('#1coumn').hide();
			$('#2coumn').hide();
			$('#3coumn').show();
			
			var page_id = $('#page_id').val();	
			$.ajax({
		        type: 'POST',
		        url: baseUrl+'admin/Ajax_ctrl/get_all_widgets',
		        dataType: "json",
		        data: {
			        'page_id' : page_id
			       },
		        beforeSend: function(){
		        	$('#loader').modal({'show':true});	
		        },
		        complete: function(){},
		        success:function (response) {
		        	console.log(response);
		        	$('#three_col_leftcontent_box').html('');
		        	$('#three_col_rightcontent_box').html('');
		        	$.each(response.data2,function(k,v){
		        		var x = '';
		        		var find = 0;
		        		$.each(response.data,function(key,value){
			        		if(value.w_id == v.widget_id){
			        			x = x + '<option value="'+ value.w_id +'" selected>'+ value.name +'</option>';
			        			find = 1;
			        		}
			        		else{
			        			x = x + '<option value="'+ value.w_id +'">'+ value.name +'</option>';
			        		}
			        	});
			        	
		        		if(find){
							x = x + '<option value="-1">News</option>'+
		        			'<option value="-2">Slider</option>'+
		        			'<option value="-3">Quick Link</option>'+
		        			'<option value="-4">Event</option>'+
		        			'<option value="-5">Videos</option>'+
		        			'<option value="-6">Contact Us</option>';
						}
						else{
							if(v.widget_id == '-1'){
			        			x = x + '<option value="-1" selected>News</option>'+
			        			'<option value="-2">Slider</option>'+
			        			'<option value="-3">Quick Link</option>'+
			        			'<option value="-4">Event</option>'+
			        			'<option value="-5">Videos</option>'+
			        			'<option value="-6">Contact Us</option>';
			        		}
			        		else if(v.widget_id == '-2'){
			        			x = x + '<option value="-2" selected>Slider</option>'+
			        			'<option value="-1">News</option>'+
			        			'<option value="-3">Quick Link</option>'+
			        			'<option value="-4">Event</option>'+
			        			'<option value="-5">Videos</option>'+
			        			'<option value="-6">Contact Us</option>';
			        		}
			        		else if(v.widget_id == '-3'){
			        			x = x + '<option value="-3" selected>Quick Link</option>'+
			        			'<option value="-1">News</option>'+
			        			'<option value="-2">Slider</option>'+
			        			'<option value="-4">Event</option>'+
			        			'<option value="-5">Videos</option>'+
			        			'<option value="-6">Contact Us</option>';
			        		}
			        		else if(v.widget_id == '-4'){
			        			x = x + '<option value="-4" selected>Event</option>'+
			        			'<option value="-1">News</option>'+
			        			'<option value="-2">Slider</option>'+
			        			'<option value="-3">Quick Link</option>'+
			        			'<option value="-5">Videos</option>'+
			        			'<option value="-6">Contact Us</option>';
			        		}
			        		else if(v.widget_id == '-5'){
			        			x = x + '<option value="-5" selected>Videos</option>'+
			        			'<option value="-1">News</option>'+
			        			'<option value="-2">Slider</option>'+
			        			'<option value="-3">Quick Link</option>'+
			        			'<option value="-4">Event</option>'+
			        			'<option value="-6">Contact Us</option>';
			        		}
			        		else if(v.widget_id == '-6'){
			        			x = x + '<option value="-6" selected>Contact Us</option>'+
			        			'<option value="-1">News</option>'+
			        			'<option value="-2">Slider</option>'+
			        			'<option value="-3">Quick Link</option>'+
			        			'<option value="-4">Event</option>'+
			        			'<option value="-5">Videos</option>';
			        		}
						}
		        		
		        		
						if(v.section == 'left_col'){
							var dropdown = '<select class="form-control col-sm-6" name="three_col_leftcontent[]" id="">'+
							'<option value="0">select widget</option>'+
							x +
							'</select>';
			        		$('#three_col_leftcontent_box').append(dropdown);
						}
						else if(v.section == 'main_body'){
							var dropdown = '<select class="form-control col-sm-6" name="three_col_maincontent[]" id="">'+
							'<option value="0">select widget</option>'+
							x +
							'</select>';
							$('#three_col_maincontent_box').aooend(dropdown);
						}
						else{
							var dropdown = '<select class="form-control col-sm-6" name="three_col_rightcontent[]" id="">'+
							'<option value="0">select widget</option>'+
							x +
							'</select>';
							$('#three_col_rightcontent_box').append(dropdown);
						}
			        });
		        	$('#loader').modal('toggle');
		        }
			});
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
	        	x = x + '<option value="-5">NEWS</option>';
	        	x = x + '<option value="-6">SLIDER</option>';
	        	x = x + '<option value="-7">EVENTS</option>';
	        	x = x + '<option value="-8">VIDEOS</option>';
	        	x = x + '<option value="-9">Links</option>';
	        	var dropdown = '<select class="form-control col-sm-6" name="one_col_maincontent[]" id="">'+
				'<option value="0">select widget</option>'+
				x +
				'</select>';
	        	$('#one_col_maincontent_box').prepend(dropdown);
	        }
		});
	});
	
	$(document).on('click','#two_col_leftcontent_addmore',function(){
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
	        	x = x + '<option value="0">--------------------------------------------------------------------------</option>'+
	        			'<option value="-1">News</option>'+
	        			'<option value="-2">Slider</option>'+
	        			'<option value="-3">Quick Link</option>'+
	        			'<option value="-4">Event</option>'+
	        			'<option value="-5">Videos</option>'+
	        			'<option value="-6">Contact Us</option>';
	        	var dropdown = '<select class="form-control col-sm-6" name="two_col_leftcontent[]" id="">'+
				'<option value="0">select widget</option>'+
				x +
				'</select>';
	        	$('#two_col_leftcontent_box').prepend(dropdown);
	        }
		});
	});
	
	$(document).on('click','#two_col_maincontent_addmore',function(){
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
	        	var dropdown = '<select class="form-control col-sm-6" name="two_col_maincontent[]" id="">'+
				'<option value="0">select widget</option>'+
				x +
				'</select>';
	        	$('#two_col_maincontent_box').prepend(dropdown);
	        }
		});
	});
	
	
	$(document).on('click','#three_col_leftcontent_addmore',function(){
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
	        	x = x + '<option value="0">--------------------------------------------------------------------------</option>'+
    			'<option value="-1">News</option>'+
    			'<option value="-2">Slider</option>'+
    			'<option value="-3">Quick Link</option>'+
    			'<option value="-4">Event</option>'+
    			'<option value="-5">Videos</option>'+
    			'<option value="-6">Contact Us</option>';
	        	var dropdown = '<select class="form-control col-sm-6" name="three_col_leftcontent[]" id="">'+
				'<option value="0">select widget</option>'+
				x +
				'</select>';
	        	$('#three_col_leftcontent_box').prepend(dropdown);
	        }
		});
	});
	
	$(document).on('click','#three_col_maincontent_addmore',function(){
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
	        	var dropdown = '<select class="form-control col-sm-6" name="three_col_maincontent[]" id="">'+
				'<option value="0">select widget</option>'+
				x +
				'</select>';
	        	$('#three_col_maincontent_box').prepend(dropdown);
	        }
		});
	});
	
	$(document).on('click','#three_col_rightcontent_addmore',function(){
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
	        	x = x + '<option value="0">--------------------------------------------------------------------------</option>'+
    			'<option value="-1">News</option>'+
    			'<option value="-2">Slider</option>'+
    			'<option value="-3">Quick Link</option>'+
    			'<option value="-4">Event</option>'+
    			'<option value="-5">Videos</option>'+
    			'<option value="-6">Contact Us</option>';
	        	var dropdown = '<select class="form-control col-sm-6" name="three_col_rightcontent[]" id="">'+
				'<option value="0">select widget</option>'+
					x +
				'</select>';
	        	$('#three_col_rightcontent_box').prepend(dropdown);
	        }
		});
	});
	
	$(document).on('click','.page_edit',function(){
		var p_id = $(this).data('p_id');
		$.ajax({
	        type: 'POST',
	        url: baseUrl+'admin/Page_ctrl/page_create',
	        dataType: "json",
	        data: {
	        	'page_id' : p_id
	        },
	        beforeSend: function(){
	        	$('#loader').modal({'show':true});	
	        },
	        complete: function(){},
	        success:function (response) {
	        	console.log(response);
	        }
		});
		
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
		
		if($('#link_order').val() == ''){
			$('#link_order_error').html('Link order is required.').css('display','block');
			form_valid = false;
		}
		else{
			$('#link_order_error').css('display','none');
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
		var x = confirm('Sure to proceed with this?');
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
		var x = confirm('Sure to proceed with this?'); 
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
		if($('#user_category').val()==''){
			$('#event_category_error').html('Event Category is required').css('display','block');
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
	
	
	$(document).on('click','#event_update',function(){
		var form_valid = true;
		
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
		
		if(uGroup != 'subadmin'){
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
			
			if($('#event_category').val()==''){
				$('#event_category_error').html('Event Category is required').css('display','block');
				form_valid = false;
			}
			else{
				$('#event_category_error').css('display','none');
			}
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
	
	
	$(document).on('click','.event_edit,.event_tranlate',function(){
		var e_id = $(this).data('event_id');
		$.ajax({
			type: 'POST',
			url: baseUrl+'admin/Event_ctrl/get_event_content',
			dataType: "json",
			data: {
				'e_id'	: e_id
			},
			beforeSend: function(){
				$('#loader').modal({'show':true});	
			},
			complete: function(){},
				success:function (response) {
					console.log(response);
					$('#loader').modal('toggle');
					if(response.status == 200){
						CKEDITOR.instances['event_desc'].setData(response.data[0].event_content);
						$('#event_id').val(response.data[0].id);
						$('#event_title').val(response.data[0].title);
						$('#event_order').val(response.data[0].sort);
						$('#event_update').show();
						$('#event_create').hide();
					}
					else{
						
					}
				}
		});
	});

	$(document).on('click','.event_published',function(){
		var x = confirm('Sure to proceed with this?');
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
			var e_id = $(this).data('event_id');
			$.ajax({
				type: 'POST',
				url: baseUrl+'admin/Event_ctrl/event_publish',
				dataType: "json",
				data: {
					'e_id'	: e_id,
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
	$(document).on('click','.is_home',function(){
		var x = confirm('Sure to proceed with this?');
		if(!x){
			if($(this).prop('checked') == true){
				$(this).prop('checked', false);
			}
			else{
				$(this).prop('checked', true);
			}
		}
		else{
			var status1 = $(this).prop('checked');
			var e_id = $(this).data('event_id');
			$.ajax({
				type: 'POST',
				url: baseUrl+'admin/Event_ctrl/event_is_home',
				dataType: "json",
				data: {
					'e_id'	: e_id,
					'status1' : status1
				},
				beforeSend: function(){
					//$('#loader').modal({'show':true});	
				},
				complete: function(){},
				success:function (response) {
					console.log(response);
					//$('#loader').modal('toggle');
				}
			});
		}
	});

	$(document).on('click','.event_delete',function(){
		var x = confirm('Sure to proceed with this?'); 
		if(x){
			var e_id = $(this).data('event_id');
			$.ajax({
				type: 'POST',
				url: baseUrl+'admin/Event_ctrl/event_delete',
				dataType: "json",
				data: {
					'e_id'	: e_id
				},
				beforeSend: function(){
					//$('#loader').modal({'show':true});	
				},
				complete: function(){},
				success:function (response) {
					console.log(response);
					//$('#loader').modal('toggle');
					//location.reload();
				}
			});
		}
	});
	
/////////////////////////////////////////// static page /////////////////////////////////////
	
	$(document).on('click','.static_page',function(){
		var sp_id = $(this).data('sp_id');
		$.ajax({
			type: 'POST',
			url: baseUrl+'admin/Static_ctrl/page_update',
			dataType: "json",
			data: {
				'sp_id'	: sp_id
			},
			beforeSend: function(){
				//$('#loader').modal({'show':true});	
			},
			complete: function(){},
			success:function (response) {
				console.log(response);
				if(response.status == 200){
					CKEDITOR.instances['static_page_desc'].setData(response.data[0].page_body);
					//$('#loader').modal('toggle');
					//location.reload();
				}
			}
		});
	});
	
	
	$(document).on('click','#clear_cache',function(){
		var chache = [];
		 $("input:checkbox[class=checkbox]:checked").each(function () {
			 chache.push($(this).val());
	     });
		 $.ajax({
				type: 'POST',
				url: baseUrl+'admin/Cache_ctrl/clear_cache',
				dataType: "json",
				data: {
					'files'	: chache
				},
				beforeSend: function(){
					//$('#loader').modal({'show':true});	
				},
				complete: function(){},
				success:function (response) {
					if(response.status == 200){
						location.reload();
					}
				}
		 });	 
	});
	
	$("#select_all").change(function(){ 
	    $(".checkbox").prop('checked', $(this).prop("checked")); 
	});
 
	$('.checkbox').change(function(){ 
	    if(false == $(this).prop("checked")){ 
	        $("#select_all").prop('checked', false); 
	    }
	    if ($('.checkbox:checked').length == $('.checkbox').length ){
	        $("#select_all").prop('checked', true);
	    }
	});
	
	$(document).on('click','.user_mail',function(){
		var uid = $(this).data('uid');
		var mailid = $(this).data('mail_id');
		var uname = $(this).data('uname');
		
		$('#myModalLabel').html('Compose Mail');
		var x = '<form class="form-horizontal">'+
					'<div class="form-group">'+
						'<label for="inputEmail3" class="col-sm-2 control-label">User Name</label>'+
						'<div class="col-sm-10">'+
							'<input type="text" class="form-control" id="mail_uid" placeholder="User id" value="'+ uid +'">'+
							'<input type="text" class="form-control" id="mail_fname" placeholder="User name" value="'+ uname +'">'+
							'<div id="mail_fname_error" class="text-danger" style="display:none;"></div>'+
						'</div>'+
					'</div>'+
					'<div class="form-group">'+
						'<label for="inputEmail3" class="col-sm-2 control-label">E-Mail Id</label>'+
						'<div class="col-sm-10">'+
							'<input type="email" class="form-control" id="mail_id" placeholder="mail_id" value="'+ mailid +'">'+
							'<div id="mail_id_error" class="text-danger" style="display:none;"></div>'+
						'</div>'+
					'</div>'+
					'<div class="form-group">'+
						'<label for="inputEmail3" class="col-sm-2 control-label">Mail Body</label>'+
						'<div class="col-sm-10">'+
							'<textarea class="form-control" id="mail_body"></textarea>'+
							'<div id="mail_body_error" class="text-danger" style="display:none;"></div>'+
						'</div>'+
					'</div>'+
	  				
	  				'<div class="form-group">'+
		  				'<div class="col-sm-offset-2 col-sm-10">'+
		  					'<input type="button" class="btn btn-info" id="mail_submit" value="Submit"/>&nbsp;'+
		  					'<input type="reset" data-dismiss="modal" aria-label="Close" class="btn btn-danger" id="mail_reset" value="Cancel"/>'+
		  				'</div>'+
	  				'</div>'+
			  	'</form>';
		$('#loader .modal-body').html(x);
		$('#loader .modal-footer').hide();
		$('#loader').modal({
			show : true,
			backdrop : false,
			keyboard: false
		});
	});
	
	
	$(document).on('click','#mail_submit',function(){
		var mail_name = $('#mail_fname').val();
		var mail_id = $('#mail_id').val();
		var mail_body = $('#mail_body').val();
		$.ajax({
			type: 'POST',
			url: baseUrl+'admin/Users_ctrl/mail_sent',
			dataType: "json",
			data: {
				'mail_name' : mail_name,
				'mail_id' : mail_id,
				'mail_body' : mail_body
			},
			beforeSend: function(){

			},
			complete: function(){},
			success:function (response) {
				
			}
		});
	});
	
	$(document).on('click','.nitification_click',function(){
		var act_id = $(this).data('notification_id');
		$.ajax({
			type: 'POST',
			url: baseUrl+'admin/Users_ctrl/notification_show',
			dataType: "json",
			data: {
				'act_id' : act_id
			},
			beforeSend: function(){},
			complete: function(){},
			success:function (response) {
			}
		});
	});
	
	
	$(document).on('click','#title_update',function(){
		var title_body = $('#title_body').val();
		$.ajax({
			type: 'POST',
			url: baseUrl+'Enam_ctrl/rahul_test',
			dataType: "json",
			data: {
				't_body' : title_body
			},
			beforeSend: function(){},
			complete: function(){},
			success:function (response) {
				if(response.status == 200){
					
				}
				else {
					
				}
			}
		});
	});
	
});


function get_notifictions(){
	$.ajax({
		type: 'POST',
		url: baseUrl+'admin/Users_ctrl/get_notification',
		dataType: "json",
		data: {},
		beforeSend: function(){},
		complete: function(){},
		success:function (response) {
			var x = '';
			if(response.status == 200){
				$.each(response.data,function(key,value){
					x = x + '<li><a class="nitification_click" data-notification_id="'+ value.act_id +'" href="#"><b>'+ value.first_name +'</b>&nbsp;&nbsp; '+ value.event_name +'</a></li>'  
				});
			}
			else {
				
			}
			$('#user_notification').html(x);
		}
	});
}