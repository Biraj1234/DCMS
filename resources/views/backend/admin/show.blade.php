@extends('backend.layouts.master')
@section('title',$title)

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{$title}} {{$panel}}
                <a href="{{route($base_route.'create')}}" class="btn btn-primary"> <i class="nav-icon fa fa-plus"></i> Add</a>
                <a href="{{route($base_route.'index')}}" class="btn btn-success"> <i class="nav-icon fas fa-list-ul"></i>&nbsp;List</a>


            </h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
                <div class="table-responsive">


                    <table class="table table-bordered">

                        <tr>
                            <th>S.No</th>
                           <td>{{$data['row']->name}}</td>
                        </tr>

                        <tr>
                            <th>Full Form</th>
                            <td>{{$data['row']->email}}</td>
                        </tr>

                        <tr>
                            <th>Profile Picture</th>
                            <td>
                                <img src="{{asset('uploads/'.$data['row']->profile_picture)}}" height="80px" alt="">

                            </td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td>
                               @if( $data['row']->status == 0)
                                   <p class="text text-danger">Inactive</p>
                                   @else
                                    <p class="text text-success">Active</p>

                                @endif
                            </td>
                        </tr>




                    </table>


        </div>

    </div>
@endsection


