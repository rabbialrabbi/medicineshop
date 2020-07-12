<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Generic;
use App\Item;
use App\ItemType;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    public function index()
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


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $sanitized = $request->validate([
            'name'=>'required'
        ]);

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
