<?php

namespace App\Http\Controllers;

use App\Fellowship;
use App\News;
use App\Prayer_request;
use App\Sermon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $prayer_requests=Prayer_request::all();
        $news=News::all();
        $sermons=Sermon::all();
        $fellowships=Fellowship::all();

        return view('home',['prayer_requests'=>$prayer_requests,'news'=>$news,'sermons'=>$sermons,'fellowships'=>$fellowships]);
    }
}
