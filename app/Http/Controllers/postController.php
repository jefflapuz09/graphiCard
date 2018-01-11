<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;
use App\ServiceType;
use App\ServiceCategory;
use App\ServiceItem;
use Validator;
use Redirect;
use Response;
use Session;

use Illuminate\Validation\Rule;

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
                ->join('service_subcategory','posts.typeId','=','service_subcategory.id')
                ->join('service_categories','posts.categoryId','=','service_categories.id')
                ->join('users as u','u.id','=','posts.userId')
                ->join('service_items','service_items.id','=','posts.itemId')
                ->select('posts.*','service_subcategory.name as type', 'service_categories.name as category','u.name as userName','service_items.name as item')
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
        $rules = [
            'categoryId' => 'required',
            'typeId' => 'required',
            'itemId' => 'required|unique:posts',
            'details' => 'required',
            'image' => 'nullable|mimes:jpeg,png,jpg,svg',
            'isFeatured' => 'nullable'
        ];
        $messages = [
            'unique' => ':attribute already exists.',
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute field must be no longer than :max characters.',
            'regex' => 'The :attribute must not contain special characters.'              
        ];
        $niceNames = [
            'categoryId' => 'Service Category',
            'typeId' => 'Service Type',
            'details' => 'Details',
            'image' => 'Image',
            'itemId' => 'Service Item'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        $validator->setAttributeNames($niceNames); 
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else{
            $feat = $request->isFeatured;
            if($feat == null || $feat == '') {
                $feat = 1;
            }
            $checkFeatured = Post::with('ServiceType')
                ->where('isActive',1)
                ->where('isDraft', 1)
                ->where('isFeatured', 0)
                ->where('typeId', $request->typeId)
                ->get();

              
            if(count($checkFeatured) >= 3 && $feat == 0)
            {
            return Redirect::back()->withError('It seems there are already 3 featured published post on that certain item.');
            }
            else
            {   
                try{
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
                    'itemId' => ($request->itemId),
                    'userId' => ($request->userId),
                    'details' => ($request->details),
                    'image' => $pic,
                    'isDraft' => 0,
                    'isFeatured' => $feat
                ]);
                $post = $post->refresh();
                }catch(\Illuminate\Database\QueryException $e){
                    DB::rollBack();
                    $errMess = $e->getMessage();
                    return Redirect::back()->withError($errMess);
                }
                return redirect('/Post')->withSuccess('Successfully inserted into the database.');
            }
        }
    
    }

  

    public function publish($id)
    {
      
        Post::find($id)->update(['isDraft' => 1]);
        return redirect('/Post');
    }

    public function unpublish($id)
    {
        Post::find($id)->update(['isDraft' => 0]);
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
        $item = ServiceItem::Where('isActive',1)->get();
        return view('Post.draft',compact('cat','type','post','item'));
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
        $rules = [
            'categoryId' => 'required',
            'typeId' => 'required',
            'itemId' => 'required|unique:posts',
            'details' => 'required',
            'image' => 'nullable|mimes:jpeg,png,jpg,svg',
            'isFeatured' => 'nullable'
        ];
        $messages = [
            'unique' => ':attribute already exists.',
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute field must be no longer than :max characters.',
            'regex' => 'The :attribute must not contain special characters.'              
        ];
        $niceNames = [
            'categoryId' => 'Service Category',
            'typeId' => 'Service Type',
            'details' => 'Details',
            'image' => 'Image',
            'itemId' => 'Service Item'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        $validator->setAttributeNames($niceNames); 
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else{
            $feat = $request->isFeatured;
            if($feat == null || $feat == '') {
                $feat = 1;
            }
            $checkFeatured = Post::with('ServiceType')
                ->where('isActive',1)
                ->where('isDraft', 1)
                ->where('isFeatured', 0)
                ->where('typeId', $request->typeId)
                ->get();
            if(count($checkFeatured) >= 3 && $feat == 0)
            {
            return Redirect::back()->withError('It seems there are already 3 featured published post on that certain item.');
            }
            else
            {
                try{
                $file = $request->file('image');
                $pic = "";
                if($file == '' || $file == null){
                    $nullpic = Post::find($id);
                    $pic = $nullpic->image;
                
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
                    'itemId' => ($request->itemId),
                    'userId' => ($request->userId),
                    'details' => ($request->details),
                    'image' => $pic,
                    'isFeatured' => $feat
                ]);
                }catch(\Illuminate\Database\QueryException $e){
                    DB::rollBack();
                    $errMess = $e->getMessage();
                    return Redirect::back()->withError($errMess);
                }
                return redirect('/Post')->withSuccess('Successfully updated into the database.');
            }
        }
       
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
        ->join('service_subcategory','posts.typeId','=','service_subcategory.id')
        ->join('service_categories','posts.categoryId','=','service_categories.id')
        ->join('users as u','u.id','=','posts.userId')
        ->join('service_items','service_items.id','=','posts.itemId')
        ->select('posts.*','service_subcategory.name as type', 'service_categories.name as category','u.name as userName','service_items.name as item')
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

    public function type($id){
 
        
        $subcat = ServiceType::where('categoryId',$id)->get();
        return Response()->json($subcat);
    }

    public function sub($id){

        $items = ServiceItem::where('subcategoryId',$id)->get();
        return Response()->json($items);
    }
}
