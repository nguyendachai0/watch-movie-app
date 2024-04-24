@extends('client.layouts.layout')
@section('content')
<main>
<section class="movies container" id="movies">
    <div class="heading">
        <form action="{{ route('filterMovie') }}" method="GET">
        <h2 class="heading-title">Lọc phim</h2>
        <select name="category_id">
            <option value="">--Danh mục--</option>
            @foreach($categories as $category)
            <option {{(isset($_GET['category_id']) && $_GET['category_id'] == $category->id) ? 'selected' : ''}} value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
        </select>
        <select name="genre_id">
            <option value="">--Thể loại--</option>
            @foreach($genres as $genre)
            <option {{(isset($_GET['genre_id']) && $_GET['genre_id'] == $category->id) ? 'selected' : ''}} value="{{$genre->id}}">{{$genre->title}}</option>
            @endforeach
        </select>
        <select name="country_id">
            <option value="">--Quốc gia--</option>
            @foreach($countries as $country)
            <option {{(isset($_GET['country_id']) && $_GET['country_id'] == $category->id) ? 'selected' : ''}} value="{{$country->id}}">{{$country->title}}</option>
            @endforeach
        </select>
        <button>Lọc</button>
    </form>
    </div>
    <div class="movies-content">
        @foreach($movieFilterList as $mov )
        <div class="movie-box" onclick="redirectToWatch('{{ route('watch', $mov->slug) }}')">           
            <img src="{{$mov->image}}" alt="" class="movie-box-img">
            <div class="box-text">
                <h2 class="movie-title">{{$mov->title}}</h2>
                @foreach($mov->genres as $genre)
                <span class="movie-type">{{$genre->title}}</span>
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
   <a href="" class="next-btn">Next-page</a>
</div>
</main>
@endsection