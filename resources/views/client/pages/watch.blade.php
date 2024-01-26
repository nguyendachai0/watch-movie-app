@extends('client.layouts.layout')
@section('content')
<div class="play-container container">
   <img src="{{asset('uploads/movie/poster/'.$movie->poster)}}" alt="" class="play-img">
   <div class="play-text">
       <h2 class="play-title">{{$movie->title}}</h2>
       <div class="rating">
           <i class="bx bxs-star"></i>
           <i class="bx bxs-star"></i>
           <i class="bx bxs-star"></i>
           <i class="bx bxs-star"></i>
           <i class="bx bxs-star-half"></i>
       </div>
       <div class="tags">
           <span>{{$movie->genre->title}}</span>
           <span>4K</span>
 </div>
       <a href="{{route('watchTrailer', $movie->slug)}}" class="watch-btn" id="watch-trailer-btn">
           <i class="bx bx-right-arrow"></i>
           <span>Watch the trailer</span>
       </a>
   </div>
   <i class="bx bx-right-arrow play-movie" id="play-movie"></i>
   <div class="video-container">
       <div class="video-box">
           <iframe id="myvideo" src="{{$movie->link_stream}}" ></iframe>
           <i class="bx bx-x close-video"></i>
       </div>
   </div>
</div>
<section class="about-movie container">
   <h2>{{$movie->title}}</h2>
   <p>{{$movie->description}}</p>
   @if(count($castList) != 0)
   <h2 class="cast-heading">Movie Cast</h2>
   <div class="cast">
      @foreach($castList as $cast)
       <div class="cast-box">
           <img src="{{$cast->image}}" alt="{{$cast->name}} image" class="cast-img">
           <span class="cast-title">{{$cast->name}}</span>
       </div>
     @endforeach
   </div>
   @endif
</section>
@endsection
