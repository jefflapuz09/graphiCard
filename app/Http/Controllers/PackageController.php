<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use App\ServiceItem;
use App\PackageInclusion;
use DB;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = DB::table('packages as p')
        ->join('package_inclusions as i','p.id','i.packId')
        ->join('service_items as s','s.id','i.itemId')
        ->select('p.*','s.name as item','i.qty')
        ->where('p.isActive',1)
        ->get();
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
        
        $data = Package::create([
            'name' => $request->name,
            'description' =>$request->description
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
