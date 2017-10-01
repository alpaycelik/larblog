<?php

namespace App\Http\Controllers;

use App\Ayarlar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void

    public function __construct(){
         $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response

    public function index(){
        return view('home');
    }*/


    public function __construct(){
        $ayarlar = Ayarlar::where('id', 1)->first();
        View::share('ayarlar', $ayarlar);
    }
}
