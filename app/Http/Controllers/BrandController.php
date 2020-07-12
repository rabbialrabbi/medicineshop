<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    public function index()
    {
        $data =  Brand::orderBy('created_at', 'desc')->get();
        return view('pages.add.showBrandForm',[
            'items'=>$data
        ]);
    }


    public function create()
    {

    }


    public function store(Request $request)
    {
        $sanitized = $request->validate([
            'name'=>'required'
        ]);
        $result = Brand::create($sanitized);
        return redirect()->back();
    }


    public function show(Brand $brand)
    {
        //
    }


    public function edit(Brand $brand)
    {
        //
    }


    public function update(Request $request, Brand $brand)
    {
        //
    }


    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->back();
    }
}
