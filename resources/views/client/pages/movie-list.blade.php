@extends('client.layouts.layout')
@section('content')
<div class="product-default-slider-section section-top-gap-100 section-fluid">
    <!-- Start Section Content Text Area -->
    <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-content-gap">
                        <div class="secton-content">
                            <h3 class="section-title">{{$title}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Section Content Text Area -->
    <div class="product-wrapper" data-aos="fade-up" data-aos-delay="200">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product-slider-default-2rows default-slider-nav-arrow">
                        <!-- Slider main container -->
                        <div class="swiper-container product-default-slider-4grid-2row">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                @foreach($movieWithSlug as $movie)
<!-- Start Product Default Single Item -->
<div class="product-default-single-item product-color--golden swiper-slide">
<div class="image-box">
    <a href="{{route('info', $movie->slug)}}" class="image-link">
        <div class="image-container">
            <img src="{{asset('storage/'.$movie->thumb)}}" style="height: 400px" class="img-responsive" alt="{{$movie->slug}}">
            <div class="overlay">
                <div class="play-btn">
                    <i class="fa fa-play"></i>
                </div>
            </div>
        </div>
    </a>
</div>
<div class="content">
    <div class="content-left">
        <h6 class="title"><a href="{{route('info', $movie->slug)}}">{{$movie->name}}</a></h6>
    </div>
</div>
</div>
@endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="d-flex justify-content-center mt-8">
    <div class="next-page">
        {{ $movieWithSlug->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>
@endsection

