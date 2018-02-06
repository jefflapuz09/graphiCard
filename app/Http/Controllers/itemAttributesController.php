<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemAttributes;
use App\ServiceType;
use Validator;
use Redirect;
use Illuminate\Validation\Rule;

class itemAttributesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = ItemAttributes::with('Item')->where('isActive',1)->get();
        return view('Attribute.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = ServiceType::where('isActive',1)->get();
        return view('Attribute.create',compact('item'));
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
            'itemId' => ['required','max:50','regex:/^[^~`!@#*_={}|\;<>,?()$%&^]+$/'],
            'attributeName' => ['required','max:150'],
            'choiceDescription' => ['required','max:150']
        ];
        $messages = [
            'unique' => ':attribute already exists.',
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute field must be no longer than :max characters.',
            'regex' => 'The :attribute must not contain special characters.'              
        ];
        $niceNames = [
            'itemId' => 'Item',
            'attributeName' => 'Attribute Name',
            'choiceDescription' => 'Description'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        $validator->setAttributeNames($niceNames); 
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else{
                try{
                    ItemAttributes::create($request->all());
                }catch(\Illuminate\Database\QueryException $e){
                    DB::rollBack();
                    $errMess = $e->getMessage();
                    return Redirect::back()->withError($errMess);
                }
                return redirect('/Attribute')->withSuccess('Successfully inserted into the database.');
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = ServiceType::where('isActive',1)->get();
        $post = ItemAttributes::find($id);
        return view('Attribute.update',compact('item','post'));
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
            'itemId' => ['required','max:50',Rule::unique('item_attributes')->ignore($id),'regex:/^[^~`!@#*_={}|\;<>,?()$%&^]+$/'],
            'attributeName' => ['required','max:150'],
            'choiceDescription' => ['required','max:150']
        ];
        $messages = [
            'unique' => ':attribute already exists.',
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute field must be no longer than :max characters.',
            'regex' => 'The :attribute must not contain special characters.'              
        ];
        $niceNames = [
            'itemId' => 'Item',
            'attributeName' => 'Attribute Name',
            'choiceDescription' => 'Description'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        $validator->setAttributeNames($niceNames); 
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else{
                try{
                    ItemAttributes::find($id)->update($request->all());
                }catch(\Illuminate\Database\QueryException $e){
                    DB::rollBack();
                    $errMess = $e->getMessage();
                    return Redirect::back()->withError($errMess);
                }
                return redirect('/Attribute')->withSuccess('Successfully updated into the database.');
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
            ItemAttributes::find($id)->update(['isActive' => 0]);
            return redirect('/Attribute');
    }

    public function soft()
    {
        $post = ItemAttributes::with('Item')->where('isActive',0)->get();
        return view('Attribute.soft',compact('post'));
    }

    public function reactivate($id)
    {
            ItemAttributes::find($id)->update(['isActive' => 1]);
            return redirect('/Attribute');
    }
}
