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
                            <td>{{$costume->bookingDetail->costume->name}}</td>
                            <td>{{$costume->order_code}}</td>
                            <td>{{$costume->bookingDetail->size}}</td>
                            <td>{{$costume->bookingDetail->quantity}}</td>
                            <td>{{$costume->bookingDetail->total_price}}</td>
                            <td>{{$costume->booking_date}}</td>
                            <td>{{$costume->customer->fname}} {{$costume->customer->lname}}</td>
                            <td>
                                @if($costume->order_status==0)
                                <a href="{{route('status.change',$costume->id)}}" class="btn btn-danger">Pending</a>
                                @else
                                    <a href="{{route('status.change',$costume->id)}}" class="btn btn-success">Dispatched</a>
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


