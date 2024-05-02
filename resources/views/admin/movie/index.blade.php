@extends('admin.layouts.admin')

@section('content')

<div class="content-body">
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            Movie 
                        </h4>
                        <form action="{{ route('update.movies') }}" method="POST">
                            @csrf
                        <button type="submit" class="btn btn-info" id="updateMoviesButton">Update Movies with API</button>
                        </form>
                    </div>
                    {{-- <div class="card-body">
                        <div class="form-validation">
                           @if(isset($movieToEdit))
                           <form action="{{ route('movie.update', [ $movieToEdit->id]) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                                   @else
                                        <form action="{{ route('movie.store') }}" method="post" enctype="multipart/form-data">
                                           @endif
                                           @csrf
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="form-group row">
                                                            <label class="col-lg-4 col-form-label" for="val-title">Title
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control" id="val-title"
                                                                    name="title" placeholder="Enter a title" onkeyup="ChangeToSlug()"
                                                                    value="{{ isset($movieToEdit) ? $movieToEdit->title : ''}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-lg-4 col-form-label"
                                                                for="val-slug">Slug<span
                                                                    class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control"
                                                                    id="val-slug" name="slug"
                                                                    placeholder=""
                                                                    value="{{ isset($movieToEdit) ? $movieToEdit->slug : ''}}">

                                                            </div>

                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-lg-4 col-form-label"
                                                                for="val-description">Description<span
                                                                    class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control"
                                                                    id="val-description" name="description"
                                                                    placeholder="Enter Description"
                                                                    value="{{ isset($movieToEdit) ? $movieToEdit->description : ''}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-lg-4 col-form-label"
                                                                for="val-description">Actor<span
                                                                    class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control"
                                                                    id="val-description" name="actor"
                                                                    placeholder="Enter List of actor"
                                                                    value="{{ isset($movieToEdit) ? $movieToEdit->actor : ''}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-lg-4 col-form-label"
                                                                for="val-description">Link Stream<span
                                                                    class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control"
                                                                    id="val-description" name="link_stream"
                                                                    placeholder="Enter link to watch"
                                                                    value="{{ isset($movieToEdit) ? $movieToEdit->link_stream : ''}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-lg-4 col-form-label"
                                                                for="val-description">Link Trailer<span
                                                                    class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control"
                                                                    id="val-description" name="link_trailer"
                                                                    placeholder="Enter link for trailer"
                                                                    value="{{ isset($movieToEdit) ? $movieToEdit->link_trailer : ''}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-lg-4 col-form-label"
                                                                for="val-description">Status<span
                                                                    class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                            <select class="form-select" aria-label="Default select example" name="status">
                                                                <option {{ isset($movieToEdit) && $movieToEdit->status == 1 ? 'selected' : ''}} value="1">Active</option>
                                                                <option {{ isset($movieToEdit) && $movieToEdit->status == 0 ? 'selected' : ''}} value="0">Inactive</option>
                                                                <option {{ isset($movieToEdit) && $movieToEdit->status == 2 ? 'selected' : ''}} value="2">Active & Popular</option>
                                                              </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-lg-4 col-form-label"
                                                                for="val-description">Choose Category<span
                                                                    class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                            <select class="form-select" aria-label="Default select example" name="category_id">
                                                                @foreach($listCategoriesToChoose as $key => $val)
                                                                <option {{ isset($movieToEdit) && $movieToEdit->category_id == $key ? 'selected' : ''}} value="{{$key}}">{{ $val }}</option>
                                                                @endforeach
                                                            </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-lg-4 col-form-label"
                                                                for="val-description">Choose Country<span
                                                                    class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                            <select class="form-select" aria-label="Default select example" name="country_id">
                                                                @foreach($listCountriesToChoose as $key => $val)
                                                                <option {{ isset($movieToEdit) && $movieToEdit->country_id == $key ? 'selected' : ''}} value="{{$key}}">{{ $val }}</option>
                                                                @endforeach
                                                              </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-lg-4 col-form-label"
                                                                for="val-description">Choose Genre<span
                                                                    class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                            <select class="form-select" aria-label="Default select example" name="genre_id">
                                                                @foreach($listGenresToChoose as $key => $val)
                                                                <option {{ isset($movieToEdit) && $movieToEdit->genre_id == $key ? 'selected' : ''}} value="{{$key}}">{{ $val }}</option>
                                                                @endforeach                                                       
                                                                   </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-lg-4 col-form-label"
                                                                for="val-description">Choose Images<span
                                                                    class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                    <input class="form-control" type="file" id="formFile" name="image">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-lg-4 col-form-label"
                                                                for="val-description">Choose Poster<span
                                                                    class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                    <input class="form-control" type="file" id="formFile" name="poster">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-8 ml-auto">
                                                        <button type="submit" class="btn btn-primary"
                                                            id="submitCountry">
                                                            {{isset($movieToEdit) ? 'Update' : 'Add'}}
                                                        </button>
                                                      @if(isset($movieToEdit))
                                                            <a class="btn btn-secondary"
                                                                href="{{ route('movie.index') }}">Back</a>
                                                        @endif
                                                    </div>
                                                </div>
                                        </form>
                        </div>
                    </div> --}}
                </div>
            </div>
            {{-- <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th style="width:80px;"><strong>#</strong></th>
                                        <th><strong>TITLE</strong></th>
                                        <th><strong>IMAGE</strong></th>
                                        <th><strong>POSTER</strong></th>
                                        <th><strong>DESCRIPTION</strong></th>
                                        <th><strong>Actor list</strong></th>
                                        <th><strong>STATUS</strong></th>
                                        <th><strong>CATEGORY</strong></th>
                                        <th><strong>COUNTRY</strong></th>
                                        <th><strong>GENRE</strong></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="movieTableBody">
                                  @foreach($listMovies as $index => $movie)
                                        <tr>
                                            <td><strong>
                                                   {{$index + 1}}
                                                </strong></td>
                                            <td>
                                                {{$movie->title}}
                                            </td>
                                            <td>
                                                <img src="{{asset('uploads/movie/'.$movie->image)}}" width="100">
                                            </td>
                                            <td>
                                                <img src="{{asset('uploads/movie/poster/'.$movie->poster)}}" width="100">
                                            </td>                                 
                                            <td>
                                                {{$movie->description}}
                                            </td>
                                            <td>
                                                {{$movie->actor}}
                                            </td>
                                            <td>
                                                {{($movie->status == 1) ? 'Active' : 'Inactive'}}
                                            </td>
                                            <td>
                                                {{$movie->category->title}}
                                            </td>
                                            <td>
                                                @foreach($movie->countries as $country)
                                                <span class="movie-type">{{ $country->title }}</span>
                                            @endforeach
                                            </td>
                                            <td>
                                                @foreach($movie->genres as $genre)
                                                <span class="movie-type">{{ $genre->title }}</span>
                                            @endforeach
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-success light sharp"
                                                        data-toggle="dropdown">
                                                        <svg width="20px" height="20px" viewBox="0 0 24 24"
                                                            version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                                <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                                <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                            </g>
                                                        </svg>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item"
                                                            href="{{route('movie.edit', ['movie' => $movie->id])}}">Edit</a>

                                                        <form method="post" action="{{route('movie.destroy', ['movie' => $movie->id])}}">
                                                            @method('DELETE')
                                                            @csrf
                                                        <button class="dropdown-item"
                                                           >Delete</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                       @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection
