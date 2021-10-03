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
                        <th>Product</th>
                        <th>Order Code</th>
                        <th>Size</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Booking Date</th>
                        <th>Customer</th>
                        <th>Status</th>

                    </tr>
                    </thead>

                    <tbody>
                    @forelse($data['rows'] as $index=>$costume)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$costume->costume->name}}</td>
                            <td>{{$costume->order_code}}</td>
                            <td>{{$costume->size}}</td>
                            <td>{{$costume->quantity}}</td>
                            <td>{{$costume->total_price}}</td>
                            <td>{{$costume->booking_date}}</td>
                            <td>{{$costume->customer->fname}} {{$costume->customer->lname}}</td>
                            <td>
                                @if($costume->order_status==0)
                                    <p class="text text-danger">Unpaid</p>
                                 @else
                                    <p class="text text-success">Paid</p>
                                @endif

                            </td>
                    @empty
                        <tr>
                            <td style="color:red"; colspan="9">No bookings are made</td>
                        </tr>
                    @endforelse
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





