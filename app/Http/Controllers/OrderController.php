<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;
use App\ServiceType;
use App\ServiceItem;
use App\Order;
use App\OrderRequests;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Order::with('Request','Customer')->where('isActive',1)->get();
        return view('Order.index',compact('post'));
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

    public function addcart($id, $itemid, Request $request)
    {
        $variant = ServiceItem::where('isActive',1)->get();
        $post = ServiceType::with(['item' => function($query) use($itemid) {
            $query->where('id', $itemid);},'post' => function($query) use($itemid) {
                $query->where('itemId', $itemid);}])->find($id);
        $post2 = ServiceType::with(['item' => function($query) use($itemid) {
            $query->where('id', $itemid);},'post' => function($query) use($itemid) {
                $query->where('itemId', $itemid);}])->find($id);        
        return view('Home.order',compact('post','post2','variant'));
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
        $post = Order::with('Request')->find($id);
        return view('order.view',compact('post'));
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
