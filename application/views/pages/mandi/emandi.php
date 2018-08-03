<style>
.emandi-select select{width:210px;float:left;margin-right:10px;}
.emandi-list{margin-top:20px;padding:10px;}
.emandi-list table th{background-color:#70b32d;color:#fff;font-family:'Roboto', sans-serif;}
.e-commodity-list{float:left;}
.commodity-img{float:left;}
.commodity-img span{text-align:center;float:left;width:100%;}

.e-commodity-list img{width:100px;height:100px;margin-right:10px;margin-bottom:5px;margin-top:5px;border:1px solid #ddd;float:left;}
</style>

<section class="content-section" style="background-color:#fff;padding:20px 0;float:left;width:100%;">
	<div class="container-fuild" style="padding-left:4%;padding-right:4%;">
		<div class="row">
			<div class="col-md-12 emandi-select">
				<select class="form-control" id="mandi_states"></select>
				<select class="form-control" id="mandi_district">
					<option value="0">Select District</option>
				</select>
				<select class="form-control">
					<option>Select Mandis</option>
					<option>Durg</option>
				</select>
				<select class="form-control">
					<option>Select Commodity</option>
					<option>Durg</option>
				</select>
				<button class="btn primary-info">
					Search
				</button>
			</div>
			
			
			
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Collapsible Group Item #1
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        item 1
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Collapsible Group Item #2
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
        item 2
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Collapsible Group Item #3
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
      item3
      </div>
    </div>
  </div>
</div>
			
			
			
			
			<div class="col-md-12 emandi-list">
				<table class="table table-striped table-bordered">
					<thead><tr><th>State</th><th>District</th><th>Mandis</th><th>Address</th><th>Commodity</th><th>Action</th></tr></thead>
					<tbody>
						<div class="panel-group" id="mandi_list" role="tablist" aria-multiselectable="true"></div>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>

<script>
var baseUrl = $('#base_url').val();

$.ajax({
    type: 'POST',
    url: baseUrl+'Mandi_ctrl',
    dataType: "json",
    data: {},
    beforeSend: function(){},
    complete: function(){},
    success:function (response) {
    	console.log(response);
    	if(response.status == 200){
    		var x = '<option value="0">Select State</option>';
    		$.each(response.data,function(key,value){
    			x = x + '<option value="' + value.state_id + '">'+ value.state_name +'</option>';
    		});
    		$('#mandi_states').html(x);
    		
    		var y = '';
    		var c = 1;
    		$.each(response.data2,function(key,value){
    			y = y + '<div class="panel panel-default">'+
    						'<div class="panel-heading" role="tab" id="headingOne">'+
      							'<h4 class="panel-title">'+
        							'<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+c+'" aria-expanded="true" aria-controls="collapse_'+c+'">'+
          							'<table>'+
	          							'<tr role="tab" id="headingOne">'+
											'<td>CG</td>'+
											'<td>Durg</td>'+
											'<td>Durg</td>'+	
											'<td>Gangpara Durg</td>'+
											'<td>Bean</td>'+
											'<td><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_'+ c +'" aria-expanded="true" aria-controls="collapse_'+c+'"><i class="fa fa-plus"></i></a></td>'+
			 							'</tr>'+
									'</table>'+
        							'</a>'+
      							'</h4>'+
    						'</div>'+
    						'<div id="collapse_'+c+'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">'+
      							'<div class="panel-body">'+
        						'<table class="table table-bordered">'+
        							'<tr>'+
        								'<td>sdfds</td>'+
        								'<td>sdfds</td>'+        								
        								'<td>sdfds</td>'+
        							'</tr>'+
        						'</table>'+
      						'</div>'+
    					'</div>'+
  					'</div>';
			c = c + 1;
    		});
    		$('#mandi_list').html(y);
    	}
    	else{
    		
    	}
    }
});

$(document).on('change','#mandi_states',function(){
	var id = $(this).val();
	$.ajax({
	    type: 'POST',
	    url: baseUrl+'Mandi_ctrl/district/'+id,
	    dataType: "json",
	    data: {},
	    beforeSend: function(){},
	    complete: function(){},
	    success:function (response) {
	    	console.log(response);
	    	if(response.status == 200){
	    		var x = '<option value="0">Select District</option>';
	    		$.each(response.data,function(key,value){
	    			x = x + '<option value="' + value.district_id + '">'+ value.district_name +'</option>';
	    		});
	    		$('#mandi_district').html(x);
	    	}
	    	else{
	    		
	    	}
	    }
	});
});
</script>

