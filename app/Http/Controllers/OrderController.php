<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CartItem;
use App\Models\Package;
use App\Models\User;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Mail;
use Razorpay\Api\Api;
use DB;

class OrderController extends Controller
{
  public function place(Request $request)
  {
    $userID = session()->get('user_id');
    $user = User::where('id',$userID)->first();

    

     $total = 0;
    $cartItems = CartItem::where(['user_id' => session()->get('user_id'),'status' => 1])->get();
  
              foreach($cartItems as $cartitem){
                      $total = $total + $cartitem->total;
                }

    $order = new Order;
    $order->transaction = md5($userID.\Carbon\Carbon::now());
    $order->amount = $total;
    $order->user_id = $userID;
    $order->order_status = 0;
    
    if($order->save()){
      foreach($cartItems as $row){

         $package = Package::where('id',$row->package_id)->first();

          $orderItem = new OrderItem;
          $orderItem->name = $row->name;
          $orderItem->image = $row->image;
          $orderItem->price = $row->price;
          $orderItem->qty = $row->qty;
          $orderItem->package_id = $row->package_id;
          $orderItem->order_id = $order->id;
          $orderItem->save();
      }
      $order->items = $cartItems->count();
      $order->save();
    }

    $order->order_no = 'ORD0000' . $order->id;
    $order->save();

    // Mail::to($user->email)->send(new OrderMail($order,$shipping_address,$billing_address));

    $cartItem = CartItem::where(['user_id' => session()->get('user_id')])->update(["status" => 0]);

    \Cart::session($userID)->clear();

    $last_order = DB::table('orders')
                    ->where('orders.user_id', '=', $userID)
                    ->orderBy('orders.id', 'DESC')
                    ->first();
    // Razorpay Transaction
                $api = new Api('rzp_test_6H6AUtBZCXyatL', 'MByNkzz8MybQMZ8q8RR2KfUD');

                // RazorpayOrder
                $RazorpayOrder  = $api->order->create(array('receipt' => 'order_rcptid_'.$last_order->id, 'amount' => $last_order->amount * 100, 'currency' => 'INR')); // Creates RazorpayOrder
                $orderId = $RazorpayOrder['id']; // Get the created RazorpayOrder ID
                $RazorpayOrder  = $api->order->fetch($orderId);
                $payments = $api->order->fetch($orderId)->payments();

    $data['new'] = [
                         'code' => 1,
                         'order' => $order,
                         'orderId' => $orderId,

                     ];

                return json_encode($data);

    // return redirect()->route('user_dashboard');
  }

  public function update_order_status(Request $request){

       $order = Order::where('id',$request->OrderID)->first();
       $order->razorpay_order_id = $request->razorpay_order_id;
       $order->razorpay_payment_id = $request->razorpay_payment_id;
       $order->razorpay_signature = $request->razorpay_signature;

       if($order->save()){
                $data['code'] = 200;
                $data['result'] = 'success';
                $data['message'] = 'Action completed';
       }
       

  }

}
