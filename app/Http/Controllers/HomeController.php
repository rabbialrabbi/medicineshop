<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $productList = Item::with('generic','brand','itemType')->orderBy('name')->get();

        return view('pages.front',[
            'productList'=>$productList,
        ]);

    }
}
