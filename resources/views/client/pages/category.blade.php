@extends('client.layouts.layout')
@section('content')
<main>
<section class="movies container" id="movies">
    <div class="heading">
        <h2 class="heading-title">{{$cate_slug->name}}</h2>
    </div>
    <div class="movies-content">
        @foreach($movieWithSlug as $mov )
        <div class="movie-box" onclick="redirectToWatch('{{ route('watch', $mov->slug) }}')">           
            <img src="{{$mov->thumb}}" loading="lazy" alt="" class="movie-box-img">
            <div class="box-text">
                <h2 class="movie-title">{{$mov->name}}</h2>
                @foreach($mov->genres as $genre)
                <span class="movie-type">{{$genre->name}}</span>
                @endforeach
                <a href="{{route('watch', $mov->slug)}}" class="watch-btn play-btn">
                    <i class="bx bx-right-arrow"></i>
                </a>
            </div>
        </div>
        @endforeach
    </div>
    </div>
</section>  


<div class="next-page">
    {{$movieWithSlug->links()}}
</div>
</main>
@endsection