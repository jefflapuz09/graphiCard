<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use App\ServiceItem;
use App\PackageInclusion;
use DB;
use Validator;
use Redirect;
use Illuminate\Validation\Rule;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $post = DB::table('packages as p')
        // ->join('package_inclusions as i','p.id','i.packId')
        // ->join('service_items as s','s.id','i.itemId')
        // ->select('p.*','s.name as item','i.qty')
        // ->where('p.isActive',1)
        // ->get();

        $post = Package::with('Inclusion')->where('isActive',1)->get();

        return view('Package.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pack = ServiceItem::where('isActive',1)->get();
        return view('Package.create',compact('pack'));
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
            'name' => ['required','max:50','unique:packages','regex:/^[^~`!@#*_={}|\;<>,?()$%&^]+$/'],
            'price' => 'required',
            'description' => ['nullable','max:150'],
            'itemId' => 'required',
            'qty' => 'required'
        ];
        $messages = [
            'unique' => ':attribute already exists.',
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute field must be no longer than :max characters.',  
            'regex' => 'The :attribute must not contain special characters.'             
        ];
        $niceNames = [
            'name' => 'Package',
            'price' => 'Price',
            'description' => 'Description',
            'packId' => 'Package Name',
            'itemId' => 'Item Name',
            'qty' => 'Quantity'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        $validator->setAttributeNames($niceNames); 
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else{
            $chkArray = $request->itemId;
            if(count($chkArray) <= 1)
            {
            return redirect('/Package')->withError('It seems you only included 1 item on the package.');
            }
            else
            {
                    
                    $data = Package::create([
                        'name' => $request->name,
                        'description' =>$request->description,
                        'price' => $request->price
                    ]);
            
                    $packId = $data->id;
                    $index = 0;
                    foreach($request->itemId as $test){
                        
                        PackageInclusion::create([
                            'packId' => $packId,
                            'itemId' => $test,
                            'qty' => $request->qty[$index]
                        ]);
                        $index++;
                        }
                    
                return redirect('/Package')->withSuccess('Successfully Updated into the database.');
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
        return view('Package.update');
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
