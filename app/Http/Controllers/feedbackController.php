<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feedback;
use Redirect;

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
    public function create()
    {
        return view('Feedback.create');
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
                'name' => ($request->name),
                'image' => $pic,
                'description' => ($request->description),
                'rating' => ($request->rating),
                'isSelected' => $sel
            ]);
            $post = $post->refresh();
            return redirect('/Feedback')->withSuccess('Successfully inserted into the database.');
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
        $post = Feedback::find($id);
        return view('Feedback.update',compact('post'));
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
                'name' => ($request->name),
                'image' => $pic,
                'description' => ($request->description),
                'rating' => ($request->rating),
                'isSelected' => $sel
            ]);
        
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
