@extends('backend.master')
@section('title','Food')
@section('h1',"All Food")
@section('content') 
		<!-- table -->
		<div class="panel panel-default" >
			<div class="panel-heading">
				Edit Food
			</div>
			<div class="panel-body" style="padding: 30px 80px;">
				<form action="{{url('admin/up/'.$foods->id)}}" method="post" enctype="multipart/form-data" >
					{{ csrf_field() }}
					<div class="row">			
						<div class="col-md-1">Name</div>
						<div class="col-md-11">
							<input type="text" name="name" value="{{$foods->name}}" class="form-control">
							@if($errors->has('name'))
								<p style="color: red;">{{$errors->first('name')}}</p>
							@endif
						</div>
					</div>
					<br>
					<div class="row">			
						<div class="col-md-1">Price</div>
						<div class="col-md-11">
							<input type="text" name="price" value="{{$foods->price}}" class="form-control">
							@if($errors->has('price'))
								<p style="color: red;">{{$errors->first('price')}}</p>
							@endif
						</div>
					</div>
					<br>	
					<div class="row">			
							<div class="col-md-1">Category</div>
							<div class="col-md-11">
								<select class="form-control" name="cate_id">
									@foreach($cates as $cate)
										@if ($cate->id==$foods->cate_id)
											<option value="{{$cate->id}} " selected="">{{$cate->cate_name}} </option>
										@else
										<option value="{{$cate->id}} ">{{$cate->cate_name}} </option>

										@endif
									@endforeach
								</select>
							</div>
						</div>
					
						<br>	
					<div class="row">
						<div class="col-md-1"">Description</div>
						<div class="col-md-11">
							<!-- <input type="text" name="description" class="form-control"> -->
							<textarea rows="5" name="description" class="form-control">{{$foods->description}}</textarea>
							@if($errors->has('description'))
								<p style="color: red;">{{$errors->first('description')}}</p>
							@endif
						</div>
					</div>	
						<br>	
					<div class="row">			
							<div class="col-md-1">Picture</div>
							<div class="col-md-11">
								 <input type="file" id="picture" name="picture">
							</div>
						</div>
					<br><br><br>
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-11">
							<button type="submit" name="save" class="btn btn-info">Update</button>
							<a href="{{ url('/admin') }}" class="btn btn-default">Close</a>
						</div>
					</div>
					<br>
				</form>
			</div>
		</div>
@endsection