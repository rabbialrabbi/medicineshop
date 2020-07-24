<?php

namespace App\Http\Controllers;

use App\Brand;
use PDF;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    public function index()
    {

    }


    public function create()
    {
        $data =  Brand::orderBy('created_at', 'desc')->get();
        return view('pages.add.showBrandForm',[
            'items'=>$data
        ]);
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
//        dd("working");

        if(!is_null($request->status)){
            if($brand->status == 'Active'){
                $brand->status = "Inactive";
                $brand->save();
                return redirect()->back();
            }

            $brand->status = "Active";
            $brand->save();
        }
        if(!is_null($request->name)){

            $brand->name = $request->name;
            $brand->save();
        }

        return redirect()->back();

    }


    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->back();
    }

    public function pdf()
    {
        $show['name']= 'Brand List';
        $show['data'] = Brand::all();
        $pdf = PDF::loadView('pages.pdf.genericPdf', compact('show'));
        return $pdf->stream();
    }
}
