@extends('client.layouts.layout')
@section('content')
<div class="play-container container">
   <div class="video-container show-video">
       <div class="video-box">
           <iframe id="myvideo" src="{{$movie->link_trailer}}" ></iframe>
           <i class="bx bx-x close-video"></i>
       </div>
   </div>
</div>
<section class="about-movie container">
   <a href="{{route('watch', $movie->slug)}}" class="watch-btn" id="watch-trailer-btn">
      <i class="bx bx-right-arrow"></i>
      <span>Xem full</span>
  </a>
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
