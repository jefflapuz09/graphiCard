<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function prodDescription($id,$desc)
    {
        
        return view('Home.prodDescription',compact('id','desc'));
    }

    public function getLogout()
    {
         Auth::logout();
         return Redirect('/');
    }
}
