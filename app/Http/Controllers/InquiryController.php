<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inquiries;
use Mail;

class InquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'contact_numer' =>$request->contact_number,
            'subject' => $request->subject,
            'body' => $request->message
        );
       Inquiries::create($request->all());

    //    Mail::send('layouts.email', $data, function($message) use ($data){
    //         $message->from($data['email']);
    //         $message->to('hello@gmail.com');
    //         $message->subject($data['subject']);
    //    });
        return redirect('/prodDescription/1')->withSuccess('Your inquiry has been sent. You will receieve a reply as soon as we checked your inquiry');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inq = Inquiries::find($id);
        return view('inquiries.display', compact('inq'));
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
