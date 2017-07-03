@extends('Template.HtmlSkeleton')
@section('Title')
<title>Learnign | UI</title>
@stop

@section('BaseContent')
<div class="container">
	<div class="row">
    <div class="col-md-9">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Name</th>
              <th>E-Mail</th>
              <th>Recruitment Code</th>
            </tr>
          </thead>
          <tbody>
            @foreach($view as $value)
            <tr>
              <td>{{$value->name}}</td>
              <td>{{$value->email}}</td>
              <td>{{$value->rcode}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        
      </div>
		<div class="col-md-3">
			<form action="{{url()}}/add_user" method="post">
			{!! csrf_field() !!}
			
			
             <select class="form-control " name="name" id='id_name' style="margin-top: -5px; width: 220px;">
             	<option></option>
             	@if($view)
             	@foreach($view as $val)
             	<option>{{$val->name}}</option>
             	@endforeach
             	@endif
             </select>
             <div class="radio_add" style="padding: 20px">
             	
             </div>
             <div class="btt">
             	
             </div>
			</form>
		</div>
		

	
	</div>
</div>
@stop
@section('BaseJSLib')

<script type="text/javascript">
$(document).on('change','#id_name',function()
	{
		//console.log($(this).val());
		$.ajax({

            method: 'POST', // Type of response and matches what we said in the route
            url: '{{url()}}/username', // This is the url we gave in the route
            dataType:'json',
            headers: {
              'X-CSRF-TOKEN': "{{ csrf_token() }}",
          },
            data: {'id' : $(this).val()}, // a JSON object to send back
            success: function(response)
            { // What to do if we succeed
                console.log(response);
                var html="";
                for (var i=0; i<response.length ; i++)
               	{
               	  html +='<div class="radio"><label><input type="radio" name="username" value='+response[i]+'>'+response[i]+'</label></div>';

               	}
               	$('.radio_add').html(html);

            }
      	});
	});
$(document).on('change','.radio_add',function()
	{
		var html = '<button class="btn btn-primary" type="Submit">Add User</button>';
		$('.btt').html(html);		
	});
</script>
@stop