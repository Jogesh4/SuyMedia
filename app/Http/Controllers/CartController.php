<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Models\Category;
use App\Models\Package;
use App\Models\User;
use App\Models\CartItem;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->has('user_id')){
                $userID = session()->get('user_id');
                $total = 0;
                // \Cart::session($userID)->clear();
                $cartItems = CartItem::where(['user_id' => session()->get('user_id'),'status' => 1])->get();
                
                foreach($cartItems as $cartitem){
                      $total = $total + $cartitem->total;
                }

                return view('items.cart',compact('cartItems','total'));
            }
            else{
                return redirect('/login');
            }
    }

    public function add_to_cart(Request $request)
    {  
        $userID = session()->get('user_id');
        
        $package = Package::where('id',$request->package_id)->first();

        $cart = CartItem::where(['package_id'=>$package->id,'user_id'=>session()->get('user_id'),'status' => 1])->first();

        // if(!empty($request->variant_id)){
        //     $variant = Variant::where('id',$request->variant_id)->first();
        //     $price = $variant->price;
        //     $size = $variant->type;
        //     $color = $variant->variant_name;
        // }
        // else{
        //     $price = $item->price;
        //     $size = "";
        //     $color = "";
        // }

        if(!$cart){
            $cartItem = new CartItem;
            if(!empty($request->quantity)){
               $cartItem->qty = $request->quantity;
               $cartItem->total = $package->price * $request->quantity;
            }
            else{
                $cartItem->qty = 1;
                $cartItem->total = $package->price;
            }
            $cartItem->name = $package->name;
            $cartItem->image = $package->image;
            $cartItem->price = $package->price;
            $cartItem->package_id = $package->id;
            $cartItem->user_id = $userID;
            $cartItem->status = 1;
            $cartItem->save();
        }
        

        return 1;
    }

   public function remove_from_cart()
    {
        $userID = session()->get('user_id');
        // \Cart::session($userID)->clear();

        $cartItems = CartItem::where('user_id', $userID)->get();
        foreach($cartItems as $item) {
            $item->delete();
        }

        return redirect()->back();
    }

    public function remove_item_from_cart(Request $request)
    {
        $cart_id = $request->cart_id;
        $userID = session()->get('user_id');
        // \Cart::session($userID)->remove($cart_id);

        $cartItems = CartItem::where('id', $cart_id)->delete();

        return redirect()->back();
    }

    public function add_cart_quantity(Request $request)
    {
        $cart_id = $request->cart_id;
        $quantity = $request->quantity + 1;
        $total = 0;
        $userID = session()->get('user_id');

        $cart = CartItem::where('id', $cart_id)->first();
        $cart->qty = $quantity;
        $cart->total = $cart->price * $quantity;
        $cart->save();

        $cartItems = CartItem::where(['user_id' => session()->get('user_id'),'status' => 1])->get();
                
                foreach($cartItems as $cartitem){
                      $total = $total + $cartitem->total;
                }
         
         
        $data['new'] = [
                         'code' => 1,
                         'quantity' => $cart->qty,
                         'price' =>$cart->total,
                         'subtotal' => $total,

                     ];

                return json_encode($data);
    }

    public function minus_cart_quantity(Request $request)
    {
        if($request->quantity > 0){
                $cart_id = $request->cart_id;
                $quantity = $request->quantity - 1;
                $total = 0;
                $userID = session()->get('user_id');

                $cart = CartItem::where('id', $cart_id)->first();
                $cart->qty = $quantity;
                $cart->total = $cart->price * $quantity;
                $cart->save();

                $cartItems = CartItem::where(['user_id' => session()->get('user_id'),'status' => 1])->get();
                        
                        foreach($cartItems as $cartitem){
                            $total = $total + $cartitem->total;
                        }
                
                
                $data['new'] = [
                                'code' => 1,
                                'quantity' => $cart->qty,
                                'price' =>$cart->total,
                                'subtotal' => $total,

                            ];

                        return json_encode($data);
        }
    }

   
}
