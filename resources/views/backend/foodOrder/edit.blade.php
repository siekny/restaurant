@extends('backend.master')
@section('title','Food Order')
@section('h1','Food Order')
@section('content')
<style type="text/css">
    .show-order-detail { border: 1px solid #ccc }
    .show-order-detail th, .show-order-detail td { padding: 10px; border: 1px solid #ccc }
</style>
		<!-- table -->
		<div class="panel panel-default" >
			<div class="panel-heading">
				Edit Food Order
			</div>
			<div class="panel-body" style="padding: 30px 80px;">
				<form action="{{url('food/up/'.$food_order->id)}}" method="post" >
					{{ csrf_field() }}

					<div class="col-md-6 text-right">
                        <h5>Contact : </h5>
                        <h5>Address : </h5>
                        <h5>Date Order : </h5>
                    </div>
                    <div class="col-md-6 text-left">
                        <h5>{{ $food_order->cust_phone }}</h5>
                        <h5>{{ $food_order->cust_add }}</h5>
                        <h5>{{ date('d-m-Y', strtotime($food_order->created_at)) }}</h5>
                       <input type="hidden" name="cust_phone" value="{{$food_order->cust_phone}}">
                       <input type="hidden" name="cust_add" value="{{$food_order->cust_add}}">

                    </div>

					<table width="100%" class="show-order-detail">
                        <thead>
                            <tr>
                                
                                <th>Name of Food</th>
                                <th>Unit Price ($)</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr> 
                                <?php 
                                    $name= explode('<br>' ,  $food_order->food_name);
                                    $price= explode('<br>' ,  $food_order->unit_price);
                                    $qty= explode('<br>' ,  $food_order->qty);
                                    $n = count($name);
                                    
                                     ?>
                                     <!-- &#13;&#10; -->

                                <td>
                                    <textarea name="namefood" rows="6" style="border: 0; resize: none;"><?php for ($i=0; $i <$n ; $i++) { echo $name[$i];?>.&#13;&#10;<?php } ?></textarea></td>
                                <td><textarea name="price" rows="6" style="border: 0; resize: none;"><?php 
                                    for ($i=0; $i <$n ; $i++) { 
                                        echo $price[$i];?>,&#13;&#10;<?php
                                    }
                                     ?></textarea></td>
                                <td><textarea name="qty" rows="6" style="border: 0; resize: none;"><?php 
                                    for ($i=0; $i <$n ; $i++) { 
                                        echo $qty[$i];?>.&#13;&#10;<?php
                                    }
                                     ?></textarea></td>
                                <td></td>
                              
                            </tr>
                        </tbody>
                    </table>	
				    <br><br>
					<div class="row">
						
						<div class="col-md-11">
							<button type="submit" name="save" class="btn btn-info">Update</button>
							<a href="{{ route('food_order.index')}}" class="btn btn-default">Close</a>
						</div>
					</div>
					<br>
				</form>
			</div>
		</div>
@endsection
