<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;
class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('titel','asc')->paginate(10);
        //$posts = Post::all()->paginate(1);
        return view('Posts.index')->with('Posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('Posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'titel'=>'required',
            'body'=>'required',
            'cover_image'=>'image|nullable|max:1999'
        ]);
        if($request->hasFile('cover_image')){
          $filenamewithext=$request->file('cover_image')->getClientOriginalName();
          $filename=pathinfo($filenamewithext,PATHINFO_FILENAME);
          $extension=$request->file('cover_image')->getClientOriginalExtension();
          $fileNmaeToStore=$filename.'_'.time().'.'.$extension;
          $path=$request->file('cover_image')->storeAs('public/cover_image',$fileNmaeToStore);
        }else{
            $fileNmaeToStore='noimage.jpg';
        }
        $post=new Post;
        $post->titel=$request->input('titel');
        $post->body=$request->input('body');
        $post->cover_image=$fileNmaeToStore;
        $post->save();
        return redirect('/Posts')->with('success','Post created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::find($id);
        return view('Posts.show')->with('Posts',$posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::find($id);
        return view('Posts.edit')->with('Posts',$posts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'titel'=>'required',
            'body'=>'required'
        ]);
        $post= Post::find($id);
        $post->titel=$request->input('titel');
        $post->body=$request->input('body');
        $post->save();
        return redirect('/Posts')->with('success','Post update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();
        return redirect('/Posts')->with('success','Post removed');
    }
}
