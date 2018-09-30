<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food_Order;
class FoodOrderController extends Controller
{
  
    public function index()
    {
       $food_order=Food_Order::all(); 
       // return 'jfuaiyi';

       return view('backend.foodOrder.index')->with('food_order',$food_order);
    }

    public function status(Request $request, $id) {
        $order = Food_Order::findorFail($id);
        

        $status =1;
        
        $order->update([
            'status' => $status,
            
        ]);
        
        // return $order;
        return redirect()->route('food_order.index');
        // return $request['status'];
    }
    public function delete($id)
    {
       food_order::findorFail($id)->delete();
        return redirect()->route('food_order.index');
        // return 'fuag';
    }

   
    public function edit($id)
    {
        $food_order=Food_Order::findOrFail($id);
        // $order=Food_Order::get(); 
       
        return view('backend.foodOrder.edit')->with('food_order',$food_order);
    }

    
    public function updatefood(Request $request, $id)
    {
     
       $foodname =explode('.',  $request->namefood);
       $price =explode(',',  $request->price);
       $qty =explode('.',  $request->qty);
       // return $price;
       $total=0;
            for ($i=0; $i <sizeof($foodname) ; $i++) { 
                        $stringName = implode("<br>",$foodname);
                        $stringPrice = implode("<br>",$price);
                        $stringQty = implode("<br>",$qty);

                       $total+= (float) $price[$i] * (float) $qty[$i];
                        
                        // echo $total[$i];  
            }
            
            $food_order =Food_Order::findOrFail($id);
            $food_order->food_name=$stringName;
            $food_order->unit_price=$stringPrice;
            $food_order->qty=$stringQty;
            $food_order->total= $total;
            $food_order->cust_phone= $request->cust_phone;
            $food_order->cust_add= $request->cust_add;
            $food_order->save();

            $food_order = Food_Order::all();

            return view('backend.foodOrder.index')->with('food_order',$food_order);
    }

}
