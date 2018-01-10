<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use App\CompanyInfo;
use App\Inquiries;
use App\Mail\InquirySent;
use Mail;
use DB;
use Nexmo;
use Nexmo\Client;

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

    public function read()
    {
        $post =DB::table('inquiries')
        ->select('inquiries.*')
        ->where('inquiries.status',1)
        ->get(); 
        return view('inquiries.read',compact('post'));
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

        try{
        $inq = Inquiries::create($request->all());
        $post = CompanyInfo::find(1);
        \Mail::to($inq)->send(new InquirySent($inq, $post));
        // $to = $request->contact_number;
        
        // Nexmo::message()->send([
        //     'to'   => $to,
        //     'from' => '16105552344',
        //     'text' => 'Using the facade to send a message.'
        // ]);
        }catch(\Illuminate\Database\QueryException $e){
            DB::rollBack();
            $errMess = $e->getMessage();
            return Redirect::back()->withError($errMess);
        }
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
