<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;
class PagesController extends Controller
{
    public function index(){
            
         return view('pages.index');
       
    }
    public function about(){
        return view('pages.about');
    }
    public function services(){
        $data=array(
            'services'=>['antibio','intinf','injection']
        );
        return view('pages.services')->with($data);
    }
}
