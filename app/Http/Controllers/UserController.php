<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Favorite;
use App\Models\CartItem;


class UserController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  Item $item
     * @return \Illuminate\Http\Response
     */
    public function dashboard(Request $request)
    {
       if(session()->has('user_id')){

            return view('user.dashboard');
        }
        else{
             return redirect('/login');
        }
        
    }

    public function profile(Request $request)
    {
        if(!empty(session()->get('user_id'))){
           $user = User::where('id',session()->get('user_id'))->first();
           return view('user.profile',compact('user'));
       }
       else{
            return redirect()->route('login');
       }
    }

    public function order_list(Request $request)
    {
           $orders = Order::where('user_id',session()->get('user_id'))->orderBy('id', 'DESC')->get();

        return view('user.my-orders',compact('orders'));
    }

    public function order_detail($id)
    { 
       if(!empty(session()->get('user_id'))){
           $user = User::where('id',session()->get('user_id'))->first();
           $order = Order::where('id',$id)->orderBy('id', 'DESC')->first();
           $orderitems = OrderItem::where('order_id',$order->id)->get();

           return view('user.order-detail',compact('user','order','orderitems'));
       }
       else{
            return redirect()->route('login');
       }
        
    }

    public function last_order(Request $request)
    {
      $order = Order::where('user_id',session()->get('user_id'))->latest()->first();

      $orderitems = OrderItem::where('order_id',$order->id)->get();
      $user = User::where('id',session()->get('user_id'))->first();

        return view('user.order-detail',compact('order','orderitems','user'));
    }

    public function cart(Request $request)
    {
        return view('user.cart');
    }

     public function favorite(Request $request){
         
        $favorites = Favorite::where('user_id',session()->get('user_id'))->get();

        if(auth()->check()){
        \Cart::clear();
         \Cart::session(session()->get('user_id'))->clear();
        $carts = CartItem::where(['user_id'=>session()->get('user_id'),'status' => 1])->get();
          foreach($carts as $cart){
            \Cart::session(session()->get('user_id'))->add(array(
                'id' => $cart->item_id,
                'name' => "fvfdv",
                'price' => 34,
                'quantity' => 1,
                'attributes' => array(),
                'associatedModel' => array()
            ));
        }
    }
         
        return view('user.favorite',compact('favorites'));
     }

}
