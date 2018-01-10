<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Post;
use App\CompanyInfo;
use App\ServiceCategory;
use App\ServiceType;
use App\ServiceItem;
use App\Banner;
use App\User;
use App\Feedback;
use App\Advisory;
use App\Customer;
use App\RatingItem;
use Validator;
use Redirect;
use Carbon\Carbon as Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post =DB::table('service_subcategory')
            ->join('service_categories', 'service_subcategory.categoryId', '=', 'service_categories.id')
            ->select('service_subcategory.*', 'service_categories.name as category')
            ->where('service_subcategory.isActive',1)
            ->get();
        $item = DB::table('posts')
            ->join('service_subcategory','posts.typeId','=','service_subcategory.id')
            ->select('posts.*','service_subcategory.name as category')
            ->where('posts.isActive',1)
            ->where('posts.isDraft',1)
            ->get();
        $postcat = ServiceCategory::with(['Post' => function($query) {
            $query->where('isDraft', 1)->where('isFeatured',0);}])
            ->where('isActive',1)->get();
        $comp = CompanyInfo::find(1);
        $model2 = Post::where('isActive',1)->where('isDraft',1)->get();
        $ban = Banner::all()->first();
        $feed = Feedback::where('isSelected',0)->where('isPublish',0)->where('isActive',1)->get();
        $adv =Advisory::where('isActive',1)->first();
     
        // dd($postcat[0]->Post[0]->Item->RateItem[0]['name']);
        return view('Home.index', compact('post','model2','item','postcat','comp','ban','feed','adv'));
    }

    public function prodDescription($id,$type,$item)
    {
        $customer = Customer::all();
        $ranPost = Post::with('ServiceCategory','ServiceType','Item','User')->where('isDraft',1)->where('typeId','=',$type)->inRandomOrder()->limit(6)->get();
        $post = Post::with('ServiceCategory','ServiceType','Item','User')->where('id', $id)->first();
        $reviewcom = collect(DB::select(DB::raw("SELECT CONCAT(customers.firstName,' ',customers.middleName,' ',customers.lastName)as Name, rating_items.description, rating_items.created_at as creat FROM `customers` join rating_items on rating_items.customerId = customers.id join service_items on service_items.id = rating_items.itemId WHERE rating_items.itemId = $item")));
        $rev = ServiceItem::with('RateItem')->where('id',$item)->get();
        //dd($reviewcom);
        return view('Home.prodDescription',compact('id','post','customer','ranPost','reviewcom'));
    }

    public function aboutPage()
    {
        
        return view('Home.about');
    }

    public function getLogout()
    {
         Auth::logout();
         return Redirect('/');
    }

    public function error()
    {
        return view('errors.notauth');
    }

    public function error2()
    {
        return view('errors.notallowed');
    }
    
    public function item($id)
    {   
        
        $mod = ServiceType::with(['item','post' => function($query) {
            $query->where('isDraft', 1);}])
            ->where('id',$id)->get();

        // dd($mod);
        return view('Home.serviceitem',compact('mod'));
    }

    public function register()
    {
        return view('auth.register');
    }

    public function user()
    {
        $post = User::where('isActive',1)->get();
        return view('User.index',compact('post'));
    }

    public function usercreate()
    {
        return view('User.create');
    }

    public function userstore(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ];
        $messages = [
            'unique' => ':attribute already exists.',
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute field must be no longer than :max characters.',
            'regex' => 'The :attribute must not contain special characters.'              
        ];
        $niceNames = [
            'name' => 'Name',
            'email' => 'Email Address',
            'password' => 'Password'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        $validator->setAttributeNames($niceNames); 
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else{
            $cpass = $request->password_confirmation;
            $pass = $request->password;
            if($cpass == $pass)
            {
                try{
                User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'role' => ($request->role)
                ]);
                }catch(\Illuminate\Database\QueryException $e){
                    DB::rollBack();
                    $errMess = $e->getMessage();
                    return Redirect::back()->withError($errMess);
                }
                return redirect('/User')->withSuccess('Successfully inserted into the database.');
            }
            else
            {
                return Redirect::back()->withErrors($validator);
            }
            
        }
    }

    public function useredit($id)
    {
        $user = User::find($id);
        return view('User.update',compact('user'));
    }

    public function userupdate(Request $request, $id)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
        ];
        $messages = [
            'unique' => ':attribute already exists.',
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute field must be no longer than :max characters.',
            'regex' => 'The :attribute must not contain special characters.'              
        ];
        $niceNames = [
            'name' => 'Name',
            'email' => 'Email Address',
            'password' => 'Password'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        $validator->setAttributeNames($niceNames); 
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        else{
            $cpass = $request->password_confirmation;
            $pass = $request->password;
            if($cpass == $pass)
            {
                try{
                User::find($id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'role' => ($request->role)
                ]);
                }catch(\Illuminate\Database\QueryException $e){
                    DB::rollBack();
                    $errMess = $e->getMessage();
                    return Redirect::back()->withError($errMess);
                }
                return redirect('/User')->withSuccess('Successfully updated into the database.');
            }
            else
            {
                return Redirect::back()->withErrors($validator);
            }
            
        }
    }

    public function userdeac($id)
    {
        User::find($id)->update(['isActive' => 0]);
        return redirect('/User');
    }

    public function userreac($id)
    {
        User::find($id)->update(['isActive' => 1]);
        return redirect('/User');
    }

    public function usersoft()
    {
        $post = User::where('isActive',0)->get();
        return view('User.soft',compact('post'));
    }

    public function testimonial()
    {
        $customer = Customer::all();
        $feed = Feedback::where('isActive',1)->where('isPublish',0)->get();
        return view('Home.testimonial',compact('feed','customer'));
    }
}
