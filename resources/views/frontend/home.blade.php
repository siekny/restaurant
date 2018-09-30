@extends('master')
@section('content')
<div class="heading-group text-center img-block">
		<h1>Welccome to our </h1>
		<span>website</span>
		<h3>FOOD / DRink / DESSERT / DINNER / EVENT</h3>
		<div class="star-group">
			<i class="fa fa-star-o"></i>
			<i class="fa fa-star-o star-2x"></i>
			<i class="fa fa-star-o"></i>
		</div>
		<a href="#content">read more</a>
	</div>

	<div class="body-group">
		<div class="container content">
			<div class="col-md-12">
				
			
				<div class="col-md-8 content-left">
					<div class="col-md-7 text-title">
						<h2>Recently Food</h2>
					</div>
					<div class="col-md-12">
						<p>A restaurant or an eatery, is a business which prepares and serves food and drinks to customers in exchange for money. Meals are generally served and eaten .A restaurant or an eatery, is a business which prepares and serves food and drinks to customers in exchange for money. Meals are generally served and eaten .</p>
					</div>
					<div class="col-md-12">
						@foreach($food as $f)
						<div class="col-md-4 food-home">
							<div class="title-img">
								<h3>{{$f->name}}</h3>
							</div>
							<div class="thumbnail">						
					  			<img src="{{URL::asset('/uploads/picture/')}}/{{ $f->picture }}" alt="123">
					  			<h4>{{$f->price}} $</h4>

							</div>
							<div>
								<p style="text-align: justify;">{{$f->description}}</p>
				                 <p><!-- <a href="" title="" style="background: #950000; color: #fff; padding: 10px;">More Food</a> --></p>
							</div>
						</div>
						@endforeach
					</div>
				</div>

				<div class="col-md-4 content-right">
					<div class="col-md-7 text-title">
						<h2>Menu</h2>
					</div>
					<div class="col-md-10 menu">
						<ul>
							@foreach($menus as $menu)
	                    	<li><a href="{{ route('allmenu',$menu->id) }}"> {{$menu->cate_name}} </a></li>
	                    	@endforeach
						</ul>
					</div>

					<!-- contact -->
					<div class="col-md-7 text-title">
						<h2>Contact</h2>
					</div>
					<div class="col-md-10 col-md-offset-1">
						@foreach($users as $user)
						<div class="contact-text">
							<h5>{{$user->name}}</h5>
						    <p>{{$user->email}}</p>
						</div>
						@endforeach
						<div class="contact-text">
							<h5>Phone</h5>
						    <p>098 765 432</p>
						</div>
					</div>

					<!-- open hour -->
					<div class="col-md-7 text-title">
						<h2>Open Hour</h2>
					</div>
					<div class="col-md-10 col-md-offset-1 open-hour">
						<ul>
							<li>Monday<span class="pull-right">8:00 Am - 22:00 Pm</span></li>
							<li>Tuesday<span class="pull-right">8:00 Am - 22:00 Pm</span></li>
							<li>Wednesday<span class="pull-right">8:00 Am - 22:00 Pm</span></li>
							<li>Thursday<span class="pull-right">8:00 Am - 22:00 Pm</span></li>
							<li>Friday<span class="pull-right">8:00 Am - 22:00 Pm</span></li>
							<li>Saturday<span class="pull-right">10:00 Am - 23:00 Pm</span></li>
							<li>Sunday<span class="pull-right">Closed</span></li>
						</ul>
					</div>
				</div>
			</div>

		</div>
	</div>
@stop
