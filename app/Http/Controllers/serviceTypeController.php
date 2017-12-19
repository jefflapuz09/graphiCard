<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\ServiceType;
use App\ServiceCategory;

class serviceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $post =DB::table('service_types')
        ->join('service_categories', 'service_types.categoryId', '=', 'service_categories.id')
        ->select('service_types.*', 'service_categories.name as category')
        ->where('service_types.isActive',1)
        ->get();
         return view('ServiceType.index', compact('post'));

       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post =DB::table('service_categories')
        ->select('service_categories.name as category', 'service_categories.id as id')
        ->where('isActive',1)
        ->get();
        return view('ServiceType.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'categoryId' => 'required',
        ]);
        ServiceType::create($request->all());
        return redirect('/ServiceType');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          $cat = ServiceType::find($id);
          $post =ServiceCategory::where('isActive',1)->get();
        
         return view('ServiceType.show', compact('post','cat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = ServiceType::find($id);
        $post =ServiceCategory::where('isActive',1)->get();

        return view('ServiceType.update', compact('post','cat'));
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
            'name' => 'required',
            'categoryId' => 'required',
        ]);
        ServiceType::find($id)->update($request->all());
        return redirect('/ServiceType');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ServiceType::find($id)->update(['isActive' => 0]);
        return redirect('/ServiceType');
    }

    public function soft()
    {
        $post =DB::table('service_types')
        ->join('service_categories', 'service_types.categoryId', '=', 'service_categories.id')
        ->select('service_types.*', 'service_categories.name as category')
        ->where('service_types.isActive',0)
        ->get();
         return view('ServiceType.soft', compact('post'));
    }

    public function reactivate($id)
    {
        ServiceType::find($id)->update(['isActive' => 1]);
        return redirect('/ServiceType');
    }
}
