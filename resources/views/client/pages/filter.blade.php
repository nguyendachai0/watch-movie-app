@extends('client.layouts.layout')
@section('content')
<div class="product-default-slider-section section-top-gap-100 section-fluid">
    <!-- Start Section Content Text Area -->
    <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-content-gap">
                        <div class="section-content">
                            <h3 class="section-title">Lọc Phim</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="section-content-gap">
                        <div class="section-content">
                            <form action="{{ route('filterMovie') }}" method="GET" class="d-flex justify-content-between">
                                <div class="form-group col-3">
                                    <select name="category_id" class="form-control">
                                        <option value="">--Danh mục--</option>
                                        @foreach($categories as $category)
                                            <option {{(isset($_GET['category_id']) && $_GET['category_id'] == $category->id) ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-3">
                                    <select name="genre_id" class="form-control">
                                        <option value="">--Thể loại--</option>
                                        @foreach($genres as $genre)
                                            <option {{(isset($_GET['genre_id']) && $_GET['genre_id'] == $genre->id) ? 'selected' : ''}} value="{{$genre->id}}">{{$genre->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-3">
                                    <select name="country_id" class="form-control">
                                        <option value="">--Quốc gia--</option>
                                        @foreach($countries as $country)
                                            <option {{(isset($_GET['country_id']) && $_GET['country_id'] == $country->id) ? 'selected' : ''}} value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Lọc</button>
                            </form>
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
                                @foreach($movieFilterList as $movie)
<!-- Start Product Default Single Item -->
<div class="product-default-single-item product-color--golden swiper-slide">
<div class="image-box">
    <a href="{{route('info', $movie->slug)}}" class="image-link">
        <div class="image-container">
            {{-- <img src="{{$movie->thumb}}" style="height: 400px" class="img-responsive" alt=""> --}}
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
<div class="d-flex justify-content-center">
    <div class="next-page">
        {{ $movieFilterList->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>
@endsection

