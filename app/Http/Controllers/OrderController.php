<?php

namespace App\Http\Controllers;

use App\Item;
use App\Order;
use App\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd(request()->except(['_token','order_name']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->order_name);
        $order_name = $request->order_name;
        $productList = request()->except(['_token','order_name']);


        $request->validate([
           'order_name'=>'required'
        ]);

        /* Create Order*/
        $order_status = Order::create([
            'order_name'=>$order_name,
            'user_id'=>Auth::user()->id,
        ]);

        if(is_null($order_status)){
            dd('Order insert Error');
        }

        foreach ($productList as $k=>$i){
            $list[]=['item'=>Item::findOrFail($k),'quantity'=>$i];
        }

        if(is_null($list)){
            dd('Product list create Error');
        }
        foreach($list as $l){
            $insertData[] = [
                'order_id'=>$order_status->id,
                'item_id'=>$l['item']->id,
                'quantity'=>$l['quantity'],
                'price'=>$l['item']->price
            ];
        }
        if(is_null($insertData)){
            dd('insert Data create Error');
        }

        $order_details = OrderDetails::insert($insertData);

        if(is_null($order_details)){
            dd('insert details create Error');
        }

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
