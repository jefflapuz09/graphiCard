<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;
use App\ServiceType;
use App\ServiceCategory;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth',['except' =>['index']]);
    }
     
    public function index()
    {
        $post = DB::table('posts')
                ->join('service_types','posts.typeId','=','service_types.id')
                ->join('service_categories','posts.categoryId','=','service_categories.id')
                ->select('posts.*','service_types.name as type', 'service_categories.name as category')
                ->orderBy('posts.id','Asc')
                ->where('posts.isActive',1)
                ->get();
        return view('Post.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = ServiceCategory::where('isActive',1)->get();
        $type = ServiceType::Where('isActive',1)->get();
        return view('Post.create',compact('cat','type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('image');
        $pic = "";
        if($file == '' || $file == null){
            $pic = "img/grey-pattern.png";
        }else{
            $date = date("Ymdhis");
            $extension = $request->file('image')->getClientOriginalExtension();
            $pic = "img/".$date.'.'.$extension;
            $request->file('image')->move("img",$pic);    
            // $request->file('photo')->move(public_path("/uploads"), $newfilename);
        }
        $post = Post::create([
            'categoryId' => ($request->categoryId),
            'typeId' => ($request->typeId),
            'details' => ($request->details),
            'image' => $pic,
            'isDraft' => 0,
        ]);
        return redirect('/Post');
    }

  

    public function publish($id)
    {
      
        Post::find($id)->update(['isDraft' => 1]);
        return redirect('/Post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('Post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $cat = ServiceCategory::where('isActive',1)->get();
        $type = ServiceType::Where('isActive',1)->get();
        return view('Post.draft',compact('cat','type','post'));
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
        $file = $request->file('image');
        $pic = "";
        if($file == '' || $file == null){
            $pic = "img/grey-pattern.png";
        }else{
            $date = date("Ymdhis");
            $extension = $request->file('image')->getClientOriginalExtension();
            $pic = "img/".$date.'.'.$extension;
            $request->file('image')->move("img",$pic);    
            // $request->file('photo')->move(public_path("/uploads"), $newfilename);
        }
        $post = Post::find($id)->update([
            'categoryId' => ($request->categoryId),
            'typeId' => ($request->typeId),
            'details' => ($request->details),
            'image' => $pic,
        ]);
        return redirect('/Post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->update(['isActive' => 0]);
        return redirect('/Post');
    }

    public function soft()
    {
        $post = DB::table('posts')
                ->join('service_types','posts.typeId','=','service_types.id')
                ->join('service_categories','posts.categoryId','=','service_categories.id')
                ->select('posts.*','service_types.name as type', 'service_categories.name as category')
                ->orderBy('posts.id','Asc')
                ->where('posts.isActive',0)
                ->get();
        return view('Post.soft',compact('post'));
    }

    public function reactivate($id)
    {
        Post::find($id)->update(['isActive' => 1]);
        return redirect('/Post');
    }
}
