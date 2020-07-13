<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Generic;
use App\Item;
use App\ItemType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    public function index()
    {

    }


    public function create()
    {
        $data =  Item::orderBy('created_at', 'desc')->get();
        $itemType = ItemType::all();
        $brand = Brand::all();
        $generic = Generic::all();
        return view('pages.add.showItemForm',[
            'items'=>$data,
            'itemType'=>$itemType,
            'brand'=>$brand,
            'generic'=>$generic,
        ]);
    }


    public function store(Request $request)
    {
        $sanitized = $request->validate([
        'item_type_id'=>'required|numeric',
        'generic_id'=>'required|numeric',
        'brand_id'=>'required|numeric',
        'code'=>'required',
        'name'=>'required',
        'size'=>'required',
        'dosage'=>'required',
        'price'=>'required',
        'description'=>'required',
        'image'=>'required|image|mimes:png,jpg,jpeg',
            ]);


        $sanitized['image'] = 'item_'.$request->code.'_'.Carbon::now()->timestamp.'.'.$request->file('image')->getClientOriginalExtension();
        $request->file('image')->storeAs('public/item',$sanitized['image']);
        $result = Item::create($sanitized);
        return redirect()->back();
    }


    public function show(Item $item)
    {
        //
    }


    public function edit(Item $item)
    {
        //
    }


    public function update(Request $request, Item $item)
    {
        //
    }


    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->back();
    }
}
