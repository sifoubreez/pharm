@extends('layouts.app')

@section('content')
     <h1>create</h1>
     {!! Form::open(['action'=>'PostsController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
        <div class="form-group">
              {{Form::label('titel','Title')}}
              {{Form::text('titel','',['class'=>'form-control','placeholder'=>''])}}
        </div>
        <div class="form-group">
              {{Form::label('body','body')}}
              {{Form::textarea('body','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>''])}}
        </div>
        <div class="form-group">
              {{Form::file('cover_image')}}
        </div>      
        {{Form::submit('submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection