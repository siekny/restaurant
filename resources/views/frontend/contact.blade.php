@extends('master')
@section('content')

<div class="heading-group text-center img-block">
	<h1>Contact</h1>
	<h3>FOOD / DRink / DESSERT / DINNER / EVENT</h3>
	<h4><a href="?page=1">home</a> / <a href="?page=4">contact</a></h4>
	<div class="star-group">
		<i class="fa fa-star-o"></i>
		<i class="fa fa-star-o star-2x"></i>
		<i class="fa fa-star-o"></i>
	</div>
	<!-- <a href="">read more</a> -->
</div>

		<!-- ____________________________________GET IN TOUCH_______________________________ -->
		<div class="get-in-touch">
			<div class="col-md-10 col-md-offset-1 section " id="get-in-touch">
				<div class="text-center">
					<h2>Get in Touch</h2>
					<hr>
				</div>
				<div class="col-lg-7 left-get-in-touch">
					<h5>Please give us your feedback!</h5>
					<p>Siekny studies Information Technology (IT) at Royal University of Phnom Penh and also has extra class at CKCC (Cambodia Korea Cooperation Center) for Web App Development.</p>
					<form action=" method="post"">

						<span class="error"></span>
						<input class="form-control" type="text" name="name" placeholder="Name" title="Please fill out this field." value="" autofocus><br>

						<span class="error"></span>
						<input class="form-control" type="email" name="mail" placeholder="Email" title="Please fill out this field." value="" autofocus><br>

						<span class="error"></span>
						<textarea class="form-control" name="message" placeholder="Message" rows="5" style="resize: none;" autofocus></textarea>
						<input type="submit" name="submit" value="Send Message">
						<span class="text-center"></span>
					</form>
				</div>

				<div class="col-lg-5 left-get-in-touch">
					<div class="text-center">
						<i class="fa fa-map-marker fa-2x"></i>
						<strong>Beoung Tompung, Meanchey</strong>
						
						<p>32 BT Street <br>Phnom Penh, PP</p>

						<i class="fa fa-envelope-o fa-2x"></i>
						<p>Admin@gmail.com</p>

						<i class="fa fa-phone fa-2x"></i>
						<p>+85581 574 087</p>

					</div>
				</div>
				<div class="cleared"></div>
			</div>
			<div class="cleared"></div>
		</div>
@stop