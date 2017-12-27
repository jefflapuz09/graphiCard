<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyInfo;
use Validator;
use Redirect;

class UtilitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = CompanyInfo::find(1);
        return view('Utilities.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $rules = [
            'company_logo' => 'required',
            'company_name' => ['required','max:45','regex:/^[^~`!@#*_={}|\;<>,?()$%&^]+$/'],
            'street' => 'required',
            'brgy' => 'required',
            'city' => 'required',
            'contactNumber' => ['required','max:30','regex:/^[^_]+$/'],
            'emailAddress' => 'required|email|max:100',
            'about' => ['required','max:500'],
            'services_offered' => ['required','max:500'],
            'description' => ['nullable','max:500']
        ];
        $messages = [
            'unique' => ':attribute already exists.',
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute field must be no longer than :max characters.',  
            'regex' => 'The :attribute must not contain special characters.'             
        ];
        $niceNames = [
            'company_logo' => 'Company Logo',
            'company_name' => 'Company Name',
            'street' => 'Street',
            'brgy' => 'Brgy.',
            'city' => 'City',
            'contactNumber' => 'Contact Number',
            'emailAddress' => 'Email Address',
            'about' => 'About',
            'services_offered' => 'Services Offered',
            'description' => 'Description',
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        $validator->setAttributeNames($niceNames); 
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else{
            $file = $request->file('company_logo');
            $pic = "";
            if($file == '' || $file == null){
                $pic = "img/grey-pattern.png";
            }else{
                $date = date("Ymdhis");
                $extension = $request->file('company_logo')->getClientOriginalExtension();
                $pic = "img/".$date.'.'.$extension;
                $request->file('company_logo')->move("img",$pic);    
                // $request->file('photo')->move(public_path("/uploads"), $newfilename);
            }
            $checkComp = CompanyInfo::all();
            if(count($checkComp)!=0){
            CompanyInfo::find(1)->update([
                'company_logo' => $pic,
                'company_name' => ($request->company_name),
                'street' => ($request->street),
                'brgy' => ($request->street),
                'city' => ($request->city),
                'contactNumber' => ($request->contactNumber),
                'emailAddress' => ($request->emailAddress),
                'about' => ($request->about),
                'services_offered' => ($request->services_offered),
                'description' => ($request->description),
                
            ]);
            return redirect('/Utilities')->withSuccess('Successfully Updated into the database.');
            }
            else{
                CompanyInfo::create([
                    'company_logo' => $pic,
                    'company_name' => ($request->company_name),
                    'street' => ($request->street),
                    'brgy' => ($request->street),
                    'city' => ($request->city),
                    'contactNumber' => ($request->contactNumber),
                    'emailAddress' => ($request->emailAddress),
                    'about' => ($request->about),
                    'services_offered' => ($request->services_offered),
                    'description' => ($request->description),
                    
                ]);
                return redirect('/Utilities')->withSuccess('Successfully Updated into the database.');
            }
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
        //
    }
}
