@extends('client.layouts.layout')
@section('content')
<main>
<section class="movies container" id="movies">
    <div class="heading">
        <h2 class="heading-title">Lọc phim</h2>
    </div>
    <div class="movies-content">
        @foreach($movieFilterList as $movie )
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

<div class="next-page">
   <a href="" class="next-btn">Next-page</a>
</div>
</main>
@endsection