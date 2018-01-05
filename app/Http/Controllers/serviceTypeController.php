<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\ServiceType;
use App\ServiceCategory;
use App\ServiceItem;
use App\Post;
use Validator;
use Redirect;

class serviceTypeController extends Controller
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
        $post =DB::table('service_subcategory')
        ->join('service_categories', 'service_subcategory.categoryId', '=', 'service_categories.id')
        ->select('service_subcategory.*', 'service_categories.name as category')
        ->where('service_subcategory.isActive',1)
        ->get();
         return view('ServiceType.index', compact('post'));

       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post =DB::table('service_categories')
        ->select('service_categories.name as category', 'service_categories.id as id')
        ->where('isActive',1)
        ->get();
        return view('ServiceType.create', compact('post'));
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
            'name' => ['required','max:50','unique:service_subcategory','regex:/^[^~`!@#*_={}|\;<>,?()$%&^]+$/'],
            'categoryId' => 'required'
        ];
        $messages = [
            'unique' => ':attribute already exists.',
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute field must be no longer than :max characters.',
            'regex' => 'The :attribute must not contain special characters.'              
        ];
        $niceNames = [
            'name' => 'Service Type',
            'categoryId' => 'Service Category',
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        $validator->setAttributeNames($niceNames); 
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else{
            try{
            ServiceType::create($request->all());
            }catch(\Illuminate\Database\QueryException $e){
                DB::rollBack();
                $errMess = $e->getMessage();
                return Redirect::back()->withError($errMess);
            }
            return redirect('/ServiceType')->withSuccess('Successfully inserted into the database.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          $cat = ServiceType::find($id);
          $post =ServiceCategory::where('isActive',1)->get();
        
         return view('ServiceType.show', compact('post','cat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = ServiceType::find($id);
        $post =ServiceCategory::where('isActive',1)->get();

        return view('ServiceType.update', compact('post','cat'));
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
            'name' => ['required','max:50','regex:/^[^~`!@#*_={}|\;<>,?()$%&^]+$/'],
            'categoryId' => 'required'
        ];
        $messages = [
            'unique' => ':attribute already exists.',
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute field must be no longer than :max characters.',
            'regex' => 'The :attribute must not contain special characters.'              
        ];
        $niceNames = [
            'name' => 'Service Type',
            'categoryId' => 'Service Category',
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        $validator->setAttributeNames($niceNames); 
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else{
            try{
            ServiceType::find($id)->update($request->all());
            }catch(\Illuminate\Database\QueryException $e){
                DB::rollBack();
                $errMess = $e->getMessage();
                return Redirect::back()->withError($errMess);
            }
            return redirect('/ServiceType')->withSuccess('Successfully updated into the database.');
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
        $checkPost = Post::where('typeId',$id)->get();
        $checkItem = ServiceItem::where('subcategoryId',$id)->get();
        if(count($checkPost) > 0 || $checkItem > 0)
        {
            return redirect('/ServiceType')->withError('It seems that the record is still being used in other items. Deactivation failed.');
        }
        else
        {   
            ServiceType::find($id)->update(['isActive' => 0]);
            return redirect('/ServiceType');
        }
        
    }

    public function soft()
    {
        $post =DB::table('service_subcategory')
        ->join('service_categories', 'service_subcategory.categoryId', '=', 'service_categories.id')
        ->select('service_subcategory.*', 'service_categories.name as category')
        ->where('service_subcategory.isActive',0)
        ->get();
         return view('ServiceType.soft', compact('post'));
    }

    public function reactivate($id)
    {
        ServiceType::find($id)->update(['isActive' => 1]);
        return redirect('/ServiceType');
    }
}
