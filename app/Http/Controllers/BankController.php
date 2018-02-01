<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bank;
use Validator;
use Redirect;
use Illuminate\Validation\Rule;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Bank::where('isActive',1)->get();
        return view('Bank.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Bank.create');
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
            'bank' => ['required','max:100'],
            'accountName' => ['required','max:100','unique:banks'],
            'accountNumber' => ['required','max:100','unique:banks']
        ];
        $messages = [
            'unique' => ':attribute already exists.',
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute field must be no longer than :max characters.',
            'regex' => 'The :attribute must not contain special characters.'              
        ];
        $niceNames = [
            'bank' => 'Bank Name',
            'accountName' => 'Account Name',
            'accountNumber' => 'Account Number',
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        $validator->setAttributeNames($niceNames); 
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else{
                try{
                Bank::create([
                    'bank' => ($request->bank),
                    'accountName' => ($request->accountName),
                    'accountNumber' => ($request->accountNumber)
                ]);
                }catch(\Illuminate\Database\QueryException $e){
                    DB::rollBack();
                    $errMess = $e->getMessage();
                    return Redirect::back()->withError($errMess);
                }
                return redirect('/Bank')->withSuccess('Successfully inserted into the database.');
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
        $post = Bank::find($id);
        return view('Bank.update',compact('post'));
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
            'bank' => ['required','max:100'],
            'accountName' => ['required','max:100',Rule::unique('banks')->ignore($id)],
            'accountNumber' => ['required','max:100',Rule::unique('banks')->ignore($id)]
        ];
        $messages = [
            'unique' => ':attribute already exists.',
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute field must be no longer than :max characters.',
            'regex' => 'The :attribute must not contain special characters.'              
        ];
        $niceNames = [
            'bank' => 'Bank Name',
            'accountName' => 'Account Name',
            'accountNumber' => 'Account Number',
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        $validator->setAttributeNames($niceNames); 
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else{
                try{
                Bank::find($id)->update([
                    'bank' => ($request->bank),
                    'accountName' => ($request->accountName),
                    'accountNumber' => ($request->accountNumber)
                ]);
                }catch(\Illuminate\Database\QueryException $e){
                    DB::rollBack();
                    $errMess = $e->getMessage();
                    return Redirect::back()->withError($errMess);
                }
                return redirect('/Bank')->withSuccess('Successfully inserted into the database.');
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
            Bank::find($id)->update(['isActive' => 0]);
            return redirect('/Bank');        
    }

    public function soft()
    {
        $post = Bank::where('isActive',0)->get();
        return view('Bank.soft',compact('post'));
    }

    public function reactivate($id)
    {
        Bank::find($id)->update(['isActive' => 1]);
        return redirect('/Bank');
    }
}
