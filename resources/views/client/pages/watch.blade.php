@extends('client.layouts.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center text-primary">{{ $movie->name }}</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <iframe id="movieIframe" name="movieIframe" class="embed-responsive-item" style="min-height: 100vh" src="{{ $movie->link_stream }}" allowfullscreen loading="lazy">
            </iframe>
        </div>
       
    </div>

    <div class="row mt-3">
        <div class="col-md-12 text-center">
            <a href="{{$movie->link_stream}}"  target="movieIframe" class="btn btn-primary mr-2">Sub Link 1</a>
            <a href="{{$movie->link_m3u8}}"   target="movieIframe" class="btn btn-secondary mr-2">Sub Link 2</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12 text-center">
            @if(isset($sumEpisode))
          
                @for($i = 1; $i <= $sumEpisode; $i++)  
              @if($i % 23 == 1)
              <div class="row gap">
                @endif
                <div class="col-auto p-1">
                    <a href="{{ route('watch', $movie->slug .'/'. $i ) }}" class="btn btn-primary">{{ $i }}</a>
                </div>
                    @if($i % 23 == 0 || $i == $sumEpisode)
                </div>
                    @endif
                        @endfor
            @endif
        </div>
    </div>
</div>



@endsection
