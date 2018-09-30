@extends('backend.master')
@section('title','Category')
@section('h1',"All Category")
@section('content')
		<!-- table -->
		<div class="panel panel-default" >
			<div class="panel-heading">
				Add Category 
			</div>
			<div class="panel-body" style="padding: 30px 80px;">
				<form action="{{url('category/up/'.$cates->id)}}" method="post" >
					{{ csrf_field() }}
					<div class="row">			
						<div class="col-md-1">Name</div>
						<div class="col-md-11">
							<input type="text" name="cate_name" value="{{$cates->cate_name}}" class="form-control">
							@if($errors->has('cate_name'))
								<p style="color: red;">{{$errors->first('cate_name')}}</p>
							@endif
						</div>
					</div>
					<br>		
					<div class="row">
						<div class="col-md-1">Description</div>
						<div class="col-md-11">
							<!-- <input type="text" name="description" class="form-control"> -->
						<textarea rows="5" name="cate_description" class="form-control">{{$cates->cate_description}}</textarea>
							@if($errors->has('cate_description'))
								<p style="color: red;">{{$errors->first('cate_description')}}</p>
							@endif
						</div>
					</div>	
					<br>	
					
					<br><br><br>
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-11">
							<button type="submit" name="save" class="btn btn-info">Update</button>
							<a href="{{ url('/category') }}" class="btn btn-default">Close</a>
						</div>
					</div>
					<br>
				</form>
			</div>
		</div>
@endsection