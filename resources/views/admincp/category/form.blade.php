@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Quản lý danh mục</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        @if(!isset($category))
                   {!! Form::open(['method' => 'POST','route' => 'category.store', 'class' => 'form-horizontal']) !!}
                        @else
                   {!! Form::open(['method' => 'PUT','route' => ['category.update', $category->id], 'class' => 'form-horizontal']) !!}
                   @endif
                   <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                    {!! Form::label('title', 'Title') !!}
                    {!! Form::text('title', isset($category) ? $category->title: '', ['class' => 'form-control', 'placeholder' => 'Nhập vào dữ liệu...', 'id' => 'slug', 'onkeyup' => 'ChangeToSlug()']) !!}
                    <small class="text-danger">{{ $errors->first('inputname') }}</small>
                    </div>
                    <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                        {!! Form::label('slug', 'Slug') !!}
                        {!! Form::text('slug', isset($genre) ? $category->slug: '', ['class' => 'form-control', 'placeholder' => 'Nhập vào dữ liệu...', 'id' => 'convert_slug']) !!}
                        <small class="text-danger">{{ $errors->first('inputname') }}</small>
                        </div>
                    <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::textarea('description', isset($category) ? $category->description: '', ['style'=> 'resize:none','class' => 'form-control', 'placeholder' => 'Nhập vào dữ liệu...', 'id' => 'description']) !!}
                    <small class="text-danger">{{ $errors->first('inputname') }}</small>
                    </div>
                    <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                    {!! Form::label('status', 'Active') !!}
                    {!! Form::select('status', ['1' => 'Hiển thị', '0' => 'Không hiển thị'], isset($category) ? $category->status: null, ['id' => 'inputname', 'class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('inputname') }}</small>
                    </div>
                   
                    @if (!isset($category))
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
                    <th scope="col">Description</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Active/Inactive</th>
                    <th scope="col">Manage</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($list as $key => $cate)
                  <tr id="sort_order" data-position="{{$cate->position}}">
                    <th scope="row">{{$key}}</th>
                    <td>{{$cate->title}}</td>
                    <td>{{$cate->description}}</td>
                    <td>{{$cate->slug}}</td>
                    <td>{{$cate->status}}</td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['category.destroy',$cate->id], 'class' => 'form-horizontal']) !!}
                        
                        {!! Form::submit('Xóa', ['class' => 'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                        <a href="{{route('category.edit', $cate->id)}}" class="btn btn-warning">Sửa</a>
                    </td>
                  </tr>
                 @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
