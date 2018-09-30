@extends('backend.master')

@section('title','food')
@section('h1','All food')
@section('content')


<table id="example" class="table table-striped table-bordered" style="width:100%; margin-top: 30px;">
        <thead>
            <tr>
                <th>Nº</th>
                <th>Name</th>
                <th>Price</th>
                <th>description</th>
                <th>Category</th>
                <th style="width: 110px !important">Action</th>
            </tr>
        </thead>
        <tbody>
        		@foreach($food as $f)
                <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$f->name}} </td>
                        <td style="width: 310px;">{{$f->price}} $</td>
                        <td>
                           {{$f->description}}
                        </td>
                        <th>{{ $f->cate_id }}</th>
                        
                        <td>
                        
                        <!-- show detail -->
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#view{{$f->id}}">
                            <i class="fa fa-eye"></i>
                        </button>

                        <!-- modal show detail -->
                        <div id="view{{$f->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Food</h4>
                                </div>

                                <div class="modal-body" style="display: inline-block; width: 100%">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="">
                                    <div class="col-md-6 col-md-offset-3">
                                        <img src="{{URL::asset('/uploads/picture/')}}/{{ $f->picture }}" class="img-responsive" alt="image" style="border: 1px solid #ccc; border-radius: 50%; margin: 0 auto;">
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <h5>Name of Food : </h5>
                                        <h5>Price : </h5>
                                        <h5>Kind of Food : </h5>
                                        <h5>Date of Create : </h5>
                                        <h5>Description : </h5>
                                    </div>
                                    <div class="col-md-6 text-left">
                                        <h5>{{ $f->name }}</h5>
                                        <h5>{{ $f->price }} $</h5>
                                        <h5>{{ $f->cate_id }}</h5>
                                        <h5>{{ date('d-m-Y', strtotime($f->created_at)) }}</h5>
                                        <h5>{{ $f->description }}</h5>
                                    </div>
                                </div>
                                
                                <div class="modal-footer">
                                    
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                                
                            </div>
                            </div>
                        </div>
                        <!-- <a href="{{route('admin.show', $f->id) }}" class="btn btn-info">
                            <i class="fa fa-eye"></i>
                        </a> -->
                        <a href="{{ route('admin.edit',$f->id) }} " class="btn btn-success">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>

                        <!-- delete -->
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$f->id}}">
                            <i class="glyphicon glyphicon-trash"></i>
                        </button>
                        <div id="delete{{$f->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Do you want to delete this?</h4>
                                </div>
                                <form action="{{url('admin/delete/'.$f->id)}}" method="POST">
                                <div class="modal-footer">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="">
                                    <button type="submit" name="del" class="btn btn-danger">Delete
                                    </button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                                </form>
                            </div>
                            </div>
                        </div>

                    </td>
                </tr>
                @endforeach
        </tbody>
        </table>
	
@stop
@section('script')
<script >
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>

<style type="text/css">
    h5 {
        line-height: 23px;
        font-size: 17px;
        font-weight: 600;
        margin-top: 20px;
    }
</style>
@endsection