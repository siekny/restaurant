<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Restaurant</title>
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('owlcarousel/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('owlcarousel/owl.theme.default.min.css') }}">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
<style type="text/css">
	.owl-buttons {
  display: none;

}
.owl-carousel:hover .owl-buttons {
  display: block;
}

.owl-item {
  text-align: center;
}

.owl-theme .owl-controls .owl-buttons div {
  background: transparent;
  color: #869791;
  font-size: 40px;
  line-height: 300px;
  margin: 0;
  padding: 0 60px;
  position: absolute;
  top: 0;
}
.owl-theme .owl-controls .owl-buttons .owl-prev {
  left: 0;
  padding-left: 20px;
}
.owl-theme .owl-controls .owl-buttons .owl-next {
  right: 0;
  padding-right: 20px;
}
</style>
</head>
<body>
			<div id="wrap">

			<header id="wrap-header" style="z-index: 100;">
			    <nav class="navbar navbar-default navbar-fixed-top">
			        <div class="container">
			        <!-- Brand and toggle get grouped for better mobile display -->
			            <div class="navbar-header">
			                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			                    <span class="sr-only">Toggle navigation</span>
			                    <span class="icon-bar"></span>
			                    <span class="icon-bar"></span>
			                    <span class="icon-bar"></span>
			                </button>
			                <a class="navbar-brand" href="#">Brand</a>
			            </div>

			            <!-- Collect the nav links, forms, and other content for toggling -->
			            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			            
			       
			                <ul class="nav navbar-nav navbar-right">
			                	<li><a href="{{ route('home') }}">Home</a></li>
			                    <li class="dropdown">
			                    	<a href="{{ route('menu') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
			                    	<ul class="dropdown-menu">
			                    		@foreach($menus as $menu)
			                    			<li><a href="{{ route('allmenu',$menu->id) }}"> {{$menu->cate_name}} </a></li>
			                    		@endforeach
			                    		
			                        </ul>
			                    </li>
			                    <li><a href="{{ route('reservation') }}">Order-Online</a></li>
			                    <li><a href="{{ url('/about')}}">About</a></li>
			                    
			                    <!-- <li><a href="/contact">Contact</a></li> -->
			                    <li style="display: none;" id="charge">  
			                    	<button style="margin-top: 12px;" class="btn btn-success pull-right" id="buttonAdd" class="test"><span id="cart">9 </span> Charge
			                    	</button>
			                    </li>
			                </ul>

			            </div><!-- /.navbar-collapse -->
			        </div><!-- /.container-fluid -->
			    </nav>
			</header><!-- /header -->



<script>
	$(document).ready(function(){

	  	$('.dropdown-submenu a.test').on("click", function(e){
	    	$(this).next('ul').toggle();
	    	e.stopPropagation();
	    	e.preventDefault();
	  	});
	});
</script>
<div class="wrap-body">
	@yield('content')
</div>  <!-- body -->
<!-- footer -->
<footer id="wrap-footer" class="color-w">
	
	<div class="footer-bottom">
		<div class="container">
			<p>Designed by <a href="#">Restaurant</a>. All Rights Reserved</p>
		</div>
	</div>
	
</footer>
<!-- footer -->

</body>
