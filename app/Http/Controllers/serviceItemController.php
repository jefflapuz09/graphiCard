<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceItem;
use App\ServiceType;
use App\Post;
use Redirect;
use Validator;
use DB;
use Illuminate\Validation\Rule;


class serviceItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = ServiceItem::with('Subcategory')->where('isActive',1)->get();
        return view('ServiceItem.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcat = ServiceType::all();
        return view('ServiceItem.create',compact('subcat'));
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
            'name' => ['required','max:50','unique:service_items','regex:/^[^~`!@#*_={}|\;<>,?()$%&^]+$/'],
            'subcategoryId' => 'required',
            'description' => 'nullable'
        ];
        $messages = [
            'unique' => ':attribute already exists.',
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute field must be no longer than :max characters.',
            'regex' => 'The :attribute must not contain special characters.'              
        ];
        $niceNames = [
            'name' => 'Service Type',
            'subcategoryId' => 'Service Subcategory',
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        $validator->setAttributeNames($niceNames); 
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else{
            try{
            ServiceItem::create($request->all());
            }catch(\Illuminate\Database\QueryException $e){
                DB::rollBack();
                $errMess = $e->getMessage();
                return Redirect::back()->withError($errMess);
            }
            return redirect('/Item')->withSuccess('Successfully inserted into the database.');
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
        $post = ServiceItem::find($id);
        $subcat = ServiceType::all();
        return view('ServiceItem.update',compact('post','subcat'));
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
            'name' => ['required','max:50',Rule::unique('service_items')->ignore($id),'regex:/^[^~`!@#*_={}|\;<>,?()$%&^]+$/'],
            'subcategoryId' => 'required',
            'description' => 'nullable'
        ];
        $messages = [
            'unique' => ':attribute already exists.',
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute field must be no longer than :max characters.',
            'regex' => 'The :attribute must not contain special characters.'              
        ];
        $niceNames = [
            'name' => 'Service Type',
            'subcategoryId' => 'Service Subcategory',
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        $validator->setAttributeNames($niceNames); 
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else{
            try{
            ServiceItem::find($id)->update($request->all());
            }catch(\Illuminate\Database\QueryException $e){
                DB::rollBack();
                $errMess = $e->getMessage();
                return Redirect::back()->withError($errMess);
            }
            return redirect('/Item')->withSuccess('Successfully updated into the database.');
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
        $checkPost = Post::where('itemId',$id)->get();
        if(count($checkPost) > 0)
        {
            return redirect('/ServiceType')->withError('It seems that the record is still being used in other items. Deactivation failed.');
        }
        else
        {
            ServiceItem::find($id)->update(['isActive' => 0]);
            return redirect('/Item');
        }
            
    }

    public function soft()
    {
        $post = ServiceItem::with('Subcategory')->where('isActive',0)->get();
        return view('ServiceItem.soft',compact('post'));
    }

    public function reactivate($id)
    {
            ServiceItem::find($id)->update(['isActive' => 1]);
            return redirect('/Item');
    }
}
