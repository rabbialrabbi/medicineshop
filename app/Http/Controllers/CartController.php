<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Item $item)
    {
        if (session()->has('product_list')) {
            $product = session()->get('product_list');
            $cookies_product = $this->generate_product($item);
            $product_after_check = in_array($cookies_product,$product);
            if(!$product_after_check){
                $product[] =$cookies_product;
            }
        }else{
            $product[] = $this->generate_product($item);
        }
        if(!is_null($product)){
            session()->put('product_list',$product);
        }


        return redirect()->route('home.view');
    }

    public function destroy(Item $item)
    {
        $delete_item = $this->generate_product($item);
        if (session()->has('product_list')) {
            $product = session()->get('product_list');
            $find_key = array_search($item->id, array_column($product, 'item_id'));

            if($find_key or $find_key==0){
                unset($product[$find_key]);
            }
        }else{
            $product[] = $this->generate_product($item);
        }
        if(!is_null($product)){
            session()->put('product_list',$product);
        }

        return redirect()->route('home.view');


    }
    public function generate_product($item)
    {
        $product = [
            'item_id'=>$item->id,
            'name'=>$item->name,
            'unit_price'=>$item->price,
        ];
        return $product;
    }
}
