<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Generic;
use App\Item;
use App\ItemType;
use App\MR;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MRController extends Controller
{

    public function index()
    {
        $key = request()->key ;
        if(!is_null($key)){
            $data =  MR::orderBy('created_at', 'desc')
                ->where('code', 'like', '%' . $key . '%')
                ->orWhere('name', 'like', '%' . $key . '%')
                ->orWhere('contact1', 'like', '%' . $key . '%')
                ->get();

            return view('pages.show.showMRList',[
                'items'=>$data
            ]);
        };
        $data =  MR::orderBy('created_at', 'desc')->get();
        return view('pages.show.showMRList',[
            'items'=>$data
        ]);

    }


    public function create()
    {
        if(!is_null(request()->name)){
            $inputUser = request();
        }else{
            $inputUser = null;
        }
        $data =  MR::orderBy('created_at', 'desc')->get();
        $itemType = ItemType::where('status','Active')->get();
        $brand = Brand::where('status','Active')->get();
        $generic = Generic::where('status','Active')->get();
        return view('pages.add.showMRForm',[
            'items'=>$data,
            'itemType'=>$itemType,
            'brand'=>$brand,
            'generic'=>$generic,
            'inputUser'=>$inputUser
        ]);
    }


    public function store(Request $request, User $user)
    {

        $sanitized = $this->validation($request);

        if($sanitized['user_id']=='none'){

            if(is_null($user->where('email',$sanitized['email1'])->first())){
                $user = $user->create([
                    'name'=>$sanitized['name'],
                    'email'=>$sanitized['email1'],
                    'password'=>Hash::make('12345678'),
                ]);
                $sanitized['user_id'] = $user->id;
            }else{
                exit('The Entry has already been exist');
            }
        }
        $sanitized['image'] = 'mr_'.$request->code.'_'.Carbon::now()->timestamp.'.'.$request->file('image')->getClientOriginalExtension();
        $request->file('image')->storeAs('public/mrlist',$sanitized['image']);
        $result = MR::create($sanitized);


        /*  Verified a user in database*/
        if(!is_null($result)){
            User::where('id',$sanitized['user_id'])->update(['is_verified'=>1]);
        }else{
            dd('not Working');
        }
        return redirect()->back();
    }


    public function show(MR $mr)
    {
        return view('pages.show.showMRElement',[
            'mr'=>$mr
        ]);
    }


    public function edit(MR $mr)
    {
        return view('pages.edit.showMREditForm',[
            'mr'=>$mr
        ]);
    }


    public function update(Request $request, MR $mr)
    {
        $sanitized = $this->validation($request);

        $this->deleteImageFromStorage($mr->image);

        $sanitized['image'] = 'mr_'.$request->code.'_'.Carbon::now()->timestamp.'.'.$request->file('image')->getClientOriginalExtension();
        $request->file('image')->storeAs('public/mrlist',$sanitized['image']);
        $mr->update($sanitized);
        return redirect()->back();
    }


    public function destroy(MR $mr)
    {
        $this->deleteImageFromStorage($mr->image);
        $mr->delete();
        return redirect()->route('mr.index');
    }

    public function validation($request)
    {
       return $sanitized = $request->validate([
            'code'=>'required',
            'user_id'=>'sometimes',
            'name'=>'required',
            'address1'=>'required',
            'address2'=>'sometimes',
            'address3'=>'sometimes',
            'contact1'=>'required',
            'contact2'=>'sometimes',
            'contact3'=>'sometimes',
            'email1'=>'required',
            'email2'=>'sometimes',
            'email3'=>'sometimes',
            'fax'=>'sometimes',
            'image'=>'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);
    }

    public function deleteImageFromStorage($image)
    {
        $file = storage_path('/app/public/mrlist/'.$image);
        if(is_file($file)){
            unlink($file);
        }
    }
}
