<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Package;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderItem;
use Symfony\Component\HttpFoundation\Session\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('user_id',session()->get('loginId'))->orderBy('id', 'DESC')->get();

        return view('admin.manage-order',compact('orders'));
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
        //
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

    public function order_detail($id)
    { 
       if(!empty(session()->get('loginId'))){
           $user = User::where('id',session()->get('loginId'))->first();
           $order = Order::where('id',$id)->orderBy('id', 'DESC')->first();
           $orderitems = OrderItem::where('order_id',$order->id)->get();
           $type = 'item';
           return view('admin.order-detail',compact('user','order','orderitems','type'));
       }
       else{
            return redirect()->route('login');
       }
        
    }
}
