<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use App\FAQs;
use DB;
use Validator;
use Illuminate\Validation\Rule;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = FAQs::where('isActive',1)->get();
        return view('Home.FAQs', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('FAQs.FAQsCreate');
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
            'question' => ['required','max:150','unique:faqs'],
            'answer' => ['required','max:150']
        ];
        $messages = [
            'unique' => ':attribute already exists.',
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute field must be no longer than :max characters.',
            'regex' => 'The :attribute must not contain special characters.'              
        ];
        $niceNames = [
            'question' => 'Question',
            'answer' => 'Answer'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        $validator->setAttributeNames($niceNames); 
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else{
                try{
                    FAQs::create($request->all());
                }catch(\Illuminate\Database\QueryException $e){
                    DB::rollBack();
                    $errMess = $e->getMessage();
                    return Redirect::back()->withError($errMess);
                }
                return redirect('/Utilities')->withSuccess('Successfully inserted into the database.');
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
        $post = FAQs::find($id);
        return view('FAQs.FAQedit',compact('post'));
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
            'question' => ['required','max:150',Rule::unique('faqs')->ignore($id)],
            'answer' => ['required','max:150']
        ];
        $messages = [
            'unique' => ':attribute already exists.',
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute field must be no longer than :max characters.',
            'regex' => 'The :attribute must not contain special characters.'              
        ];
        $niceNames = [
            'question' => 'Question',
            'answer' => 'Answer'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        $validator->setAttributeNames($niceNames); 
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else{
                try{
                    FAQs::find($id)->update($request->all());
                }catch(\Illuminate\Database\QueryException $e){
                    DB::rollBack();
                    $errMess = $e->getMessage();
                    return Redirect::back()->withError($errMess);
                }
                return redirect('/Utilities')->withSuccess('Successfully updated into the database.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        FAQs::find($id)->update(['isActive' => 0]);
            return redirect('/Utilities');  
    }

    public function soft()
    {
        $post = FAQs::where('isActive',0)->get();
        return view('FAQs.FAQsoft',compact('post'));
    }

    public function reactivate($id)
    {
        FAQs::find($id)->update(['isActive' => 1]);
        return redirect('/Utilities');
    }
}
