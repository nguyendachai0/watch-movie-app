<!-- movie-info.blade.php -->

@extends('client.layouts.layout')

@section('content')

<div class="about-top" style="background-image: url('{{$movie->poster}}'); background-repeat: no-repeat; background-size: cover; min-height: 500px;">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="about-img aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">
                    <div class="img-responsive">
                        <img src="{{ asset('storage/'.$movie->poster) }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-light mt-10" style="z-index: 1;">
                <div class="content aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="title">{{$movie->name}}</h3>
                    <h6 class="semi-title">Thể loại: {{ $movie->genres->pluck('name')->implode(', ')}}</h6>
                    <h6 class="semi-title">Quốc gia: @foreach($movie->countries as $country)
                        {{ $country->name }}
                    @endforeach</h6>
                    
                    <p>{{strip_tags($movie->content)}}</p>
                </div>
                <!-- HTML !-->
<a  href="{{route('watch', $movie->slug)}}"class="button-63" role="button">Xem phim</a>
            </div>
        </div>
    </div>
</div>



    <!-- Separate div for trailer -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" style="min-height: 500px" src="{{ $movie->link_trailer }}" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
   
@endsection
