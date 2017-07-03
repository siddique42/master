@extends('Template.HtmlSkeleton')
@section('Title')
<title>Learnign | UI</title>
@stop

@section('BaseContent')
<div class="container">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
		<form action="{{url()}}/register1" method="post">

			<div class="form-group">
			  <label for="name">Name:</label>
			  <input type="text" class="form-control" name="name" id="name">
			</div>
			<div class="form-group">
			  <label for="dob">Date Of Birth:</label>
			  <input type="date" class="form-control" name="dob" id="dob">
			</div>
			<div class="form-group">
			  <label for="email">Personal Email:</label>
			  <input type="email" class="form-control" name="email" id="email">
			</div>
			<div class="form-group">
			  <label for="address">Address:</label>
			  <input type="text" class="form-control" name="address" id="address">
			</div>
			<div class="form-group">
			  <label for="pwd">Password:</label>
			  <input type="password" class="form-control" name="password" id="pwd">
			</div>
				<input type="hidden" name="rcode" value="{{$rcode}}">
			<hr>
			<button type="Submit" class="btn btn-default pull-right">Submit</button>	
			{!! csrf_field() !!}
		</form>
		</div>
	</div>
</div>
@stop