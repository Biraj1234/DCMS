@extends('backend.layouts.master')
@section('title',$title)

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{$title}} {{$panel}}
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

            {!!  Form::model($data['row'], ['route' => [$base_route.'update',$data['row']->id],'method'=>'post','files'=>'true']) !!}
            {!! Form::hidden('_method','PUT') !!}


            @include($base_route.'include.mainform')

            {!!  Form::submit('Update',['class'=>'btn btn-primary']) !!}

            {{Form::close()}}
        </div>
    </div>
@endsection


