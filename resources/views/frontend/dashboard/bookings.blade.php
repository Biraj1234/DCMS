@extends('frontend.dashboard.layout.master')

@section('dashboard-content')
    <div class="col-md-9">


        <div class="tab-content">
            @if(Session::has('success'))
                <p class="alert alert-success">{{Session::get('success')}}</p>
            @endif
            @if(Session::has('error'))
                <p class="alert alert-danger">{{Session::get('error')}}</p>
            @endif
          <div   aria-labelledby="orders-nav">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Product</th>
                            <th>Order Code</th>
                            <th>Size</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total Price</th>
                            <th>Booking Date</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($data['booking'] as $index=>$booking)
{{--                            {{dd($data['booking']->customer)}}--}}

                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$booking->costume->name}}</td>
                                <td>{{$booking->order_code}}</td>
                                <td>{{$booking->size}}</td>
                                <td>{{$booking->quantity}}</td>
                                <td>Rs.{{$booking->price}}</td>
                                <td>Rs.{{$booking->total_price}}</td>
                                <td>{{$booking->booking_date}}</td>

                                <td>

                                    {!!  Form::open(['route' => ['booking.destroy',$booking->id],'method'=>'post','class'=>'d-inline']) !!}

                                    {!! Form::hidden('_method','DELETE') !!}

                                    {!!  Form::submit('Cancel',['class'=>'btn btn-danger','onclick'=>"return confirm('Are you sure you want to delete this item?');"]) !!}

                                    {!! Form::close() !!}



                                </td>

                        @empty
                            <tr>
                                <td style="color:red"; colspan="9">No bookings are made</td>
                            </tr>
                        @endforelse
                        </tbody>
                        <tr>
                            <td colspan="3">
                                Net Total
                            </td>

                            <td colspan="9">
                               Rs.{{$total}}
                            </td>
                        </tr>
                    </table>

                </div>

            </div>

                <form action="{{route('stripe.index')}}" method="GET">
                    @if(isset(Auth::guard('customer')->user()->id))
                        <input type="hidden" name="customer_id" value="{{Auth::guard('customer')->user()->id}}">
                       @if(isset($booking->id))
                        <input type="hidden" name="booking_id" value="{{$booking->id}}">
                        <input type="hidden" name="costume_id" value="{{$booking->costume->id}}">
                       @endif
                        <input type="hidden" name="net_amount" value="{{$total}}">
                    @endif
                    <input type="submit" class="btn btn-success" value="Book now">
                </form>
        </div>

    </div>
@endsection
