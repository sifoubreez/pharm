@extends('layouts.app')

@section('content')
     <a href = "/Posts" class="btn btn-default">GO BACK</a>
     <h3>{{$Posts->titel}}</h3>
     <img style ="width:5%" src="storage/cover_image/{{$Posts->cover_image}}">
     <div>
         {!!$Posts->body!!}
     </div>    
     <hr>
     @if(!Auth::guest())
     <a href="/Posts/{{$Posts->id}}/edit" class="btn btn-default">Edit</a>
     {!!Form::open(['action'=>['PostsController@destroy',$Posts->id],'method','POST','class'=>'pull-right'])!!}
         {{Form::hidden('_method','DELETE')}}
         {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
     {!!Form::close()!!}
    @endif
@endsection