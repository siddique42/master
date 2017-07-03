@extends('Template.HtmlSkeleton')
@section('Title')
<title>Learnign | UI</title>
@stop

@section('BaseCSSLib')
<style type="text/css">
	.image { 
   position: relative; 
   width: 100%; /* for IE 6 */
   height: 400px;
}
.cont { 
   position: absolute; 
   top: 150px; 
   left: 120px; 
   width: 100%; 
}

</style>
@stop
@section('BaseContent')
<div class="container">
	<div class="row">
		
		<div class="col-md-12">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
		  <!-- Indicators -->
		  <ol class="carousel-indicators">
		    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		    <li data-target="#myCarousel" data-slide-to="1"></li>
		  </ol>

		  <!-- Wrapper for slides -->
		  <div class="carousel-inner" >
		    <div class="item">
		    	<a href="#">
		    	<div class="image">
		      		<img src="{{url()}}/images/1.jpg" alt="Los Angeles">
		      		<div class="cont">
		      			<h1>Xbox One S</h1>
		      			<h4>The ultimate games and 4K entertainment system.</h4>
		      			<br>
		      			<label class="btn" style="background-color: black; color: white;">Learn More ></label>
		      		</div>
		      	</div>
		      	</a>
		    </div>

		    <div class="item active">
		    	<a href="#">
		    	<div class="image">
		      		<img src="{{url()}}/images/2.jpg" alt="Chicago">
		      		<div class="cont">
		      			<h1>Meet The New Surface Pro</h1>
		      			<h4>The Most Versatile Laptop</h4>
		      			<br>
		      			<label class="btn" style="background-color: black; color: white; border: 1;">Learn More ></label>
		      		</div>
		      		
		      	</div>
		      	</a>
		      
		    </div>

		    
		  </div>

		  <!-- Left and right controls -->
		  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#myCarousel" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right"></span>
		    <span class="sr-only">Next</span>
		  </a>
		  </div>
		 </div>

	</div>
	<br>
	<br>
	<br>

	<div class="row">
		<div class="col-md-3">
			<a href='#'>
			<img class="img-rounded img-responsive" src="{{url()}}/images/office1.jpg">
			
				<label style="color: black"><h3>Office 365</h3>

				</label>
				<p style="color: black">Create your best work. Collaborate in your own way.</p>
				<button class="btn btn-link" style="letter-spacing: .075em;">GET OFFICE 365 NOW></button>
				</a>
		</div>		
		<div class="col-md-3">
			<a href='#'>
			<img class="img-rounded img-responsive" src="{{url()}}/images/win.jpg">
			<label style="color: black"><h3>Windows PCs</h3></label>
			<p style="color: black">Windows comes to life on these premium PCs.</p>
				<button class="btn btn-link" style="letter-spacing: .075em;">LEARN ABOUT WINDOWS PCS ></button>
			</a>
		</div>
		<div class="col-md-3">
			<a href='#'>
			<img class="img-rounded img-responsive" src="{{url()}}/images/ink.jpg"">
			<label style="color: black"><h3>Windows Ink</h3></label>
			<p style="color: black">Write place at the right time.</p>
				<button class="btn btn-link" style="letter-spacing: .075em;">MEET WINDOWS INK ></button>
			</a>
		</div>
		<div class="col-md-3">
			<a href='#'>
			<img class="img-rounded img-responsive" src="{{url()}}/images/outlook.jpg">
			<label style="color: black"><h3>Outlook</h3></label>
			<p style="color: black">The free email app for iOS, Android and Windows.</p>
				<button class="btn btn-link" style="letter-spacing: .075em;">GET THE OUTLOOK EMAIL APP ></button>
			</a>
		</div>
	</div>
	<br>
	<br>
	<div class="row">
			<a href='#'>
			<img class="image" src="{{url()}}/images/store.jpg">		
			<div class="cont">
				<h3>Microsoft Store</h3>
	</div>
</div>
@stop	
