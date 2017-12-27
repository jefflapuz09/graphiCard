<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inquiries;

class InquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       Inquiries::create($request->all());
        return redirect('/prodDescription/1')->withSuccess('Your inquiry has been sent. You will receieve a reply as soon as we checked your inquiry');
        //return redirect('/prodDescription/1')->withSuccess('message', 'Message sent!');
       // $rules = [
       //      'name' => ['required','max:50','unique:service_categories','regex:/^[^~`!@#*_={}|\;<>,?()$%&^]+$/']
       //  ];
       //  $messages = [
       //      'unique' => ':attribute already exists.',
       //      'required' => 'The :attribute field is required.',
       //      'max' => 'The :attribute field must be no longer than :max characters.',
       //      'regex' => 'The :attribute must not contain special characters.'              
       //  ];
       //  $niceNames = [
       //      'name' => 'Service Category',
       //  ];
       //  $validator = Validator::make($request->all(),$rules,$messages);
       //  $validator->setAttributeNames($niceNames); 
       //  if ($validator->fails()) {
       //      return Redirect::back()->withErrors($validator)->withInput();
       //  }
       //  else{
       //      Inquiry::create($request->all());
       //      return redirect('/')->withSuccess('Your inquiry has been sent. You will receieve a reply as soon as we checked your inquiry');
       //  }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inq = Inquiries::find($id);
        return view('inquiries.display', compact('inq'));
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
