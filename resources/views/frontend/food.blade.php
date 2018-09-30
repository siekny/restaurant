@extends('master')
@section('content') 
<div class="heading-group text-center img-block" 
	style="padding-bottom: 90px;background-position: top center;">
	<h1>Menu</h1>
	<h3>FOOD / DRink / DESSERT / DINNER / EVENT</h3>
	<h4><a href="?page=1">home</a> / <a href="?page=3">About</a></h4>
	<div class="star-group">
		<i class="fa fa-star-o"></i>
		<i class="fa fa-star-o star-2x"></i>
		<i class="fa fa-star-o"></i>
	</div>
	<!-- <a href="">read more</a> -->
</div>
<div id="wrap-body">
				<!-- /banner -->
				<div class="container" id="main-content">
					@if (!empty($food))
						
					<!-- resaurent menu -->
					<div class="mn">
						<!--mn-group-->
						<div class="row">
							<div class="col-sm-4 col-md-3">
								<div class="heading-group mn-group-title color-w">

									<h2>
										@if (!empty($first))
										{{$first->getCategory->cate_name}}
										@else 
											<p>Unavailable</p>
										@endif
									</h2>
									<div class="star-group star-small">
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o star-1x"></i>
										<i class="fa fa-star-o"></i>
									</div>
									<p>
										@if (!empty($first))
										{{$first->getCategory->cate_description}}
										@else 
											<p>Unavailable</p>
										@endif
									</p>
								</div>
							</div>
							<div class="col-sm-8 col-md-9 bg-white">
								<div class="product">
									<div class="row">
										<div class="owl" data-items="3" data-itemsdesktop="3" data-itemsdesktopsmall="2" data-itemstablet="2" data-itemsmobile="1">
											@foreach($food as $f)
											<div class="col-md-4">
												<div class="thumbnail">
													<img src="{{URL::asset('/uploads/picture/')}}/{{ $f->picture }}" class="img-responsive" alt="image">
													<div class="hover-caption color-w">
														<i class="fa fa-search-plus"></i>
													</div>
												
													<div class="caption">
														<h4>{{$f->name}}</h4>
														<p class="price">${{$f->price}}</p>
														<p>{{$f->description}}</p>
													</div>
												</div>
											</div>
											@endforeach
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--/mn-group-->
					</div>
					<!-- /resaurent menu -->
					
					@else
<div class="mn">
						<!--mn-group-->
						<div class="row">
							<div class="col-sm-4 col-md-3">
								<div class="heading-group mn-group-title color-w">
									<h2>$f->getCategory->cate_name</h2>
									<div class="star-group star-small">
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o star-1x"></i>
										<i class="fa fa-star-o"></i>
									</div>
									<p>$f->getCategory->cate_description</p>
								</div>
							</div>
							<div class="col-sm-8 col-md-9 bg-white">
								<div class="product">
									<div class="row">
										<div class="owl" data-items="3" data-itemsdesktop="3" data-itemsdesktopsmall="2" data-itemstablet="2" data-itemsmobile="1">
											
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--/mn-group-->
					</div>
					@endif
				</div>
			</div>
@stop