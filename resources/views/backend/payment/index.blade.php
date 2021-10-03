@extends('backend.layouts.master')
@section('title',$title)

@section('content')

    <style type="text/css">
        @media print {
            #datatable_wrapper .row:first-child {display:none;}
            #datatable_wrapper .row:last-child {display:none;}
            .no_print {display:none;}
        }
    </style>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{$title}} {{$panel}}
                <a class="btn btn-primary text-white no_print" id="printBtn" onclick="window.print()"><i class="nav-icon fas fa-print"></i>Print</a>

            </h3>

            <div class="card-tools no_print">
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
                            <th>Payment ID</th>
                            <th>Payment Date</th>

                            <th>Received From</th>
                            <th>Amount</th>

                        </tr>
                        </thead>

                        <tbody>
                        @foreach($data['rows'] as $index=>$data)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$data->id}}</td>
                                <td>{{$data->payment_date}}</td>

                                <td>{{$data->customer->fname}} {{$data->customer->lname}}</td>
                                <td>Rs.{{$data->amount}}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="4">
                                Total
                            </td>
                            <td>
                                Rs.{{$total}}
                            </td>
                        </tr>
                        </tbody>

                    </table>


        </div>
    </div>
@endsection
        @section('js')
            <script type="text/javascript" src="{{asset('backend/plugins/jQuery.print.min.js')}}"></script>
            <script type="text/javascript">
                $(function() {

                    $("#printBtn").on('click', function() {

                        $.print("#printable");

                    });

                });
            </script>
@endsection


