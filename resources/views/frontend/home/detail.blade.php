@extends('frontend.layout.master')

@section('content')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Products</a></li>
                <li class="breadcrumb-item active">Product Detail</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Detail Start -->
        <div class="product-detail">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="product-detail-top">
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <div class="product-single">
                                        @php
                                            $image = $data['row']->images->first();
                                        @endphp
                                        <img src="{{asset('images/costume/275_275_'.$image->name)}}" alt="Product Image">

                                    </div>
                                </div>
                                <div class="col-md-7">
                                    {!!  Form::open(['route' =>'booking.store','method'=>'post']) !!}

                                    <div class="product-content">
                                        <div class="title"><h2>{{$data['row']->costumeType->name}}</h2>
                                        </div>

                                        <div class="price">
                                            <h4>Price:</h4>
                                            <p>Rs. {{$data['row']->rental_amount}}</p>
                                            <input hidden type="text" name="price" value="{{$data['row']->rental_amount}}">

                                        </div>
                                        <div class="quantity">
                                            <h4>Quantity:</h4>
                                            <div class="qty">
                                                <input type="text" name="qty" value="1">
                                            </div>
                                            @error('qty')
                                            {{$message}}
                                            @enderror
                                        </div>
                                        <div class="p-size">
                                            <h4>Size:</h4>
                                            <div class="btn-group btn-group-sm">


                                                    <select name="size" id="size">
                                                        <option value="">Select your size</option>

                                                       {{$data['size']}}
                                                        @foreach($data['size'] as $size)
                                                        <option value="{{$size->short_form}}">{{$size->short_form}}</option>
                                                        @endforeach

                                                    </select>
    {{--                                                <input type="hidden" value="{{$size->short_form}}" name="size">--}}
                                                        @error('size')
                                                        {{$message}}
                                                        @enderror

                                            </div>
                                        </div>
                                        <input type="hidden" name="product_id" value="{{$data['product_id']}}">
                                        <div class="action">
{{--                                            <a class="btn" href="#"><i class="fas fa-check"></i></i>Book Now</a>--}}
                                            {!!  Form::submit('Book Now',['class'=>'btn btn-success']) !!}
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row product-detail-bottom">
                            <div class="col-lg-12">
                                <ul class="nav nav-pills nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#description">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#specification">Specification</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#reviews">Reviews (1)</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div id="description" class="container tab-pane active">
                                        <h4>Product description</h4>
                                        <p>
                                        {{$data['row']->name}}
                                        </p>
                                    </div>
                                    <div id="specification" class="container tab-pane fade">
                                        <h4>Product specification</h4>
                                        <ul>
                                            <li>Lorem ipsum dolor sit amet</li>
                                            <li>Lorem ipsum dolor sit amet</li>
                                            <li>Lorem ipsum dolor sit amet</li>
                                            <li>Lorem ipsum dolor sit amet</li>
                                            <li>Lorem ipsum dolor sit amet</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="product">
                            <div class="section-header">
                                <h1>Related Products</h1>
                            </div>

                            <div class="row align-items-center">
                              @foreach($data['related-costume'] as $related)
                                <div class="col-lg-3">
                                    <div class="product-item">
                                        <div class="product-title">
                                            <a href="#">{{$related->name}}</a>
                                        </div>
                                        <div class="product-image">
                                            <a href="product-detail.html">
                                                <img src="{{asset('images/costume/275_275_'.$related->images()->first()->name)}}" alt="Product Image">
                                            </a>
                                        </div>
                                        <div class="product-price">
                                            <h3><span>Rs</span>{{$related->rental_amount}}</h3>
                                            <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

                    <!-- Side Bar Start -->
                    <div class="col-lg-4 sidebar">



                    </div>
                    <!-- Side Bar End -->
                </div>
            </div>
    </div>
    <!-- Product Detail End -->

    <!-- Brand Start -->
    <div class="brand">
        <div class="container-fluid">
            <div class="brand-slider">
                <div class="brand-item"><img src="img/brand-1.png" alt=""></div>
                <div class="brand-item"><img src="img/brand-2.png" alt=""></div>
                <div class="brand-item"><img src="img/brand-3.png" alt=""></div>
                <div class="brand-item"><img src="img/brand-4.png" alt=""></div>
                <div class="brand-item"><img src="img/brand-5.png" alt=""></div>
                <div class="brand-item"><img src="img/brand-6.png" alt=""></div>
            </div>
        </div>
    </div>
    <!-- Brand End -->
@endsection
