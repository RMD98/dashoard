@extends('temp/template')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Sumber Iptek</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{secure_url('/add_sumber')}}" class="btn btn-primary">
                Tambah Data &nbsp
                <i class="fas fa-plus"></i>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sumber Iptek</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key=>$value)
                        <tr>
                            <td>{{ $value->sumber }}</td>
                            <td>
                                <a href="{{secure_url('/edit_sumber')}}/{{$value->id}}" class="btn btn-primary">EDIT &nbsp<i class="fas fa-pencil-alt fa-sm text-white-10"></i></a>
                                <a data-toggle="modal" data-target="#deletemodal{{$value->id}}" class="btn btn-danger">DELETE <i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <div class="modal fade" id="deletemodal{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Are you Sure?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Are you sure want to delete data {{$value->sumber}}.</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        <a class="btn btn-primary" href="{{secure_url('/del_sumber')}}/{{$value->id}}">YES</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop