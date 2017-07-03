@extends('Template.HtmlSkeleton')
@section('Title')
<title>Learnign | UI</title>
@stop

@section('BaseContent')
<div class = "container">
	<div class="row">
		<table class="table table-stripped table-hover">
			<thead>
				<tr>
					<th>EMPLOYEE ID</th>
					<th>Name</th>
					<th>Login Time</th>
					<th>Time</th>
					<th>Status</th>
					
				</tr>
			</thead>
			<tbody>
				@foreach($result as $value)
				<tr>
					<td>{{$value['empid']}}</td>
					<td>{{$value['name']}}</td>
					<td>{{$value['login_time']}}</td>
					<td>{{$value['time_log']}}</td>
					<td>{{$value['availability']}}</td>
				</tr>
				@endforeach
			</tbody>

			
		</table>
		
	</div>
	
</div>
@stop