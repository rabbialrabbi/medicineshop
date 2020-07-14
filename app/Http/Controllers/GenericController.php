<?php

namespace App\Http\Controllers;

use App\Generic;
use Illuminate\Http\Request;

class GenericController extends Controller
{

    public function index()
    {

    }

    public function create()
    {
        $data =  Generic::orderBy('created_at', 'desc')->get();
        return view('pages.add.showGenericForm',[
            'items'=>$data
        ]);
    }



    public function store(Request $request)
    {
        $sanitized = $request->validate([
            'name'=>'required'
        ]);

        $result = Generic::create($sanitized);
        return redirect()->back();
    }


    public function show(Generic $generic)
    {
        //
    }


    public function edit(Generic $generic)
    {
        //
    }


    public function update(Request $request, Generic $generic)
    {
        if($generic->status == 'Active'){
            $generic->status = "Inactive";
            $generic->save();
            return redirect()->back();
        }

        $generic->status = "Active";
        $generic->save();
        return redirect()->back();
    }


    public function destroy(Generic $generic)
    {
        $generic->delete();
        return redirect()->back();
    }
}
