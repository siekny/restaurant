@extends('backend.master')

@section('title','View Order')
@section('h1','View Order Here')

@section('content')
<style type="text/css">
    .show-order-detail { border: 1px solid #ccc }
    .show-order-detail th, .show-order-detail td { padding: 10px; border: 1px solid #ccc }
</style>
		<table id="example" class="table table-striped table-bordered" style="width:100%; margin-top: 30px;">
        <thead>
            <tr>
                <th>No.</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Name of Food</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; ?>
            <?php $count=1; ?>
            @foreach($food_order as $order)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$order->cust_phone}}</td>
                    <td>{{$order->cust_add}}</td>
                    <td>{!! $order-> food_name !!}</td>
                    <td>
                        <?php 
                            if ($order->status == 1) { ?>
                                
                                    <button type="submit" class="btn-status btn btn-success">Done</button>
                                
                                <?php 
                            }
                            else {  ?>
                                
                                <form action="{{ url('food_order.status',$order->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="status" >
                                    <button type="submit" class="btn-status btn btn-warning">Wait</button>
                                </form>
                                
                                
                                <?php 
                            }
                         ?>
                        
                    </td>
                    <td>
                        <!-- view -->
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#view{{$order->id}}"><span class="glyphicon glyphicon-eye-open"></span></button>
                        <!-- modal view -->
                        <div id="view{{$order->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog" style="width: 850px !important">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">View Order</h4>
                                    </div>
                                    <div class="modal-body col-md-12" style="display: inline-block !important;">
                                        <div class="col-md-6 text-right">
                                            <h5>Contact : </h5>
                                            <h5>Address : </h5>
                                            <h5>Date Order : </h5>
                                        </div>
                                        <div class="col-md-6 text-left">
                                            <h5>{{ $order->cust_phone }}</h5>
                                            <h5>{{ $order->cust_add }}</h5>
                                            <h5>{{ date('d-m-Y', strtotime($order->created_at)) }}</h5>
                                           

                                        </div>
                                        <table width="100%" class="show-order-detail">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Name of Food</th>
                                                    <th>Unit Price ($)</th>
                                                    <th>Quantity</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{ $count++ }}</td>
                                                    <td>{!! $order->food_name !!}</td>
                                                    <td>{!! $order->unit_price !!}</td>
                                                    <td>{!! $order->qty !!}</td>
                                                    <td>{{ $order->total }} $</td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- end view -->

                        <!-- edit -->
                        <?php 

                            if ($order->status == 1) { ?>

                                <button type="button" class="btn btn-default" style="cursor: not-allowed;"><span class="glyphicon glyphicon-pencil"></span>
                                </button>

                                <?php 

                            }
                            else { ?>

                                <a href="{{ route('food_order.edit',$order->id) }} " class="btn btn-success">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                <?php 
                            }
                         ?>

                        
                        
                        <!-- delete -->
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$order->id}}"><span class="glyphicon glyphicon-trash"></span></button>
                        <!-- delete modal -->

                        <div id="delete{{$order->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Delete</h4>
                                    </div>
                                    <div class="modal-body">
                                        <h3>Do you want to delete this Record ?</h3>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ url('food_order/'.$order->id) }}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id">
                                            <input type="submit" name="delete" class="btn btn-danger" value="Delete">
                                            
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>  <!-- end delete -->
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
        </table>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            // $('.btn-status').click(function(){
            //     $('.btn-status').removeClass('btn-warning');
            //     // $('.btn-waiting').addClass('btn-done');
                
            //     $('.btn-status').addClass('btn-success');
                
            //     $status = 1;
            //     // alert('hguiga');
            // });
            
            //$(document).on('çlick','.btn-done', function(){
                // $('.btn-waiting').removeClass('btn-warning');
                // $('.btn-waiting').addClass('btn-success');
              //  alert('hguiga');
            //});
        }); 
    </script>
	
@stop
