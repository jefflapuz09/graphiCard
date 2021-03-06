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
use App\userEmployee;
use App\Package;
use Validator;
use Redirect;
use App\Order;
use App\OrderRequest;
use Carbon\Carbon as Carbon;
use Hash;
use Illuminate\Validation\Rule;
use Gloudemans\Shoppingcart\Facades\Cart;

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
        // return view('Home.gg');
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
        
        $mod = ServiceType::with(['item' => function($query) use($id) {$query->where('id',$id);},'post' => function($query) {
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
            'firstName' => ['required','max:50', 'regex:/^[^~`!@#*_={}|\;<>,?()$%&^]+$/'],
            'middleName' => ['nullable','max:45','regex:/^[^~`!@#*_={}|\;<>,?()$%&^]+$/'],
            'lastName' => ['required','max:45','regex:/^[^~`!@#*_={}|\;<>,?()$%&^]+$/'],
            'gender' => 'required',
            'street' => 'required|max:140',
            'brgy' => 'required|max:140',
            'city' => 'required|max:140',
            'contactNumber' => ['required','max:30','regex:/^[^_]+$/'],
            'email' => ['required','unique:users','email'],
            'password' => 'required|string|min:6|confirmed'
        ];
        $messages = [
            'unique' => ':attribute already exists.',
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute field must be no longer than :max characters.',
            'regex' => 'The :attribute must not contain special characters.'              
        ];
        $niceNames = [
            'firstName' => 'First Name',
            'middleName' => 'Middle Name',
            'lastName' => 'Last Name',
            'contactNumber' => 'Contact Number',
            'street' => 'Street',
            'brgy' => 'Brgy',
            'city' => 'City',
            'gender' => 'Gender',
            'email' => 'Email Address',
            'password' => 'Password',
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
                    
                    userEmployee::create([
                        'firstName' => $request->firstName,
                        'middleName' => $request->middleName,
                        'lastName' => $request->lastName,
                        'contactNumber' => $request->contactNumber,
                        'street' => $request->street,
                        'brgy' => $request->brgy,
                        'city' => $request->city,
                        'gender' => $request->gender
                    ]);
            
                    $employeeId = DB::getPdo()->lastInsertId();

                User::create([
                    'employeeId' => $employeeId,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'role' => $request->role
                ]);
                }catch(\Illuminate\Database\QueryException $e){
                    DB::rollBack();
                    $errMess = $e->getMessage();
                    return Redirect::back()->withError($errMess);
                }
                return redirect('/Utilities')->withSuccess('Successfully inserted into the database.');
            }
            else
            {
                return Redirect::back()->withErrors('The password does not match');
            }
            
        }
    }

    public function useredit($id)
    {
        $user = User::with('Employee')->find($id);
        return view('User.update',compact('user'));
    }

    public function userupdate(Request $request, $id)
    {
        $rules = [
            'firstName' => ['required','max:50','unique:customers', 'regex:/^[^~`!@#*_={}|\;<>,?()$%&^]+$/'],
            'middleName' => ['nullable','max:45','regex:/^[^~`!@#*_={}|\;<>,?()$%&^]+$/'],
            'lastName' => ['required','max:45','regex:/^[^~`!@#*_={}|\;<>,?()$%&^]+$/'],
            'gender' => 'required',
            'street' => 'required|max:140',
            'brgy' => 'required|max:140',
            'city' => 'required|max:140',
            'contactNumber' => ['required','max:30','regex:/^[^_]+$/'],
            'email' => ['required',Rule::unique('users')->ignore($id),'email'],
            'password' => 'required|string|min:6|confirmed'
        ];
        $messages = [
            'unique' => ':attribute already exists.',
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute field must be no longer than :max characters.',
            'regex' => 'The :attribute must not contain special characters.'              
        ];
        $niceNames = [
            'firstName' => 'First Name',
            'middleName' => 'Middle Name',
            'lastName' => 'Last Name',
            'contactNumber' => 'Contact Number',
            'street' => 'Street',
            'brgy' => 'Brgy',
            'city' => 'City',
            'gender' => 'Gender',
            'email' => 'Email Address',
            'password' => 'Password',
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
             
                    userEmployee::find($request->hidid)->update([
                        'firstName' => $request->firstName,
                        'middleName' => $request->middleName,
                        'lastName' => $request->lastName,
                        'contactNumber' => $request->contactNumber,
                        'street' => $request->street,
                        'brgy' => $request->brgy,
                        'city' => $request->city,
                        'gender' => $request->gender
                    ]);
            
                    $employeeId = DB::getPdo()->lastInsertId();

                User::find($id)->update([
                    'employeeId' => $request->hidid,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'role' => $request->role
                ]);
                }catch(\Illuminate\Database\QueryException $e){
                    DB::rollBack();
                    $errMess = $e->getMessage();
                    return Redirect::back()->withError($errMess);
                }
                return redirect('/Utilities')->withSuccess('Successfully updated into the database.');
            }
            else
            {
                return Redirect::back()->withErrors('The password does not match');
            }
            
        }
    }

    public function userdeac($id)
    {
        $chkEmp = DB::table('users as u')
        ->join('user_employees as e','u.employeeId','e.id')
        ->select('e.id')
        ->where('u.id',$id)
        ->get();
        $emp = User::with('Employee')->where('isActive',1)->where('id',$id)->first();
        userEmployee::find($emp->Employee->id)->update(['isActive' => 0]);
        User::find($id)->update(['isActive' => 0]);
        return redirect('/UserSoft');
    }

    public function userreac($id)
    {
        $chkEmp = DB::table('users as u')
        ->join('user_employees as e','u.employeeId','e.id')
        ->select('e.id')
        ->where('u.id',$id)
        ->get();
        $emp = User::with('Employee')->where('isActive',0)->where('id',$id)->first();
        userEmployee::find($emp->Employee->id)->update(['isActive' => 1]);
        User::find($id)->update(['isActive' => 1]);
        return redirect('/Utilities');
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

    public function allItems()
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
        return view('Home.review', compact('post','model2','item','postcat','comp','ban','feed','adv'));
    }

    public function custLogin()
    {
        return view('Home.custLogin');
    }

    public function custLog(Request $request)
    {
        
        $email = $request->email;
        $pass = $request->password;
        $authUser = User::where('email',$email)->first();
        if (Auth::attempt(['email' => $email, 'password' => $pass])) {
            // Authentication passed...
            return redirect()->intended('/');
        }
        else 
        {
            return Redirect::back()->withErrors('Invalid Credentials');
        }
    }

    public function custRegister()
    {
        return view('Home.custRegister');
    }

    public function order()
    {
        return view('Home.order');
    }

    public function package()
    {
        $post = Package::with('Inclusion')->where('isActive',1)->get();
        return view('Home.package',compact('post'));
    }

    public function cart(Request $request, $id, $itemid)
    {
        $post = ServiceType::with(['item' => function($query) use($itemid) {
            $query->where('id', $itemid);},'post' => function($query) use($itemid) {
                $query->where('itemId', $itemid);}])->find($id);
        //Cart::add(['id'=>$ctr,'name'=>$variant,'qty'=>$qty,'price'=>'0']);
        
        foreach($post->item as $items)
        {

        }
        
        $jobDesc = $request->jobDesc;
        $attributeName = $request->attributeName;
        $choice = $request->choiceDesc;
        $index = 0;
        
        $file = $request->file('image');
        $pic = "";
        if($file == '' || $file == null){
            $pic = "img/grey-pattern.png";
        }else{
            $date = date("Ymdhis");
            $extension = $request->file('image')->getClientOriginalExtension();
            $pic = "img/".$date.'.'.$extension;
            $request->file('image')->move("img",$pic);    
            // $request->file('photo')->move(public_path("/uploads"), $newfilename);
        }
        
        $at = "";
        foreach($attributeName as $attribute)
        {
            $at = $at. ''. $attribute . '- ' .$choice[$index]. '</br>';
            $index++;
        }
        Cart::add(['id'=>$items->id,'name'=>$items->name,'qty'=>$request->qty,'price'=>$items->price,'options'=>['description'=>$jobDesc,'specification'=>$at,'base_price'=>$items->Subcategory->price,'image'=>$pic]]);
        
        // return redirect('/customer/cart/view',compact('customerId','qty','remarks'));
        return redirect('/customer/cart/view');
    }

    public function cartPackage($id,Request $request)
    {
        $post = Package::find($id);

        foreach($request->packItem as $item)
        {
            
        }
        Cart::add(['id'=>$post->id,'name'=>$item->name,'qty'=>$request->qty,'price'=>$post->price]);
    }

    public function viewcart()
    {

        $post = Cart::content();
        return view('Home.cart',compact('post'));
    }

    public function removecart($id)
    {
        $rowId = $id;
        Cart::remove($rowId);
        return redirect('/customer/cart/view');
    }

    public function checkout(Request $request)
    {
        $custId = $request->customerId;
        $remarks = $request->remarks;
        $qty = $request->qty;
        $jobOrder = $request->description;
        $item = $request->item;
        $spec = $request->spec;
    
        $data =  Order::create([
            'customerId' => $custId,
            'remarks' => $remarks,
            'status' => 0,
            'price' => $request->price
        ]);
        $index = 0;
        foreach($item as $itemp)
        {
            OrderRequest::create([
                'orderId' => $data->id,
                'itemName' => $itemp,
                'quantity' => $qty[$index],
                'orderDescription' => $spec,
                'remarks' => $jobOrder[$index],
                'image' => $request->pic
            ]);
            $index++;
        }
        Cart::destroy();
        return redirect('/customer/cart/view');
    }

    public function custDashboard()
    {
        $custID = Auth::user()->Customer->id;
        $post = Order::with('Request','Customer')->where('customerId',$custID)->where('status',0)->get();
        //finish
        $post1 = Order::with('Request','Customer')->where('customerId',$custID)->where('status',1)->get();
        return view('Home.custDashboard',compact('post','post1'));
    }

    public function search()
    {
        return view('Home.search');
    }

    public function searchresult(Request $request)
    {
        $search = $request->search;
        $sub = DB::table('service_subcategory as s')
                ->join('posts as p','s.id','p.typeId')
                ->select('s.name','p.id','p.typeId','p.itemId','p.image')
                ->where('isDraft',1)
                ->where('s.name','like',$search);

        $it = DB::table('service_items as i')
                ->join('posts as p','i.id','p.itemId')
                ->select('i.name as item','p.id','p.typeId','p.itemId','p.image')
                ->where('i.name',$search)
                ->where('isDraft',1)
                ->union($sub)
                ->get();

        return redirect('/Search')->with(['data'=>$it]);
    }

    public function payment()
    {
        return view('Home.payment');
    }
}
