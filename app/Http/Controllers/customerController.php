<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Customer;
use Validator;
use Illuminate\Validation\Rule;
use Redirect;
use App\User;

class customerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth',['except' =>['index','store','storeweb']]);
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
    public function storeweb(Request $request)
    {
        $rules = [
            'firstName' => ['required','max:50','unique:customers', 'regex:/^[^~`!@#*_={}|\;<>,?()$%&^]+$/'],
            'middleName' => ['nullable','max:45','regex:/^[^~`!@#*_={}|\;<>,?()$%&^]+$/'],
            'lastName' => ['required','max:45','regex:/^[^~`!@#*_={}|\;<>,?()$%&^]+$/'],
            'gender' => 'required',
            'street' => 'required|max:140',
            'brgy' => 'required|max:140',
            'city' => 'required|max:140',
            'contactNumber' => ['required','max:30','regex:/^[^_]+$/'],
            'email' => ['required','email','max:100','unique:users'],
            'password' => 'required|string|min:6|confirmed'
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
            'contactNumber' => 'Contact Number',
            'street' => 'Street',
            'brgy' => 'Brgy',
            'city' => 'City',
            'gender' => 'Gender',
            'email' => 'Email Address',
            'password' => 'Password',
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        $validator->setAttributeNames($niceNames); 
        if ($validator->fails()) {
            // return Redirect::back()->withErrors($validator)->withInput();
            return Redirect::back()->withErrors("Fields with (*) are required.");
        }
        else{
            $cpass = $request->password_confirmation;
            $pass = $request->password;
            if($cpass == $pass)
            {
                try{
                    
                    $data =  Customer::create([
                        'firstName' => $request->firstName,
                        'middleName' => $request->middleName,
                        'lastName' => $request->lastName,
                        'contactNumber' => $request->contactNumber,
                        'street' => $request->street,
                        'brgy' => $request->brgy,
                        'city' => $request->city,
                        'gender' => $request->gender
                    ]);
            
                    $customerId = $data->id;
       

                User::create([
                    'customerId' => $customerId,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'role' => 3
                ]);
                }catch(\Illuminate\Database\QueryException $e){
                    DB::rollBack();
                    $errMess = $e->getMessage();
                    return Redirect::back()->withError($errMess);
                }
                return redirect('/customer/login')->withSuccess('Successfully created account. You may now log in to your account.');
            }
            else
            {
                return Redirect::back()->withErrors('The password does not match');
            }
            
        }
    }

    public function storepost(Request $request)
    {
        $rules = [
            'firstName' => ['required','max:50','unique:customers', 'regex:/^[^~`!@#*_={}|\;<>,?()$%&^]+$/'],
            'middleName' => ['nullable','max:45','regex:/^[^~`!@#*_={}|\;<>,?()$%&^]+$/'],
            'lastName' => ['required','max:45','regex:/^[^~`!@#*_={}|\;<>,?()$%&^]+$/'],
            'gender' => 'required',
            'street' => 'required|max:140',
            'brgy' => 'required|max:140',
            'city' => 'required|max:140',
            'contactNumber' => ['required','max:30','regex:/^[^_]+$/'],
            'email' => ['required','email','max:100','unique:users'],
            'password' => 'required|string|min:6|confirmed'
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
            'contactNumber' => 'Contact Number',
            'street' => 'Street',
            'brgy' => 'Brgy',
            'city' => 'City',
            'gender' => 'Gender',
            'email' => 'Email Address',
            'password' => 'Password',
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        $validator->setAttributeNames($niceNames); 
        if ($validator->fails()) {
            // return Redirect::back()->withErrors($validator)->withInput();
            return Redirect::back()->withErrors("Fields with (*) are required.");
        }
        else{
            $cpass = $request->password_confirmation;
            $pass = $request->password;
            if($cpass == $pass)
            {
                try{
                    
                    $data =  Customer::create([
                        'firstName' => $request->firstName,
                        'middleName' => $request->middleName,
                        'lastName' => $request->lastName,
                        'contactNumber' => $request->contactNumber,
                        'street' => $request->street,
                        'brgy' => $request->brgy,
                        'city' => $request->city,
                        'gender' => $request->gender
                    ]);
            
                    $customerId = $data->id;
       

                User::create([
                    'customerId' => $customerId,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'role' => 3
                ]);
                }catch(\Illuminate\Database\QueryException $e){
                    DB::rollBack();
                    $errMess = $e->getMessage();
                    return Redirect::back()->withError($errMess);
                }
                return redirect('/customer/login')->withSuccess('Successfully created account. You may now log in to your account.');
            }
            else
            {
                return Redirect::back()->withErrors('The password does not match');
            }
            
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
            'firstName' => ['required','max:50',Rule::unique('customers')->ignore($id), 'regex:/^[^~`!@#*_={}|\;<>,?()$%&^]+$/'],
            'middleName' => ['nullable','max:45','regex:/^[^~`!@#*_={}|\;<>,?()$%&^]+$/'],
            'lastName' => ['required','max:45','regex:/^[^~`!@#*_={}|\;<>,?()$%&^]+$/'],
            'gender' => 'required',
            'street' => 'required|max:140',
            'brgy' => 'required|max:140',
            'city' => 'required|max:140',
            'contactNumber' => ['required','max:30','regex:/^[^_]+$/'],
            'email' => ['required','email','max:100'],
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
            'contactNumber' => 'Contact Number',
            'street' => 'Street',
            'brgy' => 'Brgy',
            'city' => 'City',
            'gender' => 'Gender',
            'email' => 'Email Address',
            'password' => 'Password',
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        $validator->setAttributeNames($niceNames); 
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else{
            try{
                Customer::find($id)->update([
                    'firstName' => $request->firstName,
                    'middleName' => $request->middleName,
                    'lastName' => $request->lastName,
                    'contactNumber' => $request->contactNumber,
                    'street' => $request->street,
                    'brgy' => $request->brgy,
                    'city' => $request->city,
                    'gender' => $request->gender
                ]);
        
                $customerId = DB::getPdo()->lastInsertId();

            User::find($request->hidid)->update([
            
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 3
            ]);
            }catch(\Illuminate\Database\QueryException $e){
                DB::rollBack();
                $errMess = $e->getMessage();
                return Redirect::back()->withError($errMess);
            }
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
        $cust = Customer::with('User')->where('id',$id)->first();
        User::find($cust->User[0]->id)->update(['isActive' => 0]);
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
        $cust = Customer::with('User')->where('id',$id)->first();
        User::find($cust->User[0]->id)->update(['isActive' => 1]);
        return redirect('/Customer');
    }
}
