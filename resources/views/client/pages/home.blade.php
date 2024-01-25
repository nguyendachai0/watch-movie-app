@extends('client.layouts.layout')
@section('content')
<section class="home container" id="home">
    <img src="img/home-background.png" alt="" class="home-img">
    <div class="home-text">
        <h1 class="home-title"> Hitman's Wife's Bodyguard </h1>
        <p> Realeasing in 10 April</p>
        <a href="#" class="watch-btn">
            <i class="bx bx-right-arrow"></i>
            <span>Watch the trailer</span>
        </a>
    </div>

</section>

<section class="popular container" id="popular">
    <div class="heading">
        <h2 class="heading-title">Phim phổ biến</h2>
        <div class="swiper-btn">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>


    <div class="popular-content swiper">
        <div class="swiper-wrapper">
            @foreach($popularMovies as $movie)
            <div class="swiper-slide">
                <div class="movie-box" onclick="redirectToWatch('{{ route('watch', $movie->slug) }}')">
                    <img src="{{asset('uploads/movie/'.$movie->image)}}" alt="" class="movie-box-img">
                    <div class="box-text">
                        <h2 class="movie-title">{{$movie->title}}</h2>
                        <span class="movie-type">{{$movie->genre->title}}</span>
                        <a href="{{route('watch', $movie->slug)}}" class="watch-btn play-btn">
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
        @foreach($category->movie->take(12) as $movie )
        <div class="movie-box" onclick="redirectToWatch('{{ route('watch', $movie->slug) }}')">           
            <img src="{{asset('uploads/movie/'.$movie->image)}}" alt="" class="movie-box-img">
            <div class="box-text">
                <h2 class="movie-title">{{$movie->title}}</h2>
                <span class="movie-type">{{$movie->genre->title}}</span>
                <a href="{{route('watch', $movie->slug)}}" class="watch-btn play-btn">
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
   