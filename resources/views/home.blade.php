@extends('Template.HtmlSkeleton')
@section('Title')
<title>Learnign | UI</title>
@stop

@section('BaseContent')

	<div class="container">
		<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
     
				<form class="form-signin" action="{{url()}}/login" method="post" id="login-form">
				{!! csrf_field() !!}
				<h2 class="form-signin-heading">LOGIN</h2><hr/>
				



				<div class="form-group">
					<input type="text" class="form-control" placeholder="User Name or Email" name="uname" required />
					<span id="check-e"></span>
				</div>

				<div class="form-group">
					<input type="password" class="form-control" placeholder="Password" name="password" required />
				</div>

					<hr />

				<div class="form-group">
    				<button type="submit" class="btn btn-default" name="btn-login" id="btn-login">
						<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
						</button> 
    
    				<a href="register.php" class="btn btn-primary pull-right" >Register Here</a>
    
				</div>  



				</form>
			</div>
		</div>
</div>


@stop