<?php

namespace App\Http\Controllers;

use App\ItemType;
use Illuminate\Http\Request;

class ItemTypeController extends Controller
{

    public function index()
    {
        $data =  ItemType::orderBy('created_at', 'desc')->get();
        return view('pages.add.showItemTypeForm',[
            'items'=>$data
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
        $result = ItemType::create($sanitized);
        return redirect()->back();
    }


    public function show(ItemType $itemType)
    {
        //
    }


    public function edit(ItemType $itemType)
    {
        //
    }


    public function update(Request $request, ItemType $itemType)
    {
        //
    }


    public function destroy(ItemType $itemType)
    {
        $itemType->delete();
        return redirect()->back();
    }
}
