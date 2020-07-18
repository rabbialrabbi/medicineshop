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
        $data =  Generic::orderBy('name')->get();
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
//        dd($request->all());
        if(!is_null($request->status)){
            if($generic->status == 'Active'){
                $generic->status = "Inactive";
                $generic->save();
                return redirect()->back();
            }

            $generic->status = "Active";
            $generic->save();
        }
        if(!is_null($request->name)){

            $generic->name = $request->name;
            $generic->save();
        }

        return redirect()->back();
    }


    public function destroy(Generic $generic)
    {
        $generic->delete();
        return redirect()->back();
    }
}
