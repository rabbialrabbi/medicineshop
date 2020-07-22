<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Generic;
use App\Item;
use App\ItemType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    public function index()
    {
        $key = request()->key ;
        if(!is_null($key)){
            $data =  Item::orderBy('created_at', 'desc')
                ->where('code', 'like', '%' . $key . '%')
                ->orWhere('name', 'like', '%' . $key . '%')
                ->get();

            return view('pages.show.showItemList',[
                'items'=>$data
            ]);
        };
        $data =  Item::orderBy('created_at', 'desc')->get();
        return view('pages.show.showItemList',[
            'items'=>$data
        ]);
    }


    public function create()
    {
        $data =  Item::orderBy('created_at', 'desc')->get();
        $itemType = ItemType::where('status','Active')->get();
        $brand = Brand::where('status','Active')->get();
        $generic = Generic::where('status','Active')->get();
        return view('pages.add.showItemForm',[
            'items'=>$data,
            'itemType'=>$itemType,
            'brand'=>$brand,
            'generic'=>$generic,
        ]);
    }


    public function store(Request $request)
    {
        $sanitized = $this->validation($request);
//        dd($request->all());

        $sanitized['image'] = 'item_'.$request->code.'_'.Carbon::now()->timestamp.'.'.$request->file('image')->getClientOriginalExtension();
        $request->file('image')->storeAs('public/item',$sanitized['image']);
        $result = Item::create($sanitized);
        return redirect()->back();
    }


    public function show(Item $item)
    {
        return view('pages.show.showItemElement',[
            'item'=>$item,

        ]);
    }


    public function edit(Item $item)
    {
        $itemType = ItemType::where('status','Active')->get();
        $brand = Brand::where('status','Active')->get();
        $generic = Generic::where('status','Active')->get();
        return view('pages.edit.showItemEditForm',[
            'item'=>$item,
            'itemType'=>$itemType,
            'brand'=>$brand,
            'generic'=>$generic,
        ]);
    }


    public function update(Request $request, Item $item)
    {

        $sanitized = $this->validation($request);

        $this->deleteImageFromStorage($item->image);

        $sanitized['image'] = 'item_'.$request->code.'_'.Carbon::now()->timestamp.'.'.$request->file('image')->getClientOriginalExtension();
        $request->file('image')->storeAs('public/item',$sanitized['image']);
        $item->update($sanitized);
        return redirect()->back();
    }


    public function destroy(Item $item)
    {
        $this->deleteImageFromStorage($item->image);
        $item->delete();
        return redirect()->back();
    }

    public function validation($request)
    {
        return $sanitized = $request->validate([
            'item_type_id'=>'required|numeric',
            'generic_id'=>'required|numeric',
            'brand_id'=>'required|numeric',
            'code'=>'required',
            'name'=>'required',
            'size'=>'required',
            'dosage'=>'required',
            'price'=>'required',
            'description'=>'required',
            'image'=>'required|image|mimes:png,jpg,jpeg',
        ]);
    }

    public function deleteImageFromStorage($image)
    {
        $file = storage_path('/app/public/item/'.$image);
        if(is_file($file)){
            unlink($file);
        }
    }
}
