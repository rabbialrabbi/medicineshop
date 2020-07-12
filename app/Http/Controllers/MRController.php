<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Generic;
use App\ItemType;
use App\MR;
use Illuminate\Http\Request;

class MRController extends Controller
{

    public function index()
    {
        $data =  MR::orderBy('created_at', 'desc')->get();
        $itemType = ItemType::all();
        $brand = Brand::all();
        $generic = Generic::all();
        return view('pages.add.showMRForm',[
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

        $result = MR::create($sanitized);
        return redirect()->back();
    }


    public function show(MR $mR)
    {
        //
    }


    public function edit(MR $mR)
    {
        //
    }


    public function update(Request $request, MR $mR)
    {
        //
    }


    public function destroy(MR $mR)
    {
        $mR->delete();
        return redirect()->back();
    }
}
