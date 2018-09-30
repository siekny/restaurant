@extends('master')
@section('content')
<div class="heading-group text-center img-block">
	<h1>About</h1>
	<h3>FOOD / DRink / DESSERT / DINNER / EVENT</h3>
	<h4><a href="?page=1">home</a> / <a href="?page=3">About</a></h4>
	<div class="star-group">
		<i class="fa fa-star-o"></i>
		<i class="fa fa-star-o star-2x"></i>
		<i class="fa fa-star-o"></i>
	</div>
	<!-- <a href="">read more</a> -->
</div>

		<!-- _____________________GET IN TOUCH_________________________ -->
		<div class="container about-content">
			<img src="images/ordering.jpg" alt="About" width="100%">
			
			<div class="col-md-10 col-xs-12 col-md-offset-1 text-center about-text">
				<h2>Food</h2>
				@foreach($food as $f)
			    <div class="col-xs-6 col-md-2 img-box">
			       	<div class="thumbnail" style="background: rgba(255,255,255,0.29) !important">
			     		<img src="{{URL::asset('/uploads/picture/')}}/{{ $f->picture }}" alt="Food">
			      		<div class="caption" style="padding: 0 !important">
			        		<h4 style="text-transform: unset;">{{$f->name}}</h4>
			        		<h2>{{$f->price}} $</h2>
			        
			      		</div>
			   		</div>
			  	</div>
			  	@endforeach

			  	
			<div class="col-md-6 col-md-offset-5">
			  		<a href="{{ route('home') }}" class="menu-about btn-sm">see our menu</a>
			  	</div>
			</div>
			<div class="cleared"></div>
		</div>

		<div class="container-fluid about-story">
			<div class="container">
				<div class="col-md-12 col-xs-12 text-center">
					<h2>our story</h2>
				</div>
				<div class="row">
					<div class="col-md-12 col-xs-12 text-center story-year">
						<span>2016</span>
					</div>
					<div class="col-md-6 col-xs-12 text-center text-story">
						<h3>Today</h3>
						<p>We are devoted to our customers and to business of our life - quick and secure food delivery. And that’s why today we’re recognized as #1 in the industry.</p>
					</div>
					<div class="col-md-6 col-xs-12 img-story">
						<img src="images/2016.jpg" alt="2016" width="100%">
					</div>
				</div>

				<div class="row">
					<div class="col-md-12 col-xs-12 text-center story-year">
						<span>2013</span>
					</div>

					<div class="col-md-6 col-xs-12 img-story">
						<img src="images/2013.jpg" alt="2013" width="100%">
					</div>

					<div class="col-md-6 col-xs-12 text-center text-story">
						<h3>Opening</h3>
						<p>After making necessary preparations, completing our staff with experienced people, we were ready for new guests and clients.</p>
					</div>
					
				</div>

				<div class="row">
					<div class="col-md-12 col-xs-12 text-center story-year">
						<span>2010</span>
					</div>
					<div class="col-md-6 col-xs-12 text-center text-story">
						<h3>Idea</h3>
						<p>It all started from a single idea. We wanted to create a place that would offer its customers easy ordering and delivery of their favorite dishes.</p>
					</div>
					<div class="col-md-6 col-xs-12 img-story">
						<img src="images/2010.jpg" alt="2010" width="100%">
					</div>
				</div>
				
			</div>
			
		</div>

		<div class="container-fluid about-team">
			<div class="container">
				<div class="col-md-12 col-xs-12 text-center">
					<h2>meet our team</h2>
				</div>
				<div class="row">
	  				<div class="col-xs-4 col-md-4">
	    				<div class="thumbnail">
	      					<img src="images/siekny.jpg" alt="Image">
	    				</div>
	  				</div>

	  				<div class="col-xs-4 col-md-4">
	    				<div class="thumbnail">
	      					<img src="images/siekny.jpg" alt="Image">
	    				</div>
	  				</div>

	  				<div class="col-xs-4 col-md-4">
	    				<div class="thumbnail">
	      					<img src="images/siekny.jpg" alt="Image">
	    				</div>
	  				</div>

				</div>
			</div>
		</div>
@stop