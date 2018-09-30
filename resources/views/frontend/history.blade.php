<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
    .show-order-detail { border: 1px solid #cfcfcf }
    .show-order-detail th, .show-order-detail td { padding: 10px; border: 1px solid #ccc }
</style>

	<div class="col-md-8 col-md-offset-2" style="border: 1px solid #cfcfcf; box-shadow: 0 0 10px #cfcfcf; padding: 30px; margin-top: 30px">
		<a href="{{ url('/ordered', $Lastorder->id) }}" class="btn btn-success">Back</a>
		<a href="{{ url('reservation') }}" class="btn btn-default">Go to menu</a>
		<div class="col-md-12">
			<div class="text-center">
				<h3>What You Recently Odered</h3>
			</div>
			<div class="col-md-5 text-right">
				<p>Contact : </p>
				
				
			</div>
			<div class="col-md-7 text-left">
				<p>{{ $Lastorder->cust_phone }}</p>
				
			</div>
			<div class="col-md-12 text-left">
				<h4>Food List : </h4>
			</div>


			<table width="100%" class="show-order-detail">
                <thead>
                    <tr>
                        
                        <th>Name of Food</th>
                        <th>Unit Price ($)</th>
                        <th>Quantity</th>
                        <th>Total ($)</th>
                        <th>Address</th>
                        <th>Date of Order</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($order as $or)
                    <tr>
                     	<td>{!! $or->food_name !!}</td>
                        <td>{!! $or->unit_price !!}</td>
                        <td>{!! $or->qty !!}</td>
                        <td>{!! $or->total !!}</td>
                        <td>{!! $or->cust_add !!}</td>
                        <td>{{ date('d-m-Y', strtotime($or->created_at)) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
		</div>
		
	</div>

