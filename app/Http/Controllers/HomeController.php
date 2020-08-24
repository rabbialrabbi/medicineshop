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

        $productList = $this->productList();

        return view('pages.front',compact('productList'));

    }

    public function filter(Request $request)
    {

        $productList = $this->productList();

        if($itemTypeId = $request->input('itemType')){
            $productList = Item::with('generic','brand','itemType')->where('item_type_id',$itemTypeId)->orderBy('name')->get();
        }

        return view('pages.frontFilter',compact('productList'));
    }

    public function about()
    {
        $productList = $this->productList();
        return view('pages.aboutUs',compact('productList'));
    }

    public function mrView()
    {
        $productList = $this->productList();

        $key = request()->key ;
        if(!is_null($key)){
            $items =  MR::orderBy('created_at', 'desc')
                ->where('code', 'like', '%' . $key . '%')
                ->orWhere('name', 'like', '%' . $key . '%')
                ->orWhere('contact1', 'like', '%' . $key . '%')
                ->get();

            return view('pages.mrview',compact('productList','items'));
        }

        $items =  MR::orderBy('created_at', 'desc')->get();
        return view('pages.mrview',compact('productList','items'));
    }
    public function contact()
    {
        $productList = $this->productList();
        return view('pages.contact',compact('productList'));
    }

    public function chairman()
    {
        $productList = $this->productList();

        return view('pages.message.chairman',compact('productList'));
    }
    public function mdMessage()
    {
        $productList = $this->productList();
        return view('pages.message.md',compact('productList'));
    }
    public function edMessage()
    {
        $productList = $this->productList();
        return view('pages.message.ed',compact('productList'));
    }

    public function productList()
    {
       return $productList = Item::with('generic','brand','itemType')->orderBy('name')->get();
    }
}
