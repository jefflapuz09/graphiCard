<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Customer;
use Validator;
use Redirect;

class customerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth',['except' =>['index','store']]);
    }


    public function index()
    {
        $post = Customer::where('isActive',1)->get();
        return view('Customer.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('Customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function storepost(Request $request)
    {
        $rules = [
            'firstName' => ['required','max:50','unique:customers', 'regex:/^[^~`!@#*_={}|\;<>,?()$%&^]+$/'],
            'middleName' => ['nullable','max:45','regex:/^[^~`!@#*_={}|\;<>,?()$%&^]+$/','unique:customers'],
            'lastName' => ['required','max:45','regex:/^[^~`!@#*_={}|\;<>,?()$%&^]+$/'],
            'gender' => 'required',
            'street' => 'required|max:140',
            'brgy' => 'required|max:140',
            'city' => 'required|max:140',
            'contactNumber' => ['required','max:30','regex:/^[^_]+$/'],
            'email' => 'nullable|email|max:100',
            'gender' => 'required'
        ];
        $messages = [
            'unique' => ':attribute already exists.',
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute field must be no longer than :max characters.',   
            'regex' => 'The :attribute must not contain special characters.'             
        ];
        $niceNames = [
            'firstName' => 'First Name',
            'middleName' => 'Middle Name',
            'lastName' => 'Last Name',
            'street' => 'No. & St./Bldg.',
            'brgy' => 'Brgy./Subd.',
            'city' => 'City/Municipality',
            'contactNumber' => 'Contact No.',
            'email' => 'Email Address'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        $validator->setAttributeNames($niceNames); 
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else{
            Customer::create($request->all());
            return redirect('/Customer')->withSuccess('Successfully Updated into the database.');
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
        $post = Customer::find($id);
        return view('Customer.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Customer::find($id);
        return view('Customer.update', compact('post'));
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
            'firstName' => ['required','max:50','unique:customers', 'regex:/^[^~`!@#*_={}|\;<>,?()$%&^]+$/'],
            'middleName' => ['nullable','max:45','regex:/^[^~`!@#*_={}|\;<>,?()$%&^]+$/','unique:customers'],
            'lastName' => ['required','max:45','regex:/^[^~`!@#*_={}|\;<>,?()$%&^]+$/'],
            'gender' => 'required',
            'street' => 'required|max:140',
            'brgy' => 'required|max:140',
            'city' => 'required|max:140',
            'contactNumber' => ['required','max:30','regex:/^[^_]+$/'],
            'email' => 'nullable|email|max:100',
            'gender' => 'required'
        ];
        $messages = [
            'unique' => ':attribute already exists.',
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute field must be no longer than :max characters.',   
            'regex' => 'The :attribute must not contain special characters.'             
        ];
        $niceNames = [
            'firstName' => 'First Name',
            'middleName' => 'Middle Name',
            'lastName' => 'Last Name',
            'street' => 'No. & St./Bldg.',
            'brgy' => 'Brgy./Subd.',
            'city' => 'City/Municipality',
            'contactNumber' => 'Contact No.',
            'email' => 'Email Address'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        $validator->setAttributeNames($niceNames); 
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else{
            Customer::find($id)->update($request->all());
            return redirect('/Customer')->withSuccess('Successfully Updated into the database.');
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
        Customer::find($id)->update(['isActive' => 0]);
        return redirect('/Customer');
    }

    public function soft()
    {
        $post = Customer::where('isActive',0)->get();
        return view('Customer.soft',compact('post'));
    }

    public function reactivate($id)
    {
        Customer::find($id)->update(['isActive' => 1]);
        return redirect('/Customer');
    }
}
