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
        $postcat = ServiceCategory::with('Post')->get();
        $comp = CompanyInfo::find(1);
        $model2 = Post::where('isActive',1)->where('isDraft',1)->get();
      
        return view('Home.index', compact('post','model2','item','postcat','comp'));
    }

    public function prodDescription($id,$desc)
    {
        
        return view('Home.prodDescription',compact('id','desc'));
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
