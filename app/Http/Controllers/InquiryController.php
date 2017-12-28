<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use App\Inquiries;
use App\Mail\InquirySent;
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

        // $data = array(
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'contact_numer' =>$request->contact_number,
        //     'subject' => $request->subject,
        //     'body' => $request->message
        // );

       $inq = Inquiries::create($request->all());

        \Mail::to($inq)->send(new InquirySent);
        //\Mail::to($inq)->send(new InquirySent($inq));

       // Mail::send('layouts.email', $data, function($message) use ($data){
       //      $message->from($data['email']);
       //      $message->to('hello@gmail.com');
       //      $message->subject($data['subject']);
       // });
       //  return redirect()->back()->withSuccess('Your inquiry has been sent. You will receieve a reply as soon as we checked your inquiry');
        return Redirect::to(URL::previous() . "#inquiry-form")->withSuccess('Your inquiry has been sent. You will receieve a reply as soon as we checked your inquiry');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Inquiries::find($id);
        return view('inquiries.display', compact('post'));
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
        //echo "sdhsd";
        $value = $request->status;
        if($value == null){
            return redirect('/admin')->withErrors('Failed to update.');
        }
        else{
            Inquiries::find($id)->update(['status' => $value]);
            return redirect('/admin')->withSuccess('Successfully updated into the database.');
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
