@extends('backend.layouts.master')
@section('title',$title)

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{$title}} {{$panel}}


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
                            <th>Contact</th>
                            <th>Registered At</th>

                        </tr>
                        </thead>

                        <tbody>
                        @forelse($data['rows'] as $index=>$data)

                            <tr>

                                <td>{{$index+1}}</td>
                                <td>{{$data->fname}} {{$data->lname}}</td>
                                <td>{{$data->email}}</td>
                                <td>{{$data->mobile_number}}</td>
                                <td>{{$data->created_at}}</td>


                            </tr>
                        @empty
                         <tr>
                             <td colspan="6" style="text-align: center; color: red">   <p>No costumes added</p></td>
                         </tr>
                        @endforelse
                        </tbody>

                    </table>


        </div>
    </div>
@endsection


