<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Generic;
use App\Item;
use App\ItemType;
use App\MR;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $item = Item::all()->count();
        $itemType = ItemType::all()->count();
        $brand = Brand::all()->count();
        $generic = Generic::all()->count();
        $mr = MR::all()->count();
            return view('pages.admin',[
                'item'=>$item,
                'itemType'=>$itemType,
                'brand'=>$brand,
                'generic'=>$generic,
                'mr'=>$mr
            ]);
    }
}
