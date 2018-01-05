<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feedback;
use App\RatingItem;
use App\Customer;
use Redirect;
use DB;
use Validator;

class feedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $post = Feedback::where('isActive',1)->get();
        return view('Feedback.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function review(Request $request){

        $rules = [
            'customerId' => ['required','unique:rating_items'],
            'itemId' => 'required',
            'rating' => 'required',
            'description' => 'required'
        ];
        $messages = [
            'unique' => ':attribute already exists.',
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute field must be no longer than :max characters.',
            'regex' => 'The :attribute must not contain special characters.'              
        ];
        $niceNames = [
            'customerId' => 'Customer',
            'itemId' => 'Item',
            'rating' => 'Rating',
            'description' => 'Comment'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        $validator->setAttributeNames($niceNames); 
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        else{
            try{
            $nullCust = $request->customerId;
            //dd($nullCust);
            if($nullCust == null || $nullCust == "")
            {
                return Redirect::back()->withError('Please select a customer');
            }
            else
            {
                 RatingItem::create([
                'customerId' => $nullCust,
                'itemId' => ($request->itemId),
                'rating' => ($request->rating),
                'description' => ($request->description)
                ]);
                return Redirect::back()->withSuccess('Successfully inserted into the database.');
            }
           
            }catch(\Illuminate\Database\QueryException $e){
                DB::rollBack();
                $errMess = $e->getMessage();
                return Redirect::back()->withError($errMess);
            }
            
        }
     }

     public function indexReview()
     {
         $post = RatingItem::with('Item')->get();
        return view('Reviews.index',compact('post'));
     }

    public function create()
    {
        return view('Feedback.create');
    }

    public function publish($id)
    {
            Feedback::find($id)->update(['isPublish' => 0]);
            return redirect('/Feedback');
    }

    public function unpublish($id)
    {
            Feedback::find($id)->update(['isPublish' => 1]);
            return redirect('/Feedback');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sel = $request->isSelected;
        if($sel == null || $sel == '') {
            $sel = 1;
        }
        else
        {
            $sel = 0;
        }
        $chkFeed = Feedback::where('isSelected',0)->get();
        if(count($chkFeed) >= 3 && $sel == 0)
        {
            return Redirect::back()->withError('It seems there are already 3 selected feedbacks post on the site.');
        }
        else
        {
            try{
            $file = $request->file('image');
            $pic = "";
            if($file == '' || $file == null){
                $pic = "img/steve.jpg";
            }else{
                $date = date("Ymdhis");
                $extension = $request->file('image')->getClientOriginalExtension();
                $pic = "img/".$date.'.'.$extension;
                $request->file('image')->move("img",$pic);    
                // $request->file('photo')->move(public_path("/uploads"), $newfilename);
            }
            $post = Feedback::create([
                'customerId' => ($request->customerId),
                'image' => $pic,
                'description' => ($request->description),
                'rating' => ($request->rating),
                'isSelected' => $sel
            ]);
            $post = $post->refresh();
            }catch(\Illuminate\Database\QueryException $e){
                DB::rollBack();
                $errMess = $e->getMessage();
                return Redirect::back()->withErrors($errMess);
            }
            return redirect('/Testimonial')->withSuccess('Your feedback has been received. Thank you');
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
        $customer = Customer::all();
        $post = Feedback::find($id);
        return view('Feedback.update',compact('post','customer'));
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
        $sel = $request->isSelected;
        if($sel == null || $sel == '') {
            $sel = 1;
        }
        else
        {
            $sel = 0;
        }
        $chkFeed = Feedback::where('isSelected',0)->get();
        if(count($chkFeed) >= 3)
        {
            return Redirect::back()->withError('It seems there are already 3 selected feedbacks post on the site.');
        }
        else 
        {
            try{
            $file = $request->file('image');
            $pic = "";
            if($file == '' || $file == null){
                $nullpic = Feedback::find($id);
                $pic = $nullpic->image;
            }else{
                $date = date("Ymdhis");
                $extension = $request->file('image')->getClientOriginalExtension();
                $pic = "img/".$date.'.'.$extension;
                $request->file('image')->move("img",$pic);    
                // $request->file('photo')->move(public_path("/uploads"), $newfilename);
            }
            
            $post = Feedback::find($id)->update([
                'customerId' => ($request->customerId),
                'image' => $pic,
                'description' => ($request->description),
                'rating' => ($request->rating),
                'isSelected' => $sel
            ]);
            }catch(\Illuminate\Database\QueryException $e){
                DB::rollBack();
                $errMess = $e->getMessage();
                return Redirect::back()->withErrors($errMess);
            }
            return redirect('/Feedback')->withSuccess('Successfully inserted into the database.');
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
        Feedback::find($id)->update(['isActive' => 0]);
        return redirect('/Feedback');
    }

    public function soft()
    {
        $post = Feedback::where('isActive', 0)->get();
        return view('Feedback.soft',compact('post'));
    }

    public function reactivate($id)
    {
        Feedback::find($id)->update(['isActive' => 1]);
        return redirect('/Feedback');
    }
}
