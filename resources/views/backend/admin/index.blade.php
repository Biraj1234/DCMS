@extends('backend.layouts.master')
@section('title',$title)

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{$title}} {{$panel}}
                <a href="{{route($base_route.'create')}}" class="btn btn-primary"> <i class="nav-icon fa fa-plus"></i> Add</a>

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
                    @include('backend.includes.flashmessage')

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                        </thead>

                        <tbody>
                        @foreach($data['rows'] as $index=>$data)

                            <tr>

                                <td>{{$index+1}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->email}}</td>
                                <td>
                                    @if($data->status==1)
                                        <p class="text text-success">Active</p>
                                    @else
                                        <p class="text text-danger">Inactive</p>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-success" href="{{route($base_route.'show',$data->id)}}">View</a>
                                    <a class="btn btn-primary" href="{{route($base_route.'edit',$data->id)}}">Edit</a>


                                    {!!  Form::open(['route' => [$base_route.'destroy',$data->id],'method'=>'post','class'=>'d-inline']) !!}

                                    {!! Form::hidden('_method','DELETE') !!}

                                    {!!  Form::submit('Delete',['class'=>'btn btn-danger']) !!}

                                    {!! Form::close() !!}




                                </td>

                            </tr>
                        @endforeach
                        </tbody>

                    </table>


        </div>
    </div>
@endsection


