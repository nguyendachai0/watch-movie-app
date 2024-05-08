<!-- movie-info.blade.php -->

@extends('client.layouts.layout')

@section('content')
{{-- <div class="movie-info" style="background-image: url('{{ $movie->poster }}');">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <h2>{{ $movie->title }}</h2>
                        <p><strong>Thể loại:</strong> {{ $movie->genres->pluck('name')->implode(', ') }}</p>
                        <p><strong>Quốc gia:</strong> 
                            @foreach($movie->countries as $country)
                                {{ $country->name }}
                            @endforeach
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="about-top" style="background-image: url('{{$movie->poster}}'); background-repeat: no-repeat; background-size: cover; min-height: 500px;">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="about-img aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">
                    <div class="img-responsive">
                        {{-- <img src="{{ $movie->poster }}" alt=""> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-light mt-10" style="z-index: 1;">
                <div class="content aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="title">{{$movie->name}}</h3>
                    <h5 class="semi-title">{{ $movie->genres->pluck('name')->implode(', ')}}</h5>
                    <h5 class="semi-title">@foreach($movie->countries as $country)
                        {{ $country->name }}
                    @endforeach</h5>

                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
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
