@extends('client.layouts.layout')
@section('content')
{{-- <section class="home container" id="home">
    <img src="{{asset('uploads/movie/poster/'. $banner_movie->poster)}}" alt="" class="home-img">
    <div class="home-text">
        <h1 class="home-title"> {{$banner_movie->title}} </h1>
        <p>Xem hoặc nhận một viên kẹo đồng</p>
        <a href="{{route('watch', $banner_movie->slug)}}" class="watch-btn">
            <i class="bx bx-right-arrow"></i>
            <span>Watch movie</span>
        </a>
    </div>

</section> --}}

<section class="popular container" id="popular">
    <div class="heading">
        <h2 id="popular" class="heading-title">Phim phổ biến</h2>
        <div class="swiper-btn">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>


    <div class="popular-content swiper">
        <div class="swiper-wrapper">
            @foreach($popularMovies as $mov)
            <div class="swiper-slide">
                <div class="movie-box" onclick="redirectToWatch('{{ route('watch', $mov->slug) }}')">
                    <img src="{{asset('uploads/movie/'.$mov->image)}}" alt="" class="movie-box-img">
                    <div class="box-text">
                        <h2 class="movie-title">{{$mov->title}}</h2>
                        <span class="movie-type">{{$mov->genre->title}}</span>
                        <a href="{{route('watch', $mov->slug)}}" class="watch-btn play-btn">
                            <i class="bx bx-right-arrow"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

@foreach( $categories as $category)
<section class="movies container" id="movies">
    <div class="heading">
        <h2 class="heading-title">{{$category->title}}</h2>
    </div>
    <div class="movies-content">
        @foreach($category->movie->take(12) as $mov )
        <div class="movie-box" onclick="redirectToWatch('{{ route('watch', $mov->slug) }}')">           
            <img src="{{$mov->image}}" alt="" class="movie-box-img">
            <div class="box-text">
                <h2 class="movie-title">{{$mov->title}}</h2>
                @if(isset($mov->genres))
                @foreach($mov->genres as $genre)
    <span class="movie-type">{{ $genre->title }}</span>
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
</section>  
@endforeach
@endsection
   