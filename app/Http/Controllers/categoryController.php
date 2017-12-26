<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\ServiceCategory;
use Validator;
use Redirect;

class categoryController extends Controller
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
        $post = ServiceCategory::where('isActive',1)->get();
         return view('Category.index',compact('post'));
 
    }


    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Category.create');
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
            'name' => ['required','max:50','unique:service_categories','regex:/^[^~`!@#*_={}|\;<>,?()$%&^]+$/']
        ];
        $messages = [
            'unique' => ':attribute already exists.',
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute field must be no longer than :max characters.',
            'regex' => 'The :attribute must not contain special characters.'              
        ];
        $niceNames = [
            'name' => 'Service Category',
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        $validator->setAttributeNames($niceNames); 
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else{
            ServiceCategory::create($request->all());
            return redirect('/Category')->withSuccess('Successfully inserted into the database.');
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
        $post = ServiceCategory::find($id);
        return view('Category.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = ServiceCategory::find($id);
        return view('Category.update',compact('post'));
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
            'name' => ['required','max:50','unique:service_categories','regex:/^[^~`!@#*_={}|\;<>,?()$%&^]+$/'],
            'description' => ['nullable','max:150']
        ];
        $messages = [
            'unique' => ':attribute already exists.',
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute field must be no longer than :max characters.',  
            'regex' => 'The :attribute must not contain special characters.'             
        ];
        $niceNames = [
            'name' => 'Service Category',
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        $validator->setAttributeNames($niceNames); 
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else{
            ServiceCategory::find($id)->update($request->all());
            return redirect('/Category')->withSuccess('Successfully Updated into the database.');
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
        ServiceCategory::find($id)->update(['isActive' => 0]);
        return redirect('/Category');
    }

    public function soft()
    {
        $post = ServiceCategory::where('isActive',0)->get();
        return view('Category.soft',compact('post'));
    }

    public function reactivate($id)
    {
        ServiceCategory::find($id)->update(['isActive' => 1]);
        return redirect('/Category');
    }
}
