<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CompanyInfo;
use App\Banner;
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
        $file = $request->file('banner1');
        $file2 = $request->file('banner2');
        $file3 = $request->file('banner3');
        $pic = "";
        $pic2 = "";
        $pic3= "";
        if($file == '' || $file == null || $file2 = '' || $file2 = null || $file3 = '' || $file3 = null){
            $pic = "img/grey-pattern.png";
            $pic2 = "img/grey-pattern.png";
            $pic3 = "img/grey-pattern.png";
        }else{
            $date = date("Ymdhis");
            $extension = $request->file('banner1')->getClientOriginalExtension();
            $extension2 = $request->file('banner2')->getClientOriginalExtension();
            $extension3 = $request->file('banner3')->getClientOriginalExtension();
            $pic = "img/".$date.'.'.$extension;
            $pic2 = "img/".$date.'.'.$extension2;
            $pic3 = "img/".$date.'.'.$extension3;
            $request->file('banner1')->move("img",$pic);   
            $request->file('banner2')->move("img",$pic);  
            $request->file('banner3')->move("img",$pic); 
            // $request->file('photo')->move(public_path("/uploads"), $newfilename);
        }
        
        $post = Banner::create([
            'banner' => $pic,
            'banner2' => $pic2,
            'banner3' => $pic3
        ]);
        $post = $post->refresh();
        return redirect('/Post')->withSuccess('Successfully inserted into the database.');
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
