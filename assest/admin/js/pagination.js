$(document).ready(function(){
	var baseUrl = $('#base_url').val();
	
	$(document).on('change','#event_page_counter',function(){
		event_page();
	});
});

function event_page(){
	var page_count = $('#event_page_counter').val();
	var is_home = $('#event_is_home') .val();
	var is_active = $('#event_is_active').val();
	var search_text = $('#event_search').val();
	
	$.ajax({
        type: 'POST',
        url: baseUrl+'admin/Event_ctrl/get_events_ajax',
        dataType: "json",
        data: {
        	'page_count' : page_count,
        	'is_home' : is_home,
        	'is_active' : is_active,
        	'search_text' : search_text
        },
        beforeSend: function(){
        	$('#loader').modal({'show':true});
        },
        complete: function(){},
        success:function (response){
        	console.log(response);
        }
	});
}


