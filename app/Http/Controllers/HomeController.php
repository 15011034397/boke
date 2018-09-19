<?php

namespace App\Http\Controllers;

use App\Article;
use App\Cate;
use App\Link;
use App\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
    	$cates=Cate::all();
    	$settings=Setting::first();
    	$articles=Article::orderBy('id','desc')->take(10)->paginate(5);
    	$links=Link::orderBy('order','desc')->get();

    	return view('home.index',compact('cates','settings','articles','links'));
    }
}
