@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Quản lý phim</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(!isset($movie))
                   {!! Form::open(['method' => 'POST','route' => 'movie.store', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
                    @else
                   {!! Form::open(['method' => 'PUT','route' => ['movie.update', $movie->id], 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
                   @endif
                   <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                    {!! Form::label('title', 'Title') !!}
                    {!! Form::text('title', isset($movie) ? $movie->title: '', ['class' => 'form-control', 'placeholder' => 'Nhập vào dữ liệu...', 'id' => 'slug', 'onkeyup' => 'ChangeToSlug()']) !!}
                    <small class="text-danger">{{ $errors->first('inputname') }}</small>
                    </div>
                   <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                    {!! Form::label('slug', 'Slug') !!}
                    {!! Form::text('slug', isset($movie) ? $movie->slug: '', ['class' => 'form-control', 'placeholder' => 'Nhập vào dữ liệu...', 'id' => 'convert_slug']) !!}
                    <small class="text-danger">{{ $errors->first('inputname') }}</small>
                    </div>
                    <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::textarea('description', isset($movie) ? $movie->description: '', ['style'=> 'resize:none','class' => 'form-control', 'placeholder' => 'Nhập vào dữ liệu...', 'id' => 'description']) !!}
                    <small class="text-danger">{{ $errors->first('inputname') }}</small>
                    </div>
                    <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                    {!! Form::label('status', 'Active') !!}
                    {!! Form::select('status', ['1' => 'Hiển thị', '0' => 'Không hiển thị'], isset($movie) ? $movie->status: null, ['id' => 'inputname', 'class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('inputname') }}</small>
                    </div>
                    <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                    {!! Form::label('Category', 'Category') !!}
                    {!! Form::select('category_id', $category , isset($movie) ? $movie->category_id: null, ['id' => 'inputname', 'class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('inputname') }}</small>
                    </div>
                    <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                    {!! Form::label('Genre', 'Genre') !!}
                    {!! Form::select('genre_id', $genre , isset($movie) ? $movie->genre_id: null, ['id' => 'inputname', 'class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('inputname') }}</small>
                    </div>
                    <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                    {!! Form::label('Country', 'Country') !!}
                    {!! Form::select('country_id', $country , isset($movie) ? $movie->country_id: null, ['id' => 'inputname', 'class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('inputname') }}</small>
                    </div>
                    <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                    {!! Form::label('Image', 'Image') !!}
                    {!! Form::file('image', ['class' => 'form-control']) !!}
                    @if(isset($movie))
                    <img  width="20%" src="{{asset('uploads/movie/'.$movie->image)}}" alt="image">
                    @endif
                    <small class="text-danger">{{ $errors->first('image') }}</small>
                    </div>
                    @if (!isset($movie))
                    {!! Form::submit('Nhập dữ liệu', ['class' => 'btn btn-info pull-right']) !!}
                    @else
                    {!! Form::submit('Cập nhật dữ liệu', ['class' => 'btn btn-info pull-right']) !!}
                    @endif
                    {!! Form::close() !!}
                </div>
            </div>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Description</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Active/Inactive</th>
                    <th scope="col">Category</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Country</th>
                    <th scope="col">Manage</th>
                  </tr>
                </thead>
                <tbody id="order_position" data-position>
                    @foreach($list as $key => $movie)
                  <tr class="order">
                    <th scope="row">{{$key}}</th>
                    <td><img src="{{asset('uploads/movie/'.$movie->image)}}" width="100"></td>
                    <td>{{$movie->image}}</td>
                    <td>{{$movie->description}}</td>
                    <td>{{$movie->slug}}</td>
                    <td>{{$movie->status}}</td>
                    <td>{{$movie->category->title}}</td>
                    <td>{{$movie->genre->title}}</td>
                    <td>{{$movie->country->title}}</td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['movie.destroy',$movie->id], 'class' => 'form-horizontal']) !!}
                        
                        {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                        <a href="{{route('movie.edit', $movie->id)}}" class="btn btn-warning">Sửa</a>
                    </td>
                  </tr>
                 @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
