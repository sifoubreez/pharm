@extends('layouts.app')

@section('content')
     <h1>posts</h1>
     @if(count($Posts)>0)
       @foreach($Posts as $post)
         <div class ="well">
           <div class="row">
              <div class="col-md-4 col-sm-4">
                 <img style ="width:100%" src="storage/cover_image/{{$post->cover_image}}">
              </div>
              <div class="col-md-8 col-sm-8">
                <h3><a href="/Posts/{{$post->id}}">{{$post->titel}}</a></h3>
              </div>
           </div>
             
         </div>    
       @endforeach
       {{$Posts->links()}};
     @else
      <p>no posts</p>
     @endif
@endsection