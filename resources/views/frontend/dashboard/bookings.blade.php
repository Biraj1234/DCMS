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
                        @forelse($data['booking'] as $index=>$costume)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$costume->bookingDetail->costume->name}}</td>
                                <td>{{$costume->order_code}}</td>
                                <td>{{$costume->bookingDetail->size}}</td>
                                <td>{{$costume->bookingDetail->quantity}}</td>
                                <td>{{$costume->bookingDetail->price}}</td>
                                <td>{{$costume->bookingDetail->total_price}}</td>
                                <td>{{$costume->booking_date}}</td>
                                <td>

                                    {!!  Form::open(['route' => ['booking.destroy',$costume->id],'method'=>'post','class'=>'d-inline']) !!}

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
                    </table>
                </div>
            </div>
                  </div>
    </div>
@endsection
