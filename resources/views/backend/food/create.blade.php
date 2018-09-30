@extends('backend.master')
@section('title','food')
@section('h1',"All food")
@section('content')
		<!-- table -->
		<div class="panel panel-default" >
			<div class="panel-heading">
				Add Food
			
			</div>
			<div class="panel-body" style="padding: 30px 80px;">
				<form action="{{route('admin.store')}}" method="POST" enctype="multipart/form-data">
					@if(isset($error))
					<strong style="color: red; text-align: center;">{{$error}}</strong>
				@endif
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					<div class="row">			
						<div class="col-md-2">Name *</div>
						<div class="col-md-10">
							<input type="text" name="name" class="form-control" value="{{ old('name') }}">
							@if($errors->has('name'))
								<strong style="color: red;">{{$errors->first('name')}}</strong>
							@endif
						</div>
					</div>
					<br>
					<div class="row">			
						<div class="col-md-2">Price *</div>
						<div class="col-md-10">
							<input type="text" name="price" class="form-control" value="{{ old('price') }}">
							@if($errors->has('price'))
								<strong style="color: red;">{{$errors->first('price')}}</strong>
							@endif
						</div>
					</div>
					<br>	
					<div class="row">			
							<div class="col-md-2">Category *</div>
							<div class="col-md-10">
								<select class="form-control" name="cate_id">
									@foreach($cates as $cate)
									<option value="{{$cate->id}} ">{{$cate->cate_name}} </option>
									@endforeach
								</select>
							</div>
						</div>
					
						<br>	
					<div class="row">
						<div class="col-md-2">Description</div>
						<div class="col-md-10">
							<!-- <input type="text" name="description" class="form-control"> -->
							<textarea rows="5" name="description" class="form-control" value="{{ old('description') }}"></textarea>
							@if($errors->has('description'))
								<strong style="color: red;">{{$errors->first('description')}}</strong>
							@endif
						</div>
					</div>	
						<br>	
					<div class="row">			
							<div class="col-md-2">Picture *</div>
							<div class="col-md-10">
								 <input type="file" id="picture" name="picture" value="{{ old('picture') }}">
								 @if($errors->has('picture'))
								<strong style="color: red;">{{$errors->first('picture')}}</strong>
							@endif
							</div>
						</div>
					<br><br><br>
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-10">
							<button type="submit" name="save" class="btn btn-info">Save</button>
						</div>
					</div>
					<br>
				</form>
			</div>
		</div>
@endsection