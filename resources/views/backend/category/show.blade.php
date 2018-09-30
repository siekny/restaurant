@extends('backend.master')

@section('title','View Category')
@section('h1','View Category Here')

@section('content')
		<table id="example" class="table table-striped table-bordered" style="width:100%; margin-top: 30px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                
                <th>Created at</th>
                <th>Updated at</th>
                            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{{$cates->id}}</td>
                    <td>{{$cates->cate_name}}</td>
                    <td>{{$cates->cate_description}}</td>
                    
                    <td>{{$cates->created_at}}</td>
                    <td>{{$cates->updated_at}}</td>
                    
                    </tr>
        </tbody>
        </table>
	
@stop
