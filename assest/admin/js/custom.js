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
});