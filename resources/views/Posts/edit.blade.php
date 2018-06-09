@extends('layouts.app')

@section('content')
     <h1>edit post</h1>
     {!! Form::open(['action'=>['PostsController@update',$Posts->id],'method'=>'POST']) !!}
        <div class="form-group">
              {{Form::label('titel','Title')}}
              {{Form::text('titel',$Posts->titel,['class'=>'form-control','placeholder'=>''])}}
        </div>
        <div class="form-group">
              {{Form::label('body','body')}}
              {{Form::textarea('body',$Posts->body,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>''])}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection