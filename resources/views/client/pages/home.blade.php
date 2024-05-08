@extends('client.layouts.layout')
 @section('content')
{{-- <section class="home container" id="home">
    <img src="{{asset('img/home-background.png')}}" alt="" class="home-img">
    <div class="home-text">
        <h1 class="home-title"></h1>
        <p>Xem hoặc nhận một viên kẹo đồng</p>
        <a href="" class="watch-btn">
            <i class="bx bx-right-arrow"></i>
            <span>Watch movie</span>
        </a>
    </div>
    

</section> 


@foreach( $categories as $category)
<section class="movies container" id="movies">
    <div class="heading">
        <h2 class="heading-title">
            {{$category->name}}
        </h2>
    </div>
    <div class="movies-content">
        @foreach($category->movie->take(8) as $mov )
        <div class="movie-box" onclick="redirectToWatch('{{ route('watch', $mov->slug) }}')">           
            <img src="{{$mov->thumb}}" alt="" class="movie-box-img">
            <div class="box-text">
                <h2 class="movie-title">{{$mov->name}}</h2>
                @if(isset($mov->genres))
                @foreach($mov->genres as $genre)
    <span class="movie-type">{{ $genre->name }}</span>
@endforeach
@endif
                <a href="{{route('watch', $mov->slug)}}" class="watch-btn play-btn">
                    <i class="bx bx-right-arrow"></i>
                </a>
            </div>
        </div>
        @endforeach
    </div>
    </div>
</section>   --}}
{{-- @endforeach --}}


    

  

   

    @foreach($category_home as $category)
    <!-- Start Product Default Slider Section -->
    @if($category->name == 'TV Show')
     <!-- Start Banner Section -->
     <div class="banner-section section-top-gap-100 section-fluid">
        <div class="banner-wrapper">
            <div class="container-fluid">
                <div class="row mb-n6">
                   
                  
                    <div class="col-lg-6 col-12 mb-6">
                        <!-- Start Banner Single Item -->
                        <div class="banner-single-item banner-style-1 banner-animation img-responsive"
                            data-aos="fade-up" data-aos-delay="0">
                            <div class="image">
                                <img src="{{$category->movies[0]->thumb}}" alt="">
                            </div>
                            <div class="action-link">
                                <div class="action-link-left">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddcart">{{$category->movies[0]->name}}</a>
                                </div>
                                
                            </div>
                        </div>
                        <!-- End Banner Single Item -->
                    </div>
                    
                    <div class="col-lg-6 col-12 mb-6">
                        <div class="row mb-n6">
                            <!-- Start Banner Single Item -->
                            @foreach($category->movies->take(5) as $key => $movie)
                            @if($key != 0)
                            <div class="col-lg-6 col-sm-6 mb-6">
                                <div class="banner-single-item banner-style-2 banner-animation">
                                    <div class="image">
                                        <img src="{{$movie->thumb}}" alt="" style="height: 372.17px" class="img-fluid img-responsive"> <!-- Bootstrap class img-fluid for responsiveness -->
                                    </div>
                                    <div class="action-link">
                                        <div class="action-link-left">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddcart">{{$movie->name}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    
                  
                </div>

            </div>
        </div>
    </div>
    <!-- End Banner Section -->
    @else
    <div class="product-default-slider-section section-top-gap-100 section-fluid">
        <!-- Start Section Content Text Area -->
        <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-content-gap">
                            <div class="secton-content">
                                <h3 class="section-title">{{$category->name}}</h3>
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
                                    @foreach($category->movies as $movie)
<!-- Start Product Default Single Item -->
<div class="product-default-single-item product-color--golden swiper-slide">
    <div class="image-box">
        <a href="{{route('info', $movie->slug)}}" class="image-link">
            <div class="image-container">
                <img src="{{$movie->thumb}}" style="height: 400px" class="img-responsive" alt="">
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
            <h6 class="title"><a href="product-details-default.html">{{$movie->name}}</a></h6>
        </div>
    </div>
</div>
<!-- End Product Default Single Item -->
@endforeach

                                    <!-- End Product Default Single Item -->
                                    <!-- Start Product Default Single Item -->
                                 
                                </div>
                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Default Slider Section -->
    @endif
    @endforeach
    <!-- Start Banner Section -->
  

    
@endsection
   