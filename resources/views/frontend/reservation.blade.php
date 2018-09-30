@extends('master')

@section('content')
@include('frontend.orderform')
	




<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="panel">
	<div class="flash-message">
       @if(isset($success) || Session::has('success') )
		  <div class="alert alert-success alert-dismissable">
		    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>



<div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="background: #fff !important">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <strong><h4 class="modal-title">Successful</h4>	</strong>
            </div>
            <div class="modal-body text-center">
                <h4 style="text-transform: none;">Go to this page to see what you ordered !</h4>
                <a href="{{ url('ordered', $order->id) }}">http://localhost/assignment/ordered/{{$order->id}} </a>
                
            </div>
            <div class="modal-footer">
                <form action="" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id">
                    <a href="{{ url('/reservation') }}" class="btn btn-danger">Close</a>
                    
                </form>
            </div>
        </div>

</div>


		    <strong>Success!</strong> {{ isset($success) ? $info : Session::get('success') }}
		  </div>
		@endif
</div>
	<?php
	 for ($i=0; $i <$count ; $i++) { 
          if (isset($food[$i])) {
          	?>
          	<div class="reserve" style="margin-top: 0;margin-bottom: 0;">
				<h2>{{$food[$i][0]->getCategory->cate_name}}</h2>
				<div id="owl-example" class="owl-carousel">
          	<?php
            foreach ($food[$i] as $key ) {?>
					<div class="thumbnail"  style="margin-right: 10px;">
						<img src="{{URL::asset('/uploads/picture/')}}/{{ $key->picture }}" alt="123" style="width: 250px;height: 180px;">
						<div class="caption">
							<h4  id="name{{$key->id}}">{{$key->name}}</h4>
							<p   id="price{{$key->id}}">{{$key->price}} $</p>
							<p>{{$key->description}}</p>
						</div>
						<input type="hidden" name="pictureField" value="{{$key->picture}}">
						<div class="col-md-3">
							<a href="#" id="add"  data-id="{{$key->id}}" class="btn btn-warning btn-add{{$key->id}}">order</a>
						</div>
						<div class="col-md-9">
							<select name="qty" id="qty{{$key->id}}" class="form-control pull-right" style="width: 60px;">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
						</div>
						<div style="clear: both"></div>
					</div>
            <?php
            }
          }?>
         
          </div>
			</div>
          <?php
        }
	?>
</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$.ajaxSetup({
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            }
	        });

			// $(".owl-carousel").owlCarousel();

		  $(".owl-carousel").owlCarousel({
		      itemsDesktop : [1499,3],
		      itemsDesktopSmall : [1199,3],
		      itemsTablet : [899,2],
		      itemsMobile : [599,1],
		      navigation : true,
		      navigationText : ['<span class="fa-stack"><i class="fa fa-circle fa-stack-1x"></i><i class="fa fa-chevron-circle-left fa-stack-1x fa-inverse"></i></span>','<span class="fa-stack"><i class="fa fa-circle fa-stack-1x"></i><i class="fa fa-chevron-circle-right fa-stack-1x fa-inverse"></i></span>'],
		  });
			/* order */


			var counter = 0;
		  	var foodId = [100];
		  	var qty=[100];
		  	$('body').delegate('#add','click',function(e){
		  		var id=$(this).data('id');
		  		foodId[counter]=id;
		  		qty[counter]=$('#qty'+id).val();
		  		counter++;
		  		$('#number').val(counter);
				$('#cart').text(counter);
				$('#charge').css("display", "block");
				var btn = '.btn-add'+id;
				console.log(btn)
				$(btn).removeClass('btn-warning');
				$(btn).addClass('btn-success');
		 	});

		  	$('body').delegate('#buttonAdd','click',function(e){
		  		$.ajax({
			 		type:'post',
			 		url :'{{ url("/order") }}',
			 		data:{
			 			counter:counter,
			 			foodId:foodId,
			 			qty:qty,
			 			picture:$('input[name=pictureField]').val()
			 		},
			 		dataTy	: 'json',
			 		success:function(data){
			 			// console.log(data)
			 			// alert(data.picture)
			 			if (data.food.length>0) {
			 				$('#parent').empty();
			 				$('#parent2').empty();
			 				var total=0;
			 				for (var i = 0; i < counter; i++) {
			 					total+=(parseFloat(data.food[i].price)*parseInt(data.qty[i]));
			 					$('#parent').append(
			 						"<div>. "+ data.food[i].name +' (x '+ data.qty[i] +
			 							   ") = "+ 
			 							 (parseFloat(data.food[i].price)*parseInt(data.qty[i])) +" $ "+ 
			 						"</div>");
			 				}
			 				$('#picture').val(data.picture);
			 				$('#total').val(total);
			 				$('#parent2').append("<p>Total = "+total+" $</p>");
			 				$('#order_modal').modal('show');
			 			}
			 			else{
			 				alert('You need to choose food before charge');
			 			}
			  		}
			 	});
		 	});
		 	/*final order*/
		 	$('#form_order').on('submit',function(e){
			  	e.preventDefault();
			  	var url=$(this).attr('action');
			  			$.ajax({
				  			type:'post',
				  			url:url,
				  			data:{
							counter:counter,
				 			foodId:foodId,
				 			qty:qty,
				 			total:$('input[name=total]').val(),
				 			contact:$('input[name=contact]').val(),
				 			address:$('textarea[name=address]').val(),
				 			picture:$('input[name=picture]').val()
				  			},
				  			dataTy:'json',
				  			success:function(data){
				  				var contact = $('input[name=contact]').val(); 
				  				console.log(contact)
				  				if((data.errors)){
				  					$('.error').removeClass('hidden');
						          	$('.errorPhone').text(data.errors.contact);	
							         $('.errorAddress').text(data.errors.address);
				  				}
						        else{
						      
						        	// var id = $(this).data('contact');
						        	// console.log(id);
						        	$('.error').addClass('hidden');
						        	$('#order_modal').modal('hide');

						        	// $('.order-success').attr('data-toggle', 'modal');
						        	// $('.order-success').attr('data-target', '#order');
				  					window.location.replace("{{url('/reservation/order/success')}}");
						        }
				  			}
				  		});
			       
			  		
			  });
		});
	</script>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>

@stop