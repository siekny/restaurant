		<div id="wrap">

			<header id="wrap-header">
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
			                    <li><a href="/home">Home</a></li>
			                    <li class="dropdown">
			                    	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
			                    	<ul class="dropdown-menu">
			                        </ul>
			                    </li>
			                    <li><a href="">Reservation</a></li>
			                    <li><a href="">About</a></li>
			                    
			                    <li><a href="">Contact</a></li>
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