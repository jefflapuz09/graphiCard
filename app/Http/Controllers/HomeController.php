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
        $post =DB::table('service_types')
            ->join('service_categories', 'service_types.categoryId', '=', 'service_categories.id')
            ->select('service_types.*', 'service_categories.name as category')
            ->where('service_types.isActive',1)
            ->get();
        return view('home', compact('post'));
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
