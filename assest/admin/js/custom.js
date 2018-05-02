$(document).ready(function(){
	var baseUrl = $('#base_url').val();
	
	$(document).on('click','#add_menu',function(){
		var m_id = $(this).data('mid');
		$.ajax({
	        type: 'POST',
	        url: baseUrl+'admin/Menu_ctrl/get_all_parents_menu',
	        dataType: "json",
	        data: {
	        	'mid' : m_id
	        },
	        beforeSend: function(){
	                
	        },
	        success:  function (response) {
	        	console.log(response);
	        	var x = '<option value="0" selected>Create Parent Menu</option>';
	        	$.each(response.data,function(key,value){
	        		x = x + '<option value="'+ value.id +'">'+ value.menu_slug +'</option>'; 
	        	});
	        	$('#menu_menu_parent').html(x);
	        	$('#menu_menu').show();
	        }
		});
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
});
