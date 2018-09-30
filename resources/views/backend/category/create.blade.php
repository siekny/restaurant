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
				<form action="{{route('category.store')}}" method="POST" >
					@if(isset($error))
					<p style="color: red; text-align: center;">{{$error}}</p>
				@endif
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					<div class="row">			
						<div class="col-md-1">Name</div>
						<div class="col-md-11">
							<input type="text" name="cate_name" class="form-control">
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
							<textarea rows="5" name="cate_description" class="form-control"></textarea>
							@if($errors->has('cate_description'))
								<p style="color: red;">{{$errors->first('cate_description')}}</p>
							@endif
						</div>
					</div>	
					
					<br><br><br>
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-11">
							<button type="submit" name="save" class="btn btn-info">Save</button>
						</div>
					</div>
					<br>
				</form>
			</div>
		</div>
@endsection