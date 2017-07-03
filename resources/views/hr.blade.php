@extends('Template.HtmlSkeleton')
@section('Title')
<title>Recruitment | HR</title>
@stop

@section('BaseContent')

<div class="container">

	<div class="row">
		<div class="col-md-9">
			<div id = table>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Name</th>
							<th>Emp ID</th>
							<th>Designation</th>
						</tr>
					</thead>
					<tbody>
						@foreach($view as $value)
						<tr>
							<td>{{$value->name}}</td>
							<td>{{$value->empid}}</td>
							<td>{{$value->designation}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				
			</div>
			
		</div>
		<div class="col-md-3">
			<div class = uname>
				<select class="form-control" id="sel1">
					<option>View Details of Employee</option>
				  	@foreach($view as $value)
				  	<option class="empid" value="{{$value->empid}}">{{$value->name}} , {{$value->empid}}</option>
				  	@endforeach
				</select>
			</div>
			
		</div>
		
	</div>
	<div class="row">
		<div id = 'details'>
			<div id='add'>
			</div>
		</div>
			
	</div>
	<div class="row">
		<div class="pull-left">
		<form action="{{url()}}/admin1">
			<button class="btn btn-info btn-lg" >Registered Employees</button>
		</form>
		</div>
		<!-- Trigger the modal with a button -->
		<div class="pull-right">
		<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add New Employee</button>
		</div>
		<!-- Modal -->
		<div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Employee Details</h4>
		      </div>
		      <div class="modal-body">
		      	<form action="{{url()}}/new_emp" method="post" class="form-group" id="form">
		      	 {!! csrf_field() !!}
					  <div class="form-group">
					    <label for="name">Name:</label>
					    <input type="text" class="form-control" id="name" name="name" required>
					  </div>
					  <div class="form-group">
					    <label for="des">Designation:</label>
					    <select class="form-control" id="des" name="designation">
					    	<option>Select Designation</option>
					    	<option>Software Developer</option>
					    	<option>Software Tester</option>
					    	<option>Software Analyst</option>
					    	<option>Recruiter</option>
					    	<option>Software Designer</option>
					    </select>

					  </div>
					  <div class="form-group">
					    <label><input type="text" name="url" id="url" class="btn btn-info" style="width: 540px; margin-top: 20px; margin-left : 15px"></label>
					    <button type="button" class="pull-right btn btn-info" id="copy" ><span class="glyphicon glyphicon-copy "></span></button>
					    <input type="hidden" name="rcode" id="rcode">
					  </div>
					  <button type="submit" class="btn btn-default">Submit</button>
		        </form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>

		  </div>
		</div>
		<form action="{{url()}}/logout">
			<button type="submit" class="btn btn-default" >Log Out</button>
		</form>
	</div>
</div>
@stop
@section('BaseJSLib')

<script type="text/javascript">
$(document).on('change','#sel1',function()
	{
		console.log($(this).val());
		$.ajax({

            method: 'POST', // Type of response and matches what we said in the route
            url: '{{url()}}/getdetails', // This is the url we gave in the route
            dataType:'json',
            headers: {
              'X-CSRF-TOKEN': "{{ csrf_token() }}",
          },
            data: {'id' : $(this).val()}, // a JSON object to send back
            success: function(response)
            { // What to do if we succeed
                console.log(response);
                var html='<div class="panel panel-success">'
                			+'<div class="panel-heading">'
                				+'<h3><span class="label label-success">'+response[0].name+' -(Id : '+response[0].empid+')</span>'
                				+'<label class=pull-right>'+response[0].contact_num+'</label></h3>'

                			+'</div>'
                			+'<div class="panel-body">'
                				+'<div class="row" style="padding:10px">'
                					+'<div class="col-md-4">'
               	  						+'<label>Designation : '+response[1].designation+'</label>'
               	  					+'</div>'
               	  					+'<div class="col-md-4">'
               	  						+'<label>DOJ : '+response[0].doj+'</label>'
               	  					+'</div>'
               	  					+'<div class="col-md-4">'
               	  						+'<label>Experiance (yrs) : '+response[0].yrs_of_exp+'</label>'
               	  					+'</div>'
               	  				+'</div>'
               	  				+'<div class="row" style="padding:10px">'
                					+'<div class="col-md-4">'
               	  						+'<label>DOB : '+response[0].dob+'</label>'
               	  					+'</div>'
               	  					+'<div class="col-md-4">'
               	  						+'<label>Emergency Contact : '+response[0].emergency_contact+'</label>'
               	  					+'</div>'
               	  					+'<div class="col-md-4">'
               	  						+'<label>Address : '+response[0].address+'</label>'
               	  					+'</div>'
               	  				+'</div>'
               	  			+'</div>'
               	  		+'</div>';


               	
               	$('#add').html(html);
				
            }
      	});
	});


$(document).on('change','#des',function()
	{
		console.log($('#name').val());
		console.log($('#des').val());

		if($('#name').val() && $('#des').val())
		{
			var url_comp = $('#name').val().substring(0, 3) + Math.floor(Math.random()*(50 - 20 )+ 20 );

			var url = '{{url()}}/register/'+url_comp;
			//console.log(url);
			$.ajax({

	            method: 'POST', // Type of response and matches what we said in the route
	            url: '{{url()}}/check/hi', // This is the url we gave in the route
	            dataType:'json',
	            headers: {
	              'X-CSRF-TOKEN': "{{ csrf_token() }}",
	          },
	            data: {'url' :url , 'rcode' :url_comp}, // a JSON object to send back
	            success :function(response)
	            { // What to do if we succeed
	            	console.log(response);
	            	$('#rcode').val(url_comp);
	               	$('#url').val(url);
	            }
	      	});
		}
	});
var copyTextareaBtn = document.querySelector('#copy');

copyTextareaBtn.addEventListener('click', function(event) {
  var copyTextarea = document.querySelector('#url');
  copyTextarea.select();

  try {
    var successful = document.execCommand('copy');
    var msg = successful ? 'successful' : 'unsuccessful';
    console.log('Copying text command was ' + msg);
  } catch (err) {
    console.log('Oops, unable to copy');
  }
});


</script>
@stop