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
                            Genre 
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                           @if(isset($genreToEdit))
                           <form action="{{ route('genre.update', [ $genreToEdit->id]) }}" method="POST">
                            @method('PUT')
                                   @else
                                        <form action="{{ route('genre.store') }}" method="post">
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
                                                                    value="{{ isset($genreToEdit) ? $genreToEdit->title : ''}}">
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
                                                                    value="{{ isset($genreToEdit) ? $genreToEdit->slug : ''}}">

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
                                                                    value="{{ isset($genreToEdit) ? $genreToEdit->description : ''}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-lg-4 col-form-label"
                                                                for="val-description">Status<span
                                                                    class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                            <select class="form-select" aria-label="Default select example" name="status">
                                                                <option {{ isset($genreToEdit) && $genreToEdit->status == 1 ? 'selected' : ''}} value="1">Active</option>
                                                                <option {{ isset($genreToEdit) && $genreToEdit->status == 0 ? 'selected' : ''}} value="0">Inactive</option>
                                                              </select>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-8 ml-auto">
                                                        <button type="submit" class="btn btn-primary"
                                                            id="submitCountry">
                                                            {{isset($genreToEdit) ? 'Update' : 'Add'}}
                                                        </button>
                                                      @if(isset($genreToEdit))
                                                            <a class="btn btn-secondary"
                                                                href="{{ route('genre.index') }}">Back</a>
                                                        @endif
                                                    </div>
                                                </div>
                                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th style="width:80px;"><strong>#</strong></th>
                                        <th><strong>TITLE</strong></th>
                                        <th><strong>SLUG</strong></th>
                                        <th><strong>DESCRIPTION</strong></th>
                                        <th><strong>STATUS</strong></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="genreTableBody">
                                  @foreach($listGenres as $index => $genre)
                                        <tr>
                                            <td><strong>
                                                   {{$index + 1}}
                                                </strong></td>
                                            <td>
                                                {{$genre->title}}
                                            </td>
                                            <td>
                                                {{$genre->slug}}
                                            </td>
                                            <td>
                                                {{$genre->description}}
                                            </td>
                                            <td>
                                                {{($genre->status == 1) ? 'Active' : 'Inactive'}}
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
                                                            href="{{route('genre.edit', ['genre' => $genre->id])}}">Edit</a>

                                                        <form method="post" action="{{route('genre.destroy', ['genre' => $genre->id])}}">
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
            </div>
        </div>
    </div>
</div>
@endsection
