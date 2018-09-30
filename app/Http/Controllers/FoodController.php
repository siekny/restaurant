<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Food;
use App\Food_Order;
use DB;
use Session;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\User;
class FoodController extends Controller
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
        $menus=Menu::all(); 
        $users=User::all(); 
        $food = DB::select("SELECT * FROM food ORDER BY id DESC LIMIT 5");
        return view('frontend.home')->with('menus',$menus)->with('food',$food)->with('users',$users);
    }
    public function about()
    {
 
        $menus=Menu::all();
        $food = DB::select("SELECT * FROM food ORDER BY id DESC LIMIT 6");
        return view('frontend.about')->with('menus',$menus)->with('food',$food);
    }
    public function contact()
    {

        $menus=Menu::all();
        return view('frontend.contact')->with('menus',$menus);
    }
    public function reservation()
    {
        $order = Food_Order::get()->first();
        $menus=Menu::all();

        // return $contact;

        $allCategory=DB::table('food')->get();
        $numCategory = array();
        $i=0;
        foreach ($allCategory as $test) {
            $numCategory[$i] =$test->cate_id;
            $i++;
        }
        $category=array_unique($numCategory);
        $j=0;
        $food=array();
        foreach ($category as $key) {
          $food[$j]=Food::where('cate_id',$key)->get();
          $j++;
        }
        $count=count($food);
        return view('frontend.reservation')->with('menus',$menus)->with('food',$food)->with('count',$count)->with('order', $order);
    }
    public function allmenu($id)
    {   
        $food = DB::table('food')
                  ->where('cate_id', $id)
                  ->paginate(10);
        $first = Food::with('getCategory')->where('cate_id',$id)->first();
        $menus=Menu::all();
        return view('frontend.food')->with('menus',$menus)->with('food',$food)->with('first',$first);
    }

    public function order(Request $request){
        
        if ($request->ajax()) {
            $qty=$request->qty;
            $food=array();
            $n=$request->counter;
            for ($i=0; $i < $n; $i++) { 
                $food[$i]=Food::find($request->foodId[$i]);
            }
            return response(['food'=>$food,'qty'=>$qty,'count'=>$n,'picture'=>$request->picture]);
        }
    }
    public function orderStore(request $request){
        $order = new Food_Order;
        $rules  =  array(
                'contact'       => 'required',
                'address'         => 'required'
                   ) ;
        
        $order->contact = $request->input('contact');
        $contact = $order->contact;

        
         $validator = Validator::make ( Input::all(), $rules);
          if ($validator->fails())
          return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

        if ($request->ajax()) {
            $qty=$request->qty;
            $food=array();
            $n=$request->counter;
            for ($i=0; $i < $n; $i++) { 
                $food[$i]=Food::find($request->foodId[$i]);
            }
            $order=new Food_Order;
            $order->cust_phone=$request->contact;
            $order->cust_add=$request->address;
            $order->total=$request->total;

            $foodname=array();
            $foodprice=array();
            $foodqty=array();
            for($i=0; $i< $n; $i++){
                $foodname[$i]=$food[$i]->name;
                $foodprice[$i]=$food[$i]->price;
                $foodqty[$i]=$qty[$i];
            }
            for ($i=0; $i <sizeof($foodname) ; $i++) { 
                        $stringName = implode("<br>",$foodname);
                        $stringPrice= implode("<br>",$foodprice);
                        $stringQty  = implode("<br>",$foodqty);
            }
            $order->food_name=$stringName;
            $order->unit_price=$stringPrice;
            $order->qty=$stringQty;
            $order->picture=$request->picture;
        
            $order->save();
            // return view('frontend.reservation')
                // ->with('food', $food)->with('qty', $qty)->with('count', $n)->with('order', $stringName)->with('picture', $order->picture)
                // ->with('contact', $contact);
            return response(['food'=>$food,'qty'=>$qty,'count'=>$n,'order'=>$stringName,'picture'=>$order->picture, 'contact'=>$contact]);
        }
        
    }
    public function orderSuccess(){
        Session::flash('success', 'Thank you !! You have ordered successfully! We will contact you soon ');

        $order = Food_Order::get()->last();

        $menus=Menu::all();

        // return $contact;

        $allCategory=DB::table('food')->get();
        $numCategory = array();
        $i=0;
        foreach ($allCategory as $test) {
            $numCategory[$i] =$test->cate_id;
            $i++;
        }
        $category=array_unique($numCategory);
        $j=0;
        $food=array();
        foreach ($category as $key) {
          $food[$j]=Food::where('cate_id',$key)->get();
          $j++;
        }
        $count=count($food);
        return view('frontend.reservation')->with('menus',$menus)->with('food',$food)->with('count',$count)->with('order', $order);

        // return $order;
        
        return view('frontend.reservation')->with('order', $order);
        // return redirect(route('reservation'))->with('order', $order);
    }

    public function ordered ($id) {
        $order=Food_Order::findOrFail($id);
       
        return view('frontend.ordered')->with('order', $order);
    }

    public function history($cust_phone) {
        // $order = Food_Order::findOrFail($cust_phone);
        $order = DB::Table('food_order')->where('cust_phone', $cust_phone)->get();
        $Lastorder = Food_Order::get()->last();
        // return $order;
        return view('frontend.history')->with('order', $order)->with('Lastorder', $Lastorder);
    }
}
