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
        $key = request()->key ;
        if(!is_null($key)){
            $data =  Order::orderBy('created_at', 'desc')
                ->where('order_name', 'like', '%' . $key . '%')
                ->get();

            return view('pages.show.showOrderList',[
                'items'=>$data
            ]);
        };
        $data =  Order::orderBy('created_at', 'desc')->get();
//        dd($data[0]->order_details);
        return view('pages.show.showOrderList',[
            'items'=>$data
        ]);
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

        foreach ($productList as $k=>$i){
            $list[]=['item'=>Item::findOrFail($k),'quantity'=>$i];
        }

        foreach($list as $l){
            $insertData[] = [
                'order_id'=>$order_status->id,
                'item_id'=>$l['item']->id,
                'quantity'=>$l['quantity'],
                'price'=>$l['item']->price
            ];
        }

        $order_details = OrderDetails::insert($insertData);

        if (session()->has('product_list')) {
            session()->put('product_list',[]);
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
        $withModel = $order->load(['order_details.item','user.mr']);
//        dd($withModel);


        return view('pages.show.showOrderElement',[
            'order'=>$withModel
        ]);
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

    public function print(Order $order)
    {
        $withModel = $order->load(['order_details.item','user.mr']);

        return view('pages.show.printOrderElement',[
            'order'=>$withModel
        ]);
    }


}
