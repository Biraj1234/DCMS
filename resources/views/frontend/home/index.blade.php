@extends('frontend.layout.master')

@section('content')
    <!-- Main Slider Start -->
    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <nav class="navbar bg-light">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('index')}}"><i class="fa fa-home"></i>Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-shopping-bag"></i>Best Selling</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-plus-square"></i>New Arrivals</a>
                            </li>

                        </ul>
                    </nav>
                </div>
                <div class="col-md-6">

                    <div class="header-slider normal-slider">

                        @foreach($data['slider-costume'] as $costume)
                            <a href="{{route('product.detail',$costume->id)}}">
                            @php
                                $image = $costume->images->first();
                            @endphp
                            <div class="header-slider-item">
                                @if($image)
                                    <img src="{{asset('images/costume/600_400_'.$image->name)}}" alt="Slider Image" />
                                @endif
                                <div class="slider-details">
                                    <p class="slider-name">{{$costume->name}}</p>
                                    <p class="rent">Rs.{{$costume->rental_amount}} per day</p>
                                </div>
                            </div>
                            </a>
                        @endforeach

                    </div>

                </div>
                <div class="col-md-3">
                    <div class="header-img">
                        @foreach($data['top-costume'] as $top)
                            @php
                                $image = $top->images->first();
                            @endphp
                            <div class="img-item">
                                @if($image)
                                    <img src="{{asset('images/costume/275_200_'.$image->name)}}" />
                                @endif
                                <a class="img-text" href="{{route('product.detail',$top->id)}}">
                                    <p>{{$top->name}}</p>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Slider End -->

    <!-- Featured Product Start -->
    <div class="featured-product product">
        <div class="container-fluid">
            <div class="section-header">
                <h1>Featured Product</h1>
            </div>
            <div class="row align-items-center">

                @foreach($data['feature-costume'] as $featured)

                    <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="{{route('product.detail',$featured->id)}}">{{$featured->name}}</a>
                            </div>
                            <div class="product-image">
                                <a href="{{route('product.detail',$featured->id)}}">
                                    @php
                                        $image=$featured->images->first();
                                    @endphp
                                    @if($image)
                                    <img src="{{asset('images/costume/275_275_'.$image->name)}}" alt="Product Image">
                                    @endif
                                </a>
                            </div>
                            <div class="product-price">
                                <h3><span>Rs</span>{{$featured->rental_amount}}</h3>
                                <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
    <!-- Featured Product End -->


    <!-- Recent Product Start -->
    <div class="recent-product product">
        <div class="container-fluid">
            <div class="section-header">
                <h1>Recent Product</h1>
            </div>
            <div class="row align-items-center">
                @foreach($data['recent-costume'] as $recent)
                    @php
                        $image=$recent->images->first();
                    @endphp
                    <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="{{route('product.detail',$recent->id)}}">{{$recent->name}}</a>
                            </div>
                            <div class="product-image">
                                <a href="{{route('product.detail',$recent->id)}}">

                                    <img src="{{asset('images/costume/275_275_'.$image->name)}}"  alt="Product Image">
                                </a>
                            </div>
                            <div class="product-price">
                                <h3><span>Rs</span>{{$recent->rental_amount}}</h3>
                                <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Recent Product End -->

@endsection

