<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function index()
    {

        if(array_key_exists('locale',request()->all())){
            $locale = request()->all()['locale'];
            if (! in_array($locale, ['en', 'bd'])) {
                abort(400);
            }
            App::setLocale($locale);
            session()->put('locale',$locale);
        }

        $productList = Item::with('generic','brand','itemType')->orderBy('name')->get();

        return view('pages.front',[
            'productList'=>$productList,
        ]);

    }
}
