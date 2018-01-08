<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Advisory;
use App\RatingItem;
use App\Feedback;
use App\Post;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('guest',['except' =>['index']]);
        $this->middleware('App\Http\Middleware\adminMiddleware');
        
    }


    public function index()
    {
        $post =DB::table('inquiries')
        ->select('inquiries.*')
        ->where('inquiries.status',0)
        ->get(); 

        $countRateItem = RatingItem::all();
        $countFeedback = Feedback::where('isPublish',0)->get();
        $countPost = Post::where('isDraft',0)->get();
        $adv =Advisory::where('isActive',1)->first();
        return view('inquiries.dashboard',compact('post','adv','countRateItem','countFeedback','countPost'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
