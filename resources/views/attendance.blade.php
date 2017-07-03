@extends('Template.HtmlSkeleton')
@section('Title')
<title>Recruitment | HR</title>
@stop

@section('BaseContent')
<div class="container">
		<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
     
				<form class="form-signin" action="{{url()}}/mark/in" method="post" id="login-form">
				{!! csrf_field() !!}
				<h2 class="form-signin-heading">Mark Your Attendance</h2><hr/>
				



				<div class="form-group">
					<input type="text" id="empid" class="form-control" placeholder="Employee ID" name="empid" required />
					<span id="check-e"></span>
				</div>

				<div class="form-group">
					<input type="password" id="pswd" class="form-control" placeholder="Password" name="password" required />
				</div>
				<center><label>
				<div class="result">
					
				</div>
				</label>
				</center>
					<hr />

				<div class="form-group">
    				<button type="button" class="btn btn-default" name="btn-login" id="btn-login">
						<span class="glyphicon glyphicon-log-in"></span> &nbsp; Check-in
					</button> 
					<button type="button" class="btn btn-default pull-right" name="btn-logout" id="btn-logout">
						<span class="glyphicon glyphicon-log-out"></span> &nbsp; Check-out
					</button> 
    			
    				
    
				</div>  



				</form>
				
			</div>
		</div>
</div>



@stop
@section('BaseJSLib')
<script type="text/javascript">
$(document).on('click','#btn-login',function()
{
	var empid = $('#empid').val();
	var pswd = $('#pswd').val();
	$.ajax({

            method: 'POST', // Type of response and matches what we said in the route
            url: '{{url()}}/mark/in', // This is the url we gave in the route
            dataType:'html',
            headers: {
              'X-CSRF-TOKEN': "{{ csrf_token() }}",
          },
            data: {'empid' : empid ,'password' : pswd}, // a JSON object to send back
            success: function(response)
            { // What to do if we succeed
            	$('.result').html(response);
            }
      	});
});
$(document).on('click','#btn-logout',function()
{
	var empid = $('#empid').val();
	var pswd = $('#pswd').val();
	$.ajax({

            method: 'POST', // Type of response and matches what we said in the route
            url: '{{url()}}/mark/out', // This is the url we gave in the route
            dataType:'html',
            headers: {
              'X-CSRF-TOKEN': "{{ csrf_token() }}",
          },
            data: {'empid' : empid ,'password' : pswd}, // a JSON object to send back
            success: function(response)
            { // What to do if we succeed
            	$('.result').html(response);
            }
      	});
});
</script>



@stop