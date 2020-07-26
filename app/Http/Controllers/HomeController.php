<?php

namespace App\Http\Controllers;

use App\Generic;
use App\Item;
use App\MR;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function index()
    {

        if($locale = request()->input('locale')){

            if (! in_array($locale, ['en', 'bd'])) {
                abort(400);
            }
            App::setLocale($locale);
            session()->put('locale',$locale);
        }

        $productList = Item::with('generic','brand','itemType')->orderBy('name')->get();
        $mr = MR::all()->take(7);
        $generic = Generic::all()->take(7);
//        dd($mr);

        return view('pages.front',compact('productList','mr','generic'));

    }

    public function filter(Request $request)
    {
        $mr = MR::all();
        $generic = Generic::all();
        $productList = Item::with('generic','brand','itemType')->orderBy('name')->get();

        if($genericId = $request->input('generic')){
            $productList = Item::with('generic','brand','itemType')->where('generic_id',$genericId)->orderBy('name')->get();

        }
//        dd($productList);

        return view('pages.front',compact('productList','mr','generic'));
    }
}
