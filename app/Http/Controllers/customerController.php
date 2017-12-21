<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Customer;

class customerController extends Controller
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
        request()->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'emailAddress' => 'required',
            'contactNumber' => 'required',
            'street' => 'required',
            'brgy' => 'required',
            'city' => 'required',
            'gender' => 'required',

        ]);
        Customer::create($request->all());
        return redirect('/Customer');

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
        request()->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'emailAddress' => 'required',
            'contactNumber' => 'required',
            'street' => 'required',
            'brgy' => 'required',
            'city' => 'required',
            'gender' => 'required',
        ]);
        Customer::find($id)->update($request->all());
        return redirect('/Customer');
      
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
