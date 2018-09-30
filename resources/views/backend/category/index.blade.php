@extends('backend.master')

@section('title','Category')
@section('h1','All Category')
@section('content')
<table id="example" class="table table-striped table-bordered" style="width:100%; margin-top: 30px;">
        <thead>
            <tr>
                <th>Nº</th>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        		@foreach($cates as $cate)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$cate->cate_name}} </td>
                    <td>{{$cate->cate_description}} </td>
                    
                    <td>
                     <!-- show detail -->
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#view{{$cate->id}}">
                        <i class="fa fa-eye"></i>
                    </button>

                    <!-- modal show detail -->
                    <div id="view{{$cate->id}}" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Food</h4>
                            </div>

                            <div class="modal-body" style="display: inline-block; width: 100%">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="">
                                
                                <div class="col-md-6 text-right">
                                    <h5>Name of Category : </h5>
                                    <h5>Date of Create : </h5>
                                    <h5>Date of Update : </h5>
                                    <h5>Description : </h5>
                                </div>
                                <div class="col-md-6 text-left">
                                    <h5>{{$cate->cate_name}}</h5>
                                    <h5>{{$cate->cate_id}}</h5> 
                                    <h5>{{ date('d-m-Y', strtotime($cate->created_at)) }}</h5>  <h5>{{ date('d-m-Y', strtotime($cate->updated_at)) }}</h5>
                                    <h5>{{$cate->cate_description}}</h5>
                                </div>
                            </div>
                            
                            <div class="modal-footer">
                                
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                            
                        </div>
                        </div>
                    </div>  
                    
                    <a href="{{ route('category.edit',$cate->id) }} " class="btn btn-success">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$cate->id}}">
                        <i class="glyphicon glyphicon-trash"></i>
                    </button>
                    <div id="delete{{$cate->id}}" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Do you want to delete this?</h4>
                            </div>
                            <form action="{{url('category/delete/'.$cate->id)}}" method="POST">
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