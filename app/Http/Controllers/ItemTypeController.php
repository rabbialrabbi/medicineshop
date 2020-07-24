<?php

namespace App\Http\Controllers;

use App\ItemType;
use PDF;
use Illuminate\Http\Request;

class ItemTypeController extends Controller
{

    public function index()
    {

    }


    public function create()
    {
        $data =  ItemType::orderBy('created_at', 'desc')->get();
        return view('pages.add.showItemTypeForm',[
            'items'=>$data
        ]);
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
        if(!is_null($request->status)){
            if($itemType->status == 'Active'){
                $itemType->status = "Inactive";
                $itemType->save();
                return redirect()->back();
            }

            $itemType->status = "Active";
            $itemType->save();
        }
        if(!is_null($request->name)){

            $itemType->name = $request->name;
            $itemType->save();
        }

        return redirect()->back();
    }


    public function destroy(ItemType $itemType)
    {
        $itemType->delete();
        return redirect()->back();
    }
    public function pdf()
    {
        $show['name']= 'Item Type List';
        $show['data'] = ItemType::all();
        $pdf = PDF::loadView('pages.pdf.genericPdf', compact('show'));
        return $pdf->stream();
    }
}
