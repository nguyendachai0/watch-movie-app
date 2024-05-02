@extends('client.layouts.layout')
 @section('content')
<section class="home container" id="home">
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
</section>  
@endforeach
@endsection
   