@extends('backend.master')

@section('title','View User')
@section('h1','View User Here')

@section('content')
		<table id="example" class="table table-striped table-bordered" style="width:100%; margin-top: 30px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Picture</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{{$foods->id}}</td>
                    <td>{{$foods->name}}</td>
                    <td>{{$foods->price}}</td>
                    <td >{{$foods->description}}</td>
                    <td  style="width: 300px;height: auto;">
                        <img src="{{URL::asset('/uploads/picture/')}}/{{ $foods->picture }}" class="img-responsive" alt="image">
                    </td>
                    
                    </tr>
        </tbody>
        </table>
	
@stop
