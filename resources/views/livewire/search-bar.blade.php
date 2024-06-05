<div>
<div class="search-box">
    <input type="search" wire:model.live="search" id="search-input" placeholder="Search movie">
</div>
<div class="list-group">
@if(count($searchingMovies) > 0)
    @foreach($searchingMovies as $movie)
    <a href="{{route('info', $movie->slug)}}" class="list-group-item list-group-item-action" id="list-search-movie">{{ $movie->name }}</a>
    @endforeach
@else
<a href="#" class="list-group-item list-group-item-danger" id="list-search-movie"> No movies found.</a>
@endif
</div>

</div>