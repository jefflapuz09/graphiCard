<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Post;
use App\CompanyInfo;
use App\ServiceCategory;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


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
        $item = DB::table('posts')
            ->join('service_types','posts.typeId','=','service_types.id')
            ->select('posts.*','service_types.name as category')
            ->where('posts.isActive',1)
            ->where('posts.isDraft',1)
            ->get();
        $postcat = ServiceCategory::with(['Post' => function($query) {
            $query->where('isDraft', 1)->where('isFeatured',0);}])
            ->where('isActive',1)->get();
        $comp = CompanyInfo::find(1);
        $model2 = Post::where('isActive',1)->where('isDraft',1)->get();
      
        return view('Home.index', compact('post','model2','item','postcat','comp'));
    }

    public function prodDescription($id)
    {
        $post = Post::with('ServiceCategory','ServiceType')->where('id', $id)->first();
        // $post = DB::table('posts as p')
        //         ->join('service_categories as sc','sc.id','=','p.categoryId')
        //         ->join('service_types as st','st.id','=','p.typeId')
        //         ->select('p.*','st.name as type','sc.name as category')
        //         ->where('p.id',$id)
        //         ->first();
        //dd($post);
        //$cat = Post::with('ServiceCategory')->where('categoryId',$catId)->get(); ->where('categoryId',$catId)->get()
        return view('Home.prodDescription',compact('id','post'));
    }

    public function aboutPage()
    {
        
        return view('Home.about');
    }

    public function getLogout()
    {
         Auth::logout();
         return Redirect('/');
    }
}
